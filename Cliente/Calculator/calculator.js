function appendToDisplay(value) {
    var num1 = value;
    if(document.getElementById('display').value==`(Math.sqrt())`){
        let num = value;
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

