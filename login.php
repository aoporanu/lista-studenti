<?php
include 'elements/header.php';
include 'includes/simple_html_dom.php';
ini_set('display_errors', '1');
error_reporting(E_ALL);
?>
<?php if(isset($_SESSION['user']['logged_in'])): ?>
	<?php header('Location: profile.php'); ?>
<?php endif; ?>
<?php
/**
 * Created by Joe of ExchangeCore.com
 */
$name_err = $grupe_err = '';
$username = $grupe = '';

if(isset($_POST['username']) && isset($_POST['password'])){
	if(empty($_POST['username']))
	{
		$name_err = 'Numele de utilizator nu poate fi gol.';
	}
	else
	{
		$username = $link->escape_string($_POST['username']);
		if(!$username)
		{
			$name_err = 'Numele de utilizator nu exista in baza de date';
		}
	}
	if(empty($_POST['password']))
	{
		$grupe_err = 'Trebuie sa introduci parola.';
	}
	else
	{
		$grupe = $link->escape_string($_POST['password']);
	}

	$adServer = "ldap://127.0.0.1";

	$ldap = ldap_connect($adServer);
	$username = $_POST['username'];
	$password = $_POST['password'];

	$ldaprdn = 'cn='.$username.',dc=parsing,dc=example,dc=com';

	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	$bind = ldap_bind($ldap, $ldaprdn, $password);

	if ($bind) {
		$filter="(sAMAccountName=$username)";
		$result = ldap_search($ldap,"dc=parsing,dc=example,dc=com",$filter);
		$sql = 'SELECT * FROM `users` WHERE `username`="'.$link->escape_string($username).'" AND `password`=md5("'.$password.'") LIMIT 1';
		$res = $link->query($sql);
		$user = $res->fetch_object();
		// register and login. Only students can register like this.
		if(is_null($user))
		{
			$sql1 = 'INSERT INTO `users` SET `username`="'.$link->escape_string($username).'", `password`=md5("'.$password.'"), `role_id`="2"';
			$res = $link->query($sql1);
			unset($res);
			$res = $link->query($sql);
			$user = $res->fetch_object();
			$_SESSION['user']['logged_in'] = TRUE;
			$_SESSION['user']['user_id'] = $user->id;
			$_SESSION['user']['role_id'] = $user->role_id;
			$_SESSION['user']['username'] = $user->username;

			header('Location: profile.php');
		}
		else
		{
			$_SESSION['user']['logged_in'] = TRUE;
			$_SESSION['user']['user_id'] = $user->id;
			$_SESSION['user']['role_id'] = $user->role_id;
			$_SESSION['user']['username'] = $user->username;
			header('Location: profile.php');
		}
		ldap_sort($ldap,$result,"sn");
		$info = ldap_get_entries($ldap, $result);
		for ($i=0; $i<$info["count"]; $i++)
		{
			if($info['count'] > 1)
				break;
			echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
			$userDn = $info[$i]["distinguishedname"][0];
		}
		@ldap_close($ldap);
	} else {
		$msg = "Invalid email address / password";
		echo $msg;
	}

}else{
	?>
	<div class="well">
		<form class="form form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<legend>Autentificare</legend>
			<div class="form-group">
				<label for="username" class="col-md-2 control-label">Nume de utilizator</label>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<input type="text" autocomplete="off" required name="username" id="username" class="form-control" />

					<?php if($name_err != ''): ?>
						<div class="alert alert-danger"><?php echo $name_err; ?></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-2 control-label">Parola</label>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<input type="password" autocomplete="off" required name="password" id="password" class="form-control" />
					<?php if($grupe_err !== ''): ?>
						<div class="alert alert-danger"><?php echo $grupe_err; ?></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-md-push-2">
					<input type="submit" class="btn btn-primary pull-right" name="submit" value="Autentificare" />
				</div>
			</div>
		</form>
	</div>
<?php } ?>
<?php include 'elements/footer.php';
