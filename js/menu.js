const menu = document.querySelector('.menu')
const menuNav = document.querySelector('.menu-navegacion')

// console.log(menuNav);
// console.log(menu);

 //conf--> cuando aprieto el menu, despliega el menu de nav
menu.addEventListener('click', ()=> {
    menuNav.classList.toggle("spread") //le agrego la clase spread, c/vez que lo presiono se abre el menu
})

//cuando clickeo, toma la clase e y la sustituye
//si tengo abierto el menu nav y aprieto en otro lado, se cierra
window.addEventListener('click', e=>{ 
    if(menuNav.classList.contains('spread') && e.target!= menuNav && e.target!= menu) {
            menuNav.classList.toggle("spread")
    }
})


