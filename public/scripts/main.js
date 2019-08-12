const clear = document.querySelector(".clear");
const dateElement = document.getElementById("date");
// const list = document.getElementById("list");
// const input = document.getElementById("input"); 
// const CHECK = "fa-check-circle";
// const UNCHECK = "fa-circle-thin";
// const LINE_TROUGH = "lineTrough";

// for the todays date 
const options = {weekday:"long", month:"short", day:"numeric"};
const today = new Date();
dateElement.innerHTML = today.toLocaleDateString("en-EU", options);

// for the refresh button 


// for the color picker 


