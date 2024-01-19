//When the user press the space bar, the character jumps, adding a class with the animation jump. 
//Consts:
const gigant = document.getElementById("gigant");


function jump(k) {
    if (k.keyCode === 32) {
        document.getElementById("gigant").classList.toggle("jump");
    }
}

//Event listener:
document.addEventListener("keypress", jump);


document.addEventListener("beforeunload", (event) => {
    event.preventDefault();
    alert("No te vayas :( que el gigante casi ha llegado a su destino");
});