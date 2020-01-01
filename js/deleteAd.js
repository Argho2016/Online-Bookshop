function exeDel(id) {
  msg = confirm('Are you sure?');
  if (msg == true) {
    deleteAd(id);
  } else if (msg == false) {
    console.log('false');
  }
}
function deleteAd(id) {
  let ajax=new XMLHttpRequest();
  ajax.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200)
      {
        let result = JSON.parse(ajax.responseText);
        if (result) {
          alert('Operation successful');
          window.location.href="oldBookList.php";
        } else {
          alert('Operation was unsuccessful');
        }
      }
  }

  ajax.open("GET","../ajax/deleteAd.php?id="+id ,true);
  ajax.send();
}


function exeDelMyAd(id) {
  msg = confirm('Are you sure?');
  if (msg == true) {
    deleteAdMyAd(id);
  } else if (msg == false) {
    console.log('false');
  }
}
function deleteAdMyAd(id) {
  let ajax=new XMLHttpRequest();
  ajax.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200)
      {
        let result = JSON.parse(ajax.responseText);
        if (result) {
          alert('Operation successful');
          window.location.href="myAds.php";
        } else {
          alert('Operation was unsuccessful');
        }
      }
  }

  ajax.open("GET","../ajax/deleteAd.php?id="+id ,true);
  ajax.send();
}
