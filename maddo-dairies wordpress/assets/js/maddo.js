document.addEventListener('DOMContentLoaded',function(){
 const toggle=document.querySelector('.menu-toggle'), menu=document.querySelector('.main-nav .nav-links');
 if(toggle&&menu){toggle.addEventListener('click',function(){const open=menu.classList.toggle('is-open');toggle.setAttribute('aria-expanded',open?'true':'false');});}
 const slides=document.querySelectorAll('.slideshow img');
 if(slides.length>1){let current=0;setInterval(()=>{slides[current].classList.remove('active');current=(current+1)%slides.length;slides[current].classList.add('active');},3000);}
});
