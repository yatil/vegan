<?php
header('Content-type: text/html; charset=utf-8');

require('markdown.php');

$legalExtensions = array('md', 'markdown');

$file = '..'.$_SERVER['SCRIPT_URL'];

if ($file=='../') {
  $file="../index.md";
}

if($file && in_array(strtolower(substr($file,strrpos($file,'.')+1)), $legalExtensions)) {
  $content = file($file);
  $title = str_replace('# ', '', $content[0]);
  $content = Markdown(file_get_contents($file));
} else {
	$content = "<h1>File not found</h1>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php print $title ?></title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,700,700italic' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php print $content;?>
</body>
</html>
