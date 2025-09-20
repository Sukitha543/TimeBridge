// dashboard.js

/*function showContent(sectionId) {
    // Hide all content sections
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.style.display = 'none';
    });
    // Show the selected content section
    const selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.style.display = 'block';
    }
}

// Show the dashboard home section by default on page load
document.addEventListener('DOMContentLoaded', () => {
    showContent('dashboard-home');
});*/

document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("productModal");
    const modalContent = document.getElementById("modalContent");
    const closeModalBtn = document.getElementById("closeModalBtn");

    document.querySelectorAll(".view-details").forEach(button => {
        button.addEventListener("click", () => {
            const product = {
                brand: button.dataset.brand,
                model: button.dataset.model,
                image: button.dataset.image,
                type: button.dataset.type,
                diameter: button.dataset.diameter,
                material: button.dataset.material,
                strap: button.dataset.strap,
                resistance: button.dataset.resistance,
                calibre: button.dataset.calibre,
                price: button.dataset.price,
                quantity: button.dataset.quantity
            };
            openModal(product);
        });
    });

    function openModal(product) {
        const content = `
            <h2 class="text-2xl font-bold mb-4">${product.brand} - ${product.model}</h2>
            <img src="../${product.image}" class="w-64 h-64 object-contain mb-4 mx-auto">
            <p><strong>Type:</strong> ${product.type}</p>
            <p><strong>Diameter:</strong> ${product.diameter}</p>
            <p><strong>Material:</strong> ${product.material}</p>
            <p><strong>Strap:</strong> ${product.strap}</p>
            <p><strong>Water Resistance:</strong> ${product.resistance}</p>
            <p><strong>Calibre:</strong> ${product.calibre}</p>
            <p class="text-xl font-bold text-gray-900 mt-4">Rs ${Number(product.price).toLocaleString()}</p>
            <p><strong>Quantity:</strong> ${product.quantity}</p>
        `;
        modalContent.innerHTML = content;
        modal.classList.remove("hidden");
    }

    function closeModal() {
        modal.classList.add("hidden");
    }

    closeModalBtn.addEventListener("click", closeModal);

    // Close on overlay click
    modal.addEventListener("click", e => {
        if (e.target === modal) closeModal();
    });

    // Close on ESC key
    document.addEventListener("keydown", e => {
        if (e.key === "Escape") closeModal();
    });
});
