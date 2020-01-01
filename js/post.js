"use strict"

function imgCount() {
  let imgs = document.getElementById('image');
  let show_img = document.getElementById('show-image');

  console.log(imgs.files.length );
}

function validation() {
  let t = document.getElementById('title');
  let jT = document.getElementById('jTitle');
  let d = document.getElementById('description') ;
  let jD = document.getElementById('jDescription');
  let pN = document.getElementById('phone_number') ;
  let jpN = document.getElementById('jphone_number');
  let p = document.getElementById('price') ;
  let jP = document.getElementById('jPrice');
  let city = document.getElementById('city');
  let jCA = document.getElementById('jCA');


// console.log(document.getElementById('us').value);
  //jCA.innerHTML = city.value;
  // if (document.getElementById('us').value != "") {
  //
  //   return false;
  // }





  if (city.value == "--Please select City--") {
    jCA.innerHTML = "Please select city and area";
    return false;
  } else {
    jCA.innerHTML = "";
  }

  if (t.value == '') {
    jT.innerHTML = "Enter title";
    return false;
  } else if (t.value.length < 5) {
    jT.innerHTML = "Title must contain 5 characters";
    return false;
  } else {
    jT.innerHTML = "";
  }



  if (d.value == '') {
    jD.innerHTML = "Enter Description";
    return false;
  } else if (d.value.length > 5000) {
    jD.innerHTML = "Description must contain less than 5000 characters";
    return false;
  } else {
    jD.innerHTML = "";
  }

  function isNumeric(c) {
    return !isNaN(c - parseFloat(c));
  }

  if (p.value == '') {
    jP.innerHTML = "Enter price of book ";
    return false;
  } else if (!isNumeric(p.value)) {
    jP.innerHTML = "Number can only contain digits";
    return false;
  } else {
    jP.innerHTML = "";
  }

  if (pN.value == '') {
    jpN.innerHTML = "Enter Contact Number";
    return false;
  } else if (pN.value.length < 11) {
    jpN.innerHTML = "Phone number must contain 11 digits";
    return false;
  } else if (!isNumeric(pN.value)) {
    jpN.innerHTML = "Number can only contain digits";
    return false;
  } else {
    jpN.innerHTML = "";
  }


  return true;

}


function clearCombo(){

    let len=area.length;
    for (let index = 0; index <len ; index++) {
        area.remove(area[index]);

    }
    //area.length=0;
}
function loadArea(){
    let city=document.getElementById('city');
    let area=document.getElementById('area');
    clearCombo();
    let ajax=new XMLHttpRequest();
    ajax.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            let areaData=JSON.parse(ajax.responseText);
            for (let index = 0; index < areaData.length; index++) {
                let option=document.createElement("option");
                if(city.value=="Dhaka"){
                    option.text=areaData[index].area;

                }
                else if(city.value=="Chittagong"){
                    option.text=areaData[index].area;
                }
                area.add(option);
            }

        }

    }
    if(city.value=="Dhaka"){
        ajax.open("GET","../../json/dhaka.json",true);
        ajax.send();
    }
    else if(city.value=="Chittagong"){
        ajax.open("GET","../../json/chittagong.json",true);
        ajax.send();
    }
    else{}

}
