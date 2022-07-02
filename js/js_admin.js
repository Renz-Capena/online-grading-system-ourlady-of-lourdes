
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

// // -------------------------------------------------edit btn teacher
// let edit_teacher = document.querySelectorAll('.edit_teacher');
// let close_btn_teacher_update = document.querySelector('.close_btn_teacher_update');
// let teacher_form_update = document.querySelector('.teacher_form_update');
// let user_id_edit = document.querySelector('.user_id_edit');

// edit_teacher.forEach(btn => {
//     btn.addEventListener('click',()=>{
//         teacher_form_update.style.display = 'block';
//     })
// });

// close_btn_teacher_update.addEventListener('click',()=>{
//     teacher_form_update.style.display = "none";
// })
