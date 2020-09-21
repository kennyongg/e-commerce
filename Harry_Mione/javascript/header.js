function openSearchBox() {
  var searchbox=document.getElementById("searchbox");
  searchbox.style.animationName = 'open';
  searchbox.style.width = "175%";
  searchbox.style.border = "1px solid black";

}

function closeSearchBox() {
  var searchbox=document.getElementById("searchbox");
  searchbox.style.animationName = 'close';
  searchbox.style.width = '0';
  searchbox.style.border = "0px solid black";

}

function openNav() {
  var menu = document.getElementById("menubutton");
  document.getElementById("mySidenav").style.width = "100%";
  menu.setAttribute("onClick","closeNav()");


}

function closeNav() {
  var menu = document.getElementById("menubutton");
  document.getElementById("mySidenav").style.width = "0";
  menu.setAttribute("onClick","openNav()");
}

function expand(){
    var container1 = document.getElementById("container1");
        container1.style.height= "290px";
        container1.classList.add("no-hover");
    }
