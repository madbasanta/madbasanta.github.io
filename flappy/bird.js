function Bird() {
	this.y = height / 2;
	this.x = 150;
	this.hits = [];
	this.passed = [];

	this.show = function() {
		fill(255);
		ellipse(this.x, this.y, 30, 30);
	}

	this.gravity = 0.5;
	this.velocity = 0;

	this.update = function() {
		this.velocity += this.gravity;
		this.velocity *= 0.95;
		this.y += this.velocity;

		if(this.y > (height - 15)) {
			this.y = height - 15;
			this.velocity = 0;
		}
		if(this.y < 0) {
			this.y = 0;
			this.velocity = 0;
		}

	}

	this.lift = -15;

	this.up = function() {
		this.velocity += this.lift;
	}

	this.die = function(key) {
		if(this.hits.indexOf(key) < 0) {
			this.hits.push(key);
			let sd = document.getElementById("h2die");
			sd.children[0].textContent = this.hits.length;
			sd.style.color = "red";
			setTimeout(function() {
				sd.style.color = "#000";
			}, 400);
		}
	}

	this.pass = function(key) {
		if(this.hits.indexOf(key) < 0 && this.passed.indexOf(key) < 0) {
			this.passed.push(key);
			document.getElementById("score").textContent = 10 * this.passed.length;
			let ps = document.getElementById("h2pass");
			ps.children[0].textContent = this.passed.length;
			ps.style.color = "green";
			setTimeout(function() {
				ps.style.color = "#000";
			}, 400);
		}
	}
}