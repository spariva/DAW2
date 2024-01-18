//When the user press the space bar, the character jumps, adding a class with the animation jump. 
//Consts:
const gigant = document.getElementById("gigant");

//Event listener:
document.addEventListener("keypress", jump);

function jump() {
    if (keypress.keyCode === 32) {
        document.getElementById("gigant").classList.add("jump");
        setTimeout(function () {
            document.getElementById("gigant").classList.remove("jump");
        }, 500);
    }
}

document.addEventListener("beforeunload", (event) => {
    event.preventDefault();
    alert("No te vayas :( que el gigante casi ha llegado a su destino");
  });