<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/projects.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<?php foreach ($data as $project): ?>
			<section class="border" onclick="location.href = '/projects/<?= $project['id']; ?>'">
				<h1 class="title"><?= $project['title']; ?></h1>
				<p class="subtext"><em>Author: <?= $project['name']; ?></em></p>
				<div class="description-container">
					<p class="description"><?= $project['description']; ?></p>
				</div>
			</section>
		<?php endforeach; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>