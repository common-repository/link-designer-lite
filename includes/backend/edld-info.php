<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>
<div class="edld-wrap edld-clear">
	<div class="edld-body-wrapper edld-add-bar-wrapper">
		<div class="edld-panel">
			<div class="edld-panel-head">
				<div class="edld-head-social-link">
					<span class="edld-header-close">X</span>
					<p class="edld-follow-us"><?php _e('Follow us for new updates','eight-degree-circular-menu');?></p>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

					<a href="https://twitter.com/8degreethemes" class="twitter-follow-button" data-show-count="false"></a>
					<div class="fb-like" data-href="https://www.facebook.com/8DegreeThemes" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>

				</div>
			</div>
			<div class="edld-panel-body">
				<div class="edld-backend-h-title"><?php _e('Link Designer Lite - Free Link Designer Plugin for WordPress','edld-plugin-pro');?></div>
				<div class="edld-use-content-wrap">
					<ul class="edld-tabs">
						<li class="tab-link edld-current" data-tab="edld-tab-2"><i class="dashicons dashicons-info"></i><?php _e( 'About', 'link-designer-lite' ); ?></li>
						<li class="tab-link" data-tab="edld-tab-1"><i class="dashicons dashicons-editor-help"></i><?php _e( 'How to use', 'link-designer-lite' ); ?></li>
						
					</ul>
					<div id="edld-tab-2" class="edld-tab-content edld-current">
						<?php include(EDLD_PLUGIN_PATH.'includes/backend/edld-about.php'); ?>
					</div>
					<div id="edld-tab-1" class="edld-tab-content">
						<?php include(EDLD_PLUGIN_PATH.'includes/backend/edld-how-to.php'); ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>