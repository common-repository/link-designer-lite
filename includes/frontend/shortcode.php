<?php 
defined('ABSPATH') or die('No script kiddies please!!');
//$this->print_array($shortcode_attr);

$edld_shortcode_attr = shortcode_atts( 
	array(
		'id'=>'',
		'text' => '',
		'template' => 'edld_label_template_1',
		'url'	 => '',
		'target'	 => '_blank',
		'download'=>'false',
		'link_color'=>'',
		'link_active_color'=>'',
		'link_hover_color'=>'',
		'link_background_color'=>'',
		'active_background_color'=>'',
		'hover_background_color'=>'',
		'font_family'=>'',
		'font_subset'=>'',
		'font_weight'=>'',
		'font_size'=>'',
		'text_transform'=>'',
		'text_align'=>'',
		'display'=>'',
		'no_follow' =>''
		), $shortcode_attr );

	$edld_id = $shortcode_attr['id'];
	$edld_text = $shortcode_attr['text'];
	$edld_template = $shortcode_attr['template'];
	$edld_url = $shortcode_attr['url'];
	$edld_target = $shortcode_attr['target'];
	$edld_download = $shortcode_attr['download'];
	$edld_link_color = $shortcode_attr['link_color'];
	$edld_link_active_color = $shortcode_attr['link_active_color'];
	$edld_link_hover_color = $shortcode_attr['link_hover_color'];
	$edld_link_background_color = $shortcode_attr['link_background_color'];
	$edld_active_background_color = $shortcode_attr['active_background_color'];
	$edld_hover_background_color = $shortcode_attr['hover_background_color'];
	$edld_font_family = $shortcode_attr['font_family'];
	$edld_font_subset = $shortcode_attr['font_subset'];
	$edld_font_weight = $shortcode_attr['font_weight'];
	$edld_font_size = $shortcode_attr['font_size'];
	$edld_text_transform = $shortcode_attr['text_transform'];
	$edld_text_align = $shortcode_attr['text_align'];
	$edld_display = $shortcode_attr['display'];
	$edld_no_follow = $shortcode_attr['no_follow'];

	$edld_download = '';
	if($shortcode_attr['download'] != 'false'){
		$edld_download = 'download';
	}

	$module='';
	if( $edld_template == 'edld_label_template_1' || $edld_template == 'edld_label_template_2' || $edld_template == 'edld_label_template_4' || $edld_template == 'edld_label_template_5'  || $edld_template == 'edld_label_template_8' || $edld_template == 'edld_label_template_9' || $edld_template == 'edld_label_template_10' || $edld_template == 'edld_label_template_11' || $edld_template == 'edld_label_template_12'){
		$module = 'edld_anchor_text';
	}elseif($edld_template == 'edld_label_template_3' || $edld_template == 'edld_label_template_6'){
		$module = 'edld_anchor_span';
	}elseif( $edld_template == 'edld_label_template_7'){
		$module = 'edld_anchor_data';
	}else{
		$module = 'edld_anchor_span_data';
	}

	switch ($module) {
		case 'edld_anchor_text':
		?>
		<div class="<?php esc_attr_e($edld_id);?> edld-link-wrapper <?php esc_attr_e($edld_template);?>">
			<a 
			href="<?php esc_attr_e($edld_url);?>" 
			target="<?php esc_attr_e($edld_target);?>"  
			class="edld-link"
			<?php esc_attr_e($edld_download);?>
			<?php if($edld_no_follow === 'true') _e(' rel="nofollow" ');?>
			>
				<?php _e($edld_text);?>
			</a>
		</div>
		<?php
		break;
		case 'edld_anchor_span':
		?>
		<div class="<?php esc_attr_e($edld_id);?> edld-link-wrapper <?php esc_attr_e($edld_template);?>">
			<a 
				href="<?php esc_attr_e($edld_url);?>" 
				target="<?php esc_attr_e($edld_target);?>" 
				class="edld-link" 
				<?php esc_attr_e($edld_download);?>
				<?php if($edld_no_follow === 'true') _e(' rel="nofollow" ');?>
			>
				<span 
					class="edld-span" 
					data-hover="<?php esc_attr_e($edld_text);?>"
				>
					<?php _e($edld_text);?>
				</span>
			</a>
		</div>
		<?php	
		break;
		case 'edld_anchor_span':
		?>
		<div class="<?php esc_attr_e($edld_id);?> edld-link-wrapper <?php esc_attr_e($edld_template);?>">
			<a 
				href="<?php esc_attr_e($edld_url);?>" 
				target="<?php esc_attr_e($edld_target);?>" 
				data-hover="<?php esc_attr_e($edld_text);?>" 
				class="edld-link" 
				<?php esc_attr_e($edld_download);?>
				<?php if($edld_no_follow === 'true') _e(' rel="nofollow" ');?>
			>
				<span 
					class="edld-span"
				>
					<?php _e($edld_text);?>
				</span>
			</a>
		</div>
		<?php	
		break;
		default:
		?>
		<div class="<?php esc_attr_e($edld_id);?> edld-link-wrapper <?php esc_attr_e($edld_template);?>">
			<a 
				href="<?php esc_attr_e($edld_url);?>" 
				class="edld-link" 
				data-hover="<?php esc_attr_e($edld_text);?>" 
				target="<?php esc_attr_e($edld_target);?>" 
				<?php esc_attr_e($edld_download);?>
				<?php if($edld_no_follow === 'true') _e(' rel="nofollow" ');?>
			>
				<?php _e($edld_text);?>
			</a>
		</div>
		<?php
		break;
	}


	
	?>
	<!-- Link Designer Lite Dynamic CSS -->
	<style type="text/css">
		<?php 
			if(!empty($edld_id)){
				if(!empty($edld_display)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper
						{
							display: <?php _e($edld_display);?>;
							text-align: <?php _e($edld_text_align);?>;
						}	
					<?php
				}
				if(!empty($edld_font_family) && !empty($edld_font_subset) && !empty($edld_font_weight)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a
						{
							font-family: '<?php _e($edld_font_family);?>', <?php _e($edld_font_subset);?>;
							font-weight: <?php _e($edld_font_weight);?>;
						}	
					<?php
				}
				if(!empty($edld_font_size)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a
						{
							font-size: <?php _e($edld_font_size.'px');?>;
						}	
					<?php
				}
				if(!empty($edld_text_transform)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a
						{
							text-transform: <?php _e($edld_text_transform);?>;
						}	
					<?php
				}

				if(!empty($edld_link_color)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a span

						{
							color: <?php _e($edld_link_color);?>;
						}	
					<?php
				}
				if(!empty($edld_link_hover_color)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a:hover,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a:hover span:before,
						.<?php _e($edld_id);?>.edld-link-wrapper a:hover:before,
						.<?php _e($edld_id);?>.edld-link-wrapper a:hover:after,
                        .<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a span:before,
                        .<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a:before
                        {
							color: <?php _e($edld_link_hover_color);?>;
						}	
					<?php
				}
				if(!empty($edld_link_active_color)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a:active,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a:active span:before{
							color: <?php _e($edld_link_active_color);?>;
						}	
					<?php
				}
				if(!empty($edld_link_background_color)){
					?>
						.<?php _e($edld_id);?>.edld-link-wrapper a:before,
						.<?php _e($edld_id);?>.edld-link-wrapper a:after
						{
							color: <?php _e($edld_link_background_color);?>;
						}	
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_2 a:after,
                        .<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_4 a:before,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_4 a:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_5 a:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_5 a:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a span,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_7 a:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_7 a:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_8 a:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_8 a:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_9 a,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_10 a,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_11 a

						{
							background: <?php _e($edld_link_background_color);?>;
						}

						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a{
							border-color: <?php _e($edld_link_background_color);?>;
						}
					<?php
				}
				if(!empty($edld_hover_background_color)){
					?>	

						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_2 a:hover:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_4 a:hover:before,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_4 a:hover:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_5 a:hover:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_5 a:hover:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a:hover span:before,
                        .<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a span:before,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_7 a:hover:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_7 a:hover:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_9 a:hover,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_10 a:hover,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a:hover,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a:active
						{
							background: <?php _e($edld_hover_background_color);?>;
						}

						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_11 a:hover	
						{
							background: transparent;
							border-color: <?php _e($edld_hover_background_color);?>;
						}
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a:hover{
							border-color: transparent;
						}
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_1 a:hover:before,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_1 a:hover:after{
							color: <?php _e($edld_hover_background_color);?>;
						}
					<?php
				}
				if(!empty($edld_active_background_color)){
					?>	
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_10 a {
						    box-shadow: 0 6px <?php _e($edld_active_background_color);?>;
						}
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_10 a:hover {
						    box-shadow: 0 4px <?php _e($edld_active_background_color);?>;

						}
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_10 a:active{
						    box-shadow: 0 0 <?php _e($edld_active_background_color);?>;
						}
						.<?php _e($edld_id);?>.edld-link-wrapper a:active:before,
						.<?php _e($edld_id);?>.edld-link-wrapper a:active:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a:active:before
						
						{
							color: <?php _e($edld_active_background_color);?>;
						}	
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_2 a:active:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_4 a:active:before,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_4 a:active:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_5 a:active:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_5 a:active:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_6 a:active span:before,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_7 a:active:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_7 a:active:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_8 a:active:before, 
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_8 a:active:after,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_9 a:active,
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_10 a:active,
						{
							background: <?php _e($edld_active_background_color);?>;
						}

						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_11 a:active
						{
							background: transparent;
							border-color: <?php _e($edld_active_background_color);?>;
						}
						.<?php _e($edld_id);?>.edld-link-wrapper.edld_label_template_12 a:active{
							border-color: <?php _e($edld_active_background_color);?>;	
						}
					<?php
				}
			}
		?>
	</style>


	
