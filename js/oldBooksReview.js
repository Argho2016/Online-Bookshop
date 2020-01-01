var underReviewAds;
var pendingAds;
function m(){
  alert("yp");
}
//show page next previoue controls
function paginator_underReview(pageNo) {
  let pageNav = document.getElementById('pageNav-underReview');
  //console.log("pageNo: "+pageNo);
  let rpp = 10;
  let total_rows = underReviewAds.length;
  //console.log();
  let last = Math.ceil(total_rows/rpp);
  if (last < 1) {
    last = 1;
  }
  //console.log("last:"+last);
  let paginationControls = "";
  if (last != 1) {
    if (pageNo > 1) {
      let p = parseInt(pageNo);
      p = (p-1);
      paginationControls += "<button onclick='request_page_underReview("+ p +")'>&lt;</button>";
    }
    paginationControls += "&nbsp; &nbsp; <b>Page "+ pageNo +" of "+last+"</b> &nbsp; &nbsp; ";
    if (pageNo != last) {
      let p = parseInt(pageNo);
      p = (p+1);
      paginationControls += "<button onclick='request_page_underReview("+ p +")'>&gt;</button>";
    }
    pageNav.innerHTML = paginationControls;
    paginationControls = "";
  }
}

function request_page_underReview(pageNo) {
  paginator_underReview(pageNo);

  //console.log(pageNo);
  let showAds = document.getElementById('ads-underReview');
  //console.log(underReviewAds.length);
  let start = (pageNo-1)*10;
  //console.log("start=>"+start);
  showAds.innerHTML = "";
  //alert(arrayList);
  for (let i = start; i < pageNo*10; i++) {
    showAds.innerHTML +=
    "<tr><td valign='top' height='150px' width='100%'><fieldset><a href='#'><img id='image' src='../../uploads/"+underReviewAds[i].image_name+"' alt='image unavailable' style='float:left; width:120px; height:150px;'></a><a href='showOldBook.php?id="+underReviewAds[i].id+"' id='title' style='padding-left:10px;font-size:20px;'>"+underReviewAds[i].title+"</a><div id='city' style='margin-left:130px; margin-top:30px'>"+underReviewAds[i].city+"</div><div id='price' style='margin-left:130px; margin-top:10px'>"+underReviewAds[i].price+"</div><div style='float:right; margin-top:30px'>"+underReviewAds[i].added_date+"</div><div style='float:right; margin-top:-100px; margin-right:-125px;'>"+underReviewAds[i].status+"</div></fieldset></td><td><fieldset><a href='editOldAdsReview.php?id="+underReviewAds[i].id+"'>Review</a>|<a href='#'>Delete</a></fieldset></td></tr>";

  }
}

function loadAdsUnderReview() {
  console.log("im in");
  type = "underReview";
  //let title = document.getElementById('title');
  let search_underReviewAds = document.getElementById('search-underReview');
  //console.log(orderBy.value);
  //console.log(city.value);
  let ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    //alert(str);
    if (this.readyState==4 && this.status==200) {
      //alert(str);
      underReviewAds = JSON.parse(ajax.responseText);
      console.log(underReviewAds);
      request_page_underReview('1');

    }
  }
  //console.log(type);
  ajax.open("GET","../ajax/oldAdsReview_ajax.php?&str="+search_underReviewAds.value+"&type="+type ,true);
  ajax.send();
}

function paginator_pending(pageNo) {
  let pageNav = document.getElementById('pageNav-pending');
  //console.log("pageNo: "+pageNo);
  let rpp = 10;
  let total_rows = pendingAds.length;
  //console.log();
  let last = Math.ceil(total_rows/rpp);
  if (last < 1) {
    last = 1;
  }
  //console.log("last:"+last);
  let paginationControls = "";
  if (last != 1) {
    if (pageNo > 1) {
      let p = parseInt(pageNo);
      p = (p-1);
      paginationControls += "<button onclick='request_page_pending("+ p +")'>&lt;</button>";
    }
    paginationControls += "&nbsp; &nbsp; <b>Page "+ pageNo +" of "+last+"</b> &nbsp; &nbsp; ";
    if (pageNo != last) {
      let p = parseInt(pageNo);
      p = (p+1);
      paginationControls += "<button onclick='request_page_pending("+ p +")'>&gt;</button>";
    }
    pageNav.innerHTML = paginationControls;
    paginationControls = "";
  }
}

function request_page_pending(pageNo) {
  paginator_pending(pageNo);

  //console.log(pageNo);
  let showAds = document.getElementById('ads-pending');
  //console.log(underReviewAds.length);
  let start = (pageNo-1)*10;
  //console.log("start=>"+start);
  showAds.innerHTML = "";
  //alert(arrayList);
  for (let i = start; i < pageNo*10; i++) {
    showAds.innerHTML +=
    "<tr><td valign='top' height='150px' width='100%'><fieldset><a href='#'><img id='image' src='../../uploads/"+pendingAds[i].image_name+"' alt='image unavailable' style='float:left; width:120px; height:150px;'></a><a href='showOldBook.php?id="+pendingAds[i].id+"' id='title' style='padding-left:10px;font-size:20px;'>"+pendingAds[i].title+"</a><div id='city' style='margin-left:130px; margin-top:30px'>"+pendingAds[i].city+"</div><div id='price' style='margin-left:130px; margin-top:10px'>"+pendingAds[i].price+"</div><div style='float:right; margin-top:30px'>"+pendingAds[i].added_date+"</div><div style='float:right; margin-top:-100px; margin-right:-125px;'>"+pendingAds[i].status+"</div></fieldset></td><td><fieldset><a href='editOldAdsReview.php?id="+pendingAds[i].id+"'>Review</a>|<a href='#'>Delete</a></fieldset></td></tr>";
  }
}

function loadAdsPending() {
  console.log("im in loadAdsPending");
  type = "pending";
  //let title = document.getElementById('title');
  let search_pending = document.getElementById('search-pending');
  //console.log(orderBy.value);
  //console.log(city.value);
  let ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    //alert(str);
    if (this.readyState==4 && this.status==200) {
      //alert(str);
      pendingAds = JSON.parse(ajax.responseText);
      console.log(pendingAds);
      request_page_pending('1');

    }
  }
  //console.log(type);
  ajax.open("GET","../ajax/oldAdsReview_ajax.php?&str="+search_pending.value+"&type="+type ,true);
  ajax.send();
}
