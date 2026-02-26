  /* =============================
     SIDEBAR ACCORDION (GLOBAL)
     ============================= */
     
document.addEventListener("DOMContentLoaded", function () {

    const toggles = document.querySelectorAll(".menu-item.has-toggle");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", function () {

            const targetId = this.dataset.target;
            const submenu = document.getElementById(targetId);

            if (!submenu) return;

            const isOpen = submenu.classList.contains("open");

            // tutup semua submenu
            document.querySelectorAll(".submenu").forEach(sm => {
                sm.classList.remove("open");
            });

            document.querySelectorAll(".menu-item").forEach(mi => {
                mi.classList.remove("menu-item-open");
            });

            // buka yang dipilih saja
            if (!isOpen) {
                submenu.classList.add("open");
                this.classList.add("menu-item-open");
            }
        });
    });


    /* ===============================
       AUTO OPEN SESUAI HALAMAN AKTIF
       =============================== */
    const activeLink = document.querySelector(".submenu a.active-link");

    if (activeLink) {
        const submenu = activeLink.closest(".submenu");
        const parentMenu = submenu.previousElementSibling;

        submenu.classList.add("open");
        parentMenu.classList.add("menu-item-open");
    }

});




document.querySelectorAll('.accordion-toggle').forEach(menu => {
    menu.addEventListener('click', () => {

        const submenu = menu.nextElementSibling;

        menu.classList.toggle('menu-item-open');
        submenu.classList.toggle('open');

    });
});

