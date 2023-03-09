function openNav() {
    document.getElementById("mySidenav").style.width = "210px";
  }
  
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

function change_color_add_todo_text(text) {
    document.getElementById("text-add-todo").style.cursor = "pointer";
    text.style.color = "red";
    text.style.textDecoration = "underline";
}

function default_color_add_todo_text(text) {
    text.style.color="black";
    text.style.textDecoration = "none";
}

var ToDoButton = document.getElementById('text-add-todo');
var ToDoContainer = document.getElementById('todo-container');
var OldToDoContainer = document.getElementById('old-container');
var inputField = document.getElementById('My-inputfield');
var CrossButton = document.getElementById('cross-button');


ToDoButton.onclick = function(){
    if(inputField.value != ""){
        //si l'input n'est pas vide, créer un paragraphe
        var paragraph = document.createElement('p');
        var date = document.createElement('p');
    }

    else if(inputField.value == ""){
        alert('Tapez quelque chose !');
    }

    paragraph.innerHTML = inputField.value;
    date = new Date();
    console.log(date)
    dateFrance = date.toLocaleString('fr-FR', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    })

    heure = new Date();
    heureFrance = heure.toLocaleString('fr-FR', {
        hour: 'numeric',
        minute: 'numeric',
    })

    var RealDate = document.createElement('p')
    RealDate.innerHTML = "(créée le " + dateFrance + " à " + heureFrance + ")";

    paragraph.classList.add('paragraphe_style');
    RealDate.classList.add('date_style');
    

    ToDoContainer.appendChild(paragraph);
    ToDoContainer.appendChild(RealDate);

    localStorage.setItem("list", document.getElementById("todo-container").innerHTML);

    inputField.value = "";

    paragraph.addEventListener('dblclick', function(){
        ToDoContainer.removeChild(paragraph);
        ToDoContainer.removeChild(RealDate);
            heure = new Date();
            heureFrance = heure.toLocaleString('fr-FR', {
            hour: 'numeric',
            minute: 'numeric',
            })
        var RealDate2 = document.createElement('p')
        RealDate2.innerHTML = "(finie le " + dateFrance + " à " + heureFrance + ")";
        OldToDoContainer.appendChild(paragraph);
        OldToDoContainer.appendChild(RealDate2);
        paragraph.addEventListener('dblclick', function(){
            OldToDoContainer.removeChild(paragraph);
            OldToDoContainer.removeChild(RealDate2);
        })
    })
}