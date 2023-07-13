document.addEventListener('DOMContentLoaded', function(){
    const submit = document.querySelector('input[type=submit]');
    submit.addEventListener('click', validate);
});

function validate(e){
    let namex = /^[^0-9]([a-zA-Z]+(\s[a-zA-Z])*)+$/;
    let genex = /^[\s\S]+$/;
    let degex = /^[^0-9]([a-zA-Z]+(\s[a-zA-Z])*)+$/;
    let divex = /^[1-9][stnrdh]{2}$/;
    let expex = /^[1-9][1-9]? Years?$/;
    let mobilex = /^(\+923|00923|03)[0-5]\d\-?\d{7}$/;
    let mailex = /^[a-z].*@[a-z]+(\.[a-z]+)*$/;
    let imgex = /(\.jpg)|(\.jpeg)|(.png)$/;

    const er = document.querySelectorAll('.error');
    const name = document.querySelector('#name');
    if(!namex.test(name.value)){
        er[1].classList.add('errorOccured');
        e.preventDefault();
    }

    const profile = document.querySelector('#profile');
    if(!genex.test(profile.value)){
        er[2].classList.add('errorOccured');
        e.preventDefault();
    }

    const objectives = document.querySelector('#objectives');
    if(!genex.test(objectives.value)){
        er[3].classList.add('errorOccured');
        e.preventDefault();
    }

    const deg1 = document.querySelector('#deg1');
    if(!degex.test(deg1.value)){
        er[4].classList.add('errorOccured');
        e.preventDefault();
    }

    const div1 = document.querySelector('#div1');
    if(!divex.test(div1.value)){
        er[5].classList.add('errorOccured');
        e.preventDefault();
    }

    const ins1 = document.querySelector('#ins1');
    if(!genex.test(ins1.value)){
        er[6].classList.add('errorOccured');
        e.preventDefault();
    }

    const deg2 = document.querySelector('#deg2');
    if(!degex.test(deg2.value) && deg2.value != ""){
        er[7].classList.add('errorOccured');
        e.preventDefault();
    }

    const div2 = document.querySelector('#div2');
    if(!divex.test(div2.value) && div2.value != ""){
        er[8].classList.add('errorOccured');
        e.preventDefault();
    }

    const ins2 = document.querySelector('#ins2');
    if(!genex.test(ins2.value) && ins2.value != ""){
        er[9].classList.add('errorOccured');
        e.preventDefault();
    }

    const deg3 = document.querySelector('#deg3');
    if(!degex.test(deg3.value) && deg3.value != ""){
        er[10].classList.add('errorOccured');
        e.preventDefault();
    }

    const div3 = document.querySelector('#div3');
    if(!divex.test(div3.value) && div3.value != ""){
        er[11].classList.add('errorOccured');
        e.preventDefault();
    }

    const ins3 = document.querySelector('#ins3');
    if(!genex.test(ins3.value) && ins3.value != ""){
        er[12].classList.add('errorOccured');
        e.preventDefault();
    }

    const skill1 = document.querySelector('#skill1');
    if(!genex.test(skill1.value)){
        er[13].classList.add('errorOccured');
        e.preventDefault();
    }

    const exp1 = document.querySelector('#exp1');
    if(!expex.test(exp1.value)){
        er[14].classList.add('errorOccured');
        e.preventDefault();
    }

    const skill2 = document.querySelector('#skill2');
    if(!genex.test(skill2.value) && skill2.value != ""){
        er[15].classList.add('errorOccured');
        e.preventDefault();
    }

    const exp2 = document.querySelector('#exp2');
    if(!expex.test(exp2.value) && exp2.value != ""){
        er[16].classList.add('errorOccured');
        e.preventDefault();
    }

    const skill3 = document.querySelector('#skill3');
    if(!genex.test(skill3.value) && skill3.value != ""){
        er[17].classList.add('errorOccured');
        e.preventDefault();
    }

    const exp3 = document.querySelector('#exp3');
    if(!expex.test(exp3.value) && exp3.value != ""){
        er[18].classList.add('errorOccured');
        e.preventDefault();
    }

    const lang1 = document.querySelector('#lang1');
    if(!namex.test(lang1.value)){
        er[19].classList.add('errorOccured');
        e.preventDefault();
    }

    const lang2 = document.querySelector('#lang2');
    if(!namex.test(lang2.value) && lang2.value != ""){
        er[20].classList.add('errorOccured');
        e.preventDefault();
    }

    const lang3 = document.querySelector('#lang3');
    if(!namex.test(lang3.value) && lang3.value != ""){
        er[21].classList.add('errorOccured');
        e.preventDefault();
    }

    const hob1 = document.querySelector('#hob1');
    if(!namex.test(hob1.value)){
        er[22].classList.add('errorOccured');
        e.preventDefault();
    }

    const hob2 = document.querySelector('#hob2');
    if(!namex.test(hob2.value) && hob2.value != ""){
        er[23].classList.add('errorOccured');
        e.preventDefault();
    }

    const hob3 = document.querySelector('#hob3');
    if(!namex.test(hob3.value) && hob3.value != ""){
        er[24].classList.add('errorOccured');
        e.preventDefault();
    }

    const mobile = document.querySelector('#mobile');
    if(!mobilex.test(mobile.value)){
        er[25].classList.add('errorOccured');
        e.preventDefault();
    }

    const email = document.querySelector('#email');
    if(!mailex.test(email.value)){
        er[26].classList.add('errorOccured');
        e.preventDefault();
    }

    const facebook = document.querySelector('#facebook');
    if(!namex.test(facebook.value) && facebook.value != ""){
        er[27].classList.add('errorOccured');
        e.preventDefault();
    }

    const twitter = document.querySelector('#twitter');
    if(!namex.test(twitter.value) && twitter.value != ""){
        er[28].classList.add('errorOccured');
        e.preventDefault();
    }

    const ref1 = document.querySelector('#ref1');
    if(!namex.test(ref1.value)){
        er[29].classList.add('errorOccured');
        e.preventDefault();
    }

    const con1 = document.querySelector('#con1');
    if(!mailex.test(con1.value)){
        er[30].classList.add('errorOccured');
        e.preventDefault();
    }

    const ref2 = document.querySelector('#ref2');
    if(!namex.test(ref2.value) && ref2.value != ""){
        er[31].classList.add('errorOccured');
        e.preventDefault();
    }

    const con2 = document.querySelector('#con2');
    if(!mailex.test(con2.value) && con2.value != ""){
        er[32].classList.add('errorOccured');
        e.preventDefault();
    }

    const ref3 = document.querySelector('#ref3');
    if(!namex.test(ref3.value) && ref3.value != ""){
        er[33].classList.add('errorOccured');
        e.preventDefault();
    }
    const con3 = document.querySelector('#con3');
    if(!mailex.test(con3.value) && con3.value != ""){
        er[34].classList.add('errorOccured');
        e.preventDefault();
    }

    const img = document.querySelector('#img');
    if(!imgex.test(img.value) || img.value == ""){
        er[35].classList.add('errorOccured');
        e.preventDefault();
    }
}