<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing Page</title>
	<link rel="stylesheet" href="./public/css/landingpage.css">
</head>

<body>
	<div class="container">
		<header class="main-border">
			<nav id="header-nav">
				<a href="/">Home</a>
				<a href="/portfolio">Portfolio</a>
				<a href="/blog">Blog</a>
				<!-- <a href="/about">About</a> -->
				<a href="/contact">Contact</a>
				<a href="/login">Login</a>
			</nav>
		</header>

		<main>
			<!-- welkom -->
			<section class="main-border grid-row-1 grid-col-2">
				<div class="legend">Welkom</div>
				<p>Ik ben <strong>Brighton van Rouendal</strong> een software engineer en jong professional die zijn eerste stappen neemt in het werk leven. Kom bekijk mij portfolio en/of neem contact op met mij ☺</p>
			</section>
			<!-- photo -->
			<section class="main-border grid-row-2 grid-col-2">
				<div class="legend">Photo</div>
				<img src="#" alt="photo Brighton van Rouendal" width="100%" height="100%">
			</section>
			<!-- about -->
			<section class="about main-border grid-row-2 grid-col-2">
				<div class="legend">Over mij</div>
				<p>Hallo, ik ben Brighton van Rouendal een software engineer uit nederland die gepassioneerd is in het maken van project.</p>
				<ul>
					<p>De programmeer talen die ik ken</p>
					<li>JavaScript</li>
					<li>PHP</li>
					<li>Python</li>
				</ul>
				<p>Ook lees ik graag boeken in mij vrijetijd, voornamelijk fantasy boeken. Soms start ik ook een een game op zoals satisfactory, factorio of minecraft.
					Al ken ik nog niet veel talen ik ben altijd blij er een bij te leren.</p>
			</section>
			<!-- contact -->
			<section class="main-border grid-row-2 grid-col-1">
				<div class="legend">Contact</div>
			</section>
			<!-- blog -->
			<section class="main-border grid-row-2 grid-col-1">
				<div class="legend">Blog</div>
			</section>
			<!-- projecten -->
			<section class="projects main-border grid-row-1 grid-col-2">
				<div class="legend">Projecten</div>
				<a href="#">Projecten</a>
				<!-- Attribute this https://freeicons.io/business-and-online-icons/link-icon-icon-2 -->
				<!-- Creator: Raj Dev -> https://freeicons.io/profile/714 -->
				<svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link">
					<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
					<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
				</svg>
			</section>
		</main>
		<footer>
			<div>© 2024 Portfolio</div>
			<div class="breadcrums">Homepage</div>
			<div><a href="mailto:Brighton@vanrouendal.nl">Email: Brighton@vanrouendal.nl</a></div>
		</footer>
	</div>
</body>

</html>