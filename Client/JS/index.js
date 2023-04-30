var currentSlideIndex = 0;
const slides = document.getElementsByClassName("slide");
const dots = document.getElementsByClassName("dot");

// const profile = document.querySelector(".header_user");
// const options = document.querySelector(".header_user_menu_option");

// profile.addEventListener("mouseenter", () => {
// 	options.classList.add("active");
// 	console.log("test1");
// });

// profile.addEventListener("mouseleave", (event) => {
// 	if (!profile.contains(event.relatedTarget)) {
// 		options.classList.remove("active");
// 	}
// });

function showSlide(index) {
	// Hide all slides
	for (var i = 0; i < slides.length; i++) {
		slides[i].classList.remove("active");
	}

	// Show the slide at the given index
	slides[index].classList.add("active");

	// Update the active dot
	for (var i = 0; i < dots.length; i++) {
		dots[i].classList.remove("active");
	}
	dots[index].classList.add("active");
}

function currentSlide(n) {
	if (n > slides.length) {
		n = 0;
	} else if (n < 0) {
		n = slides.length - 1;
	}
	currentSlideIndex = n;
	showSlide(currentSlideIndex);
}

function nextSlide() {
	currentSlideIndex++;
	if (currentSlideIndex >= slides.length) {
		currentSlideIndex = 0;
	}
	showSlide(currentSlideIndex);
}

Array.from(dots).forEach((dot, i) => {
	dot.addEventListener("click", () => {
		console.log("test", i);
		currentSlide(i);
	});
});

setInterval(nextSlide, 5000);

// scroll bar ngang best seller
const scrollableContainer = document.querySelector('.top_container');
scrollableContainer.addEventListener('wheel', (event) => {
  if (event.deltaY !== 0) {
    event.preventDefault();
    scrollableContainer.scrollLeft += event.deltaY;
  }
});
