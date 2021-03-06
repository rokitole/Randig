<?


/* strip numbering*/
function strip_numbering($name){

	$result = substr(strstr($name, '.'), 1);
	return $result;

}


/*get numbering*/
function get_numbering($name){

	$result = strstr($name, '.', true);
	return $result;

}


/*resort names without leading zeros*/
function sort_names($names){

	/*separate numbers from names*/
	$numbers = array();
	$descriptions = array();

	foreach ($names as $name) {
		if(substr($name,0,1) != '.'){

			array_push($numbers, get_numbering($name));
			array_push($descriptions, strip_numbering($name));

		}
	}

	/*reorder numbers with names*/
	array_multisort($numbers, $descriptions);

	/*merge both*/
	$newnames = array();

	foreach ($numbers as $key => $number) {
		if(substr($number,0,1) != '.'){

			array_push($newnames, $number.'.'.$descriptions[$key]);

		}
	}

	/*return newnames*/
	return $newnames;

}


/*find the first subdirectory*/
function first_dir($dir){

	$dirs = array_diff(scandir('./'.$dir), array('..', '.'));
	foreach ($dirs as $first) {
		if(substr($first,0,1) != '.'){

			return $dir.'/'.$first;

		}
	}

}


/*get full directory name of page getter*/
function full_dirname($match){

	global $basedir;
	$dirs = array_diff(scandir($basedir), array('..', '.'));

	foreach ($dirs as $dir) {
		if (stripos(plain_name($dir), plain_name($match))){
			return $dir;
		}
	}
}


/*level encoding if different*/
function plain_name($input){

	$input = 		urlencode($input);
	$umlauts = 		array('%C3%A4','a%CC%88','%C3%B6','o%CC%88','%C3%BC','u%CC%88','%C3%84','A%CC%88','%C3%96','O%CC%88','%C3%9C','U%CC%88','%C3%9F','+');
	$non_umlauts = 	array('ae','ae','oe','oe','ue','ue','Ae','Ae','Oe','Oe','Ue','Ue','ss','-');
	return str_replace($umlauts, $non_umlauts, $input);

}


?>









