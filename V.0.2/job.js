function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.currentTarget.appendChild(document.getElementById(data));
}

function createTask(){
    var x = document.getElementById("inprogress");
    var y = document.getElementById("done");
    var z = document.getElementById("create-new-task-block");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "flex";
    }
}

function saveTask(){
    // var saveButton = document.getElementById("save-button");
    // var editButton = document.getElementById("edit-button");
    // if (saveButton.style.display === "none") {
    //     saveButton.style.display = "block";
    //     editButton.style.display = "none";
    // } else{
    //     saveButton.style.display = "none";
    //     editButton.style.display = "block";
    // }

    var todo = document.getElementById("todo");
    var taskName = document.getElementById("task-name").value;
    todo.innerHTML += `
    <div class="task" id="${taskName.toLowerCase().split(" ").join("")}" draggable="true" ondragstart="drag(event)">
        <span>${taskName}</span>
    </div>
    `
}

/*function hideViewBlock1(){
    const myElement = document.getElementById('kanbanContainer1');
    if (myElement.style.display === 'none') {
        // If element is currently hidden, unhide it
        myElement.style.display = 'block'; // or 'inline', depending on the element
      } else {
        // If element is currently visible, hide it
        myElement.style.display = 'none';
      }
}
/*function hideViewBlock2(){
    const myElement = document.getElementById('kanbanContainer2');
    if (myElement.style.display === 'none') {
        // If element is currently hidden, unhide it
        myElement.style.display = 'flex'; // or 'inline', depending on the element
      } else {
        // If element is currently visible, hide it
        myElement.style.display = 'none';
      }
}*/
var dropdown = document.querySelector(".dropdown");
dropdown.onclick = function () {
  dropdown.classList.toggle("active");
};