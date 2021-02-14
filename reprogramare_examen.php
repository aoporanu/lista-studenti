<?php require_once 'elements/header.php' ?>

<div class="well">
    <?php
    // daca examenul nu-i apartine?
    $sql1 = 'SELECT id_prof, id_sala FROM examene WHERE id="' .$link->escape_string($_GET['examen_id']). '"';
    $result = $link->query($sql1);
    $user = $result->fetch_object();
    if($user->id_prof !== $_SESSION['user']['user_id'])
    {
        header('Location: /');
    }

    $data_err = $start_err = $finis_err = $message = $examen_err = $sala_err = '';
    $data = $start = $finis = $sala = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if(empty(trim($_POST['data'])))
        {
            $data_err = '<div class="alert alert-danger">Trebuie sa introduci o alta ora.</div>';
        }
        else
        {
            $data = $link->escape_string($_POST['data']);
        }
        if(empty(trim($_POST['start'])))
        {
            $start_err = '<div class="alert alert-danger">Trebuie sa introduci o alta ora pentru examen.</div>';
        }
        else
        {
            $start = $link->escape_string($_POST['start']);
        }
        if(empty(trim($_POST['finis'])))
        {
            $finis_err = '<div class="alert alert-danger">Trebuie sa introduci ora de final a examenului</div>';
        }
        else
        {
            $finis = $link->escape_string($_POST['finis']);
        }
        if(empty(trim($_POST['sala'])))
        {
            $sala_err = '<div class="alert alert-danger">Trebuie sa introduci sala in care se va desfasura examenul</div>';
        }
        else
        {
            $sala = $link->escape_string($_POST['sala']);
        }
        if(empty($data_err) && empty($start_err) && empty($finis_err))
        {
            // asta este daca nu e fix la ora aleasa de profesor, mai trebuie si intervale
            $sql2 = 'SELECT * FROM examene WHERE id_sala="' . $link->escape_string($_POST['sala']) .
                '" AND `data`="' . $link->escape_string($_POST['data']) .
                '" AND "' . $link->escape_string($_POST['start']) . '" <= `finis` ' .
                ' AND "' . $link->escape_string($_POST['finis']) . '" >= `start`';
            $result = $link->query($sql2);
//            echo $sql2;
            if($result->num_rows > 0)
            {
                $examen_err = '<div class="alert alert-danger">Examenul nu se poate reprograma la ora ' . $start . ' in ziua ' . $data . ' pentru ca sala este deja ocupata. Poti sa alegi alta sala.</div>';
            }
            else
            {
                $sql3 = 'UPDATE examene SET start="' . $start . '", `finis`="' . $finis . '", `data`="' . $data . '", id_sala="'.$sala.'"' .
                    ' WHERE id="' . $link->escape_string($_GET['examen_id']) . '"';
//                echo $sql3;
                $result = $link->query($sql3);
                if($result)
                {
                    $message = '<div class="alert alert-success">Examenul a fost reprogramat pentru ' . $data .
                        ' incepand de la ' . $start . '</div>';
                }
                else
                {
                    $message = '<div class="alert alert-danger">A fost o eroare la reprogramarea examenului. '.$link->error .'</div>';
                }
            }

        }
    }
    echo isset($message) ? $message : '';
    echo isset($examen_err) ? $examen_err : '';
    ?>
    <form action="" method="post" class="form form-horizontal">
        <div class="form-group">
            <!-- data -->
            <label for="data" class="col-md-2 control-label">Data</label>
            <div class="col-md-8">
                <input type="text" autocomplete="off" class="form-control" id="data" name="data" />
                <?php echo isset($data_err) ? $data_err : ''; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="start" class="col-md-2 control-label">Ora start</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="start" name="start"/>
                <?php echo isset($start_err) ? $start_err : ''; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="sala" class="control-label col-md-2">Sala</label>

            <div class="col-md-2">
                <select name="sala" id="sala" class="form-control">
                    <option value="">Alege o sala</option>
                    <?php $sql4 = 'SELECT * FROM sali;'; ?>
                    <?php $result = $link->query($sql4); ?>
                    <?php while($sala = $result->fetch_object()): ?>
                        <option value="<?php echo $sala->id ?>"><?php echo $sala->nume; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="finis" class="col-md-2 control-label">Ora sfarsit</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="finis" name="finis"/>
                <?php echo isset($finis_err) ? $finis_err : ''; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10">
                <input type="submit" class="btn btn-success pull-right" value="Reprogrameaza" />
            </div>
        </div>
    </form>
</div>

<?php require_once 'elements/footer.php' ?>