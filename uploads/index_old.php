<?php include'dbfiles/login_process1.php' ?>
<?php include'dbfiles/org.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>OSPS - Billing</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="shortcut icon" href="assets/css/favicon-32x32.png">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout" style="background-color:#E4E6E9;">
   
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<span class="red"><img src="osps logo.png"/>Billing</span>
									<span class="red" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; OSPS TELECOM SERVICES PVT.LTD.</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												
												Please Enter Login Information
											</h4>
												
											
                                            
                                            
              <?php echo $error; ?>
            
                                            
											<form method="post" action=""  novalidate="novalidate" autocomplete="off" >
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="uname" id="uname" class="form-control" placeholder="Username" value="<?php echo @$user_email ?>" required/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
<strong class="alert-danger"><?php echo $errorName; ?></strong>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="pwd" id="pwd" required class="form-control" placeholder="Password" value="<?php echo @$password1 ?>" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
<strong class="alert-danger"><?php echo $errorpss; ?></strong>
													<div class="space"></div>

													<div class="clearfix">
														
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary" name="submit" ><i class="ace-icon fa fa-key"></i>Login</button>
															
															
														
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<!--<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>-->

											<div class="space-6"></div>

											<!--<div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>-->
										</div><!-- /.widget-main -->

										<div style="background-color:#1b6aaa;height:50px;padding:15px 25px;">
											<!--<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>-->
											<div class="background-color:#1b6aaa;text-align:left;">
												
												<b style="color:#c4ee00;">Design & Developed By&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>	<a href="https://www.accentelsoft.com" target="_blank"><b style="color:#fff;text-align:center;text-align:center;">Accentel Software </b></a>
													
												
											</div>
											
											
										</div>
										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<!-- /.forgot-box -->

								<!-- /.signup-box -->
							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		
	</body>
</html>
</html>
