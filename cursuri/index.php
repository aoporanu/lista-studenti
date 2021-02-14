<?php require_once '../elements/header.php'; ?>
<?php require_once '../includes/paginate.class.php'; ?>

<div class="well">
    <div class="col-md-4 col-xs-12 col-sm-12">
        <?php include 'left_menu.php'; ?>
    </div>
    
    <div class="col-md-8 col-sm-12 col-xs-12">
        <?php $query = "SELECT * FROM cursuri";
            if(isset($_GET['an']))
            {
                $query .= " WHERE an='" . $link->escape_string($_GET['an']) . "'";
            }
            if(isset($_GET['domeniu']))
            {
                if($_GET['an']) {
                    $query .= " AND ";
                }
                $query .= "domeniu='" . $link->escape_string($_GET['domeniu']) . "'";
            }
            if(isset($_GET['semestru']))
            {
                if($_GET['an'] || $_GET['domeniu'])
                {
                    $query .= " AND ";
                }
                $query .= "semestru='" . $link->escape_string($_GET['semestru']) . "'";
            }
            $paginate = new Paginate($link, $query);
            $r = $paginate->get_results();
            while($message = $r->fetch_object())
            {
                echo '<div class="well"><div class="col-md-6">';
                echo($message->name) . '</div>';
                if(isset($_SESSION['logged_in']) && $_SESSION['role_id'] === '0') {
                    echo '<div class="col-md-6"><a href="/edit.php?id=' . $message->id . '" class="btn btn-primary">Editeaza</a></div>';
                }
                if(isset($_SESSION['user']['logged_in']) && $_SESSION['user']['role_id'] === '1')
                {
                    ?>
                    <div class="col-md-6">
                    <a href="../adaugare_cursuri.php?curs_id=<?php echo $message->id ?>" class="btn btn-default" title="Adauga cursul acesta pe lista de cursuri predate de tine.">Adauga curs</a>
                    <!--<a href="/adauga_examen.php" class="btn btn-success" title="Setare preferinte examen">Adauga examen</a>-->
                    <!-- <a href="#" class="btn btn-success" title="Setare preferinte examen">Adauga examen</a>-->
                    </div>
                    <?php
                }
                
                echo '<div class="clearfix"></div></div>';
            } ?>
            <div class="clearfix"></div>
            <?php echo $paginate->show_pages();  
        ?>
    </div>
    <div class="clearfix"></div>
</div>

<?php require_once '../elements/footer.php'; ?>