
<?php include '../classes/Adminlogin.php';?>
<?php
$al = new Adminlogin();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$adminUser = $_POST['AdminUser'];
	$adminPass = md5($_POST['AdminPass']);
	$loginChk  = $al->adminlogin($adminUser,$adminPass);
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;font-size:18px;">
				<?php 
				  if(isset($loginChk))
				  {
					  echo $loginChk;
				  }
				
				?>
			<div>
				<input type="text" placeholder="Username" required="" name="AdminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="AdminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>