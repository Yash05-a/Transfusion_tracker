<?php session_start(); ?>
<?php include('../dbcon.php'); ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="userstyles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<style>
		.navbar-inverse{
			background-color:#333;
		
		}
		
		
		</style>
</head>


<body>
<nav class="navbar  navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
                <a class="navbar-brand"style="color:#9D9D9D;" href="../index.php"><i class="icofont-blood-drop"></i>TRANSFUSION TRACKER</a>
				</div>
				

			  </div>
		</nav>
		<div class="d-flex justify-content-center"style="Font:50px;background-image:url('https://images.apollo247.in/pd-cms/cms/2023-05/Donate-blood.jpg');background-size: cover;
        background-repeat: no-repeat;">
	
	<h1>	User Login</h1></div>
			

	
	<div class="d-flex justify-content-center h-100"style="background-image:url('https://images.apollo247.in/pd-cms/cms/2023-05/Donate-blood.jpg');background-size: cover;
        background-repeat: no-repeat;">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/ico.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="#" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="Username" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Password" required>
						</div>
						<br>
						  <div class="g-recaptcha " data-sitekey="6Le5oUQmAAAAACBltgv6MGeoNHYtFcHtV1iRJ4qB">
							</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="userlogin" style="border-radius: 0%" class="btn login_btn">User Login</button>
				   </div>
				 
							<div class="d-flex justify-content-center mt-3 login_container ">Don't have an account?  <a style="color:#c0392b;font-size:15px; font-weight:bold;"  href="../pages/adddonor.php"> Register here</a></div>

                        
					</form>
				</div>
				
				<?php
                if (isset($_POST['userlogin'])) {
                    // Verify the reCAPTCHA response
                    $recaptchaResponse = $_POST['g-recaptcha-response'];
                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $data = array(
                        'secret' => '6Le5oUQmAAAAAFvwjHiLijE4JJhEp97XEmMbJwv6',
                        'response' => $recaptchaResponse
                    );

                    $options = array(
                        'http' => array(
                            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method' => 'POST',
                            'content' => http_build_query($data)
                        )
                    );

                    $context = stream_context_create($options);
                    $result = file_get_contents($url, false, $context);
                    $json = json_decode($result);
                    if ($json->success) {
                        // Captcha validation passed, proceed with login logic
                        $username = mysqli_real_escape_string($con, $_POST['username']);
                        $password = mysqli_real_escape_string($con, $_POST['password']);

                        $query = mysqli_query($con, "SELECT * FROM donor WHERE password='$password' AND username='$username'");
                        $row = mysqli_fetch_array($query);
                        $num_row = mysqli_num_rows($query);

                        if ($num_row > 0) {
                            $_SESSION['user_id'] = $row['user_id'];
                            header('location:userdashboard.php');
                        } else {
                            echo '
                                <div class="alert alert-danger alert-dismissible">
                                    Invalid Username & Password.
                                </div>';
                        }
                    } else {
                        // Captcha validation failed, show an error message
                        echo '
                            <div class="alert alert-danger alert-dismissible">
                                Captcha validation failed! Please try again.
                            </div>';
                    }
                }
                ?>
				
				
		
				<div class="mt-4">
					<!--<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#"  class="ml-2" style="text-decoration:none">Sign Up</a>
					</div> -->
					<!-- <div class="d-flex justify-content-center links">
						<a href="../" style="text-decoration:none; color: white">Back to Admin Panel</a>
					</div> -->
				</div>
			</div>
		</div>
	
</body>



</html>