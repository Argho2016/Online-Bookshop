var userList;

function matchEmail(str) {
  console.log(str);
  if (userList != '' ) {
    for (var i = 0; i < userList.length; i++) {
      if (str == userList[i].email) {
        return true;
      }
    }
  }
  return false;
}


// function checkEmailConflict(str) {
//
//   getUserList();
//   matchEmail(str);
// }

function getUserList(str) {

  console.log(str.name);
  //let type = document.getElementById('email').name;
  let name = document.getElementById('name');
  let email = document.getElementById('email') ;
  let password = document.getElementById('password') ;
  let confirmPassword = document.getElementById('confirmPassword') ;
  let phoneNumber = document.getElementById('phoneNumber');
  let address = document.getElementById('address') ;
  let r1 = document.getElementById('r1');
  let r2 = document.getElementById('r2');
  let r3 = document.getElementById('r3');
  //let gender = 'male';
  let dd = document.getElementById('dd');
  let mm = document.getElementById('mm') ;
  let yyyy = document.getElementById('yyyy');
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    //alert(str);
    if (this.readyState==4 && this.status==200) {
      //alert(str);

      userList = JSON.parse(ajax.responseText);
      console.log(userList);
      //console.log(userList);
    }
  }

  if (str.name == 'add') {
    console.log("in get");
    ajax.open("GET","../ajax/emailCheck_ajax.php?type="+str.name+"&name="+name.value+"&email="+email.value+"&password="+password.value+"&phoneNumber="+phoneNumber.value+"&address="+address.value+"&gender="+gender+"&dd="+dd.value+"&mm="+mm.value+"&yyyy="+yyyy.value+"&flag="+'2' ,true);
    ajax.send();
  } else if (str.name == 'email') {
    //console.log("in get");
    ajax.open("GET","../ajax/emailCheck_ajax.php?type="+str.name,true);
    ajax.send();
  }
}



