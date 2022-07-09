let teacher_reminder_btn = document.querySelector('.teacher_reminder_btn');
let reminders_table = document.querySelector('.reminders_table');
let close_reminder_btn = document.querySelector('.close_reminder_btn');

teacher_reminder_btn.addEventListener('click',()=>{
    reminders_table.style.zIndex = "2";
    reminders_table.style.opacity = "1";
})

close_reminder_btn.addEventListener('click',()=>{
    reminders_table.style.zIndex = "-1";
    reminders_table.style.opacity = "0";
})