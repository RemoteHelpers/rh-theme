//Animated background color circles
var canvas = document.querySelector('canvas');

var canvasWidth = document.querySelector('.rh-single-product .rh-related').offsetWidth;
var canvasHeight = 846;

canvas.width = canvasWidth;
canvas.height = canvasHeight;

var c = canvas.getContext('2d');

colorArray = [
  '#ffff00b5',
  '#FFD740b5',
  '#FFAB40b5',
  '#FF6E40b5',
  '#64FFDAb5',
  '#69F0AEb5',
  '#B2FF59b5',
  '#7C4DFFb5',
  '#536DFEb5',
  '#40C4FFb5',
  '#18FFFFb5',
  '#FF5252b5',
  '#FF4081b5',
  '#E040FBb5',
]

window.addEventListener('resize', function() {
   canvasWidth = document.querySelector('.rh-single-product .rh-related').offsetWidth;
   canvas.width = canvasWidth; 
})

function Circle(x, y, dx, dy, radius) {
   this.x = x;
   this.y = y;
   this.dx = dx;
   this.dy = dy;
   this.radius = radius;
   this.color = colorArray[Math.floor(Math.random() * colorArray.length)];

   this.draw = function() {
     c.beginPath();
     c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
     
     var gradient = c.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.radius);
     gradient.addColorStop(0, this.color);
     gradient.addColorStop(1, "#fff0");
     c.fillStyle = gradient;
     c.fill();
   }
 
   this.update = function() {
      if(this.x + this.radius > canvasWidth || this.x - this.radius < 0) {
      this.dx = -this.dx;
      }
      if(this.y + this.radius > canvasHeight || this.y - this.radius < 0) {
      this.dy = -this.dy;
      }

      this.x += this.dx;
      this.y += this.dy;

      this.draw();
   }
 
 }
 
 var circleArray = [];
 
 for (var i = 0; i < 3; i++) {
   var radius = Math.random() * (200 - 120) + 120;
   var x = Math.random() * (canvasWidth - radius * 2) + radius;
   var y = Math.random() * (canvasHeight - radius * 2) + radius;
   var dx = (Math.random() - 0.5);
   var dy = (Math.random() - 0.5);
   circleArray.push(new Circle(x, y, dx, dy, radius));
 }
 
 function animate() {
   requestAnimationFrame(animate);
   c.clearRect(0, 0, innerWidth, canvasHeight);
   for (var i = 0; i < circleArray.length; i++) {
     circleArray[i].update();
   }
 }

 animate();