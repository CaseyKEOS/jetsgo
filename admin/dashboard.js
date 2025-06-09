const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

//time and date

const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];
  
const d = new Date();
document.write(monthNames[d.getMonth()]);

function display_ct7() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    hours=hours.toString().length==1? 0+hours.toString() : hours;
    
    var minutes=x.getMinutes().toString()
    minutes=minutes.length==1 ? 0+minutes : minutes;
    
    // var seconds=x.getSeconds().toString()
    // seconds=seconds.length==1 ? 0+seconds : seconds;

    var month=(monthNames[d.getMonth()]);
    
    var dt=x.getDate().toString();
    dt=dt.length==1 ? 0+dt : dt;
    
    var x1 = hours + ":" +  minutes + " " + ampm;
    x1= x1 + " - " +  month + " " + dt + ", " + x.getFullYear(); 
    document.getElementById('date-time').innerHTML = x1;
    display_c7();
}
function display_c7(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct7()',refresh)
}
    display_c7();

// Time

function display_time(){
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    hours=hours.toString().length==1? 0+hours.toString() : hours;

    var minutes=x.getMinutes().toString()
    minutes=minutes.length==1 ? 0+minutes : minutes;
    
    var x1 = hours + ":" +  minutes + " " + ampm;
    document.getElementById('time').innerHTML = x1;
    display_timeloop();
}
function display_timeloop(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_time()',refresh)
}
    display_timeloop();

//Date

function display_date(){
    var x = new Date()
    var month=(monthNames[d.getMonth()]);

    var dt=x.getDate().toString();
    dt=dt.length==1 ? 0+dt : dt;
    
    var x1 = month + " " + dt + ", " + x.getFullYear();
    document.getElementById('date').innerHTML = x1;
    display_dateloop();
}
function display_dateloop(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_date()',refresh)
}
display_dateloop();


//checkbox
function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
 
//tooltip   
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))