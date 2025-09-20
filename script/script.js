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

 

