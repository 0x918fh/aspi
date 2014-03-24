function createWall(coord){
	$('#createWall').modal('hide');
	var walls = coord.split("\n");
	var dir = 0;
	var curX = 0;
	var curY = 0;
	var xMin = 0;
	var xMax = 0;
	var yMin = 0;
	var yMax = 0;
	
	for (var key in walls){
		walls[key] *=1;
		if (dir == 1){
			curY += walls[key];
			if (curY > yMax)
				yMax = curY;
			if (curY < yMin)
				yMin = curY;
			dir = 0;
		}
		else{
			curX += walls[key];
			if (curX > xMax)
				xMax = curX;
			if (curX < xMin)
				xMin = curX;
			dir = 1;
		}
	}
	
	xMin *= -1;
	yMin *=-1;
	xMax += xMin+20;
	yMax += yMin+20;
	
	$('#svg_draw').empty();
	var draw = SVG('svg_draw');
	draw.viewbox(0, 0, xMax, yMax);
	draw.attr('preserveAspectRatio', 'none');
	draw.attr('height', (yMax*$('#svg_draw').width()/xMax)+'px');
	var hatch = draw.pattern(8, 8, function(add) {
		  add.line(0, 4, 4, 0).stroke({width: 0.5, color: 'gray'});
		  add.line(4, 8, 8, 4).stroke({width: 0.5, color: 'gray'});
		})
	draw.rect(xMax-4, yMax-4).x(2).y(2).stroke({width: 1, color: 'black'}).fill(hatch);
	dir = 0;
	curX = 10;
	curY = 10;
	var ca = '10,10 ';
	for (var key in walls){
		if (dir == 1){
			curY += walls[key];
			ca += curX+','+curY+' ';
			dir = 0;
		}
		else{
			curX += walls[key];
			ca += curX+','+curY+' ';
			dir = 1;
		}
	}
	draw.polygon(ca).stroke({width: 1, color: 'black'}).fill('white');
	
	var svgSrc = document.getElementById('svg').innerHTML;
	document.getElementById('roomEdit').value = "";
	document.getElementById('roomEdit').value = svgSrc;
}