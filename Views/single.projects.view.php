<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/single.projects.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<?php if (!empty($data)): ?>
			<section class="border">
				<h1 class="title"><?= $data['title'] ?></h1>
				<div class="sub">
					<p class="subtext"><em>Author: <?= $data['name']; ?></em></p>
					<p class="subtext"><em>Created At: <?= $data['created_at']; ?></em></p>
				</div>
				<p class="text description"><?= $data['description']; ?></p>
				<p class="text content"><?= $data['content']; ?></p>
			</section>
		<?php endif; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>