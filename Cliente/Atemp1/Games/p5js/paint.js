// setup function
function setup() {
    createCanvas(600, 1000);
      
    background(255);
  }
    
  // draw function
  function draw() {
    // if i put background here, it would make the stroke dissappear, because it redraw the background every frame.
    // Not allowing us to see the trail of the stroke.
    //background(255);
    stroke(mouseX / 2, mouseY / 2, 150);
      strokeWeight(5);
      
    if (mouseIsPressed) {
      line(pmouseX, pmouseY, mouseX, mouseY);
    }
  }