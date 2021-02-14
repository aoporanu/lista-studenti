<?php
require_once 'elements/header.php';
if((!$_SESSION['user'] && $_SESSION['user']['role_id'] != '1' && $_SESSION['user']['user_id'] !== $_GET['user_id']))
{
    header('Location: /');
}
$name_err = $grupe_err = $grup_err = $email_err = '';
    $username = $grup = $email = $message = $grupe = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST['password'])))
        {
            $grupe_err = 'Trebuie sa introduci parola.';
        }
        else
        {
            $grupe = test_input($_POST['password']);
        }
        
        if(empty($_POST['email']))
        {
        	$email_err = 'Trebuie sa introduci adresa de email';
        }
        else
        {
        	$email = test_input($_POST['email']);
        }

        if(empty($grupe_err) && empty($email_err) && empty($grup_err))
        {
            $sql = '';
            if(isset($_GET['user_id']) && $_GET['user_id'] === $_SESSION['user']['user_id'])
            {
                $sql .= 'UPDATE users SET `password`="' . md5($link->escape_string($grupe)) . '", ' .
                    'updated=NOW()';
            }
            else
            {
            	$sql .= 'INSERT INTO users SET `username` = "' . $link->escape_string($username) . '",' .
            		'`password`="' . md5($link->escape_string($grupe)) . '", ' .
            		'`email`="' . $link->escape_string($email) . '",' .
            		'`created`=NOW(), `updated`=NOW(), ' .
            		'`role_id`="1";';
            }
            if($result = $link->query($sql))
			{
				$message = '<div class="alert alert-success">Contul tau a fost inregistrat</div>';
			}
            else
            {
                $message = '<div class="alert alert-danger">Nu am putut crea contul tau. Te rugam sa mai incerci.</div>';
            }
        }
    }
    function test_input($data, $link='', $unique=FALSE) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if($link !== '' && $unique)
        {
        	$sql = 'SELECT * FROM users WHERE username="' . $data . '" LIMIT 1';
        	if($result = $link->query($sql))
        	{
        		if($result->num_rows === 1)
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
    <form class="clearfix" action="" method="POST">
        <legend>Adauga profesori</legend>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label">Email</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" autocomplete="off" />
                <?php
					if(!empty($email_err))
					{
						echo '<div class="alert alert-danger">'. $email_err . '</div>';
					}
				?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="password" class="col-md-2 control-label">Password</label>
            <div class="col-md-8">
                <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" autocomplete="off" />
                <?php
					if(!empty($grupe_err))
					{
						echo '<div class="alert alert-danger">'. $grupe_err . '</div>';
					}
				?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label for="full_name" class="col-md-2 control-label">Nume complet</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : '' ?>" autocomplete="off" />
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <div class="col-md-10">
                <input type="submit" class="Btn btn-default pull-right" value="Adauga utilizator" />
            </div>
        </div>
    </form>
</div>
