var page = require('webpage').create();
if (phantom.args.length < 2 || phantom.args.length > 3) {
    console.log('Usage: capture.js URL filename');
    phantom.exit();
} else {
    address = phantom.args[0];
    output = phantom.args[1];
    page.viewportSize = { width: 1024, height: 768 };
	page.clipRect = { top: 0, left: 0, width: 1024, height: 768 };
	page.open(address, function(status) {
		if (status !== 'success') {
            console.log('Unable to load the address!');
        } else {
        	window.setTimeout(function () {
			  page.render(output);
			  phantom.exit();
        	}, 200);
		}
	});
}