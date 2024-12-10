// const toggleMenu = document.getElementById("toggleMenu");
const dropdownMenu = document.getElementById("dropdownMenu");

toggleMenu.addEventListener("click", () => {
  dropdownMenu.classList.toggle("hidden");
  dropdownMenu.classList.toggle("-translate-y-full");
});