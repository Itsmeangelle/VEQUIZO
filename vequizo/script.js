function submitLoginForm() {
    var formData = new FormData(document.getElementById('loginForm'));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                var response = JSON.parse(this.responseText);
                document.getElementById('result').innerHTML = response.message;
                if (response.success) {
                    
                    window.location.href = "instrument.html";
                }
            } else {
                console.error("Error: " + this.status);
            }
        }
    };

    xhr.open("POST", "login.php", true);
    xhr.send(formData);
    
}
function submitForm(event) {
    event.preventDefault();

    var formData = new FormData(document.getElementById('signupForm'));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('result').innerHTML = this.responseText;
        }
    };

    xhr.open("POST", "signup.php", true);
    xhr.send(formData);
}
