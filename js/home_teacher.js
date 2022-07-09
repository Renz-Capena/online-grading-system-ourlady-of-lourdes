let recorded_btn = document.querySelector('.recorded');
let table_recorded = document.querySelector('.table_recorded');

let not_recorded = document.querySelector('.not_recorded');
let table_not_record = document.querySelector('.table_not_record');


recorded_btn.addEventListener('click',()=>{
    table_recorded.classList.toggle('table_recorded_1');

    table_recorded.style.opacity = "1";
    table_not_record.style.opacity = "0";

    table_recorded.style.zIndex = "1"
    table_not_record.style.zIndex = "-1"
})

not_recorded.addEventListener('click',()=>{
    table_not_record.classList.toggle('table_not_record_1');

    table_recorded.style.opacity = "0";
    table_not_record.style.opacity = "1";

    table_recorded.style.zIndex = "-1";
    table_not_record.style.zIndex = "1";
})

//--------------------------------------------------------- grade form
let create_grade_btn = document.querySelector('.create_grade_btn');
let form_grade_wrapper = document.querySelector('.form_grade_wrapper');
let close_btn_grade = document.querySelector('.close_btn_grade');


create_grade_btn.addEventListener('click',()=>{
    form_grade_wrapper.style.opacity = "1";
    form_grade_wrapper.style.zIndex = "2";
})

close_btn_grade.addEventListener('click',()=>{
    form_grade_wrapper.style.opacity = "0";
    form_grade_wrapper.style.zIndex = "-2";
})
//-------------------------------------------------------- reminders form
let form_reminders = document.querySelector('.form_reminders');
let close_reminder = document.querySelector('.close_reminder');
let reminders_btn = document.querySelector('.reminders_btn');

reminders_btn.addEventListener('click',()=>{
    form_reminders.style.zIndex = "2";
    form_reminders.style.opacity = "1";
})

close_reminder.addEventListener('click',()=>{
    form_reminders.style.zIndex = "-1";
    form_reminders.style.opacity = "0";
})

