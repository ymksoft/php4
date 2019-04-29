<?php


function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	foreach ($variables as $key => $value) {
		if (!is_string($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
};

function createGalleryContent() {

	$arrImg = array_slice( scandir(IMG_DIR), 2 );

	$content = '<div>';

	foreach($arrImg as $imgFile) {
		$content.= '<a target=_blank href='.IMG_DIR.$imgFile.'><img class="smallimg" src='.IMG_DIR.$imgFile.'></a>';
	};
	$content .= '</div>';

	return $content;
};

