var bird;
var pipes = [];
var hits = [];
var pass = 0;
function setup() {
	createCanvas(800, 600);
	bird = new Bird();
	pipes.push(new Pipe());
}

function draw() {
	background(0);

	for(var i = pipes.length - 1; i >= 0; i--) {
		pipes[i].show();
		pipes[i].update();

		if(pipes[i].hits(bird)) {
			bird.die(pipes[i].key);
		}
		if(pipes[i].crossed(bird)) {
			bird.pass(pipes[i].key);
		}
		// console.log(hits);
		if(pipes[i].offScreen()) {
			pipes.splice(i, 1);
		}
	}

	bird.show();
	bird.update();

	if(frameCount % 100 == 0) {
		pipes.push(new Pipe());
	}

	// console.log(pipes.length);
}

function keyPressed() {
	if(key == " ") {
		bird.up();
	}
}