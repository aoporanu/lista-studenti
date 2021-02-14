<?php include 'elements/header.php'; ?>
<?php
$data_err = $ora_err = '';
$data = $ora = $message = '';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST['data'])))
    {
        $data_err = '<div class="alert alert-danger">Trebuie sa alegi data.</div>';
    }
    else
    {
        $data = $link->escape_string($_POST['data']);
    }
    if(empty(trim($_POST['ora'])))
    {
        $ora_err = '<div class="alert alert-danger">Trebuie sa alegi ora.</div>';
    }
    else
    {
        $ora = $link->escape_string($_POST['ora']);
    }

    if(empty($data_err) && empty($ora_err))
    {
        // vezi daca exista preferinte pentru examenul asta.
        $sql2 = 'SELECT id FROM preferinte_student WHERE id="' . $link->escape_string($_GET['examen_id']) . '"' .
            ' AND user_id="' . $link->escape_string($_SESSION['user']['user_id']) . '";';
        $result = $link->query($sql2);
        if($result->num_rows > 0) {
            $sql = 'UPDATE preferinte_student SET `data`="' . $data . '", ' .
                '`ora`="' . $ora . '"';
            if(!empty($_POST['observatii']))
            {
                $sql .= ', `observatii`="' . $link->escape_string($_POST['observatii']) . '"';
            }
            $sql .= ' WHERE `examen_id`="' . $link->escape_string($_POST['examen_id']) . '"';
            $sql .= ' AND `user_id`="' . $link->escape_string($_SESSION['user']['user_id']) . '"';
        }
        else
        {
            $sql = 'INSERT INTO preferinte_student SET `data`="' . $data . '", ' .
                '`ora`="' . $ora . '"';
            if(!empty($_POST['observatii']))
            {
                $sql .= ', `observatii`="' . $link->escape_string($_POST['observatii']) . '"';
            }
            $sql .= ', `examen_id`="' . $link->escape_string($_POST['examen_id']) . '",';
            $sql .= '`user_id`="' . $link->escape_string($_SESSION['user']['user_id']) . '"';
        }
        if($link->query($sql))
        {
            $message = '<div class="alert alert-success">Observatiile tale pentru curs au fost salvate.</div>';
        }
        else
        {
            $message = '<div class="alert alert-danger">Observatiile tale pentru curs nu au fost salvate. ' . $link->error . '</div>';
        }
    }
}
unset($preferinte);
$sql1 = 'SELECT * FROM preferinte_student WHERE examen_id="' . $link->escape_string($_GET['examen_id']) . '"' .
    ' AND user_id="' . $link->escape_string($_SESSION['user']['user_id']) . '";';
$result = $link->query($sql1) or die($link->error);
$preferinte = $result->fetch_object();
?>
<div class="container">
    <div class="row">
        <div class="well">
            <?php echo isset($message) ? $message : ''; ?>
            <form action="" method="post" class="form form-horizontal">
                <legend>Preferinte student</legend>
                <div class="form-group">
                    <div class="col-md-5">
                        <label for="data" class="control-label col-md-2">Data</label>
                        <div class="col-md-8">
                            <input type="text" id="data" name="data" value="<?php echo isset($preferinte->data) ? $preferinte->data : '' ?>" class="form-control" autocomplete="off" />
                            <?php echo isset($data_err) ? $data_err : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="ora" class="control-label col-md-2">Ora</label>
                        <div class="col-md-8">
                            <input type="text" id="ora" name="ora" class="form-control" autocomplete="off" value="<?php echo isset($preferinte->ora) ? $preferinte->ora  : ''?>" />
                            <?php echo isset($ora_err) ? $ora_err : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <input type="hidden" name="examen_id" value="<?php echo $link->escape_string($_GET['examen_id']) ?>" />
                <div class="form-group">
                    <label for="observatii" class="col-md-2 control-label">Observatii</label>
                    <div class="col-md-8">
                        <textarea name="observatii" id="observatii" cols="30" rows="10" class="form-control">
                            <?php echo isset($preferinte->observatii) ? $preferinte->observatii : '' ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary pull-right" value="Salveaza preferinte"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'elements/footer.php'; ?>