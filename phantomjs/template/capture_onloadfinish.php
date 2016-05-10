var page = require('webpage').create();
page.viewportSize = {width: <?php echo $width ?>, height: <?php echo $height ?>};
page.clipRect = <?php echo json_encode($clipoptions) ?>;
<?php if (isset($userAgent)) : ?>
page.settings.userAgent = '<?php echo $userAgent ?>';
<?php endif ?>
page.open('<?php echo $url ?>');
page.onLoadFinished = function() {
		window.setTimeout(function () {
		<?php if (isset($backgroundcolor)) : ?>
		page.evaluate(function() {
			document.body.bgColor = '<?php echo $backgroundcolor ?>';
		});
		<?php endif ?>

		page.render('<?php echo $imagelocation ?>');
	 }, 2000);
}