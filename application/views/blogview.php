<html>

<head>
	<!--echowing data-->
	<title>My Blog <?= $title ?></title>
</head>

<body>
	<h1>Welcome to my Blog!</h1>

	<h1><?= $heading ?></h1>

	<?php foreach ($todo_list as $item): ?>
	<?= $item ?>
	<?php endforeach; ?>

	<!-- create a link using function from url helper -->
	<?= anchor('/blog/comments/', 'Click here')?>

</body>

</html>
