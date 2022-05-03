const addPostBtn = document.getElementById("addPost");
const addPostPage = document.getElementById("addBlogPage");
const previewPostPage = document.getElementById("previewBlogPage");
const blogContainer = document.getElementById("blogContainer");
const blogAddSub = document.getElementById("preview");
const backBtn = document.getElementById("back");

const addPostPageQuery = document.querySelector("#addBlogPage");
const previewPostPageQuery = document.querySelector("#previewBlogPage");


blogAddSub.addEventListener("click", ev => {
	ev.preventDefault();
	let titleInp = document.getElementById("titlePre").value;
	let descInp = document.getElementById("descPre").value;
	if (validate(titleInp, descInp)) {
		document.getElementById("title").value = titleInp;
		document.getElementById("desc").value = descInp;
		addPostPage.className = "blog-add-card hide";
		previewPostPage.className = "blog-preview-card show"
	} else {
		document.getElementById("titlePre").style.border = "1px solid red";
		document.getElementById("descPre").style.border = "1px solid red";
		alert("Please fill the Title and Description field... ");
	}
});

function validate(title, desc) {
	let notNull = false;
	let maxSize = false;
	if (title !== "" && desc !== "") {
		notNull = true;
	}
	if (title.length <= 32 ) {
		maxSize = true
	}
	return notNull && maxSize;

}

backBtn.addEventListener("click", ev => {
	ev.preventDefault();
	addPostPage.className = "blog-add-card show";
	previewPostPage.className = "blog-preview-card hide"
})

addPostBtn.addEventListener("click", () => {
	if (addPostPage.className === "blog-add-card hide") {
		addPostPage.className = "blog-add-card show";
		blogContainer.style.opacity = "0.1";

	}
})

document.addEventListener("mousedown", ev => {
	if (previewPostPageQuery.contains(ev.target) || addPostPageQuery.contains(ev.target)) {

	} else {
		previewPostPage.className = "blog-preview-card hide";
		blogContainer.style.opacity = "1";
	}

	if (addPostPageQuery.contains(ev.target)  || previewPostPageQuery.contains(ev.target)) {

	} else {
		addPostPage.className = "blog-add-card hide";
		blogContainer.style.opacity = "1";
	}
})


