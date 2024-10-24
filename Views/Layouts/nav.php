<header class="border">
	<nav>
		<a class="border link" href="/">Home</a>
		<a class="border link" href="#projects">Projects</a>
		<a class="border link" href="#experience">Experience</a>
		<a class="border link" href="#blog">Blog</a>
		<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id']): ?>
			<a class="border link" href="/logout">logout</a>
		<?php else: ?>
			<a class="border link" href="/login">Login</a>
		<?php endif; ?>
	</nav>
</header>