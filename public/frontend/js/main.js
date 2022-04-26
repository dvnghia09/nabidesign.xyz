const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)



// show nav mobile and table

const btnMenu = $('.header-menu-mobile-icon')
const overlay = $('.nav-mobile-overlay')
const navMobile = $('.nav-mobile')
const navClose = $('.nav-close')
const showSubNavMobile = $('.nav-mobile__child')
const navItem = $$('.nav-mobile-item__link')
// hiện ô tìm kiếm trên mobile and table
const activeBoxSearch = $('.header-menu-mobile-search')
const boxSearch = $('.box-search')
const app = $('.app__container')




const handleBtnMenu = () => {
    btnMenu.onclick = () => {
        overlay.classList.add('active-sub-mobile')
        navMobile.classList.add('active-sub-mobile')
     
    }

    overlay.onclick = () => {
        overlay.classList.remove('active-sub-mobile')
        navMobile.classList.remove('active-sub-mobile')
    }

    navClose.onclick = () => {
        overlay.classList.remove('active-sub-mobile')
        navMobile.classList.remove('active-sub-mobile')
    }

    navItem.forEach( (value,index) => {
        value.onclick = (e) => {
            showSubNavMobile.classList.toggle('active-sub-mobile')
            e.target.classList.toggle('deg')
        }
    })


    // show box search
    
    app.onclick = function() {
        boxSearch.classList.remove('active')
    }

    activeBoxSearch.onclick = (e) => {
        boxSearch.classList.toggle('active')
        
    }

    boxSearch.onclick = (e) => {
        e.stopPropagation()
    }
}

handleBtnMenu();


// Quận lên đầu trang
    var header = $(".header");
    var btntop = $(".btntop");
 
 // KHi người dùng scrolls down 100px , hiện btnTop và header
 window.onscroll = function() {
     scrollFunction()
    };



function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    // chạy header xuống
    header.classList.add('white-color')
    // hiện btntop
    btntop.style.display = "flex";
  } else {
    header.classList.remove('white-color')
    btntop.style.display = "none";
  }
}


   btntop.onclick = function () {
                  document.body.scrollTop = 0;
                  document.documentElement.scrollTop = 0;
   }  
    







