// setup function
function setup() {
    createCanvas(600, 1000);
      
    background(255);
  }
    
  // draw function
  function draw() {
    stroke(mouseX / 2, mouseY / 2, 150);
      strokeWeight(5);
      
    if (mouseIsPressed) {
      line(pmouseX, pmouseY, mouseX, mouseY);
    }
  }