
<html lang="en">
<body>
<section id="previewBlogPage" class="blog-preview-card hide">
	<header>
		<h2>
			Preview
		</h2>
	</header>
	<section class="blog-content-container row">
		<form id="addEntry" action="addEntry.php" method="post">
			<input id="title" name="Title" type="text" placeholder="Title" class="blog-input-box" maxlength="32" readonly>
			<textarea id="desc" name="Description" placeholder="Enter your blog... " class="blog-input-box blog-textarea" readonly></textarea>
			<button id="submit" name="add_entry" type="submit" class="button-box submit">Post</button>
			<button id="back" type="button" class="button-box clear">Back</button>
		</form>
	</section>
</section>
</body>
</html>
