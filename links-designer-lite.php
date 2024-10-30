<?php 
defined('ABSPATH') or die('No script kiddies please!!');

/*
Plugin Name:  Link Designer Lite - Free Link Designer Plugin for WordPress 
Plugin URI:   https://8degreethemes.com/wordpress-plugins/link-designer-lite
Description:  Link Designer Lite lets you add beautiful customizable links to your site.
Version:      1.0.1
Author:       8Degree Themes
Author URI:   https://8degreethemes.com/
License:      GPL2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  link-designer-lite
Domain Path:  /languages/
*/

/* Create class Link Designer Lite*/
if(!class_exists('EDLDL_Class')){
  class EDLDL_Class{
    function __construct(){
      $this->define_constants();
      add_action( 'init', array( $this, 'edld_fonts_array' ) );
      add_action('admin_menu',array($this,'menu_register'));
      add_action( 'init', array($this,'edld_translation_ready' ));
      add_action('admin_enqueue_scripts',array($this,'register_backend_assets'));
      add_action('wp_enqueue_scripts',array($this,'register_frontend_assets'));
      add_action( 'media_buttons', array( $this,'edld_media_shortcode_buttons' ));
      add_action( 'admin_footer', array( $this,'edld_media_shortcode_popup' ));
      add_shortcode( 'link_designer', array($this,'link_designer_shortcode'));
      add_action( 'wp_ajax_edld_posts_search', array($this,'edld_all_posts' ));
     
     /*Register additional support link in plugin listings*/
      add_filter( 'plugin_action_links', array( $this, 'edld_plugin_action_link' ), 10, 5 );
    }
     /**
     * Define File Paths.
     *
     * @since 1.0.0
     */
    function define_constants(){
      defined('EDLD_PLUGIN_URL') or define('EDLD_PLUGIN_URL',plugin_dir_url(__FILE__));
      defined('EDLD_PLUGIN_PATH') or define('EDLD_PLUGIN_PATH',plugin_dir_path(__FILE__));
      defined('EDLD_CSS_DIR') or define('EDLD_CSS_DIR',EDLD_PLUGIN_URL.'css/');
      defined('EDLD_IMG_DIR') or define('EDLD_IMG_DIR',EDLD_PLUGIN_URL.'images/');
      defined('EDLD_JS_DIR') or define('EDLD_JS_DIR',EDLD_PLUGIN_URL.'js/');
      defined('EDLD_VERSION') or define('EDLD_VERSION','1.0.1');
    }

     /**
     * Load plugin textdomain.
     *
     * @since 1.0.0
     */
     function edld_translation_ready() {
      load_plugin_textdomain( 'link-designer-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
    }

    /**
    * Registers backend js and css
    * 
    * @since 1.0.0
    * */
    function register_backend_assets($hook){
      wp_enqueue_script( 'edcm-webfont', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js' );
      wp_enqueue_style('edld-backend-css',EDLD_CSS_DIR.'edld-backend.css',array(),EDLD_VERSION);
      wp_enqueue_script( 'edld-color-picker-js', EDLD_JS_DIR . 'wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), EDLD_VERSION );
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'edld-selection-js',EDLD_JS_DIR.'jquery.selection.js',array('jquery'), '1.0.0');
      wp_enqueue_script('edld-backend-script',EDLD_JS_DIR.'edld-backend.js',array('jquery','edld-selection-js','edld-color-picker-js'),EDLD_VERSION);
      /*Send php values to JS script*/
      wp_localize_script( 'edld-backend-script', 'edld_js_object', 
        array( 
          'edld_ajaxurl' => admin_url( 'admin-ajax.php' ),
          'edld_ajax_nonce' => wp_create_nonce( 'edld-ajax-nonce' )
        ) 
      );/* setting ajaxurl*/
    }

    /**
    * Registers frontend assets
    * @since 1.0.0
    * 
    **/
    function register_frontend_assets(){
      wp_enqueue_style('edld-frontend-style',EDLD_CSS_DIR.'edld-frontend.css',array(),EDLD_VERSION);
      wp_enqueue_script('edld-frontend-script',EDLD_JS_DIR.'edld-frontend.js',array('jquery'),EDLD_VERSION);
    }

    /**
     * Prints array in pre format
     * 
     * @since 1.0.0
     **/
    function print_array($array){
      echo "<pre>";
      print_r($array);
      echo "</pre>";
    }

      /**
       * Adds Plugin Admin Menu
       * 
       * @since 1.0.0
       * 
       * */
      function menu_register(){
       add_submenu_page( 'tools.php',__('Link Designer Lite','link-designer-lite'),__('Link  Designer Lite','link-designer-lite'),'manage_options', 'edld-info',array($this,'edld_info' ));
      }
       /**
       * Link Designer - How to page callback function
       * 
       * @since 1.0.0
       * 
       * */
       function edld_info() {
        include(EDLD_PLUGIN_PATH.'includes/backend/edld-info.php');
      }

      /**
       * generates Shortcodes
       * 
       * @since 1.0.0
       * */
      function link_designer_shortcode($shortcode_attr){
       ob_start(); /*Buffer*/
       include(EDLD_PLUGIN_PATH.'includes/frontend/shortcode.php');
       $link_designer_shortcode = ob_get_contents();
       ob_end_clean();
       ob_flush();
       return $link_designer_shortcode;
     }

      /**
       * Link Designer Button
       * 
       * @since 1.0.0
       * */
      function edld_media_shortcode_buttons() {
        ?>
        <a href = "#TB_inline?width=600&height=550&inlineId=edld_popup_shortcode" class = "button thickbox wp_doin_media_link edld-link-designer-button" id = "edld-link-designer-button" title = "<?php _e('Link Designer - Shortcode Generator','link-designer-lite');?>"><span class="wp-media-buttons-icon"></span><?php _e( 'Link Designer', 'link-designer-lite' ); ?></a>
        <?php
      }

      /**
       * Query Post Type
       * 
       * @since 1.0.0
       * */
      function edld_all_posts(){
        $args = array(
         'public'   => true
        );
        $output = 'names'; 
        $operator = 'and'; 
        $regestered_post_types = get_post_types($args,$output,$operator);
        $paged = isset($_POST[ 'page_number' ]) ? sanitize_text_field($_POST[ 'page_number' ]) : 1;
        $edld_search_keyword = isset($_POST['search_keyword'])?sanitize_text_field( $_POST['search_keyword'] ):'';
        $args=array(
          'posts_per_page' => 10,
          's' => $edld_search_keyword,
          'post_type'     => $regestered_post_types,
          'orderby'          => 'date',
          'order'            => 'DESC',
          'post_status' => 'publish',
          'paged' => $paged
        );

        $query = new WP_Query($args);
        if ( $query->have_posts() ) : 
          ?>
          <div class="edld-search-error"></div>
          <div class="edld-search-table">
            <div class="edld-search-table-header">
              <div class="edld-search-table-header-item edld-search-table-col"><?php _e('Title','link-designer-lite');?></div>
              <div class="edld-search-table-header-item edld-search-table-col"><?php _e('Post type','link-designer-lite');?></div>
            </div>
            <?php
            while ( $query->have_posts() ) : 
              $query->the_post();
              $post_type = get_post_type(get_the_ID());
              $permalink = get_the_permalink(get_the_ID());
              ?>
              <div class="edld-search-table-row">
                <div class="edld-search-table-col edld-post-title" data-permalink="<?php esc_attr_e($permalink);?>"><?php the_title();?></div>
                <div class="edld-search-table-col"><?php echo $post_type;?></div>
              </div>
              <?php
            endwhile; 
            ?>
          </div>
          <div class="edld-pagination-wrap">
            <?php
            $big = 999999999; /*need an unlikely integer*/
            $paginate_links = paginate_links(array(
              'type' => 'plain',
              'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
              'format' => '?paged=%#%',
              'current' => max(1, $paged),
              'total' => $query->max_num_pages
            ));
            echo $paginate_links;
            ?>
            <span class="spinner edld-pagination-spinner"></span>
          </div>
          <?php
          wp_reset_postdata();
         else :
          esc_html_e( 'Sorry, no posts matched your criteria.' );
        endif;

        wp_die();
      }

     /**
     * Ajax Search Callback
     * 
     * @since 1.0.0
     * */
     function edld_posts_search(){
      if ( check_ajax_referer( 'edld-ajax-nonce', 'edld_nonce' ) ) {
        /*$this->print_array($_POST['search_keyword']);*/
        $edld_search_keyword = isset($_POST['search_keyword'])?sanitize_text_field( $_POST['search_keyword'] ):'';

        $paged = isset($_POST[ 'page_number' ]) ? sanitize_text_field($_POST[ 'page_number' ]) : 1;
        $post_args = array( 'posts_per_page' => 4, 'post_status' => 'publish', 'post_type' => 'any', 'paged' => $paged );
        if(!empty($edld_search_keyword)){
          $query = new WP_Query( array( 's' => $edld_search_keyword ) );
          if ( $query->have_posts() ) : 
            ?>
            <div class="edld-search-error"></div>
            <div class="edld-search-table">
              <div class="edld-search-table-header">
                <div class="edld-search-table-header-item edld-search-table-col">Title</div>
                <div class="edld-search-table-header-item edld-search-table-col">Post type</div>
              </div>
              <?php
              while ( $query->have_posts() ) : 
                $query->the_post();
                $post_type = get_post_type(get_the_ID());
                $permalink = get_the_permalink(get_the_ID());
                ?>
                <div class="edld-search-table-row">
                  <div class="edld-search-table-col edld-post-title" data-permalink="<?php esc_attr_e($permalink);?>"><?php the_title();?></div>
                  <div class="edld-search-table-col"><?php echo $post_type;?></div>
                </div>
                <?php
              endwhile; 
              ?>
            </div>
            <!-- Pagination -->   
            <div class="edld-pagination-wrap">
              <?php
                $big = 999999999; // need an unlikely integer
                $paginate_links = paginate_links(array(
                  'type' => 'plain',
                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                  'format' => '?paged=%#%',
                  'current' => max(1, $paged),
                  'total' => $query->max_num_pages
                ));
                echo $paginate_links;       
                ?>
                <span class="spinner edld-pagination-spinner"></span>
              </div>
              <?php
              wp_reset_postdata();
            else :
              _e('no_post');
            endif;
          }else{
            _e('keyword_empty');
          }

        }

        wp_die();
      }

     /**
     * includes popup fields
     * 
     * @since 1.0.0
     * */
      function edld_media_shortcode_popup() {
       include(EDLD_PLUGIN_PATH.'includes/backend/edld-shortcode-popup.php');    
     }

    /* Generate Random Id*/
    function edld_generate_random_string( $length ){
      $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $random_string = '';
      for ( $i = 1; $i <= $length; $i ++ ) {
        $random_string .= $string[ rand( 0, 61 ) ];
      }
      return $random_string;
    }

      /**
     *  Get font family
     * 
     * @since 1.0.0
     * */

      function edld_fonts_array(){
        include(EDLD_PLUGIN_PATH . 'includes/backend/edld-google-fonts.php');
      }

     /**
     *  Add Support Link in Plugin Listing Page
     * 
     * @since 1.0.0
     * */

      function edld_plugin_action_link( $actions, $plugin_file ) {
        static $plugin;

        if ( !isset( $plugin ) )
          $plugin = plugin_basename( __FILE__ );
        if ( $plugin == $plugin_file ) {

          $settings = array( 'settings' => '<a href="tools.php?page=edld-info">' . __( 'Settings', 'link-designer-lite' ) . '</a>' );
          $site_link = array( 'support' => '<a href="https://8degreethemes.com/support/" target="_blank">'.__( 'Support', 'link-designer-lite' ).'</a>' );

          $actions = array_merge( $settings, $actions );
          $actions = array_merge( $site_link, $actions );
        }

        return $actions;
      }
    }
    new EDLDL_Class();
  }