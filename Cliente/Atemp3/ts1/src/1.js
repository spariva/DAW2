var boton = document.getElementById('boton');
var inputName = document.getElementById('inputName');
var inputAge = document.getElementById('inputAge');
var divResult = document.getElementById('result');
function saludar(nombre, edad) {
    return "¡Hola, " + nombre + " tienes " + edad + " años!";
}
boton.addEventListener('click', function (event) {
    event.preventDefault();
    // const valorInputName: string = inputName.value
    // const valorInputAge: number = parseInt(inputAge.value)
    alert(saludar(inputName.value, parseInt(inputAge.value)));
    divResult.innerHTML = saludar(inputName.value, parseInt(inputAge.value));
});
