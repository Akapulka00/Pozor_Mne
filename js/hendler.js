"use strict"
let waring=document.querySelector('.waring');
let csvForm=document.forms.csvForm;
csvForm.addEventListener("submit",function (e){
  e.preventDefault();
  if(csvForm['csvInfo'].value.split(".")[1]==="csv"){
    fetch("form-handler.php",{
      method:"post",
      body:new FormData(this)
    })
      .then(response => response.text())
      .then(text => {
        console.log(text)
        waring.innerText=text;
      });
  }else {
    waring.innerText="Данный формат не поддерживается введитес CSV файл";
  }

});
