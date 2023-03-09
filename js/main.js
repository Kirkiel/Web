document.addEventListener('DOMContentLoaded', function(){

    const navbar = document.querySelector('.navbar');
    const links = document.querySelectorAll('.nav-link')
    const navbarCollapse = document.querySelector('.navbar-collapse')

    function addShadow(){
        if(window.scrollY >= 100){
            navbar.classList.add('shadow-bg');
        }else{
            navbar.classList.remove('shadow-bg');
        }
    }

  links.forEach(item => item.addEventListener('click', () => navbarCollapse.classList.remove('show')));

    window.addEventListener('scroll', addShadow);
})


