<?php require_once 'elements/header.php'; ?>
<?php
    $_SESSION['step'] = '';
    $grupa_err = $sali_curs_err = '';
    $grupa = $sala = '';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST['grupa'])) || empty($_SESSION['post']['grupa']))
        {
            $grupa_err = 'Alege o grupa care va da examen.';
            $_SESSION['errors']['grupa'] = $grupa_err;
        }
        else
        {
            $grupa = test_input($_POST['grupa']);
            $_SESSION['post']['grupa'] = $link->escape_string($grupa);
        }
        if(empty(trim($_POST['sali_de_curs'])))
        {
            $sali_curs_err = 'Alege o sala in care se va da examenul';
            $_SESSION['errors']['sali_de_curs'] = $sali_curs_err;
        }
        else
        {
            $sala_curs = test_input($_POST['sali_de_curs']);
            $_SESSION['post']['sali_de_curs'] = $sala_curs;
        }
        
    }
?>
<div class="well">
    <form class="form form-horizontal" action="" method="<?php if($_SESSION['step'] == '1'): echo 'post'; else: echo 'get'; endif; ?>">
        <?php if($_SESSION['step'] === ''): ?>
        <div class="form-group">
            <label for="grupa_id" class="col-md-2 control-label">Grupa</label>
            <div class="col-md-8">
                <select name="grupa_id" id="grupa_id" class="form-control">
                    <option value="">Alege grupa</option>
                    <?php
                        $sql = 'SELECT DISTINCT grupa FROM users WHERE grupa != NULL;';
                        if($result = $link->query($sql))
                        {
                            while($grupa = $result->fetch_object())
                            {
                                echo '<option value="' . $grupa->grupa . '">' . $grupa->grupa . '</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <?php else: ?>
        <div class="form-group">
            <label for="sali_de_curs" class="col-md-2 control-label">Sala de curs</label>
            <div class="col-md-8">
                <select name="sali_de_curs" id="sali_de_curs" class="form-control">
                    <option value="">Alege sala</option>
                    <?php
                        $sql = 'SELECT id, nume FROM sali';
                        if($result = $link->query($sql))
                        {
                            while($sala = $result->fetch_object())
                            {
                                echo '<option value="' . $sala->id . '">' . $sala->nume . '</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="curs" class="col-md-2 control-label">Curs</label>
            <div class="col-md-8">
                <select name="curs_id" id="curs" class="form-control">
                    <option value="">Alege curs</option>
                    <?php
                        $sql = 'SELECT id FROM profii_curs WHERE id_prof="' . $_SESSION['user']['user_id'] . '";';
                        if($result = $link->query($sql))
                        {
                            while($curs = $result->fetch_object())
                            {
                                $sql = 'SELECT name FROM cursuri WHERE id="' . $curs->id . '";';
                                if($res = $link->query($sql))
                                {
                                    while($curs_nume = $res->fetch_object())
                                    {
                                        echo '<option value="' . $curs->id . '">' . $curs_nume->name . '</option>';
                                    }
                                }
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <?php endif; ?>
    </form>
</div>

<?php require_once 'elements/footer.php'; ?>