<?php
	require_once 'include/header.php';
	if (isset($_SESSION['isLoggedIn']) && isset($_SESSION['user_id'])) {
	echo '<script type="text/javascript">
           window.location = "'.BASE_URL.'"
      </script>';
	exit;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
			<div id="loginresultmessage"></div>
			<div class="form-group">
			  <label for="usr">User Email:</label>
			  <input type="email" class="form-control" id="login_user">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="login_pwd">
			</div>
			<button class="btn btn-success" id='login_btn'>Login</button>
		</div>
	</div>
</div>

<?php
    require_once './include/footer.php';
?>
