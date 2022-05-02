const addPostBtn = document.getElementById("addPost");
const addPostPage = document.getElementById("addBlogPage");
const blogContainer = document.getElementById("blogContainer");

const addPostPageQuery = document.querySelector("#addBlogPage");

addPostBtn.addEventListener("click", () => {
	if (addPostPage.className === "blog-add-card hide") {
		addPostPage.className = "blog-add-card show";
		blogContainer.style.opacity = "0.1";

	}
})

document.addEventListener("mousedown", ev => {
	if (addPostPageQuery.contains(ev.target)) {

	} else {
		addPostPage.className = "blog-add-card hide";
		blogContainer.style.opacity = "1";
	}
})
