<html lang="en">
<body>
<section id="addBlogPage" class="blog-add-card hide">
	<header>
		<h2>
			Add Blog Post
		</h2>
	</header>
	<section class="blog-content-container row">
		<form id="addEntry" action="addEntry.php" method="post">
			<input id="title" name="Title" type="text" placeholder="Title" class="blog-input-box" maxlength="32" required>
			<textarea id="blogContent" name="Description" placeholder="Enter your blog... " class="blog-input-box blog-textarea" required></textarea>
			<button id="submit" name="add_entry" type="submit" class="button-box submit">Submit</button>
			<button id="clear" type="reset" class="button-box clear">Clear</button>
		</form>
	</section>
</section>
</body>
</html>
