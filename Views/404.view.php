<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>

<link rel="stylesheet" href="/Public/css/404.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<section class="border">
			<h1>404 Page not found</h1>
		</section>
	</main>
</div>
<script>
	setTimeout(() => location = '/', 2500)
</script>
<?php include 'layouts/foot.php'; ?>