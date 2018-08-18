var grid = [];
var w = 30;
var current;
var rows;
var cols;
var stack = [];

function setup() {
	createCanvas(630, 630);
	frameRate(5);
	var rows = floor(width / w);
	var cols = floor(height / w); 
	for(var i = 0; i < rows; i++){
		for(var j = 0; j < cols; j++){
			grid.push(new Box(i, j));
		}
	}
	current = grid[0];
}

function draw() {
	background(51);
	
	for(var i = 0; i < grid.length; i++){
		grid[i].show();
	}

	current.visited = true;
	current.highlight();
	var next = current.checkNeighbours();
	if(next){
		next.visited = true;
		stack.push(current);
		removeBorders(current, next);
		current = next;
	}else if(stack.length){
		current = stack.pop();
	}
}

function removeBorders(a, b){
	if(a.i - b.i === 1){
		a.borders[3] = false;
		b.borders[1] = false;
	}else if(a.i - b.i === -1){
		a.borders[1] = false;
		b.borders[3] = false;
	}
	if(a.j - b.j === 1){
		a.borders[0] = false;
		b.borders[2] = false;
	}else if(a.j - b.j === -1){
		a.borders[2] = false;
		b.borders[0] = false;
	}
}

function index(i , j){
	var rows = floor(width / w);
	var cols = floor(height / w);

	if(i < 0 || j < 0 || i > cols-1 || j > rows-1)
		return -1;

	return j + i * rows;
}

function Box(i, j) {
	this.i = i;
	this.j = j;
	this.visited = false;
	this.borders = [true, true, true, true];

	this.highlight = function(){
		var x = this.i * w;
		var y = this.j * w;
		noStroke();
		fill(0, 0, 255, 100);
		rect(x, y, w, w);
	}

	this.show = function() {
		var i = this.i * w;
		var j = this.j * w;
		stroke(255);
		if(this.borders[0])
			line(i, j, i + w, j);
		if(this.borders[1])
			line(i + w, j, i + w, j + w);
		if(this.borders[2])
			line(i + w, j + w, i, j + w);
		if(this.borders[3])
			line(i, j + w, i, j);
		if(this.visited){
			noStroke();
			fill(155, 0, 200, 100);
			rect(i, j, w, w);
		}
	}

	this.checkNeighbours = function(){
		var neighbours = [];
		var top 	= grid[index(this.i, this.j-1)];
		var right 	= grid[index(this.i+1, this.j)];
		var bottom 	= grid[index(this.i, this.j+1)];
		var left 	= grid[index(this.i-1, this.j)];

		if(top && !top.visited)
			neighbours.push(top);
		if(right && !right.visited)
			neighbours.push(right);
		if(bottom && !bottom.visited)
			neighbours.push(bottom);
		if(left && !left.visited)
			neighbours.push(left);

		if(neighbours.length){
			var r = floor(random(0, neighbours.length));
			return neighbours[r];
		}else{
			return undefined;
		}
	}
}