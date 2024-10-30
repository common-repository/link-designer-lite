<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div id="edld_popup_shortcode" style="display:none;">
  <div class="wrap edld-doin-shortcode">
    <form class="edld-settings-form"><!-- Form Starts From Here -->
      <div class="wrap edld-contact">
        <div id="poststuff">
          <!-- main content -->
          <div class="edld-container">
            <div class="edld-form-wrap">
              <!-- Creating Backend Tabs Header -->
                <ul class="edld-tabs">
                  <li class="tab-link edld-current" data-tab="edld-tab-1"><i class="dashicons dashicons-welcome-write-blog"></i><?php _e( 'Content', 'link-designer-lite' ); ?></li>
                  <li class="tab-link" data-tab="edld-tab-2"><i class="dashicons dashicons-art"></i><?php _e( 'Design', 'link-designer-lite' ); ?></li>
                  <li class="tab-link" data-tab="edld-tab-3"><i class="dashicons dashicons-welcome-add-page"></i><?php _e( 'Other', 'link-designer-lite' ); ?></li>         
                </ul>
              <!-- end of Backend Tabs Header -->
              <!-- Backend Tab Contents -->
                <div id="edld-tab-1" class="edld-tab-content edld-current">
                  
                  <div class="edld-postbox-fields-popup">
                    <label><?php _e( 'Shortcode ID', 'link-designer-lite' ); ?></label>
                    <input type="text" value="edld-<?php _e($this->edld_generate_random_string(8));?>" class="edld_shortcode_id" readonly>
                  </div>
                  <div class="edld-postbox-fields-popup">
                    <label><?php _e( 'Link Text', 'link-designer-lite' ); ?></label>
                    <input type="text" value="" class="edld_label_text" placeholder="<?php _e( 'Click me! ', 'link-designer-lite' ); ?>">
                  </div>
                  <div class="edld-postbox-fields-popup">
                    <label><?php _e( 'Link URL', 'link-designer-lite' ); ?></label>
                    <input type="text" class="edld_label_link" placeholder="<?php _e( 'https://www.google.com', 'link-designer-lite' ); ?>">
                  </div>
                  <div class="edld-postbox-fields-popup">
                    <label><?php _e( 'Search', 'link-designer-lite' ); ?></label>
                    <input type="text" class="edld_label_search" placeholder="<?php _e( 'Keyword...', 'link-designer-lite' ); ?>">
                    <input type="button" value="<?php _e('Search Posts','link-designer-lite');?>" class="edld-searchsubmit" class="button button-secondary"  />
                    <span class="spinner edld-spinner"></span>
                  </div>
                  <div class="edld-search-result-wrapper">
                  </div>
                </div>
                <div id="edld-tab-2" class="edld-tab-content">
                  <div class="edldl-postbox-wrapper inside">
                    <div class="edldl-postbox-wrapper-inner">
                      <ul class="nav-tab-wrapper edld-tab-wrapper">
                        <li class="nav-tab nav-tab-active" data-tab="edldl-tab-1"><?php _e( 'Templates', 'link-designer-lite' ); ?></li>
                        <li class="nav-tab" data-tab="edldl-tab-2"><?php _e( 'Color', 'link-designer-lite' ); ?></li>  
                        <li class="nav-tab" data-tab="edldl-tab-3"><?php _e( 'Typography', 'link-designer-lite' ); ?></li>  
                        <li class="nav-tab" data-tab="edldl-tab-4"><?php _e( 'Display', 'link-designer-lite' ); ?></li>  
                      </ul> 
                      <div id="edldl-tab-1" class="edldl-tab-content edldl-current">
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_1" id="edld_label_template_1"  checked="checked">
                          <label title="<?php esc_attr_e('Template 1','link-designer-lite');?>" for="edld_label_template_1"><img src="<?php echo EDLD_IMG_DIR; ?>/Template1.gif" alt="Layout 1"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_2" id="edld_label_template_2">
                          <label title="<?php esc_attr_e('Template 2','link-designer-lite');?>" for="edld_label_template_2"><img src="<?php echo EDLD_IMG_DIR; ?>/Template2.gif" alt="Layout 2"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_3" id="edld_label_template_3">
                          <label title="<?php esc_attr_e('Template 3','link-designer-lite');?>" for="edld_label_template_3"><img src="<?php echo EDLD_IMG_DIR; ?>/Template3.gif" alt="Layout 3"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_4" id="edld_label_template_4">
                          <label title="<?php esc_attr_e('Template 4','link-designer-lite');?>" for="edld_label_template_4"><img src="<?php echo EDLD_IMG_DIR; ?>/Template4.gif" alt="Layout 4"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_5" id="edld_label_template_5">
                          <label title="<?php esc_attr_e('Template 5','link-designer-lite');?>" for="edld_label_template_5"><img src="<?php echo EDLD_IMG_DIR; ?>/Template5.gif" alt="Layout 5"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio"  name='edld_label_template' value="edld_label_template_6" id="edld_label_template_6">
                          <label title="<?php esc_attr_e('Template 6','link-designer-lite');?>" for="edld_label_template_6"><img src="<?php echo EDLD_IMG_DIR; ?>/Template6.gif" alt="Layout 1"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_7" id="edld_label_template_7">
                          <label title="<?php esc_attr_e('Template 7','link-designer-lite');?>" for="edld_label_template_7"><img src="<?php echo EDLD_IMG_DIR; ?>/Template7.gif" alt="Layout 2"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_8" id="edld_label_template_8">
                          <label title="<?php esc_attr_e('Template 8','link-designer-lite');?>" for="edld_label_template_8"><img src="<?php echo EDLD_IMG_DIR; ?>/Template8.gif" alt="Layout 3"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_9" id="edld_label_template_9" >
                          <label title="<?php esc_attr_e('Template 9','link-designer-lite');?>" for="edld_label_template_9"><img src="<?php echo EDLD_IMG_DIR; ?>/Template9.gif" alt="Layout 4"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_10" id="edld_label_template_10" >
                          <label title="<?php esc_attr_e('Template 10','link-designer-lite');?>" for="edld_label_template_10"><img src="<?php echo EDLD_IMG_DIR; ?>/Template10.gif" alt="Layout 5"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_11" id="edld_label_template_11" >
                          <label title="<?php esc_attr_e('Template 11','link-designer-lite');?>" for="edld_label_template_11"><img src="<?php echo EDLD_IMG_DIR; ?>/Template11.gif" alt="Layout 5"></label>
                        </div>
                        <div class="edld-postbox-fields-radio">
                          <input type="radio" name='edld_label_template' value="edld_label_template_12" id="edld_label_template_12" >
                          <label title="<?php esc_attr_e('Template 12','link-designer-lite');?>" for="edld_label_template_12"><img src="<?php echo EDLD_IMG_DIR; ?>/Template12.gif" alt="Layout 5"></label>
                        </div>
                      </div>
                      <div id="edldl-tab-2" class="edldl-tab-content">
                        <h3><?php _e('Text Color','link-designer-lite');?></h3>
                        <div class="edld-postbox-fields">
                          <label><?php _e( 'Default', 'link-designer-lite' ); ?></label>
                          <input type="text" id="edld_link_color" data-alpha="true" class="edld-color-picker" value="<?php esc_attr_e( $edld_link_color); ?>">
                        </div>
                        <div class="edld-postbox-fields">
                          <label><?php _e( 'Active', 'link-designer-lite' ); ?></label>
                          <input type="text" id="edld_link_active_color" data-alpha="true" class="edld-color-picker" value="<?php esc_attr_e( $edld_link_active_color); ?>">
                        </div>
                        <div class="edld-postbox-fields">
                          <label><?php _e( 'Hover', 'link-designer-lite' ); ?></label>
                          <input type="text" id="edld_link_hover_color" data-alpha="true" class="edld-color-picker" value="<?php esc_attr_e( $edld_link_hover_color); ?>">
                        </div>
                        <h3><?php _e('Background / Border Color','link-designer-lite');?></h3>
                        <div class="edld-postbox-fields">
                          <label><?php _e( 'Default', 'link-designer-lite' ); ?></label>
                          <input type="text" id="edld_link_background_color" data-alpha="true" class="edld-color-picker" value="<?php esc_attr_e( $edld_link_background_color); ?>">
                        </div>
                        <div class="edld-postbox-fields">
                          <label><?php _e( 'Active', 'link-designer-lite' ); ?></label>
                          <input type="text" id="edld_active_background_color" data-alpha="true" class="edld-color-picker" value="<?php esc_attr_e( $edld_active_background_color); ?>">
                        </div>
                        <div class="edld-postbox-fields">
                          <label><?php _e( 'Hover', 'link-designer-lite' ); ?></label>
                          <input type="text" id="edld_hover_background_color" data-alpha="true" class="edld-color-picker" value="<?php esc_attr_e( $edld_hover_background_color); ?>">
                        </div>
                      </div>
                      <div id="edldl-tab-3" class="edldl-tab-content">
                        <h3><?php _e('Typography','link-designer-lite');?></h3>
                        <?php $font_array = get_option('edld_font_list'); ?>
                        <div class="edld-postbox-fields-popup">
                          <label><?php _e( 'Font Family', 'link-designer-lite' ); ?></label>
                            <select class="edld-typography-selected">
                              <?php
                              if(!empty($font_array)){
                                foreach ( $font_array as $edld_font ) {
                                  $edld_separated = explode('=',$edld_font);
                                  $edld_family = $edld_separated[0];
                                  $edld_subset = $edld_separated[1];
                                  $edld_variant = $edld_separated[2];

                                  ?>
                                  <option value="<?php _e( $edld_font ); ?>"><?php _e( $edld_family.' '.$edld_subset.' '.$edld_variant); ?></option>
                                  <?php
                                }
                              }
                              ?>
                            </select> 
                        </div>
                        <div class="edld-postbox-fields-popup">
                          <label><?php _e( 'Font Size', 'link-designer-lite' ); ?></label>
                          <input type="text" value="" class="edld_font_size" placeholder="<?php _e( '12px', 'link-designer-lite' ); ?>">
                        </div>
                        <h3><?php _e('Text Transform','link-designer-lite');?></h3>
                        <div class="edld-postbox-fields">
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_transform" id="edld_lowercase" value="lowercase" checked>
                            <label for="edld_lowercase"><?php _e( 'lowercase', 'link-designer-lite' ); ?></label>
                          </div>
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_transform" id="edld_uppercase" value="uppercase">
                            <label for="edld_uppercase"><?php _e( 'UPPERCASE', 'link-designer-lite' ); ?></label>
                          </div>
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_transform" id="edld_capitalize" value="capitalize">
                            <label for="edld_capitalize"><?php _e( 'Capitalize', 'link-designer-lite' ); ?></label>
                          </div>
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_transform" id="edld_none" value="none">
                            <label for="edld_none"><?php _e( 'none', 'link-designer-lite' ); ?></label>
                          </div>
                        </div>
                      </div>
                      <div id="edldl-tab-4" class="edldl-tab-content">
                        <h3><?php _e('Display','link-designer-lite');?></h3>
                        <div class="edld-postbox-fields">
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_display" id="edld_inline" value="inline-block" checked>
                            <label for="edld_inline"><?php _e( 'Inline', 'link-designer-lite' ); ?></label>
                          </div>
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_display" id="edld_block" value="block">
                            <label for="edld_block"><?php _e( 'Block', 'link-designer-lite' ); ?></label>
                          </div>
                        </div>
                        <h3><?php _e('Text Alignment','link-designer-lite');?></h3>
                        <div class="edld-postbox-fields">
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_align" id="edld_left" value="left">
                            <label for="edld_left" title="<?php _e( 'Left', 'link-designer-lite' ); ?>"><i class="dashicons dashicons-editor-alignleft"></i></label>
                          </div>
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_align" id="edld_center" value="center" checked>
                            <label for="edld_center"  title="<?php _e( 'Center', 'link-designer-lite' ); ?>"><i class="dashicons dashicons-editor-aligncenter"></i></label>
                          </div>
                          <div class="edld-postbox-fields-radio">
                            <input type="radio" name="edld_text_align" id="edld_right" value="right">
                            <label for="edld_right"  title="<?php _e( 'Right', 'link-designer-lite' ); ?>"><i class="dashicons dashicons-editor-alignright"></i></label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="edld-tab-3" class="edld-tab-content">
                  <h3><?php _e('Link Target','link-designer-lite');?></h3>
                  <div class="edld-postbox-fields">
                    <div class="edld-postbox-fields-radio">
                      <input type="radio" name="edld_link_target" id="edld_link_blank" value="_blank" checked>
                      <label for="edld_link_blank"><?php _e( 'New Tab', 'link-designer-lite' ); ?></label>
                    </div>
                    <div class="edld-postbox-fields-radio">
                      <input type="radio" name="edld_link_target" id="edld_link_self" value="_self">
                      <label for="edld_link_self"><?php _e( 'Same Page', 'link-designer-lite' ); ?></label>
                    </div>
                  </div>
                  <h3><?php _e('Download Link','link-designer-lite');?></h3>
                  <div class="edld-postbox-fields">
                    <div class="edld-postbox-fields-radio">
                      <input type="radio" name="edld_link_download" id="edld_link_download_no" value="false" checked>
                      <label for="edld_link_download_no"><?php _e( 'No', 'link-designer-lite' ); ?></label>
                    </div>
                    <div class="edld-postbox-fields-radio">
                      <input type="radio" name="edld_link_download" id="edld_link_download_yes" value="true">
                      <label for="edld_link_download_yes"><?php _e( 'Yes', 'link-designer-lite' ); ?></label>
                      
                    </div>
                    <div class="edld-description"><?php _e( 'Make a Downloadable Link', 'link-designer-lite' ); ?></div>
                    <h3><?php _e('Enable rel="nofollow"','link-designer-lite');?></h3>
                    <div class="edld-postbox-fields">
                      <div class="edld-postbox-fields-radio">
                        <input type="radio" name="edld_no_follow" id="edld_no_follow_no" value="false" checked>
                        <label for="edld_no_follow_no"><?php _e( 'No', 'link-designer-lite' ); ?></label>
                      </div>
                      <div class="edld-postbox-fields-radio">
                        <input type="radio" name="edld_no_follow" id="edld_no_follow_yes" value="true">
                        <label for="edld_no_follow_yes"><?php _e( 'Yes', 'link-designer-lite' ); ?></label>
                        
                      </div>
                    </div>
                </div>
              <!-- end of Backend Tab Contents -->
            </div><!-- end of edld-form-wrap -->
            <div class="edld-error" id="edld_label_link_error" style="display:none;"><?php _e('Link Url field is required.','link-designer-lite');?></div>
            <div class="add_link_button">
              <input class="button-primary" id="edld_add_link" type="button" name="add_link" value="<?php esc_attr_e( 'Add Link' ); ?>" />
            </div>
          </div><!-- end of edld-container -->
          <!-- end of main content -->
        </div><!-- end of #poststuff -->
      </div><!-- .wrap -->
    </form><!-- Form ends Here -->
  </div> 
</div>
