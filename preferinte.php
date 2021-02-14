<?php
require_once 'elements/header.php';
require_once 'includes/paginate.class.php';
ini_set('display_errors', '1');
error_reporting(E_ALL);
if($_SESSION['user']['role_id'] !== '1')
{
    header('Location: /');
}

$name_err = $sala_curs_err = $data_err = $time_err = $grupe_err = '';
$sala_curs = $message = $grupe = $data = $time = '';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST['name']))
    {
        $name_err = 'Numele cursului nu trebuie sters.';
    }
    if(empty($_POST['grupe']))
    {
        $grupe_err = 'Trebuie sa introduci grupa/grupele care dau examen.';
    }
    
    // pune un foreach ca sa introduci grupele care dau examen intr-un tabel de intersectare.
    if(empty($name_err) && empty($sala_curs_err) && empty($grupe_err))
    {
        $sql = 'UPDATE profii_curs SET grupe="' . $link->escape_string($grupe) . '"';

        $sql .=  ' WHERE id_curs="' . $link->escape_string($_GET['curs_id']) . '" AND id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '"';
        if(empty($grupe_err))
        {
            foreach($_POST['grupe'] as $k=>$v)
            {
                $sql_grupe = 'SELECT * FROM grupe_curs WHERE grupa="' . $link->escape_string($v) . '" AND id_curs="' . $link->escape_string($_GET['curs_id']) . '";';
                $result = $link->query($sql_grupe);
                if($result->num_rows < 1)
                {
                    $sql1 = 'INSERT INTO grupe_curs SET grupa="' . $link->escape_string($v) . '", id_curs="' . $link->escape_string($_GET['curs_id']) . '"';
                    $link->query($sql1);
                }
            }
        }
        if($result = $link->query($sql))
        {
            $message = '<div class="alert alert-success">Preferintele pentru curs s-au salvat.</div>';
        }
        else
        {
            $message = '<div class="alert alert-danger">Nu s-au putut salva preferintele pentru curs.</div>';
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_GET['curs_id']))
{
   
    $sql = 'SELECT * FROM profii_curs WHERE id_curs="' . $link->escape_string($_GET['curs_id']) . '" AND id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '";';
    if($result = $link->query($sql))
    {
        $profii_curs = $result->fetch_object();
        if($result->num_rows == 0)
        {
            echo '<div class="alert alert-danger">Nu sunteti profesor la acest curs.</div>';
        }
        else
        {
        $sql = "SELECT id, name, display_name from cursuri where id='" . $link->escape_string($_GET['curs_id']) . "';";
        $sali_sql = 'SELECT id, nume FROM sali;';
        if($result = $link->query($sql))
        {
            $curs = $result->fetch_object();
            $grupeSql = 'SELECT * FROM grupe_curs left join grupe on grupe.id=grupe_curs.grupa WHERE id_curs="' . $link->escape_string($_GET['curs_id']) . '";';
            if($message != '')
            {
                echo $message;
            }
             echo '<h1>Aceasta pagina o poti folosi daca vrei sa adaugi un examen pentru cursul ' . $curs->name . '</h1>';
        ?>
            <form class="form form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?curs_id=' . $_GET['curs_id'];?>">
                <legend>Preferinte pentru <?php echo $curs->name; ?></legend>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="name">Nume curs</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" autocomplete="off" name="name" id="name" value="<?php echo $curs->name ?>" />
                        <?php if($name_err != ''): ?>
                        <div class="alert alert-danger">
                            <?php echo $name_err ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="sala_curs">Sala de curs</label>
                    <div class="col-md-8">
                        <?php if($sResult = $link->query($sali_sql))
                        { ?>
                        <select name="sala_curs" id="sala_curs" class="form-control">
                            <option value="">Selecteaza sala de curs</option>
                            <?php while($sala = $sResult->fetch_object()) { ?>
                                <option value="<?php echo $sala->id; ?>" <?php if($profii_curs->sala_curs === $sala->id): echo 'selected'; endif; ?>><?php echo $sala->nume; ?></option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                        <?php if($sala_curs_err != ''): ?>
                        <div class="alert alert-danger">
                            <?php echo $sala_curs_err ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="grupe">Grupe</label>
                    <div class="col-md-8">
                        <select name="grupe[]" id="grupe" class="form-control" multiple>
                            <?php $sql = 'SELECT * FROM grupe;';
                                if($result = $link->query($sql))
                                {
                                    while($grupa = $result->fetch_object())
                                    {
                                        echo '<option value="' . $grupa->id . '">' . $grupa->nume . '</option>';
                                    }
                                }
                            ?>
                        </select>
                        <?php if($grupe_err != ''): ?>
                        <div class="alert alert-danger">
                            <?php echo $grupe_err ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <?php if($grupeResult = $link->query($grupeSql)): ?>
                            <?php while($grupa = $grupeResult->fetch_object()): ?>
                                <div class="row"><?php echo $grupa->nume; ?></div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary pull-right" name="submit" value="Salveaza preferintele" />
                    </div>
                </div>
            </form>
            
        <?php }
        }
    }
}

require_once 'elements/footer.php';
