const clear = document.querySelector(".clear");
const dateElement = document.getElementById("date");
const list = document.getElementById("list");
const input = document.getElementById("input"); 
const CHECK = "fa-check-circle";
const UNCHECK = "fa-circle-thin";
const LINE_TROUGH = "lineTrough";

// for the todays date 
const options = {weekday:"long", month:"short", day:"numeric"};
const today = new Date();
dateElement.innerHTML = today.toLocaleDateString("en-US", options);


function addToDo(toDo, id, done, trash) {

    if(trash){return; }
    const DONE = done ? CHECK : UNCHECK;
    const LINE = done ? LINE_TROUGH : ""; 

const item = `<li class="item">
    <i class="fa ${DONE} co" job="complete" id="${id}"></i>
    <p class="text ${LINE}"> ${toDo} </p>
    <i class="de fa fa-trash-o delete" job="delete" id="${id}"></i>
            </li>
            `;
const position = "beforeend";
list.insertAdjacentHTML(position, item);

}

// document.addEventListener("click", function(event){
//     let element = event.target;
//     const elementId = event.target.id;
//     const elementJOB = event.target.attributes.job.value;
//     console.log(elementJOB);

//     localStorage.setItem("TODO", JSON.stringify(LIST));
// });

document.addEventListener("keyup", function(event) {
    if(event.keyCode == 13){
        const toDo = input.value;
        if(toDo){
            addToDo(toDo);
            // LIST.push( 
            //     {
            //     name: toDo,
            //     id: id,
            //     done: false,
            //     trash: false
            //     }
            // );
        }
        input.value = "";
        id++;
    }
});

// function completeToDo(element) {
//     element.classList.toggle(CHECK);
//     element.classList.toggle(UNCHECK);
//     element.parentNode.querySelector(".text").classList.toggle(LINE_TROUGH);
//     LIST[element.id].done = LIST[element.id].done ? false : true;
// }

// function removeToDo(element){
//     element.parentNode.parentNode.removeChild(element.parentNode);
//     LIST[Element.id].trash = true;
// }

// const list = document.getElementById("list");
// list.addEventListener("click", function(event) {
//     let element = event.target;
//     const elementJOB = event.target.attributes.job.value; 
//     if(elementJOB == "complete"){
//         completeToDo(element);
//     }else if(elementJOB == "delete"){
//         removeToDo(element);
//     }
// });

