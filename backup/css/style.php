<?php
	header('Content-Type: text/css');


	$sheets = array();
	$sheets[] = "_variables.scss";
	$sheets[] = "openskull/_defaults.scss";
	$sheets[] = "openskull/_reset.scss";
	$sheets[] = "openskull/_colors.scss";
	$sheets[] = "openskull/_buttons.scss";
	$sheets[] = "openskull/_typography.scss";
	$sheets[] = "openskull/_helpers.scss";
	$sheets[] = "openskull/_borders.scss";
	$sheets[] = "openskull/_forms.scss";
	$sheets[] = "openskull/_ui.scss";
	$sheets[] = "openskull/_grid.scss";
	$sheets[] = "style.scss";

	// cached updating
	$update = false;
	$cache_mod = filemtime("openskull.min.css");
	$this_mod = filemtime(__FILE__);
	foreach ($sheets as $sheet) {
		if (filemtime($sheet) > $cache_mod || $this_mod > $cache_mod) {
			$update = true;
			break;
		}
	}

	use Leafo\ScssPhp\Compiler;
	if ($update) {
		require_once 'scssphp/scss.inc.php';

		error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

		$scss = new Compiler();
		$scss->setImportPaths('');

		// 1 non-minified for reference
		$scss->setFormatter('Leafo\ScssPhp\Formatter\Expanded');
		$data = $scss->compile("@import \"".ltrim(implode("\";\n@import \"",$sheets),"\";\n")."\";");
		file_put_contents("openskull.css", $data);

		// 1 minified
		$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');
		$data = $scss->compile("@import \"".ltrim(implode("\";\n@import \"",$sheets),"\";\n")."\";");
		file_put_contents("openskull.min.css", $data);
	}

	include("openskull.min.css");
?>