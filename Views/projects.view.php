<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/projects.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
		<aside id="admin-section">
			<a class="border internal" href="/projects/create">Create Project</a>
		</aside>
	<?php endif; ?>

	<main>
		<?php foreach ($data as $project): ?>
			<section class="border internal" onclick="location.href = '/projects/<?= $project['id']; ?>'">
				<h1 class="title"><?= $project['title']; ?></h1>
				<p class="subtext"><em>Author: <?= $project['name']; ?></em></p>
				<div class="description-container">
					<p class="description"><?= $project['description']; ?></p>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="svg">
					<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
					<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
				</svg>
			</section>
		<?php endforeach; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>