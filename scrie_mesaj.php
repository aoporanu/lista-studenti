<?php require_once 'elements/header.php' ?>
<div class="well">
    <!--
    1 - E autentificat?
    2 - E profesor?
    3 - E profesor la cursul asta?
        daca nu, redirecteaza spre login
        -->
    <?php
    $subiect = $mesaj = $message = '';
    $subiect_err = $mesaj_err = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if(empty(trim($_POST['subiect'])))
        {
            $subiect_err = '<div class="alert alert-danger">Introdu subiectul mesajului</div>';
        }
        else
        {
            $subiect = $link->escape_string($_POST['subiect']);
        }
        if(empty(trim($_POST['mesaj'])))
        {
            $mesaj_err = '<div class="alert alert-danger">Introdu textul mesajului</div>';
        }
        else
        {
            $mesaj = $link->escape_string($_POST['mesaj']);
        }
        if(empty($subiect_err) && empty($mesaj_err))
        {
            $sql = 'INSERT INTO `mesaje` SET `from`="' . $link->escape_string($_SESSION['user']['user_id']) .
                '", `to`="' . $link->escape_string($_POST['id_student']) .
                '", `id_examen=`' . $link->escape_string($_POST['id_examen']) .
                '", `subiect`="' . $subiect .
                '", `mesaj`="' . $mesaj .
                '", `created`=NOW()';
            $result = $link->query($sql);
            if($result)
            {
                $message = '<div class="alert alert-success">Mesajul a fost trimis.</div>';
            }
            else
            {
                $message = '<div class="alert alert-danger">Mesajul nu a putut fi trimis.</div>';
            }
        }
    }
    ?>
    <?php echo isset($message) ? $message : $message; ?>
    <form action="" class="form form-horizontal" method="post">
        <div class="form-group">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <legend>
                    Trimite un mesaj studentului
                </legend>
            </div>
        </div>
        <div class="form-group">
            <label for="subiect" class="control-label col-md-2">Subiect</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="subiect" autocomplete="off" name="subiect" />
            </div>
        </div>
        <input type="hidden" name="id_student" value="<?php echo $link->escape_string($_GET['student_id']) ?>" />
        <input type="hidden" name="id_examen" value="<?php echo $link->escape_string($_GET['examen_id']) ?>" />
        <div class="form-group">
            <label for="mesaj" class="control-label col-md-2">Mesaj</label>
            <div class="col-md-8">
                <textarea name="mesaj" id="mesaj" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10">
                <button class="pull-right btn btn-primary">Trimite mesaj</button>
            </div>
        </div>
    </form>
</div>
<?php require_once 'elements/header.php' ?>