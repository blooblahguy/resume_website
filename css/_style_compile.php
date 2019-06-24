<?php
	header('Content-Type: text/css');

	ini_set("display_errors", 1);
	error_reporting(E_ALL);

	// cached updating
	$update = false;
	$cache_mod = filemtime($out_file);
	if (! $cache_mod) {
		$fh = fopen($out_file, 'w');
	}
	$this_mod = filemtime(__FILE__);
	foreach ($sheets as $sheet) {
		if (filemtime($sheet) > $cache_mod || $this_mod > $cache_mod) {
			$update = true;
			break;
		}
	}

	use Leafo\ScssPhp\Compiler;
	if ($update) {
		require_once('../atlas_core/scssphp/scss.inc.php');

		error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

		$scss = new Compiler();
		$scss->setImportPaths('');

		ob_start();
		foreach($sheets as $s) {
			require_once($s);
		}
		$css_all = ob_get_contents();
		ob_end_clean();

		// 1 minified
		$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');
		$data = $scss->compile($css_all);
		file_put_contents($out_file, $data);
	}

	include($out_file);
?>