function exeDel(id) {
  msg = confirm('Are you sure?');
  if (msg == true) {
    deleteUser(id);
  } else if (msg == false) {
    console.log('false');
  }
}
function deleteUser(id) {
  let ajax=new XMLHttpRequest();
  ajax.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200)
      {
        let result = JSON.parse(ajax.responseText);
        if (result) {
          alert('Operation successful');
          window.location.href="customerList.php";
        } else {
          alert('Operation was unsuccessful');
        }
      }
  }

  ajax.open("GET","../ajax/deleteUser.php?user_id="+id ,true);
  ajax.send();
}



//user profile delete
function exeDelMyProfile(id) {
  msg = confirm('Are you sure?');
  if (msg == true) {
    deleteAdMyProfile(id);
  } else if (msg == false) {
    console.log('false');
  }
}
function deleteAdMyProfile(id) {
  let ajax=new XMLHttpRequest();
  ajax.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200)
      {
        let result = JSON.parse(ajax.responseText);
        if (result) {
          alert('Operation successful');
          // right here
          window.location.href="loginPageD.php";
        } else {
          alert('Operation was unsuccessful');
        }
      }

  }

  ajax.open("GET","../ajax/deleteUser.php?user_id="+id ,true);
  ajax.send();
}