function validation(){
  let name = document.getElementById('name');
  let email = document.getElementById('email') ;
  let password = document.getElementById('password') ;
  let confirmPassword = document.getElementById('confirmPassword') ;
  let phoneNumber = document.getElementById('phoneNumber');
  let address = document.getElementById('address') ;
  let r1 = document.getElementById('r1');
  let r2 = document.getElementById('r2');
  let r3 = document.getElementById('r3');
  let dd = document.getElementById('dd');
  let mm = document.getElementById('mm') ;
  let yyyy = document.getElementById('yyyy');
  let comment = document.getElementById('comment');


  //console.log(name.value);
  if (name.value == '') {
    comment.innerHTML = "Name cannot be empty";
    return false;
  } else if (!checkNameSpace(name.value)) { //2  words missing
    comment.innerHTML = "Name must contain atleast two words";
    return false;
  } else if (checkNameIsDigit(name.value)) { //dot missing
    comment.innerHTML = "Name cannot contain digits";
    return false;
  } else {
    comment.innerHTML = "";
  }

  if (email.value == '') {
    comment.innerHTML = "email cannot be empty;";
    return false;
  }  else if (chackAtTheRate(email.value)) { //@ missing
    comment.innerHTML = "email address is missing @";
    return false;
  } else if (chackDot(email.value)) { //@ missing
    comment.innerHTML = "email address is missing .";
    return false;
  } else if (matchEmail(email.value)) {
    comment.innerHTML = "Accout already exists please enter another email adddress or email address is incorrent";
    return false;
  } else {
    comment.innerHTML = "";
  }

  if (password.value == '') {
    comment.innerHTML = "password cannot be empty";
    return false;
  } else if (chackAtTheRate(password.value)) { //@ missing
    comment.innerHTML = "password must contain at least one '@'";
    return false;
  } else if (checkStrLength(password.value, 8)) {
    comment.innerHTML = "password must contain at least 8 characters";
    return false;
  } else {
    comment.innerHTML = "";
  }

  if (confirmPassword.value == "") {
    comment.innerHTML = "Please enter comfitm password";
    return false;
  } else if (confirmPassword.value != password.value) {
    comment.innerHTML ="Password not matching";
    return false;
  } else {
    comment.innerHTML = "";
  }

  if (phoneNumber.value == "") {
    comment.innerHTML = "Please enter phone number";
    return false;
  } else if (checkNameSpace(phoneNumber.value)) {
    comment.innerHTML = 'Please enter accurate phone number';
    return false;
  } else if (checkIsNotDigit(phoneNumber.value)) {
    comment.innerHTML = "Phone number can only contain digits";
    return false;
  } else {
    comment.innerHTML = "";
  }

  if (address.value == '') {
    comment.innerHTML = 'Please enter address';
    return false;
  } else {
    comment.innerHTML = '';
  }

  /* checks if radio button is checked or not */
  if (!(r1.checked || r2.checked || r3.checked)) {
    comment.innerHTML = 'Sorry gender was not selected';
    return false;
  } else {
    comment.innerHTML = '';
  }

  /* date validation */
  if (dd.value == '') {
    comment.innerHTML = 'Please enter date';
    return false;
  } else if (checkIsNotDigit(dd.value)) {
    comment.innerHTML = "Date can only contain digits";
    return false;
  } else if (checkNameSpace(dd.value)) {
    comment.innerHTML = 'Please enter accurate date';
    return false;
  } else if (checkBetween(dd.value, 1, 31)) {
    comment.innerHTML = 'Please enter accurate date';
    return false;
  } else {
    comment.innerHTML = '';
  }

  /* month validation */
  if (mm.value == '') {
    comment.innerHTML = 'Please enter month';
    return false;
  } else if (checkIsNotDigit(mm.value)) {
    comment.innerHTML = "Month can only contain digits";
    return false;
  } else if (checkNameSpace(mm.value)) {
    comment.innerHTML = 'Please enter accurate month';
    return false;
  } else if (checkBetween(mm.value, 1, 12)) {
    comment.innerHTML = 'Please enter accurate month';
    return false;
  } else {
    comment.innerHTML = '';
  }

  /* year validation */
  if (yyyy.value == '') {
    comment.innerHTML = 'Please enter year';
    return false;
  } else if (checkIsNotDigit(yyyy.value)) {
    comment.innerHTML = "Year can only contain digits";
    return false;
  } else if (checkNameSpace(yyyy.value)) {
    comment.innerHTML = 'Please enter accurate year';
    return false;
  } else if (checkBetween(yyyy.value, 1965, 2020)) {
    comment.innerHTML = 'Please enter accurate year';
    return false;
  } else {
    comment.innerHTML = '';
  }

  return true;
}

/* checks if str is between first and last */
function checkBetween(str, first, last) {
  if (str < first || str > last) {
    return true;
  }
  return false;
}

//returns true if not digit
function checkIsNotDigit(str) {
  let num = str.charCodeAt(0);
  let charCodeZero = "0".charCodeAt(0);
  let charCodeNine = "9".charCodeAt(0);
  for (var i = 0; i < str.length; i++) {
    let num = str[i].charCodeAt(0);
    if (num < charCodeZero || num > charCodeNine) {
      return true;
    }
  }
  return false;
}
//matches str with len if grater returns true
function checkStrLength(str, len) {
  if (str.length <= len) {
    return true;
  } else {
    return false;
  }
}
//checks if name contains two different words or not
function checkNameSpace(name) {
  for (var i = 0; i < name.length; i++) {
    if (name[i] == " ") {
      return true;
    }
  }
  return false;
}

//checks if str is digit or not
function checkNameIsDigit(str) {
  let charCodeZero = "0".charCodeAt(0);
  let charCodeNine = "9".charCodeAt(0);
  console.log(charCodeNine);
  for (var i = 0; i < str.length; i++) {
    let charCodeNum = str[i].charCodeAt(0);
    if (charCodeNum >= charCodeZero && charCodeNum <= charCodeNine) {
      return true;
    }
  }
  return false;
}

//checks if email contains str
function chackAtTheRate(str) {
  console.log("");
  for (var i = 0; i < str.length; i++) {
    if (str[i].charCodeAt(0) == '@'.charCodeAt(0)) {
      return false;
    }
  }
  return true;
}

//checks if email contains dots
function chackDot(str) {
  for (var i = 0; i < str.length; i++) {
    if (str[i].charCodeAt(0) == '.'.charCodeAt(0)) {
      return false;
    }
  }
  return true;
}
