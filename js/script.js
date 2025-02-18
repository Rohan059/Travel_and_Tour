let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};
// Home slider
var swiper = new Swiper(".home-slider", {
   loop: true,
   autoplay: {
      delay: 5000, // 5 seconds
      disableOnInteraction: false, // Autoplay continues even after interaction
   },
});

// Reviews slider
var swiper = new Swiper(".reviews-slider", {
   loop: true,
   grabCursor: true,
   autoHeight: true,
   spaceBetween: 20,
   autoplay: {
      delay: 5000, // 5 seconds
      disableOnInteraction: false, // Autoplay continues even after interaction
   },
   breakpoints: {
      0: {
         slidesPerView: 1,
      },
      700: {
         slidesPerView: 2,
      },
      1000: {
         slidesPerView: 3,
      },
   },
});


let loadMoreBtn = document.querySelector('.packages .load-more .btn');
let currentItem = 3;

loadMoreBtn.onclick = () =>{
   let boxes = [...document.querySelectorAll('.packages .box-container .box')];
   for (var i = currentItem; i < currentItem + 3; i++){
      boxes[i].style.display = 'inline-block';
   };
   currentItem += 3;
   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
}