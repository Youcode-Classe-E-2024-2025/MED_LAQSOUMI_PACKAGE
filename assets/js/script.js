const addBtn = document.getElementById("addModal");
const closeModal = document.getElementById("closeModal");
const cancelModal = document.getElementById("cancelModal");
const dropdownMenu = document.getElementById("dropdownMenu");
const modal = document.getElementById("modal");

toggleMenu.addEventListener("click", () => {
  dropdownMenu.classList.toggle("hidden");
  dropdownMenu.classList.toggle("-translate-y-full");
});

addBtn.addEventListener('click', ()=> {
    modal.classList.remove("hidden");
})

closeModal.addEventListener('click', ()=> {
    modal.classList.add("hidden");
})
cancelModal.addEventListener('click', ()=> {
    modal.classList.add("hidden");
})