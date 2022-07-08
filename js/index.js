let login_btn = document.querySelector('#login_btn');
let close_form_btn = document.querySelector('#close_form_btn');
let about_nav = document.querySelector('.about_nav');
let login_form = document.querySelector('.login_form');

login_btn.addEventListener('click',()=>{
    login_form.style.opacity = '1';
})

close_form_btn.addEventListener('click',()=>{
    login_form.style.opacity = '0';
})

about_nav.addEventListener('click',()=>{
    login_form.style.opacity = '0';
    
})