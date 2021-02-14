<?php
require_once 'elements/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']['user_id'] != $_GET['user_id'])
{
    header('Location: /login.php');
}
?>

<?php
    $name_err = $grupe_err = '';
    $sala_curs = $message = $grupe = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['password']))
        {
            $grupe_err = 'Trebuie sa introduci parola cu care vrei s-o modifici pe cea existenta.';
        }
        
        if(empty($grupe_err))
        {
			$sql = 'UPDATE users SET password = md5("' . $link->escape_string($_POST['password']) . '"), updated=NOW() WHERE id="' . $link->escape_string($_GET['user_id']) . '";';
            if($result = $link->query($sql))
			{
				$message = '<div class="alert alert-success">Parola ta a fost actualizata</div>';
			}
            else
            {
                $message = '<div class="alert alert-danger">Nu s-a putut modifica parola. ' . $link->error .  '</div>';
            }
        }
    }
    
    function test_input($data, $link='') {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if($link !== '')
        {
        	$sql = 'SELECT grupa FROM users WHERE id="' . $_GET['user_id'] . '" LIMIT 1';
        	if($result = $link->query($sql))
        	{
				$obj = $result->fetch_object();
				
        		if(!is_null($obj->grupa))
        		{
					return 'exista';
        		}
        		else
	        	{
	        		return $data;
	        	}
        	}
        	
        }
        else
        {
        	return $data;
        }
        
    }
?>
<div class="well">
    <?php echo isset($message) ? $message : ''; ?>
    <form action="" method="post" class="form-horizontal">
        <legend>Editeaza-ti profilul</legend>
        <div class="form-group">
<!--            <label for="grupa" class="col-md-2 control-label">Grupa</label>-->
<!--            <div class="col-md-8">-->
<!--				<select name="grupa" id="grupa" class="form-control">-->
<!--					<option value="">Alege grupa</option>-->
<!--					--><?php //
//					$grupaSql = 'SELECT * FROM grupe';
//					if($result=$link->query($grupaSql))
//					{
//						while($grupa = $result->fetch_object())
//						{ ?>
<!--							<option value="--><?php //echo $grupa->id; ?><!--">--><?php //echo $grupa->nume; ?><!--</option>-->
<!--						--><?php //}
//					}
//					?>
<!--				</select>-->
<!--                --><?php //if(!empty($grupe_err)): ?>
<!--                <div class="alert alert-danger">-->
<!--                    --><?php //echo $grupe_err; ?>
<!--                </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
            <label for="password" class="col-md-2 control-label">Parola</label>
            <div class="col-md-8">
                <input type="password" class="form-control" name="password" id="password" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <input type="submit" value="Salveaza profil" name="" class="btn btn-success pull-right" />
            </div>
        </div>
    </form>
</div>
<?php require_once 'elements/footer.php'; ?>