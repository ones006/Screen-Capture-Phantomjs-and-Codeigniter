var page = require('webpage').create();
page.viewportSize = {width: 1366, height: 768};
page.clipRect = {"width":1366,"height":768,"top":0,"left":0};
page.open('http://phantomjs.org/screen-capture.html', function () {
	/* This will set the page background color white */
		page.evaluate(function() {
		document.body.bgColor = '#FFFFFF';
	});
	
	page.render('D:\\private\\ci-phantomjs\\phantomjs/screencapture\\2016May03-worksaurus.png');
	phantom.exit();
});