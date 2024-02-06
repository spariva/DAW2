const boton: HTMLButtonElement = document.getElementById('boton') as HTMLButtonElement
const inputName: HTMLInputElement = document.getElementById('inputName') as HTMLInputElement
const inputAge: HTMLInputElement = document.getElementById('inputAge') as HTMLInputElement
const divResult: HTMLDivElement = document.getElementById('result') as HTMLDivElement

function saludar(nombre: string, edad: number): string {
    return "¡Hola, " + nombre + " tienes " + edad + " años!"
}


boton.addEventListener('click', (event) => {
    event.preventDefault();
    // const valorInputName: string = inputName.value

    // const valorInputAge: number = parseInt(inputAge.value)

    alert(saludar(inputName.value, parseInt(inputAge.value)))
    divResult.innerHTML = saludar(inputName.value, parseInt(inputAge.value))

});


