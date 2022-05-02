const sort = document.getElementById("sort");
const orderList = document.getElementById("orderList");
const blogEntry = document.getElementById("blogEntry");

sort.addEventListener("click", () => {
	sortEntry();
})

blogEntry.addEventListener("load", () => {
	sortEntry();
})

function sortEntry() {
	let getLoc = orderList.value;
	fetch('/viewBlog.php?' + getLoc, {method: 'GET'})
		.then(res => res.text())
		.then(data => {
			blogEntry.innerHTML = data;
			console.log(data);
		});
}
