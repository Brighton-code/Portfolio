<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>
<link rel="stylesheet" href="/Public/css/single.projects.css">

<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main class="contact">
		<section class="border links">
			<a href="mailto:brighton@vanrouendal.nl">
				<p>My Email</p>
			</a>
			<a href="https://github.com/Brighton-code"><img src="/public/img/github-mark.png" alt="github" height="36"></a>
			<a href="https://www.linkedin.com/in/brighton-van-rouendal-311448186/"><img src="/public/img/LI-In-Bug.png" alt="linkedin" height="36"></a>
			<!-- <a href="#discord"><img src="/public/img/discord-mark-black.png" alt="discord" height="36"></a> -->
			<a download="#cv" href="#cv">
				<p>CV</p>
			</a>
		</section>
		<section class="border">
			<form class="save-form" action="/contact" method="post">
				<input class="border" type="text" name="name" maxlength="50" required placeholder="Name">
				<input class="border" type="email" name="email" placeholder="Email"></input>
				<textarea class="border" name="message" rows="10" required placeholder="Message"></textarea>
				<button class="border" type="submit">Submit</button>
			</form>
		</section>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>