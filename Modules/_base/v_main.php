<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title ?>></title>
</head>
<body>
	<header>
		<hr>
		Menu
		<a href="<?= BASE_URL ?>">Home</a>
		<a href="<?= BASE_URL ?>article/1">Art 1</a>
		<a href="<?= BASE_URL ?>article/2">Art 2</a>
	</header>

	<main>
		<?= $content ?>
	</main>

	<footer>
		&copy; <?= date( 'Y' ) ?>
	</footer>
</body>
</html>
