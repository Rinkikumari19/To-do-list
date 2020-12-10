
let addtodobutton = document.getElementById('addBtn');
let todoBox = document.getElementById('todoBox');
let userInput = document.getElementById('userInput');

addtodobutton.addEventListener('click',function(){
    var paragraph = document.createElement('p')
    paragraph.classList.add('paragraph-styling')
    paragraph.innerText = userInput.value 
    todoBox.appendChild(paragraph);
    userInput.value = " ";

    paragraph.addEventListener('click',function(){
        paragraph.style.textDecoration = 'line-through';
    })

    paragraph.addEventListener('dblclick',function(){
        todoBox.removeChild(paragraph);
    })
})