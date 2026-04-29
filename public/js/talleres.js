
document.addEventListener("DOMContentLoaded", function () {

    // ✔ SOLO se ejecuta si existen talleres
    const items = document.querySelectorAll(".taller-item");

    if (!items.length) return; // 🔥 evita interferir en otras páginas

    const perPage = 6;
    let currentPage = 1;

    const pageNumber = document.getElementById("pageNumber");
    const prev = document.getElementById("prev");
    const next = document.getElementById("next");

    function showPage(page) {

        const start = (page - 1) * perPage;
        const end = start + perPage;

        items.forEach((item, index) => {
            item.style.display = (index >= start && index < end) ? "" : "none";
        });

        if (pageNumber) pageNumber.innerText = page;

        if (prev) prev.parentElement.classList.toggle("disabled", page === 1);
        if (next) next.parentElement.classList.toggle("disabled", page * perPage >= items.length);
    }

    if (next) {
        next.addEventListener("click", function (e) {
            e.preventDefault();

            if (currentPage * perPage < items.length) {
                currentPage++;
                showPage(currentPage);
            }
        });
    }

    if (prev) {
        prev.addEventListener("click", function (e) {
            e.preventDefault();

            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });
    }

    showPage(currentPage);
});