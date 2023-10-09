<?php require("functions.php") ?>

<?php
if (isset($_SESSION['member'])) {
	header('Location: protected.php');
	exit();
}
?>
<?php
if (isset($_POST['member-validation'])) {
	$response = login($_POST['username'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Az oldal karakterkódolásának beállítása -->
	<meta charset="UTF-8">

	<!-- A "meta viewport" beállítja a tartalmamat bármely eszköz szélességére -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Hivatkozás a stíluslapomra -->
	<link rel="stylesheet" href="styles.css">
	<title>Védett oldal</title>
</head>

<body>
	<div class="page">

		<nav>
			<a href="index.php">Kezdőoldal</a>
			<a href="public.php">Nyilvános oldal</a>
			<a class="active" href="protected.php">Védett oldal</a>
		</nav>

		<header>
			<h1>Bejelentkezési oldal.</h1>
			<h2>Ahhoz, hogy hozzáférj a védett oldalakhoz, be kell jelentkezned.</h2>
		</header>

		<div class="content">
			<h3>Kérlek, add meg a felhasználóneved és a jelszavad.</h3>

			<form action="" method="post" autocomplete="off">
				<label>Add meg a felhasználónevedet.</label>
				<input type="text" name="username">

				<label>Add meg a jelszavadat.</label>
				<input type="text" name="password">

				<input type="submit" name="member-validation" value="Log In">

				<p class="error"><?php echo @$response ?></p>
			</form>

		</div> <!-- Az oldal vége. -->
</body>

</html>