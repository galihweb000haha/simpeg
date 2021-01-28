

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

	<title>SI PENGGAJIAN</title>

	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="stylesheets/login.css" type="text/css" media="screen" title="no title" />
</head>

<body>

<div id="login">
	<h2>SISTEM INFORMASI PENGGAJIAN</h2>
	<div id="login_panel">
		<form action="cek_login.php" method="post" accept-charset="utf-8">
			<div class="login_fields">
				<div class="field">
					<label for="username">NIP</label>
					<input type="text" name="nip" value="" id="nip" tabindex="1" placeholder="username anda" />
				</div>

				<div class="field">
					<label for="password">Password </label>
					<input type="password" name="password" value="" id="password" tabindex="2" placeholder="password anda" />
				</div>
			</div> <!-- .login_fields -->
			<div class="login_actions">
				<button type="submit" class="btn btn-primary" tabindex="3">Masuk</button>
			</div>
		</form>
	</div> <!-- #login_panel -->
</div> <!-- #login -->

<script src="javascripts/all.js"></script>
</body>
</html>