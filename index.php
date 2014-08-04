<?php require_once('includes/init.php'); ?>

<!DOCTYPE html>

<head>
	<title>Branding Bible</title>

	<?php
		//Set Up Content

		//Collect Filenames
		$sections = Siren\BrandBible::collectTitles('sections','.md');

		//Get Filename => Content Pair
		$contentPair = Siren\BrandBible::collectContent();
		$cPKey = key($contentPair);

		//Use MarkdownExtra to generate HTML content
		use \Michelf\MarkdownExtra;
		$content = MarkdownExtra::defaultTransform($contentPair[$cPKey]);
	?>
</head>


<body>
	<?php
		use \Siren\BrandBible;
		
		//Create Navigation
		Siren\BrandBible::generateNav($sections);

		//Create Content
		Siren\BrandBible::generateContent($content);
	
	?>
</body>

</html>