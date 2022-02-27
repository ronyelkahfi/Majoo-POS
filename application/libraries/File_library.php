<?php 
/**
 * 
 */
class File_library
{
	
	function __construct()
	{
		
	}

	function scanDirDescTime($dir) {
	    $ignored = array('.', '..', '.svn', '.htaccess');

	    $files = array();    
	    foreach (scandir($dir) as $file) {
	        if (in_array($file, $ignored)) continue;
	        $files[$file] = filemtime($dir . '/' . $file);
	    }

	    asort($files);
	    $files = array_keys($files);

	    return ($files) ? $files : false;
	}

}