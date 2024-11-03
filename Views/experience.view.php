<?php include 'layouts/head.php';
include 'layouts/admin_error.php'

?>
<link rel="stylesheet" href="/Public/css/experience.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
		<aside id="admin-section">
			<a class="border internal" href="/ervaring/create">Create Ervaring</a>
		</aside>
	<?php endif; ?>

	<main>
		<?php foreach ($data as $experience): ?>
			<section class="border">
				<h1 class="company"><?= $experience['company'] ?></h1>
				<div class="sub">
					<p class="function"><?= $experience['func'] ?></p>
					<section class="time">
						<p><?= $experience['date_from'] ?></p>
						<p><em>to</em></p>
						<p><?php if ($experience['date_to'] >= '2100-01-01') {
								echo 'Future';
							} else {
								echo $experience['date_to'];
							} ?></p>
					</section>
				</div>
				<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
					<aside class="admin-section">
						<a class="border internal update" href="/ervaring/<?= $experience['id']; ?>/update">Update</a>
						<a class="border internal delete" href="/ervaring/<?= $experience['id']; ?>/delete">Delete</a>
					</aside>
				<?php endif; ?>
			</section>
		<?php endforeach; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>