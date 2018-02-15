<?php $sidebarContent = ufandshands_sidebar_detector('site_footer',false); 
$opt_footer_widgets_visibility = of_get_option("opt_footer_widgets_visibility"); ?>
<footer role="contentinfo">
	<?php if ( ( $opt_footer_widgets_visibility === 'all_pages' ) || ( $opt_footer_widgets_visibility === 'homepage_only' && is_front_page() ) || ( $opt_footer_widgets_visibility === 'subpages_only' && !is_front_page() ) ) : ?>
		<?php if($sidebarContent) : ?>
			<div class="container append-bottom">
			
				<div id="footer_top" class="footer_count_<?php ufandshands_sidebar_detector('site_footer',false,true) ?>">
							
					<?php echo $sidebarContent; ?>
	        <div class="clear"></div>
				</div>
			</div>
		<?php endif ?>
	<?php endif ?>
	
	<div id="institutional-footer">
	  <div class="container"><span class="uf-monogram"></span>

		<div id="footer-links" class="span-24 black-25">
			
			<div class="footer_logo">
				<a href="http://www.ufl.edu/"><img src="<?php print(get_stylesheet_directory_uri()); ?>/images/uf_logo_full.png" alt="University of Florida" /></a>
			</div>
			
		  
			<ul> 
            	<li>Chemistry Department:</li>
                <li><a href="http://www.chem.ufl.edu/dept/index.shtml">Home</li>
				<li><a href="http://www.chem.ufl.edu/dept/index.shtml">About Chem</li></a>
				<li><a href="http://www.chem.ufl.edu/research/index.shtml?areas=faculty">Faculty &amp; Research</a></li>
				<li><a href="http://www.chem.ufl.edu/grad/index.shtml">Graduate</a></li>
				<li><a href="http://www.chem.ufl.edu/ugrad/index.shtml">Undergraduate</a></li>
				<li><a href="http://www.chem.ufl.edu/dept/contact.shtml">Contact</a></li>
			</ul>
			<ul>
				<li><a href="http://www.ufl.edu/disability/">Disability Services</a></li>
				<li><a href="http://privacy.ufl.edu/privacystatement.html">Privacy Policy</a></li>
				<li><a href="http://regulations.ufl.edu/">Regulations</a></li>
				<?php $intranet_url = of_get_option("opt_intranet_url"); if(!empty($intranet_url)) { echo "<li><strong><a href=\"".$intranet_url."\">Intranet</a></strong></li> ";} ?>
				<?php $webmaster_email = of_get_option("opt_webmaster_email"); 
				if( !empty($webmaster_email) && ufl_check_email_address($webmaster_email) ) { 
					echo "<li><a id=\"contact-webmaster\" href=\"mailto:".$webmaster_email."\">Contact Webmaster</a></li> ";
				} elseif ( !empty($webmaster_email) ) {
					echo "<li><a id=\"contact-webmaster\" href=\"".$webmaster_email."\">Contact Webmaster</a></li> ";
				} ?>
				<li><?php //Make a gift fund URL
					$makeagift_url = of_get_option("opt_makeagift_url");
					if (!empty($makeagift_url)) {
						echo "<a href='".$makeagift_url."'>";
					} else { 
						echo "<a href='https://www.uff.ufl.edu/OnlineGiving/Advanced.asp'>";
					}
				?>Make a Gift</a></li>
			</ul>
			<ul>
				<li>&copy; <?php echo date(Y); ?> <a href="http://www.ufl.edu/">University of Florida</a>, Gainesville, FL 32611; (352) 392-3261</li>
				<?php
					if ( is_home() ) {
						?> <li>Site Updated <?php ufl_site_last_updated(); ?></li> <?php
					} else {
						?> <li>Page Updated <?php the_modified_time('F j, Y'); ?></li> <?php
					}
				?>
			</ul>

			<p>This page uses <a href="http://www.google.com/analytics/">Google Analytics</a> (<a href="http://www.google.com/intl/en_ALL/privacypolicy.html">Google Privacy Policy</a>)</p>
			
		  </div><!-- end #footer-links -->
		</div><!-- end footer container -->
	</div><!-- end institutional footer container -->
</footer>
	
<?php 
//Custom JS
$custom_js = of_get_option('opt_custom_js');
if(!empty($custom_js)) {
	echo '<script type="text/javascript">' . $custom_js . '</script>'."\n";
}
?>
<!--[if lt IE 7 ]>
<script src="<?php bloginfo('template_url'); ?>/library/js/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg'); </script>
<![endif]-->
<?php wp_footer(); ?>
</body>
</html>
