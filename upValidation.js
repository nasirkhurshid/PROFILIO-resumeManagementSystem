document.addEventListener('DOMContentLoaded', function(){
    const submit = document.querySelector('input[type=submit]');
    submit.addEventListener('click', validate);
})

function validate(e){
    let userx = /^[a-zA-Z0-9_]{4,20}$/;
    let passex = /^[a-zA-Z0-9\-_]{7,20}$/;
    const er = document.querySelectorAll('.error');
    const user = document.querySelector('#user');
    if(!userx.test(user.value)){
        er[0].classList.add('errorOccured');
        e.preventDefault();
    }

    const pass1 = document.querySelector('#pass1');
    if(!passex.test(pass1.value)){
        er[1].classList.add('errorOccured');
        e.preventDefault();
    }

    const pass2 = document.querySelector('#pass2');
    if(!passex.test(pass2.value)){
        er[2].classList.add('errorOccured');
        e.preventDefault();
    }
}