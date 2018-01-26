<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
			<div id="loginresultmessage">
				<?php
        			validation_errors();
			        $error = $this->session->flashdata('error');
			        if($error)
			        {
			            ?>
			            <div class="alert alert-danger alert-dismissable">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <?php echo $error; ?>                    
			            </div>
			        <?php }
			        $success = $this->session->flashdata('success');
			        if($success)
			        {
			            ?>
			            <div class="alert alert-success alert-dismissable">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <?php echo $success; ?>                    
			            </div>
			        <?php } ?>
			</div>

			<form action="<?php echo base_url(); ?>index.php/login/signin" method="post">
				<div class="form-group">
				  <label for="usr">User Email:</label>
				  <input type="email" name="email" class="form-control" id="login_user" required="">
				</div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" name="password" class="form-control" id="login_pwd" required="">
				</div>
				<button type="submit" class="btn btn-success" id='login_btn'>Login</button>
			</form>

		</div>
	</div>
</div>