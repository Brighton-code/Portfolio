<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/account.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main class="whole">
		<section class="border whole-section">
			<form action="/login" method="post">
				<input class="border" type="text" placeholder="Username" name="username" required maxlength="24" autocomplete="off">
				<input class="border" type="password" placeholder="Password" name="password" required minlength="4" autocomplete="off">
				<button class="border link" type="submit">Login</button>
			</form>
		</section>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>