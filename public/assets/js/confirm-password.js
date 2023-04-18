function confirm_password() {
    let input_a = document.getElementById("new-password");
    let input_b = document.getElementById("confirm-password");
    let button_submit = document.getElementById("button_submit");
    if (input_a.value > 0) {
        if (input_b.value > 0) {
            if (input_a.value === input_b.value) {
                console.log('Identicos')
                input_a.setAttribute("style", "border-color: #28a745;");
                input_b.setAttribute("style", "border-color: #28a745;");
                button_submit.removeAttribute("disabled");
            }else{
                input_a.setAttribute("style", "border-color: #dc3545;");
                input_b.setAttribute("style", "border-color: #dc3545;");
                button_submit.setAttribute("disabled", "");
            }
        }
    }else{
        input_a.removeAttribute("style");
        input_b.removeAttribute("style");
        button_submit.setAttribute("disabled", "");
    }
}