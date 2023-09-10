var date = new Date();
var time = date.getHours();
if (time > 4 && time < 12) {
  document.getElementsByTagName("span")[0].innerHTML = "Good Morning";
}
else if (time > 4 && time < 17) {
  document.getElementsByTagName("span")[0].innerHTML = "Good Afternoon";
}
else {
  document.getElementsByTagName("span")[0].innerHTML = "Good Evening";
}
document.querySelectorAll('.prnt').forEach(b => {
  b.onclick = () => {
    var fname = document.getElementById("fn").value;
    var lname = document.getElementById("ln").value;
    document.getElementById("con").innerHTML = "First name: " + fname + "<br>Last name: " + lname;
  };
});