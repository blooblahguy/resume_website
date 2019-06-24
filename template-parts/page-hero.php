<? 
$id = get_the_ID();
if (get_the_archive_title()) {
	$slug = $_SERVER['REQUEST_URI'];
	$page = get_page_by_path($slug);
	if ($page) {
		$id = $page->ID;
	}
}
$title = get_field("alternate_title", $id);
if (! $title) {
	$title = get_the_title($id); 
}
$subtitle = get_field("subtitle", $id);
$hero = get_field("hero_image", $id);

if (get_post_type() == "projects") {
	$parent_link = false;
	$links = get_field("links");
	$tags = wp_get_post_tags(get_the_ID());

	// populate parent link
	if ($post->post_parent > 0 ) {
		$parent_link = array(
			"text" => "Back to ".get_the_title($post->post_parent),
			"link" => get_the_permalink($post->post_parent)
		);
	} else {
		$parent_link = array(
			"text" => "Back to ".get_the_title(37),
			"link" => get_the_permalink(37)
		);
	}

	// parse arrays into readable
	$tag_arr = array();
	foreach ($tags as $t) {
		$tag_arr[] = "<em>{$t->name}</em>";
	}
	$link_arr = array();
	foreach ($links as $l) {
		if (! $l['text']) { continue; }
		$link_arr[] = "<div class='os-min os-12'><a href='{$l['link']}' class='btn main btn-clear'>{$l['text']}</a></div>";
	}

	$additional = implode(" ", $link_arr);
	if ($parent_link) {
		$additional .= "<div class='text-center os-12'><a href='{$parent_link['link']}' class='btn-sm btn btn-clear'>{$parent_link['text']}</a></div>";
	}
	if (count($tag_arr)) {
		$additional .= "<div class='clear'></div><div class='os-12'><h2 class='marg0'>Tags: ".implode(", ", $tag_arr)."</h2></div>";
	}
}

//<img src=" the_field("hero"); " alt="$title;">
?>

<div class="hero_outer bg-black text-center md-pady4 pady2">
	<div class="hero container">
		<h1 class="page_title"><? echo $title; ?></h1>
		<? if ($subtitle) { ?>
			<h2 class="subtitle"><? echo $subtitle; ?></h2>
		<? } ?>
		<? if ($additional) { ?>
			<div class="row g1 content-center">
				<? echo $additional; ?>
			</div>
		<? } ?>
	</div>
	<? if ($hero) { ?>
		<img data-html2canvas-ignore data-src="<? echo $hero; ?>" class="lazyload" alt="<? echo $title; ?>">
	<? } ?>
</div>
