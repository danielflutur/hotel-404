const button=()=>{
    const btn1=document.querySelector('.bt1');
    const btn2=document.querySelector('.bt2');

    btn1.addEventListener('click',()=>{
        btn1.style.display='none';
        btn2.style.display='inline';
    });
    btn2.addEventListener('click',()=>{
        btn1.style.display='inline';
        btn2.style.display='none';
    });
}
button();