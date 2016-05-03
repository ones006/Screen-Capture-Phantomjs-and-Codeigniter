<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Phantom JS &  CodeIgniter</title>
<style type="text/css">
body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}
a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}
h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}
code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}
</style>
</head>
<body>

<h1>Welcome to the PhantomJS PDF/Image Generator Wrapper and CodeIgniter Tutorial!</h1>

<p>Check core_path/content/output.pdf for the generated output. The pdf gets generated auto when loading this controller.</p>

<p><strong>PDF Generation Status:</strong> <?php echo $generationStatus; ?></p>
<p><strong>Note:</strong> If the PDF Generation fails, there can be multiple reasons, what I found out is that while installing and building PhantomJS, my permissions were all messed up so I had to set the permissions right. </p>
</body>
</html>