			</div>
		</main> <!-- /.content_outer -->
		<div class="footer_outer bg-black">
			<div class="footer container pad4 text-center muted small">
				&copy; <? echo Date("Y")." "; echo bloginfo("name"); ?> - All rights reserved
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src="//code.jquery.com/jquery-3.2.1.min.js"></script> -->

	<? wp_footer(); ?>
	
	<script>
		// let's just not use jquery if we don't need to
		// remove subdomain of current site's url and setup regex
		var internal = location.host.replace("www.", "");
		internal = new RegExp(internal, "i");
			
		var a = document.getElementsByTagName('a'); // then, grab every link on the page
		for (var i = 0; i < a.length; i++) {
			var href = a[i].host; // set the host of each link
			if( !internal.test(href) ) { // make sure the href doesn't contain current site's host
				a[i].setAttribute('target', '_blank'); // if it doesn't, set attributes
			}
		}

		// mobile menu toggle
		var buttons = document.querySelectorAll(".os_menu_button");
		for (var i = 0; i < buttons.length; i++) {
			var button = buttons[i];
			button.onclick = function () {
				var menu = document.querySelector('body') // Using a class instead, see note below.
				menu.classList.toggle('mobile_toggle');
				return false;
			}
		}
	</script>

	<script type="text/javascript" src="/js/lazysizes.min.js" sync></script>
	<link rel="stylesheet" href="/css/font.css" rel="preload" as="style"/>
	
	<script type="text/javascript" src="/js/html2canvas.min.js" async></script>
	<!-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js" async></script> -->
	<script>
		var screenshot = document.querySelector(".screenshot")
		screenshot.onclick = function() {
			var body = document.querySelector(".screenshot")
			// body.classList.add('plain');
			// , {
			// 	windowWidth: 820
			// }

			html2canvas(document.querySelector("#resume")).then(canvas => {
				var link = document.createElement('a');
				link.download = 'gladelynch-resume.png';
				link.href = canvas.toDataURL()
				link.click();

				 // only jpeg is supported by jsPDF
				// var imgData = canvas.toDataURL()
				// var imgData = canvas.toDataURL("image/jpeg", 1.0);
				// var pdf = new jsPDF();

				// pdf.addImage(imgData, 'JPEG', 0, 0);
				// pdf.save("download.pdf");
			});

			// body.classList.remove('plain');

			return false;
		}
	</script>
</body>
</html>