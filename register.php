<?php include('elements/header.php'); ?>
<?php
	$name_err = $grupe_err = $grup_err = $email_err = '';
    $username = $grup = $email = $message = $grupe = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST['username'])))
        {
            $name_err = 'Numele de utilizator nu poate fi gol.';
        }
        else
        {
        	$username = test_input($_POST['username'], $link, TRUE);
        	if($username == 'exista')
        	{
        		$name_err = 'Numele de utilizator exista deja in baza de date';
        	}
        }
        if(empty(trim($_POST['password'])))
        {
            $grupe_err = 'Trebuie sa introduci parola.';
        }
        else
        {
            $grupe = test_input($_POST['password']);
        }
        if(empty($_POST['group_id']))
        {
        	$grup_err = 'Trebuie sa alegi un grup';
        }
        else
        {
        	$grup = test_input($_POST['group_id']);
        }
        if(empty($_POST['email']))
        {
        	$email_err = 'Trebuie sa introduci adresa de email';
        }
        else
        {
        	$email = test_input($_POST['email']);
        }

        if(empty($name_err) && empty($grupe_err) && empty($email_err) && empty($grup_err))
        {
        	$sql = 'INSERT INTO users SET `username` = "' . $link->escape_string($username) . '",' .
        		'`password`="' . md5($link->escape_string($grupe)) . '", ' .
        		'`email`="' . $link->escape_string($email) . '",' .
        		'`created`=NOW(), `updated`=NOW(), ' .
        		'`role_id`="' . $link->escape_string($grup) . '";';
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
	<form class="form form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<legend>Inregistrare</legend>
		<div class="form-group">
			<label form="username" class="col-md-2 control-label">Nume de utilizator</label>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<input type="text" autocomplete="off" required name="username" id="username" class="form-control" />
				<?php
					if(!empty($name_err) || $name_err == 'exista')
					{
						echo '<div class="alert alert-danger">'. $name_err . '</div>';
					}
				?>
			</div>
			
		</div>
		<div class="form-group">
			<label for="password" class="col-md-2 control-label">Parola</label>
			<div class="col-md-8 col-xs-12 col-sm-12">
				<input type="password" autocomplete="off" required name="password" id="password" class="form-control" />
				<?php
					if(!empty($grupe_err))
					{
						echo '<div class="alert alert-danger">'. $grupe_err . '</div>';
					}
				?>
			</div>
		</div>
		<div class="form-group">
			<label for="group" class="col-md-2 control-label">Grup</label>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<select name="group_id" id="group" class="form-control">
					<option value="">Alege grupul</option>
					<option value="1">Profesori</option>
					<option value="2">Studenti</option>
				</select><?php
					if(!empty($grup_err))
					{
						echo '<div class="alert alert-danger">' . $grup_err . '</div>';
					}
				?>
			</div>
			
		</div>
		<div class="form-group">
			<label for="email" class="col-md-2 col-sm-12 col-xs-12 control-label">Adresa email</label>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<input type="email" class="form-control" id="email" name="email" required autocomplete="off"/>
				<?php
				if(!empty($email_err))
				{
					echo '<div class="alert alert-danger">' . $email_err . '</div>';
				}
				?>
			</div>
			
		</div>
		<div class="form-group">
			<div class="col-md-8 col-md-push-2">
				<input type="submit" class="btn btn-primary pull-right" name="submit" value="Inregistrare" />
			</div>
		</div>
	</form>
</div>



<?php include('elements/footer.php') ?>