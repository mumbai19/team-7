  function openNav() {
        console.log("hi");
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("arrow").style.display = "none";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
   document.getElementById("main").style.marginLeft = "0px";
   document.getElementById("arrow").style.display = "block";
}
function myFunction(){
    alert("Form Sumbitted");
    }