var adsList;

function m() {
  alert("changed");

}

function clearCombo(){

    let len=area.length;
    for (let index = 0; index <len ; index++) {
        area.remove(area[index]);

    }
    //area.length=0;
}


function loadArea(str, type){
  loadAllBooks(str, type);
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
      ajax.open("POST","../../json/dhaka.json",true);
      ajax.send();
  }
  else if(city.value=="Chittagong"){
      ajax.open("POST","../../json/chittagong.json",true);
      ajax.send();
  }
  else{

  }
}

//

// function loadAllBooks(str) {
//  loadArea();
// // let image = document.getElementById('image');
// // let title = document.getElementById('title');
// // let city = document.getElementById('city');
// // let area = document.getElementById('area');
//   //alert(str);
//   let ajax = new XMLHttpRequest();
//   ajax.onreadystatechange = function() {
//     //alert(str);
//     if (this.readyState==4 && this.status==200) {
//       adsList = ajax.responseText;
//       //paginator(adsList);
//       paginator("0");
//       console.log(adsList);
//
//     }
//   }
//   ajax.open("GET","../../lib/dataByCity.php?str="+str,true);
//   ajax.send();
//   //console.log(adsList);
// }



function paginator(pageNo) {
  let pageNav = document.getElementById('pageNav');
  //console.log("pageNo: "+pageNo);
  let rpp = 10;
  let total_rows = adsList.length;
  //console.log();
  let last = Math.ceil(total_rows/rpp);
  if (last < 1) {
    last = 1;
  }
  console.log("last:"+last);
  let paginationControls = "";
  if (last != 1) {
    if (pageNo > 1) {
      let p = parseInt(pageNo);
      p = (p-1);
      paginationControls += "<button onclick='request_page("+ p +")'>&lt;</button>";
    }
    paginationControls += "&nbsp; &nbsp; <b>Page "+ pageNo +" of "+last+"</b> &nbsp; &nbsp; ";
    if (pageNo != last) {
      let p = parseInt(pageNo);
      p = (p+1);
      paginationControls += "<button onclick='request_page("+ p +")'>&gt;</button>";
    }
    pageNav.innerHTML = paginationControls;
    paginationControls = "";
  }
}

function request_page(pageNo) {
  paginator(pageNo);
  //console.log(pageNo);
  showAds = document.getElementById('oldBooks_list');
  //console.log(adsList.length);
  start = (pageNo-1)*10;
  //console.log("start=>"+start);
  showAds.innerHTML = "";
  //alert(arrayList);
  for (let i = start; i < pageNo*10; i++) {
    showAds.innerHTML +=
    "<tr><td><fieldset><a href='#'><img id='image' src='../../uploads/"+adsList[i].image_name+"' style='float:left; width:120px; height:150px;'></a><a href='showOldBook.php?id="+adsList[i].id+"' id='title' style='padding-left:10px;font-size:20px;'>"+adsList[i].title+"</a><div id='city' style='margin-left:130px; margin-top:30px'>"+adsList[i].city+"</div><div id='price' style='margin-left:130px; margin-top:10px'>"+adsList[i].price+"</div></fieldset></td></tr>";

  }
}


function loadAllBooks(str, type) {
  console.log("im in");
  let ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    //alert(str);
    if (this.readyState==4 && this.status==200) {
      //alert(str);
      if (type.name == 'search') {
        adsList = JSON.parse(ajax.responseText);
        request_page('1');
      } else if (type.name == 'area') {
        adsList = JSON.parse(ajax.responseText);
        request_page('1');
        //console.log(adsList);
      } else if (type.name == 'city') {
        adsList = JSON.parse(ajax.responseText);
        request_page('1');
      } else {
        adsList = JSON.parse(ajax.responseText);
        request_page('1');
      }
    }
      //console.log(adsList);
  }
  if (type.name =='search') {
    ajax.open("GET","../ajax/oldBooks_ajax.php?str="+str+"&type="+type.name ,true);
    ajax.send();
  } else if (type.name == "area") {
    //console.log('inside');
    ajax.open("GET","../ajax/oldBooks_ajax.php?str="+str+"&type="+type.name ,true);
    ajax.send();
  } else if (type.name == "city") {
    ajax.open("GET","../ajax/oldBooks_ajax.php?str="+str+"&type="+type.name ,true);
    ajax.send();
  } else {
    ajax.open("GET","../ajax/oldBooks_ajax.php?str="+str+"&type="+type.name ,true);
    ajax.send();
  }
}
