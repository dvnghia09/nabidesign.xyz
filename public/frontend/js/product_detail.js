const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage(){
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);



function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);


// khi chọn size và màu 

    var sizes = document.querySelectorAll('.lable-size')
    var colors = document.querySelectorAll('.lable-color')



    sizes.forEach(function(item,index){
        item.onclick = function(){
            if(document.querySelector('.lable-size.border-black')){
                document.querySelector('.lable-size.border-black').classList.remove('border-black')
            }
            this.classList.add('border-black');
        }
    })

    colors.forEach(function(item,index){
        item.onclick = function(){
            if(document.querySelector('.lable-color.border-black')){
                document.querySelector('.lable-color.border-black').classList.remove('border-black')
            }
            this.classList.add('border-black');
        }
    })