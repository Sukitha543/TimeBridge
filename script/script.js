function pay(form) {
    if (form) {
        form.addEventListener("submit", function (event) {
            let confirmPayment = confirm("⚠️ Are you sure you want to confirm this payment?");
            if (!confirmPayment) {
                event.preventDefault();
            }
        });
    }
}

let form = document.getElementById("checkout"); 
pay(form);

 function deleteCustomer (deleteBtn) {
     if (deleteBtn) {
        deleteBtn.addEventListener('click', function() {
            if (confirm("⚠️ Are you sure you want to delete your profile? This action cannot be undone.")) {
                const confirmInput = document.getElementById('deleteBtn');
                if (confirmInput) {
                    confirmInput.value = "yes";
                }
                this.closest('form').submit();
            }
        });
    }
}

function logout(logoutLink){
document.addEventListener("DOMContentLoaded", function () {
    if (logoutLink) {
        logoutLink.addEventListener("click", function (event) {
            const confirmLogout = confirm("⚠️ Are you sure you want to log out?");
            if (!confirmLogout) {
                event.preventDefault(); // stop logout if canceled
            }
        });
    }
});
}

const logoutLink = document.getElementById("logoutLink");
logout(logoutLink);



const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");

menuBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
});
