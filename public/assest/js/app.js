var inputAdd = document.querySelectorAll('.is-invalid')
var messageErr = document.querySelectorAll('.message-err')



inputAdd.forEach((value,index) => {
    const message =  messageErr[index]
    value.onfocus = function(){
        this.classList.remove("is-invalid")
        message.style.display = 'none'
    }
})
