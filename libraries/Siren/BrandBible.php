<?php

/*Add all the legal stuff sometime soon*/

namespace Siren;

class BrandBible {

	/*collectTitles*/
	public static function collectTitles($path,$ext) {

		$titleArray = array(); //Prepare final array

		$allFilenames = scandir($path); //Get All File Names

		foreach($allFilenames as $filename){
			//Add file name to array if of right extension
			if(preg_match('/'. $ext .'$/', $filename)){
				//Get clean version of title
				$cleanTitle = ucwords(str_replace($ext, '', str_replace('_',' ',preg_replace('/^[0-9]*/','', $filename))));

				//add as url => title pair
				$titleArray[$filename] = $cleanTitle;
			}
		}

		//Sort array alphabetically
		ksort($titleArray);

		return $titleArray;
	}

	/*generateNav*/
	public static function generateNav($fileArray) {

		echo '<nav id="nav" class="nav_container">';
			echo '<ul class="nav_list">';

				foreach($fileArray as $filename => $title){
					echo '<li class="nav_item">';
						echo '<a class="nav_link" href="index.php?section='.$filename.'">' . $title . '</a>';
					echo '</li>';
				}

			echo '</ul>';

		echo '</nav>';

	}

	/*collectContent*/
	public static function collectContent() {

		//Check filename
		if(isset($_GET['section'])){
			$filename = $_GET['section'];
		}
		else{
			$filename = '1_introduction.md';
		}

		//Get content
		$content = file_get_contents('sections/'.$filename);

		//Save as array
		$contentPair = array();
		$contentPair[$filename] = $content;

		return $contentPair;

	}

	/*generateContent*/
	public static function generateContent($content) {
		echo '<article>';
			echo $content;
		echo '</article>';
	}

}


?>