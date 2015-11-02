<?php

$sage_includes = [
  'lib/assets.php',
  'lib/extras.php',
  'lib/setup.php',
  'lib/titles.php',
  'lib/post-types.php',
  'lib/wrapper.php'
];
function thePath(){
	echo "/wp-content/themes/m-restorator/";
}
function getPath(){
	return "/wp-content/themes/m-restorator/";
}
function distPath(){
	return "/wp-content/themes/m-restorator/dist/";
}
function includeSVG($svg){
    include get_template_directory()."/dist/images/svg/".$svg;
}

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
