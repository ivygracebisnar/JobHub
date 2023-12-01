const sideMenu = document.querySelector("sidebar");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// show sidebar
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

//close sidebar
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

//change theme
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})


var box = document.getElementById('box');
var down = false;

function toggleNotifi(){
    if(down) {
        box.style.height = '0px';
        box.style.opacity = 0;
        down = false;
    }else{
        box.style.height = '510px';
        box.style.opacity = 1;
        down = true;
    }
}


new DataTable('#example');