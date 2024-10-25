<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/single.projects.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<section class="border">
			<?php if (empty($data)): ?>
				<form class="save-form" action="/projects" method="post">
					<input type="text" hidden name="post_id" value="">
					<input type="number" hidden name="user_id" value="<?= $_SESSION['user_id']; ?>">
					<input class="border" type="text" name="title" maxlength="50" required placeholder="Title">
					<textarea class="border" name="description" rows="3" placeholder="Description"></textarea>
					<textarea class="border" name="content" rows="10" required placeholder="Content"></textarea>
					<button class="border" type="submit">Submit</button>
				</form>
			<?php else: ?>
				<form class="save-form" action="/projects/<?= $data['project_id'] ?>" method="post">
					<input type="text" hidden name="post_id" value="<?= $data['project_id'] ?>">
					<input type="number" hidden name="user_id" value="<?= $data['user_id']; ?>">
					<input class="border" type="text" name="title" maxlength="50" required placeholder="Title" value="<?= $data['title'] ?>">
					<textarea class="border" name="description" rows="3" placeholder="Description"><?= $data['description'] ?></textarea>
					<textarea class="border" name="content" rows="10" required placeholder="Content"><?= $data['content'] ?></textarea>
					<button class="border" type="submit">Submit</button>
				</form>
			<?php endif; ?>
		</section>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>