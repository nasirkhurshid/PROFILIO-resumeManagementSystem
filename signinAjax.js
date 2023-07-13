var username = document.getElementById('user');
var password = document.getElementById('pass');
var xhr = new XMLHttpRequest();
password.addEventListener('change',(e) => {
    var user = username.value;
    var pass = password.value;
    xhr.open('POST','signinAjaxAction.php',true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send('user='+encodeURIComponent(user)+'&pass='+encodeURIComponent(pass));
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var div = document.getElementById('invalid');
            var btn = document.getElementById('signin');
            if(xhr.responseText=="true"){
                btn.disabled = false;
                div.innerText = "";
            }
            else{
                div.innerText = "Invalid username or password!";
                btn.disabled = true;
            }
        }
    }
});