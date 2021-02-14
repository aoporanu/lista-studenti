<?php require_once 'elements/header.php'; ?>
<?php
if(!isset($_SESSION['user']['logged_in']))
{
    header('Location: /login.php');
};
?>

<div class="well">
    <?php require_once 'left_menu.php'; ?>
    <div class="col-md-8">
        
    </div>
    <div class="clearfix"></div>
</div>
<?php include 'elements/footer.php' ?>
