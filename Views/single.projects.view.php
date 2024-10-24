<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/single.projects.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<?php var_dump($data) ?>
		<?php if (!empty($data)): ?>
			<section class="border">
				<h1><?= $data['title'] ?></h1>
			</section>
		<?php endif; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>