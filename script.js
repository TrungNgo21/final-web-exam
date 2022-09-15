var infoContainer = document.querySelector(".info-container__img img");

var hideEmailBtn = document.getElementById("hide-email");
var hidePhoneBtn = document.getElementById("hide-phone");


var email = document.querySelector(".info-container__about__email");
var phone = document.querySelector(".info-container__about__tel");


infoContainer.addEventListener("mouseover", function(){
    infoContainer.style.borderRadius = "0px";
})

infoContainer.addEventListener("mouseout", function(){
    infoContainer.style.borderRadius = "50%";
})


hideEmailBtn.addEventListener("change", function(){
    if(this.checked){
        email.style.display = "none";
    }else{
        email.style.display = "block";
    }
})

hidePhoneBtn.addEventListener("change", function(){
    if(this.checked){
        phone.style.display = "none";
    }else{
        phone.style.display = "block";
    }
})

