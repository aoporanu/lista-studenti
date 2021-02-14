<?php
require_once 'elements/header.php';
ini_set('display_errors', '1');
error_reporting(E_ALL);
if(!$_SESSION['user']['user_id'])
{
    header('Location: /');
}
$sql = 'SELECT * FROM profii_curs LEFT JOIN cursuri ON cursuri.id=profii_curs.id_curs WHERE id_curs="' . $link->escape_string($_GET['curs_id']) .
    '" AND id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '"';
$result = $link->query($sql);
// vezi daca profesorul preda cursul asta, daca nu redirectioneaza la index
if($result->num_rows < 1)
{
    header('Location: /');
}

// ia numarul studentilor din grupele pasate ca parametri.
$grupe = explode(',', $_GET['grupe']);
$studenti = 0;
$grupeStr = '';
foreach($grupe as $k=>$v)
{
    $sql1 = 'SELECT count(*) AS `count` FROM users WHERE grupa IN("' . $link->escape_string($v) . '")';
    if($v != '0')
    {
        $select = 'SELECT `nume` FROM `grupe` WHERE id="'.$link->escape_string($v).'"';
        $res = $link->query($select);
        $group = $res->fetch_object();
        $grupeStr .= $group->nume . ', ';
    }
    $result = $link->query($sql1) or die($link->error);
    $st = $result->fetch_object();
    $studenti += $st->count;
}

$result = $link->query($sql);
$user = $result->fetch_object();
// vezi care sala are minim $studenti locuri si nu e ocupata la ora aleasa de prof.
$sql2 = 'SELECT * FROM sali WHERE capacitate >= "' . $link->escape_string($studenti) . '"';

if($result1 = $link->query($sql2)): ?>
<?php if(!isset($_POST['buton1'])): ?>
<form action="" method="POST">
    <div class="form-group clearfix">
        <h3>
            Pe baza numarului de studenti din grupele <?php echo $grupeStr ?> poti alege din urmatoarea lista de sali:
        </h3>
        <label for="sala" class="control-label col-md-2">Sala</label>
        <div class="col-md-8">
            <select id="sala" name="sala" class="form-control">
                <?php while($sala = $result1->fetch_object()): ?>
                    <option value="<?php echo $sala->id ?>"><?php echo $sala->nume; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>

    <div class="form-group clearfix">
        <label for="data" class="control-label col-md-2">Data</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="data" id="data"/>
        </div>
    </div>
    <div class="form-group clearfix">
        <label for="start" class="control-label col-md-2">Ora inceput</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="start" name="start"/>
        </div>
    </div>
    <div class="form-group clearfix">
        <label for="finis" class="control-label col-md-2">Ora sfarsit</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="finis" name="finis"/>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" name="buton1" value="Pasul 2" class="btn btn-default" />
    </div>
</form>
<?php endif; ?>
<?php
if(isset($_POST['buton1'])):
    $start = $link->escape_string($_POST['start']);
    $startArr = explode(':', $start);
    $start_minus = $startArr[0]-1 . ':' . $startArr[1] ? ('30' || '15') : '00';
    $start_plus = $startArr[0]+1 . ':' . $startArr[1] ? ('30' || '15') : '00';
    $finis = $link->escape_string($_POST['finis']);
    $finisArr = explode(':', $finis);
    $finis_minus = $finisArr[0] - 1 . ':' . $finisArr[1] ? ('30' || '15') : '00';
    $finis_plus = $finisArr[0] + 1 . ':' . $finisArr[1] ? ('30' || '15') : '00';

    // daca de aici nu gasesc nici un rand inseamna ca pot sa programez examenul in sala $_POST['sala']
    $selection = 'SELECT * FROM examene WHERE id_sala="' . $link->escape_string($_POST['sala']) .
        '" AND `data`="' . $link->escape_string($_POST['data']) .
        '" AND "' . $link->escape_string($_POST['start']) . '" <= `finis` ' .
        ' AND "' . $link->escape_string($_POST['finis']) . '" >= `start`';
    $result = $link->query($selection);
    if($result->num_rows > 0)
    {
        $message = '<div class="alert alert-danger">Examenul nu se poate salva la ora si sala aleasa.</div>';
    }
    else
    {
        $sql = 'INSERT INTO examene SET ' .
            'id_curs="' . $link->escape_string($_GET['curs_id']) . '",' .
            'id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '", ' .
            'id_sala="' . $link->escape_string($_POST['sala']) . '",' .
            'data="' . $link->escape_string($_POST['data']) . '",' .
            'start="' . $link->escape_string($_POST['start']) . '",' .
            'finis="' . $link->escape_string($_POST['finis']) . '",' .
            'created=NOW(), updated=NOW()';
        echo $sql;
        $result = $link->query($sql);
        if($result):
            $message = '<div class="alert alert-success">Examenul a fost adaugat.</div>';
        else:
            $message = '<div class="alert alert-danger">' . $link->error . '</div>';
        endif;
    }
    ?>
    <?php echo isset($message)?$message:$message; ?>
    <form action="" method="POST">

        
        <input type="submit" name="buton2" value="Incheiere (exporta orar)" />
    </form>
    <?php endif;
?>
<?php if(isset($_POST['buton2'])): ?>
    <!-- insereaza in baza de date -->
    <?php
    $sql1 = 'SELECT id FROM examene WHERE '.
        'id_curs="' . $link->escape_string($_GET['curs_id']) . '" AND ' .
        'id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '" AND ' .
        'id_sala="' . $link->escape_string($_POST['sala']) . '"';
    $result = $link->query($sql1);
    if($result->num_rows < 1)
    {
        // inseram examenul pentru ca nu avem nici unul
        $sql = 'INSERT INTO examene SET ' .
        'id_curs="' . $link->escape_string($_GET['curs_id']) . '",' .
        'id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '", ' .
        'id_sala="' . $link->escape_string($_POST['sala']) . '",' .
        'data="' . $link->escape_string($_POST['date']) . '",' .
        'start="' . $link->escape_string($_POST['start']) . '",' .
        'finis="' . $link->escape_string($_POST['finis']) . '",' .
        'created=NOW(), updated=NOW()';
        if($result = $link->query($sql)):
            $message = '<div class="alert alert-success">Examenul a fost adaugat.</div>';
        else:
            $message = '<div class="alert alert-danger">' . $link->error . '</div>';
        endif;
        
    }
    else
    {
        $message = '<div class="alert alert-danger">Examenul acesta exista deja</div>';
    }
    
    ?>
<?php endif; ?>
<?php endif; ?>

<?php echo isset($message) ? $message : ''; ?>

<?php require_once 'elements/footer.php'; ?>
