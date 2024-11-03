<?php include 'layouts/head.php';
include 'layouts/admin_error.php'

?>
<link rel="stylesheet" href="/Public/css/single.experience.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<section class="border">
			<?php if (empty($data)): ?>
				<form class="save-form" action="/ervaring" method="post">
					<input type="number" hidden name="user_id" value="<?= $_SESSION['user_id']; ?>">
					<input class="border" type="text" name="company" maxlength="50" required placeholder="Company">
					<input class="border" type="text" name="func" maxlength="50" placeholder="Function">
					<div class="date-section">
						<input class="border" type="date" name="date_from">
						<input class="border" type="date" name="date_to">
					</div>
					<button class="border" type="submit">Submit</button>
				</form>
			<?php else: ?>
				<form class="save-form" action="/ervaring/<?= $data['id'] ?>/update" method="post">
					<input type="text" hidden name="post_id" value="<?= $data['id']; ?>">
					<input type="number" hidden name="user_id" value="<?= $data['user_id']; ?>">
					<input class="border" type="text" name="company" maxlength="50" required placeholder="Company" value="<?= $data['company'] ?>">
					<input class="border" type="text" name="func" maxlength="50" placeholder="Function" value="<?= $data['func'] ?>">
					<div class="date-section">
						<input class="border" type="date" name="date_from" value="<?= $data['date_from'] ?>">
						<input class="border" type="date" name="date_to" value="<?= $data['date_to'] ?>">
					</div>
					<button class="border" type="submit">Submit</button>
				</form>
			<?php endif; ?>
		</section>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>