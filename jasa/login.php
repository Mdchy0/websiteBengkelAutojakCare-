<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin - Jak AutoCare</title>
	<link rel="stylesheet" href="res/css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" href="res/plugin/FontAwesome/css/font-awesome.min.css">
</head>
<body>
	<div id="container" data-background="images/mobil.jpg">
		<div class="box box-sm">
			<div class="logo">
				<span style="color:rgba(255,255,255,.4);">Login Admin</span>
				<h1 style="font-size:32pt;letter-spacing:-3px;"><span style="color:#a5c422
"> Jak </span> AutoCare</h1>

			</div>
			<div class="form">
				<form action="proses_login.php" method="post">
					<div class="form-group">
						<span class="form-icon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-input" placeholder="username" name="username" autofocus="">
					</div>
					<div class="form-group">
						<span class="form-icon"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-input" placeholder="password" name="password">
					</div>
					<button class="btn btn-warning btn-block">Login</button>
					
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="res/plugin/jQuery/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="res/js/script.js"></script>
	<script type="text/javascript">
		$(".btn-default").click(function(){
			$("#container").removeClass("bungloon-square bungloon-underline bungloon-outline");
		});
		$(".btn-square").click(function(){
			$("#container").removeClass("bungloon-underline bungloon-outline").addClass('bungloon-square');
		});
		$(".btn-underline").click(function(){
			$("#container").removeClass("bungloon-square bungloon-outline").addClass('bungloon-underline');
		});

		$(".btn-outline").click(function(){
			$("#container").removeClass("bungloon-square bungloon-underline").addClass('bungloon-outline');
		});
	</script>
</body>
</html>