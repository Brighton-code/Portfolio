<?php
include './views/layout/head.php';
include './views/layout/nav.php';
?>
<style>
	main {
		display: flex;
		justify-content: center;
		/* align-items: center; */
		padding-top: 3rem;
		font-weight: bold;
		font-size: xx-large;
	}
</style>

<main>
	<h1>404 - Page not found</h1>
</main>

<script>
	setTimeout(() => {
		window.location.href = '/';
	}, 5000);
</script>

<?php
include './views/layout/foot.php';
?>