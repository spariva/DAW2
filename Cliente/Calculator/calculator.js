var num1 = value;
var countComa = 0;

function appendToDisplay(value) {
    if(value == '.'){
        countComa++;
        if(countComa > 1){
            alert('No se puede poner mas de un punto');
        }
    }
    document.getElementById('display').value += value;
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function calculateResult() {
    try {
        const result = eval(document.getElementById('display').value);
        document.getElementById('display').value = result;
    } catch (error) {
        document.getElementById('display').value = 'Error';

    }
}
function sqrt(){
    document.getElementById('display').value = Math.sqrt(num1);
}

