var username = document.getElementById('user');
var xhr = new XMLHttpRequest();
username.addEventListener('change',(e) => {
    var user = username.value;
    xhr.open('GET','signupAjaxAction.php?user='+user);
    xhr.send();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            var div = document.getElementById('invalid');
            var btn = document.getElementById('signup');
            if(xhr.responseText=="false"){
                btn.disabled = false;
                div.innerText = "";
            }
            else{
                div.innerText = "Username already exists!";
                btn.disabled = true;
            }
        }
    }
});