<?php include 'layouts/head.php'; ?>
<link rel="stylesheet" href="/Public/css/account.css">

<div class="container">
	<header class="border">
		<nav>
			<a class="border link" href="/">Home</a>
			<a class="border link" href="#projects">Projects</a>
			<a class="border link" href="#experience">Experience</a>
			<a class="border link" href="#blog">Blog</a>
			<a class="border link" href="#login">Login</a>
		</nav>
	</header>

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