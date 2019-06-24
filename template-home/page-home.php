<div id="resume">
<? get_template_part("template-parts/page", "hero"); ?>
<? $fields = get_fields(); ?>

<? 
// ========================================================
// Introduction
// ========================================================
?>
<div class="section">
	<div class="container">
		<? the_content(); ?>
	</div>
</div>


<?
// ========================================================
// Languages
// ========================================================
?>
<div class="section bg-light-grey">
	<div class="container">
		<h2>Primary Languages</h2>
		<div class="intro"><? echo $fields['language_introduction']; ?></div>
		<div class="row content-center">
			<? 
			usort($fields['languages'], function($a, $b) {
				return $a['since'] <=> $b['since'];
			});
			foreach ($fields['languages'] as $lang) { 
				$years = (int) Date("Y") - Date("Y", strtotime($lang['since']."-01-01"));
				$index = 0;
				?>
				<div class="os-md-6 os-lg-4 os-12">
					<div class="row content-middle content-center language">
						<div class="os-12">
							<h4><? echo $lang['name']; ?>: <span><?php echo $years ?> Years</span></h4>
							<? if ($lang['note']) { ?>
								<div class="note small em"><? echo $lang['note']; ?></div>
							<? } ?>
						</div>
						<div class="os-min padb2">
							<div class="progress row">
								<? for ($i = 1; $i <= 5; $i++) { ++$index; 
									$label = $i*2; 
									if ($i == 5) {$label = "9_plus"; }?>
									<span class="os<? if (($index*2) <= $years) {echo " active"; }?>"><i>filter_<? echo $label; ?></i></span>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			<? } ?>
		</div>
	</div>
</div>


<?
// ========================================================
// Jobs
// ========================================================
?>
<div class="section">
	<div class="container">
		<h2>Experience</h2>
		<div class="intro"><? echo $fields['job_introduction']; ?></div>
		<? foreach ($fields['jobs'] as $job) {
			?>
			<div class="experience">
				<h3><? echo $job['company']; ?></h3>
				<h4><? echo $job['title']; ?></h4>
				<h5><? echo $job['skills']; ?></h5>
				<ul class="duties">
					<? foreach ($job['responsibilities'] as $resp) { ?>
						<li><i>check_circle_outline</i><? echo $resp['text']; ?></li>
					<? } ?>
				</ul>
				<h5 class="to"><? if ($job['date_ended']) {echo Date("M Y", strtotime($job['date_ended'])); } else {echo "Present";} ?></h5>
				<h5 class="from"><? echo Date("M Y", strtotime($job['date_started'])); ?></h5>
			</div>
		<? } ?>
	</div>
</div>


<? 
// ========================================================
// Other Skills, Libraries & Platforms
// ========================================================
?>
<div class="section bg-light-grey">
	<div class="container">
		<h2>Other Skills & Platforms</h2>
		<div class="intro"><? echo $fields['skills_introduction']; ?></div>
		<?
		$other = array_merge($fields['libraries_&_platforms'], $fields['other_skills']);
		usort($other, function($a, $b) {
			return $a['since'] <=> $b['since'];
		});
		?>

		<div class="row content-center">
			<? foreach ($other as $lang) { 
				$years = (int) Date("Y") - Date("Y", strtotime($lang['since']."-01-01"));
				$index = 0;
				?>
				<div class="os-md-6 os-lg-4 os-12">
					<div class="row text-center content-middle content-center language">
						<div class="os-12">
							<h4><? echo $lang['name']; ?>: <span><?php echo $years ?> Years</span></h4>
							<? if ($lang['note']) { ?>
								<div class="note small em"><? echo $lang['note']; ?></div>
							<? } ?>
						</div>
						<div class="os-min padb2">
							<div class="progress row">
								<? for ($i = 1; $i <= 5; $i++) { ++$index; 
									$label = $i;
									if ($i == 5) {$label = "5"; }?>
									<span class="os<? if ($index <= $years) {echo " active"; }?>"><i>filter_<? echo $label; ?></i></span>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			<? } ?>
		</div>
	</div>
</div>


<? 
// ========================================================
// References
// ========================================================
?>
<div class="section">
	<div class="container">
		<h2>References</h2>
		<div class="intro"><? echo $fields['references_introduction']; ?></div>
		<div class="row g1 content-center">
			<? foreach ($fields['references'] as $ref) { ?>
				<div class="os-md-6 os-12">
					<div class="reference">
						<h3><? echo $ref['name']; ?></h3>
						<h4><? echo $ref['company']; ?></h4>
						<h5><? echo $ref['title']; ?></h5>
						<h6><a href="tel:<? echo $ref['phone']; ?>"><? echo $ref['phone']; ?></a></h6>
					</div>
				</div>
			<? } ?>
		</div>
	</div>
</div>
</div>

<div class="text-center">
	<hr>
	<a href="/contact" class="btn-secondary">Contact Me</a>
	<a href="/projects" class="btn-primary">View Projects</a>
	<br class="clear">
	<br class="clear">
	<div id="screenshot" class="btn-black screenshot">Download Resume </div>
</div>

