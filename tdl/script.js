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

    var RealDate = document.createElement('p')
    RealDate.innerHTML = "(créée le " + dateFrance + ")";

    paragraph.classList.add('paragraphe_style');
    RealDate.classList.add('date_style');
    

    ToDoContainer.appendChild(paragraph);
    ToDoContainer.appendChild(RealDate);

    var current_number_todo = document.getElementById('current-number-todo')

    var number_todos = parseInt(current_number_todo) || 0;
    
    number_todos++;
    current_number_todo.replaceWith(number_todos);

    inputField.value = "";

    paragraph.addEventListener('dblclick', function(){
        ToDoContainer.removeChild(paragraph);
        ToDoContainer.removeChild(RealDate);
        number_todo--;
    })

}