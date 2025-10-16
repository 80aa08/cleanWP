const navLinks = document.querySelectorAll("nav a");

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  const windowHeight = window.innerHeight;
  const documentHeight = document.documentElement.scrollHeight;

  if (currentScroll < 100) {
    navLinks.forEach((link) => link.classList.remove("active"));

    navLinks[0].classList.add("active");
    return;
  }

  if (currentScroll + windowHeight >= documentHeight - 100) {
    navLinks.forEach((link) => link.classList.remove("active"));

    navLinks[navLinks.length - 2].classList.add("active");
    return;
  }
  document.querySelectorAll("section").forEach((section) => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.clientHeight;

    if (currentScroll >= sectionTop - sectionHeight / 2 && currentScroll < sectionTop + sectionHeight / 2) {
      const sectionId = section.getAttribute("id");

      navLinks.forEach((link) => link.classList.remove("active"));

      const correspondingLink = document.querySelector(`nav a[href="/#${sectionId}"]`);
      correspondingLink.classList.add("active");
    }
  });
});

const serviceItemButtons = document.querySelectorAll(".servicesListItem")
const serviceItems = document.querySelectorAll(".serviceDescription")

serviceItemButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    serviceItems.forEach((item) => {
      item.classList.remove("active")
    })
    serviceItems[index].classList.add("active")

    serviceItemButtons.forEach((e) => {
      e.classList.remove("active")
    })
    button.classList.add("active")
  })
})
