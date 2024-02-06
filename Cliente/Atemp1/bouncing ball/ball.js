let canvas;

let ball;

let xSpeed = 2;

let ySpeed = 2;

let bgColor;
let ballColor;

let started = false;

function setup() {

  canvas = createCanvas(windowWidth, windowHeight);

  ball = new Ball(width / 2, height / 2, 20);

  bgColor = randomColor();

  ballColor = randomColor();

}

function draw() {

  background(bgColor);

  ball.draw();

  ball.move();

}

class Ball {

  constructor(x, y, r) {

    this.x = x;

    this.y = y;

    this.r = r;

  }

  draw() {

    fill(ballColor);

    ellipse(this.x, this.y, this.r, this.r);

  }

  move() {

    this.x += xSpeed;

    this.y += ySpeed;

    // Check if the ball has hit the edge of the canvas

    if (this.x + this.r / 2 > width || this.x - this.r / 2 < 0) {

      xSpeed *= -1;

      this.changeColor();

      changeBgColor();

    }

    if (this.y + this.r / 2 > height || this.y - this.r / 2 < 0) {

      ySpeed *= -1;

      this.changeColor();

      changeBgColor();

    }

  }

  changeColor() {

    while (true) {

      ballColor = randomColor();

      if (ballColor != bgColor) {

        break;

      }

    }

  }

}

function changeBgColor() {

  while (true) {

    bgColor = randomColor();

    if (bgColor != ballColor) {

      break;

    }

  }

}

function randomColor() {

  const r = random(255);

  const g = random(255);

  const b = random(255);

  return color(r, g, b);

}