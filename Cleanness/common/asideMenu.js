document.addEventListener('DOMContentLoaded', () => {
    var links = document.querySelectorAll('aside a');
    const asideMenu = document.querySelector("aside")
    const closeMenuBtn = document.querySelector("#closeMenuBtn")
    const hamburgerMenuBtn = document.querySelector("#hamburgerMenu")

    hamburgerMenuBtn.addEventListener("click", () => {
      asideMenu.classList.add("open")
    })

      closeMenuBtn.addEventListener("click", () => {
        asideMenu.classList.remove("open")
      })

    links.forEach((link) => {
      link.addEventListener('click', (e) => {
        asideMenu.classList.remove("open")
      });
    });
  });