const slide = () =>{
    const menu=document.querySelector('.menu');
    const nav=document.querySelector('.links');

    menu.addEventListener('click',()=>{

        nav.classList.toggle('menu-active');

        menu.classList.toggle('action');
    });
}
const btn=document.querySelector('.goup');
window.addEventListener('scroll',()=>{
    if(document.body.scrollTop>20 || document.documentElement.scrollTop>20){
        btn.style.display = 'block';
    }
    else{
        btn.style.display='none';
    }
})
btn.addEventListener('click',()=>{
    window.scroll({
        top: 0,
        behavior: "smooth"
    })
})
slide();