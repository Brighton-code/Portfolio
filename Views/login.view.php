<?php include 'layouts/head.php';
include 'layouts/admin_error.php'
?>
<link rel="stylesheet" href="/Public/css/account.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<section class="border">
			<form action="/login" method="post">
				<?php if (isset($error['input']['message'])): ?>
					<label><?php echo $error['input']['message'] ?></label>
				<?php endif; ?>
				<input class="border" type="text" placeholder="Username" name="username" required maxlength="24" autocomplete="off">
				<input class="border" type="password" placeholder="Password" name="password" required minlength="4" autocomplete="off">
				<button class="border" type="submit">Login</button>
			</form>
		</section>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>