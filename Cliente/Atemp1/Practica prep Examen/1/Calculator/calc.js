function clearScreen() {
    document.getElementById("result").innerHTML = "";
  }
  
  function deleteLastCharacter() {
    let currentValue = document.getElementById("result").innerHTML;
    document.getElementById("result").innerHTML = currentValue.slice(0, -1);
  }
  
  function display(value) {
    document.getElementById("result").innerHTML += value;
  }
  
  function calculate() {
    let expression = document.getElementById("result").innerHTML;
    let result = eval(expression);
    document.getElementById("result").innerHTML = result;
  }
  

  //
  document.querySelectorAll("input[type='button']").forEach(function (button) {
    button.addEventListener("click", function () {
        switch (button.value) {
            case "AC":
                clearDisplay();
                break;
            case "C":
                removeLastCharacter();
                break;
            case "=":
                calculateResult();
                break;
            default:
                addToDisplay(button.value);
                break;
        }
    });
});