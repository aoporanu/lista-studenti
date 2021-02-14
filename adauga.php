<?php require_once 'elements/header.php'; ?>

<form class="form form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-12 col-xs-12" for="nume-curs">
            Nume curs
        </label>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <input type="text" placeholder="Nume curs" class="form-control" value="<?php echo isset ($_POST['nume_curs']) ? $_POST['nume_curs'] : ''; ?>" autocomplete="off" id="nume-curs" name="nume_curs" />
            <?php if(isset($_SESSION['errors']['nume_curs'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['errors']['nume_curs']; ?>
                </div>
            <?php endif; ?>
		</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-12 col-xs-12" for="semestru-curs">
            Semestru curs
        </label>
        <div class="col-md-8 col-sm-12 col-xs-12">
        <input type="text" placeholder="Semestru curs" class="form-control" value="<?php echo isset($_POST['semestru_curs']) ? $_POST['semestru_curs'] : ''; ?>" autocomplete="off" id="semestru-curs" name="semestru_curs" />
        <?php if(isset($_SESSION['errors']['semestru_curs'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['errors']['semestru_curs']; ?>
                </div>
            <?php endif; ?>
		</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-12 col-xs-12" for="an-curs">
            An curs
        </label>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <input type="text" placeholder="An curs" class="form-control" value="<?php echo isset($_POST['an_curs']) ? $_POST['an_curs'] : ''; ?>" autocomplete="off" id="an-curs" name="an_curs" />
            <?php if(isset($_SESSION['errors']['an_curs'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['errors']['an_curs']; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="pull-right">
                <input type="submit" name="submit" class="btn btn-primary" value="Adauga" />
            </div>
        </div>
    </div>
</form>

<?php
if(!isset($_SESSION))
{
    session_start();
}
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['nume_curs']) || is_null($_POST['nume_curs']))
        {
            $_SESSION['errors']['nume_curs'] = 'Numele cursului trebuie sa nu fie nul si sa fie un sir de caractere';
            $_SESSION['errors']['status'] = TRUE;
        }
        if(empty($_POST['an_curs']) || is_null($_POST['an_curs']) || !is_int($_POST['an_curs']))
        {
            $_SESSION['errors']['an_curs'] = 'Trebuie introdus anul pentru care va fi predat cursul';
            $_SESSION['errors']['status'] = TRUE;
        }
        if(empty($_POST['semestru_curs']) || is_null($_POST['semestru_curs']) || !is_int($_POST['semestru_curs']))
        {
            $_SESSION['errors']['semestru_curs'] = 'Trebuie introdus semestrul pentru care va fi predat cursul';
            $_SESSION['errors']['status'] = TRUE;
        }
        
        if(!$_SESSION['errors']['status'])
        {
            // conecteaza-te la mysql si executa adaugarea.
        }
    }
?>

<?php include 'elements/footer.php'; ?>