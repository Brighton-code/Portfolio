<?php include 'layouts/head.php';
if (isset($error) && !empty($error)) {
	var_dump($error);
}
?>

<link rel="stylesheet" href="/Public/css/index.css">
<div class="container">
	<?php include 'layouts/nav.php' ?>

	<main>
		<!-- welkom -->
		<section id="welcome" class="border">
			<div class="legend">Welkom</div>
			<p>Ik ben <strong>Brighton van Rouendal</strong> een software engineer en jong professional die zijn eerste stappen neemt in het werk leven. Kom bekijk mij portfolio en/of neem contact op met mij ☺</p>
			<section class="links">
				<a href="https://github.com/Brighton-code"><img src="/public/img/github-mark.png" alt="github" height="36"></a>
				<a href="https://www.linkedin.com/in/brighton-van-rouendal-311448186/"><img src="/public/img/LI-In-Bug.png" alt="linkedin" height="36"></a>
				<!-- <a href="#discord"><img src="/public/img/discord-mark-black.png" alt="discord" height="36"></a> -->
				<a href="/contact">
					<p>Contact</p>
				</a>
			</section>
		</section>
		<!-- photo -->
		<section id="photo" class="border">
			<div class="legend">Photo</div>
			<img src="#" alt="photo Brighton van Rouendal" width="100%" height="100%">
		</section>
		<!-- about -->
		<section id="about" class="border">
			<div class="legend">Over mij</div>
			<p>Hallo, ik ben Brighton van Rouendal een software engineer uit Nederland die gepassioneerd is in het maken van project.</p>
			<p>De programmeer talen die ik ken</p>
			<ul>
				<li>JavaScript</li>
				<li>PHP</li>
				<li>Python</li>
			</ul>
			<p>Ook lees ik graag boeken in mij vrijetijd, voornamelijk fantasy boeken. Soms start ik ook een een game op zoals satisfactory, factorio of minecraft.
				Al ken ik nog niet veel talen ik ben altijd blij er een bij te leren.</p>
		</section>
		<!-- Ervaring -->
		<section id="experience" class="border" onclick="location.href = '/experience'">
			<div class="legend">Ervaring</div>
			<h3>Ervaring</h3>
			<!--				<a href="/experience">Ervaringen</a>-->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="svg">
				<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
				<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
			</svg>
		</section>
		<!-- blog -->
		<section id="blog" class="border" onclick="location.href = '/blog'">
			<div class="legend">Blog wip</div>
			<h3>Blog</h3>
			<!--				<a href="/blog">Blog</a>-->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="svg">
				<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
				<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
			</svg>
		</section>
		<!-- projecten -->
		<section id="projects" class="border" onclick="location.href = '/projects'">
			<div class="legend">Projecten</div>
			<h3>Projecten</h3>
			<!--				<a href="/projects">Projecten</a>-->
			<!-- Attribute this https://freeicons.io/business-and-online-icons/link-icon-icon-2 -->
			<!-- Creator: Raj Dev -> https://freeicons.io/profile/714 -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="svg">
				<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
				<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
			</svg>
		</section>
		<section id="footer" class="border">
			<div class="legend">Footer</div>
			<footer>
				<p>© 2024 Portfolio</p>
				<p>Homepage</p>
			</footer>
		</section>
	</main>
</div>


<?php include 'layouts/foot.php' ?>