document.addEventListener('DOMContentLoaded', function () {
    var boton = document.getElementById('boton');
    var inputName = document.getElementById('inputName');
    var inputAge = document.getElementById('inputAge');
    var divResult = document.getElementById('result');
    var form = document.getElementById('basicForm');
    function saludar(nombre, edad) {
        return "¡Hola, " + nombre + " tienes " + edad + " años!";
    }
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevents the default form submission        
    });
    boton.addEventListener('click', function () {
        var valorInputName = inputName.value;
        var valorInputAge = parseInt(inputAge.value);
        divResult.innerHTML = saludar(valorInputName, valorInputAge);
    });
});
