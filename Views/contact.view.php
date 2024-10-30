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
		<?php if (isset($error) && empty($error) && isset($created) && $created): ?>
			<section class="border created">
				<h1>Succesfully created contact message</h1>
			</section>
		<?php endif; ?>
		<section class="border">
			<form class="save-form" action="/contact" method="post">
				<input class="border" type="text" name="name" maxlength="50" required placeholder="Name">
				<input class="border" type="email" name="email" required placeholder="Email"></input>
				<textarea class="border" name="message" rows="10" required placeholder="Message"></textarea>
				<button class="border" type="submit">Submit</button>
			</form>
		</section>
		<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
			<section class="border admin-section">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Created</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $contact): ?>
							<tr>
								<td><?= $contact['id'] ?></td>
								<td><?= $contact['name'] ?></td>
								<td><?= $contact['email'] ?></td>
								<td><?= $contact['message'] ?></td>
								<td><?= $contact['created_at'] ?></td>
								<td><a class="delete" href="/contact/<?= $contact['id'] ?>/delete">Delete</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</section>
		<?php endif; ?>
	</main>
</div>

<?php include 'layouts/foot.php'; ?>