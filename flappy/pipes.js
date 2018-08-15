function Pipe() {
	this.top = random(height / 2);
	this.bottom = height - this.top - 150;
	this.x = width;
	this.w = 30;
	this.speed = 3;
	this.highlight = false;
	this.key = new Date().getTime();

	this.show = function() {
		fill(255);

		if(this.highlight) {
			fill(255, 0, 0);
		}

		rect(this.x, 0, this.w, this.top);
		rect(this.x, (height - this.bottom), this.w, this.bottom);
	}

	this.update = function() {
		this.x -= this.speed;
	}

	this.offScreen = function() {
		return this.x < -this.w;
	}

	this.hits = function(bird) {
		if(bird.y < this.top || bird.y > height - this.bottom) {
			if(bird.x > this.x && bird.x < this.x + this.w) {
				this.highlight = true;
				return true;
			}
		}
		this.highlight = false;
		return false;
	}

	this.crossed = function(bird) {
		return this.x + this.w < bird.x;
	}
}