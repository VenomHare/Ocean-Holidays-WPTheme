

document.addEventListener('DOMContentLoaded', function () {
    // Select the menu button and menu elements
    const menuBtn = document.getElementById('menubtn');
    const menu = document.getElementById('menuobject');

    const menuicon = `<i class="fa-solid fa-bars text-2xl"></i>`;
    const closeicon = `<i class="fa-solid fa-xmark text-2xl "></i>`;
    const btnClasses = ["bg-primary", "rounded-3xl","px-2"];
    let active = false;

// Ensure the elements exist
    menuBtn.addEventListener('click', function () {
        // Toggle the 'active' class on the menu
        if (active)
        {
            menu.style.display = "none";
            menuBtn.innerHTML = menuicon;
            //menuBtn.style.background = "none";
            //menuBtn.style.color = "black";
        }
        else
        {
            menu.style.display = "flex";
            menuBtn.innerHTML = closeicon;
            
            // menuBtn.style.background = "#233dff";
            // menuBtn.style.borderRadius = '50%';
            // menuBtn.style.paddingInline = ".5rem";
            // menuBtn.style.color = "white";
        }
        
        active = !active;
    });



    document.addEventListener(
        'touchstart',
        function (event) {
            // Add custom touch logic here if needed
        },
        { passive: true }
    );

});
