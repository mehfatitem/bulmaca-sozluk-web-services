<?php 
	libxml_use_internal_errors(true);	
	error_reporting(0);

	function returnCentences($begin , $end){
	    $returnString = "";
		for($i=$begin;$i<=$end;$i++){
			$url = "http://www.bulmacasozlugu.net/liste/sayfa/$i/";
			$htmlContent = file_get_contents($url);
			$dom = new DOMDocument();
			$dom->loadHTML($htmlContent);

			$xp  = new DOMXpath($dom);

			$classes = $xp->query('//ul[@class="nav nav-pills nav-stacked"]/li');

			$class_info = array();
			foreach($classes as $class) {
		    	$class_info[] = $class->nodeValue;
		    	if(!strpos($class->nodeValue , "(adsbygoogle = window.adsbygoogle || []).push({});" ))
		   			$returnString .= $class->nodeValue."</br>";
			}
		}
		echo $returnString;
	} 

	function returnWords($keyWord){
		$returnString = "";
		$url = "http://www.bulmacasozlugu.net/Goster/".urlencode($keyWord);
		$className = "goster";
		$htmlContent = file_get_contents($url);
		$dom = new DOMDocument();
		$dom->loadHTML($htmlContent);

		$xp  = new DOMXpath($dom);

		$classes = $xp->query("//*[contains(@class, '$className')]");

		$class_info = array();
		foreach($classes as $class) {
            $returnString .= $class->nodeValue;
		}
		return str_replace($keyWord, "", $returnString);
	}

	function returnQuestion(){
		if (($handle = fopen("sorular.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $num = count($data);
		        for ($c=0; $c < $num; $c++) {
		            echo substr($data[$c], 0 , strlen($data[$c])-1)."<0>";
		        }
		    }
		    fclose($handle);
		}
	}

	function replaceSpace($string){
	   $string = preg_replace("/\s+/", ",", $string);
	   $string = trim($string);
	   return $string;
	}

?>