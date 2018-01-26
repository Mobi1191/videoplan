<?php
if (!isset($_SESSION['isLoggedIn']) || !isset($_SESSION['user_id'])) {
	echo '<script type="text/javascript">
           window.location = "'.BASE_URL.'login.php"
      </script>';
	exit;
}