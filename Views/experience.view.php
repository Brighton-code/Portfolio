<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/experience.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
		<aside id="admin-section">
			<a class="border internal" href="/experience/create">Create experience</a>
		</aside>
	<?php endif; ?>

	<main>
		<?php foreach ($data as $experience): ?>
			<section class="border internal" onclick="location.href = '/experience/<?= $experience['id']; ?>'">

			</section>
		<?php endforeach; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>