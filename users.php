<?php
require_once 'elements/header.php';

require_once 'includes/paginate.class.php';
if($_SESSION['user']['role_id'] !== '0')
{
    header('Location: /');
}
?>
<div class="well">
    <?php 
    $sql = 'SELECT * FROM users;';
    $paginate = new Paginate($link, $sql);
    // echo '<pre>';
    //         var_dump($paginate);
    //         echo '</pre>';
            $r = $paginate->get_results();
            echo '<pre>';
            var_dump($r);
            echo '</pre>';
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
                    <a href="/adaugare_cursuri.php?curs_id=<?php echo $message->id ?>" class="btn btn-default" title="Adauga cursul acesta pe lista de cursuri predate de tine.">Adauga curs</a>
                    <!--<a href="/adauga_examen.php" class="btn btn-success" title="Setare preferinte examen">Adauga examen</a>-->
                    <a href="#" class="btn btn-success" title="Setare preferinte examen">Adauga examen</a>
                    </div>
                    <?php
                }
                
                echo '<div class="clearfix"></div></div>';
            } ?>
            <div class="clearfix"></div>
            <?php echo $paginate->show_pages();?>
</div>