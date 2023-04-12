let activeElementColorBox;
let activeElementSizeBox;

const colorBoxes = document.querySelectorAll(".color-box-detail ul");

colorBoxes.forEach((colorBox) => {
    colorBox.addEventListener("click", (event) => {
        if (event.target.tagName === "A") {
            if (activeElementColorBox) {
                activeElementColorBox.style.backgroundColor = "";
                activeElementColorBox.style.color = "";
            }

            event.target.style.backgroundColor = "#ff4c3b";
            event.target.style.color = "#ffffff";

            activeElementColorBox = event.target;
        }
    });
});

const sizeBoxes = document.querySelectorAll(".size-box-detail ul");

sizeBoxes.forEach((sizeBox) => {
    sizeBox.addEventListener("click", (event) => {
        if (event.target.tagName === "A") {
            if (activeElementSizeBox) {
                activeElementSizeBox.style.backgroundColor = "";
                activeElementSizeBox.style.color = "";
            }

            event.target.style.backgroundColor = "#ff4c3b";
            event.target.style.color = "#ffffff";

            activeElementSizeBox = event.target;
        }
    });
});

const quickViewModal = document.getElementById("quick-view");
const closeButton = document.querySelector(".btn-close");

closeButton.addEventListener("click", () => {
    // Menghapus semua elemen yang aktif
    if (activeElementColorBox) {
        activeElementColorBox.style.backgroundColor = "";
        activeElementColorBox.style.color = "";
        activeElementColorBox = null;
    }
    if (activeElementSizeBox) {
        activeElementSizeBox.style.backgroundColor = "";
        activeElementSizeBox.style.color = "";
        activeElementSizeBox = null;
    }

    // Menutup modal
    quickViewModal.style.display = "none";
});

// Menambahkan event listener untuk memeriksa apakah modal sedang ditampilkan
const modalObserver = new MutationObserver((mutationsList) => {
    mutationsList.forEach((mutation) => {
        if (mutation.attributeName === "style") {
            const modalDisplayStyle =
                getComputedStyle(quickViewModal).getPropertyValue("display");
            if (modalDisplayStyle === "none") {
                // Menghapus semua elemen yang aktif jika modal tidak ditampilkan
                if (activeElementColorBox) {
                    activeElementColorBox.style.backgroundColor = "";
                    activeElementColorBox.style.color = "";
                    activeElementColorBox = null;
                }
                if (activeElementSizeBox) {
                    activeElementSizeBox.style.backgroundColor = "";
                    activeElementSizeBox.style.color = "";
                    activeElementSizeBox = null;
                }
            }
        }
    });
});

modalObserver.observe(quickViewModal, { attributes: true });
