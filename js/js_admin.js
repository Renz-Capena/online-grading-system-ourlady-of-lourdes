
// ---------------------buttons
let student_btn = document.querySelector('.student_btn');
let teacher_btn = document.querySelector('.teacher_btn');
let close_btn = document.querySelector('.close_btn')
let close_btn_teacher = document.querySelector('.close_btn_teacher')

//---------------------calss name
let student_form = document.querySelector('.student_form');
let teacher_form = document.querySelector('.teacher_form');



teacher_btn.addEventListener('click',()=>{
    teacher_form.style.display = "block";
    student_form.style.display = "none";
})

close_btn_teacher.addEventListener('click',()=>{
    teacher_form.style.display = "none";
})

student_btn.addEventListener('click',()=>{
    student_form.style.display = "block";
    teacher_form.style.display = "none";
})

close_btn.addEventListener('click',()=>{
    student_form.style.display = "none";
})

//--------------------------------------- RESPONSIVE
let burger_menu = document.querySelector('.burger_menu');
let  nav_sub = document.querySelector('.nav-sub');

burger_menu.addEventListener('click',()=>{
    nav_sub.classList.toggle('nav-sub_1');
    burger_menu.classList.toggle('burger_menu_1')
})

