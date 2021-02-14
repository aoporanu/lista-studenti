<?php
require_once 'elements/header.php';

unset($_SESSION['user']);

header('Location: login.php');

require_once 'elements/footer.php';