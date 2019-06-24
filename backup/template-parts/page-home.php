
<div class="forest">
	<div class="introtext">
		<h1>Hello, I'm Glade</h1>
		<h2>I'm a senior developer with a passion for systems.</h2>
	</div>
	<div class="sun">
		<div class="ray_box">
			<div class="ray ray1"></div>
			<div class="ray ray2"></div>
			<div class="ray ray3"></div>
			<div class="ray ray4"></div>
			<div class="ray ray5"></div>
			<div class="ray ray6"></div>
			<div class="ray ray7"></div>
			<div class="ray ray8"></div>
			<div class="ray ray9"></div>
			<div class="ray ray10"></div>
		</div>
	</div>
	<img src="/img/forest_1.svg" alt="" class="p1">
	<img src="/img/forest_2.svg" alt="" class="p2">
	<img src="/img/forest_3.svg" alt="" class="p3">
	<img src="/img/forest_4.svg" alt="" class="p4">
	<img src="/img/forest_5.svg" alt="" class="p5">
	<img src="/img/forest_6.svg" alt="" class="p6">
</div>
<div class="clear"></div>

<div class="container">
	<div class="row g2 padlr4" style="margin-top: -360px; position: relative; z-index: 10000;">
		<div class="os-md-4 os-sm-12">
			<div class="bg-primary">
				<div class="me_intro text-center pad2 relative">
					<div class="image"><img src="/img/me.jpg" alt="Glade Lynch"></div>
					<h1 class="name">Glade Lynch</h1>
				</div>
			</div>
			<div class="pad2 bg-white">
				<h2><i>account_circle</i>Personal Information</h2>
				<div class="row">
					<div class="info os-6">
						<label for="">Age</label>
						<strong><?php echo Date("Y") - Date("Y", strtotime("July 1990")); ?></strong>
					</div>
					<div class="info os-6">
						<label for="">Email</label>
						<strong><a href="mailto:gladelynch@gmail.com" target="_blank">gladelynch@gmail.com</a></strong>
					</div>
				</div>
				<div class="info">
					<label for="">Related Links</label>
					<a href="https://github.com/blooblahguy" target="_blank">GitHub</a>
					<a href="https://wow.curseforge.com/members/Blooblahguy/projects" target="_blank">Curseforge</a>
					<a href="https://discord.gg/2SK3bEw" target="_blank">Discord</a>
				</div>
				<div class="info">
					<a href="https://www.linkedin.com/in/gladel/" target="_blank" class="btn btn-primary block"><img src="/img/linkedin.png" alt="">LinkedIn Profile <span>/in/gladel/</span></a>
				</div>
				<div class="info">
					<h2><i>code</i>Languages <em>Scored out of 10 years</em></h2>
					<?
					$languages = array();
					$languages[] = array(
						"name" => "LUA"
						, "since" => 2004
						, "note" => "First language"
					);
					$languages[] = array(
						"name" => "HTML/5 || CSS/3"
						, "since" => 2005
						, "note" => ""
					);
					$languages[] = array(
						"name" => "PHP"
						, "since" => 2006
						, "note" => ""
					);
					$languages[] = array(
						"name" => "MySQL"
						, "since" => 2006
						, "note" => ""
					);
					$languages[] = array(
						"name" => "Javascript"
						, "since" => 2007
						, "note" => "*"
					);
					$languages[] = array(
						"name" => "C#"
						, "since" => 2014
						, "note" => ""
					);
					$languages[] = array(
						"name" => "Python"
						, "since" => 2015
						, "note" => ""
					);

					foreach ($languages as $lang) { 
						$years = (int) Date("Y") - Date("Y", strtotime("{$lang['since']}-01-01"));
						$index = 0;
						?>
						<div class="language">
							<h4><? echo $lang['name']; ?>: <span><?php echo $years ?> Years</span> <em><? echo $lang['note']; ?></em></h4>
							<div class="progress row">
								<? for ($i = 1; $i <= 10; $i++) { ++$index; 
									$label = $i; 
									if ($i == 10) {$label = "9_plus"; }?>
									<span class="os<? if ($index <= $years) {echo " active"; }?>"><i>filter_<? echo $label; ?></i></span>
								<? } ?>
							</div>
						</div>
					<? } ?>
				</div>
				<div class="info">
					<h2><i>category</i>Other Skills</h2>

					<? $others = array();
					$others[] = array(
						"name" => "SEO"
						, "since" => 2009
						, "note" => ""
					);
					$others[] = array(
						"name" => "Video Editing"
						, "since" => 2010
						, "note" => "Premier & After Effects"
					);
					$others[] = array(
						"name" => "Web Design"
						, "since" => 2011
						, "note" => "Photoshop, Illustrator, XD"
					);
					$others[] = array(
						"name" => "Apache Sysadmin"
						, "since" => 2012
						, "note" => ""
					);
					foreach ($others as $skill) { 
						$years = (int) Date("Y") - Date("Y", strtotime("{$skill['since']}-01-01"));
						$index = 0;
						?>
						<div class="language">
							<h4><? echo $skill['name']; ?>: <span><?php echo $years ?> Years</span> <em><? echo $skill['note']; ?></em></h4>
							<div class="progress row">
								<? for ($i = 1; $i <= 10; $i++) { ++$index; 
									$label = $i; 
									if ($i == 10) {$label = "9_plus"; }?>
									<span class="os<? if ($index <= $years) {echo " active"; }?>"><i>filter_<? echo $label; ?></i></span>
								<? } ?>
							</div>
						</div>
					<? } ?>
				</div>
				<div class="info">
					<h2><i>assistant_photo</i>Libraries & Platforms</h2>
					<? $platforms = array();
					$platforms[] = "Wordpress";
					$platforms[] = "Custom anything";
					$platforms[] = "Woocommerce";
					$platforms[] = "Shopify";
					$platforms[] = "AWS Cloud";
					$platforms[] = "Google Cloud";
					$platforms[] = "Analytics";
					// $platforms[] = 
					
					echo implode($platforms, ", ");
					echo "<br><br>* jQuery, vue.js, node.js, angular.js, typescript";
					// foreach ($platforms as $plat) { ?>
						
					<? // } ?>
				</div>
			</div>
		</div>
		<div class="os-md-8 os-sm-12 rightside">
			<div class="bg-white pad2">
				<div class="about_me padb2">
					<h2><i>person_pin</i>About Me</h2>
					<p>I started programming in Lua at age 14 and have made my career from being a self starter. I’ve always been comfortable taking on new challenges, and I strive to solve problems with permanent and scalable systems. Otherwise I’m a serial hobbyist, and am constantly learning new things on the side.</p>
					<? //the_field("about_me"); ?>
				</div>
				<div class="professional_experience padb2">
					<h2><i>work</i>Experience</h2>
					<?
					$experience = array();
					$experience[] = array(
						"company" => "Clay Pot Creative"
						, "title" => "Senior Web Developer"
						, "from" => "2017-04-01"
						, "to" => false
						, "skills" => "PHP, MySQL, HTML/CSS, Javascript"
						, "responsibilities" => array(
							"Lead developer for all new website and client services"
							, "Strategic advisor for new business and technology"
							, "Worked closely and often independently with clients to keep projects on track"
							, "Built internal tools and solutions to unique company processes"
							, "Layed out git process and framework for all future development projects"
						)
					);
					$experience[] = array(
						"company" => "Enventive Engineering"
						, "title" => "System Admin"
						, "from" => "2015-12-01"
						, "to" => "2017-03-01"
						, "skills" => ""
						, "responsibilities" => array(
							"Created initial structure and deployment process for new product development"
							, "Worked closely and often independently with clients to keep projects on track"
							, "Built internal tools and solutions to unique company processes"
							, "Layed out git process and framework for all future development projects"
						)
					);
					$experience[] = array(
						"company" => "Product of Caffeine"
						, "title" => "Founder & Devevloper"
						, "from" => "2011-09-01"
						, "to" => "2016-09-01"
						, "skills" => ""
						, "responsibilities" => array(
							"Created initial structure and deployment process for new product development"
							, "Worked closely and often independently with clients to keep projects on track"
							, "Built internal tools and solutions to unique company processes"
							, "Layed out git process and framework for all future development projects"
						)
					);
					foreach ($experience as $job) { ?>
						<div class="experience">
							<h5 class="to"><? if ($job['to']) {echo Date("F Y", strtotime($job['to'])); } else {echo "Present";} ?></h5>
							<h3><? echo $job['company']; ?></h3>
							<h4><? echo $job['title']; ?> <em><? echo $job['skills']; ?></em></h4>
							<ul class="duties">
								<? foreach ($job['responsibilities'] as $resp) { ?>
									<li><i>check</i><? echo $resp; ?></li>
								<? } ?>
							</ul>
							<h5 class="from"><? echo Date("F Y", strtotime($job['from'])); ?></h5>
						</div>
					<? } ?>
				</div>
				<div class="references padb2">
					<h2><i>star</i>References</h2>
					<?
					$references = array();
					$references[] = array(
						"name" => "Yevgen Reztsov"
						, "company" => "Intuit"
						, "title" => "Principle Engineer"
						, "phone" => "310-707-3921"
						, "note" => ""
					);
					$references[] = array(
						"name" => "Taylor Devnich"
						, "company" => "Honeywell Aerospace"
						, "title" => "Systems Engineer"
						, "phone" => "623-694-6146"
						, "note" => ""
					);
					$references[] = array(
						"name" => "Tyler Marcellus"
						, "company" => "Freelance"
						, "title" => "Designer/Motion Graphics"
						, "phone" => "587-988-3922"
						, "note" => ""
					);
					?>

					<div class="row g2">
						<? foreach ($references as $ref) { ?>
							<div class="os-md-6 os-sm-12">
								<div class="reference">
									<h3><? echo $ref['name']; ?></h3>
									<h4><? echo $ref['company']; ?></h4>
									<h5><? echo $ref['title']; ?> <span><? echo $ref['phone']; ?></span></h5>
								</div>
							</div>
						<? } ?>
					</div>
				</div>
				<div class="projects padb2">
					<h2><i>public</i>Projects</h2>
					<?
					$projects = array();
					$projects[] = array(
						"name" => ""
						, "name" => ""
					);
					?>
				</div>
				<div class="leisure padb2">
					<h2><i>directions_bike</i>Leisure</h2>
				</div>
			</div>
		</div>
	</div>
</div>

<? //get_template_part("template-parts/content", "mega"); ?>