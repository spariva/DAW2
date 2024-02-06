// app.ts
document.addEventListener('DOMContentLoaded', () => {
    const boton: HTMLButtonElement = document.getElementById('boton') as HTMLButtonElement
    const inputName: HTMLInputElement = document.getElementById('inputName') as HTMLInputElement
    const inputAge: HTMLInputElement = document.getElementById('inputAge') as HTMLInputElement
    const divResult: HTMLDivElement = document.getElementById('result') as HTMLDivElement
    const form = document.getElementById('basicForm') as HTMLFormElement;

    function saludar(nombre: string, edad: number): string {
        return "¡Hola, " + nombre + " tienes " + edad + " años!"
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevents the default form submission
    });

    boton.addEventListener('click', ()=> {
        const valorInputName: string = inputName.value
        const valorInputAge: number = parseInt(inputAge.value)
        divResult.innerHTML = saludar(valorInputName, valorInputAge)

    });


});










