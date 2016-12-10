$(function(){

	setBG();
});

function setBG() {
	
	var orig = new Image();
	$(orig).on('load', function(){
		makeRepeatable(orig, function(left){
			var rightTop = new Image();
			$(rightTop).on('load', function(){
				makeRepeatable(rightTop, function(right){
					var bg = 'url('+left+'), url('+right+')';
					$('body').css('background-image', bg);
				});
			});
			rightTop.src = getDataUri(orig, 'horizontal');
		});
	});
	orig.src = '../static/img/bg.png';
}

function makeRepeatable(img, callback) {
	var top = img;
	var bottom = new Image();
	$(bottom).on('load', function(){
		var canvas = document.createElement('canvas');
		var context = canvas.getContext('2d');
		canvas.width = img.naturalWidth;
		canvas.height = img.naturalHeight * 2;
		context.drawImage(top, 0, 0);
		context.drawImage(bottom, 0, img.naturalHeight);
		callback(canvas.toDataURL('image/png'));
	});
	bottom.src = getDataUri(img, 'vertical');
}

function getDataUri(img, flip) {

	var canvas = getCanvas(img);
	var context = canvas.getContext('2d');
	var width = img.naturalWidth;
	var height = img.naturalHeight;

	if(flip === 'horizontal') {
		context.scale(-1, 1);
		width *= -1;
	}

	else if(flip === 'vertical') {
		context.scale(1, -1);
		height *= -1;
	}
	
	context.drawImage(img, 0, 0, width, height);
	return canvas.toDataURL('image/png');
}

function getCanvas(img) {
	var canvas = document.createElement('canvas');
	canvas.width = img.naturalWidth;
	canvas.height = img.naturalHeight;
	return canvas;
}
