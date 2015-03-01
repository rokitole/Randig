<?php

/*handle file contents*/
foreach ($files as $file) {

	/*skip .ds store*/
	if(substr($file,0,1) != '.'){

		/*get filetype*/
		$type = pathinfo($file, PATHINFO_EXTENSION);
		switch ($type){

			case 'txt':

				/*get text data*/
				$filename = $content.'/'.$file;
				$file_open = fopen($filename, 'r');
				$text = fread($file_open,filesize($filename));
				fclose($file_open);

				/*print*/
				echo $text;

				break;

			/*handle errors*/
			default:
				error(no_files_matched);
				break;

		}

	}

}

?>