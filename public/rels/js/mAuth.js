//Login JS
//Send password to mAuth, if it's good then we can auth the user, if not tell them to try again

function authFunc() {
    val = document.getElementById('floatingPassword').value;

    var data = new FormData();
    data.append("password", val);

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
            if (xhr.responseText == 'goodlogin') {
                //Good login
                console.log('here');
                window.location.href = "/home.php";
            } else {
                alert('password incorrect');
            }
        }
    });

    xhr.open("POST", "/mAuth.php");
    xhr.send(data);

    
}


