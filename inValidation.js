document.addEventListener('DOMContentLoaded', function(){
    const submit = document.querySelector('input[type=submit]');
    submit.addEventListener('click', validate);
})

// validating the inputs during sign in
function validate(e){
    //patterns for valid inputs
    let userx = /^[a-zA-Z0-9_]{4,20}$/;
    let passex = /^[a-zA-Z0-9\-_]{7,20}$/;
    const er = document.querySelectorAll('.error');
    const user = document.querySelector('#user');
    if(!userx.test(user.value)){
        er[0].classList.add('errorOccured');
        e.preventDefault();
    }

    const pass = document.querySelector('#pass');
    if(!passex.test(pass.value)){
        er[1].classList.add('errorOccured');
        e.preventDefault();
    }
}