document.addEventListener("DOMContentLoaded", function(){

    const adminToggle =
    document.getElementById("adminToggle");

    const sidebarAdmin =
    document.getElementById("sidebarAdmin");

    if(adminToggle && sidebarAdmin){

        adminToggle.addEventListener("click", function(){

            sidebarAdmin.classList.toggle("active");

        });

    }

});