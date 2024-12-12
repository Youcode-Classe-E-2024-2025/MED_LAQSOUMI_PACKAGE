const addBtn = document.getElementById("addModal");
const closeModal = document.getElementById("closeModal");
const cancelModal = document.getElementById("cancelModal");
const dropdownMenu = document.getElementById("dropdownMenu");
const modal = document.getElementById("modal");
const packageBtn = document.getElementById("packageBtn");
const dataTable = document.getElementById("dataTable");
const overviewTitle = document.getElementById("overviewTitle");
const asideBar = document.getElementById("asideBar");
const asideBtn = document.getElementById("asideBtn");

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

packageBtn.addEventListener('click', ()=> {
    overviewTitle.classList.toggle('hidden')
    dataTable.classList.toggle('hidden')
})

asideBtn.addEventListener('click', ()=> {
    if(asideBtn.textContent === "arrow_forward"){
        asideBar.classList.toggle('md:flex');
        asideBtn.textContent = 'arrow_back';
    }else{
        asideBtn.textContent = "arrow_forward";
        asideBar.classList.toggle('md:flex');
    }
})
