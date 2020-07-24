/*function changestyle(){
    var text = document.getElementsByClassName("para");
    var changeText = text[0].style.color = "red";
    //var text = document.getElementById("para").style.backgroundColor = "silver";

}
*/
/*
function changestyle(){
    vat text = document.getElementById("para").style.colo = "red";
}
*/
/*
function changestyle(){
    var text = document.getElementsByClassName("para");
    var changeText = text[0].innerHTML = "new text";
}
*/
/*
fuction newPicture(){
var new= document.getElementById("immage").src = "";
}
similarly function oldPicture(){

}*/
//to add new paragraph
function newParagraph(){
    //this creates the heading
    var elementH = document.createElement("h2");
    var main = document.getElementById("main");
    main.appendChild(elementH);
    var textH = document.createTextNode("some text..");
    element.appendChild(textH); 
    //this creates paragraph
    var element = document.createElement("p");
    var main = document.getElementById("main");
    main.appendChild(element);
    var text = document.createTextNode("some text......");
    element.appendChild(text);
}

//to delete header and paragraph
function removeHeader(){
    var elementH = document.getElementsByTagName("h2")[2];
    var parent = elementH.parentNode;
    parent.removeChild(elementH);

    var elementP = document.getElementsByTagName("p")[4];
    parent.removeChild(elementP);

}