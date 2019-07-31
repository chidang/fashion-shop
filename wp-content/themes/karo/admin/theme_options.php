<?php

/**
 * FTC Theme Options
 */

if (!class_exists('Redux_Framework_smof_data')) {

    class Redux_Framework_smof_data {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();
            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        function compiler_action($options, $css, $changed_values) {

        }

        function dynamic_section($sections) {

            return $sections;
        }

        function change_arguments($args) {

            return $args;
        }

        function change_defaults($defaults) {

            return $defaults;
        }

        function remove_demo() {

        }

        public function setSections() {

            /* Default Sidebar */
            global $ftc_default_sidebars;
            $of_sidebars    = array();
            if( $ftc_default_sidebars ){
                foreach( $ftc_default_sidebars as $key => $_sidebar ){
                    $of_sidebars[$_sidebar['id']] = $_sidebar['name'];
                }
            }
            $ftc_layouts = array(
                '0-1-0'     => get_template_directory_uri(). '/admin/images/1col.png'
                ,'0-1-1'    => get_template_directory_uri(). '/admin/images/2cr.png'
                ,'1-1-0'    => get_template_directory_uri(). '/admin/images/2cl.png'
                ,'1-1-1'    => get_template_directory_uri(). '/admin/images/3cm.png'
            );

            /***************************/ 
            /***   General Options   ***/
            /***************************/
            $this->sections[] = array(
                'icon' => 'fa fa-home',
                'icon_class' => 'icon',
                'title' => esc_html__('General', 'karo'),
                'fields' => array(				
                )
            );	 

            /** Logo - Favicon **/
            $this->sections[] = array(
                'icon' => 'icofont icofont-double-right',
                'icon_class' => 'icon',
                'subsection' => true,
                'title' => esc_html__('Logo - Favicon', 'karo'),
                'fields' => array(			
                  array(
                    'id'=>'ftc_logo',
                    'type' => 'media',
                    'compiler'  => 'true',
                    'mode'      => false,
                    'title' => esc_html__('Logo Image', 'karo'),
                    'desc'      => esc_html__('Select an image file for the main logo', 'karo'),
                    'default' => array(
                        'url' => get_template_directory_uri(). '/assets/images/logo.png'
                    )
                )				
                  ,array(
                    'id'=>'ftc_favicon',
                    'type' => 'media',
                    'compiler'  => 'true',
                    'mode'      => false,
                    'title' => esc_html__('Favicon Image', 'karo'),
                    'desc'      => esc_html__('Accept ICO files', 'karo'),
                    'default' => array(
                        'url' => get_template_directory_uri(). '/assets/images/favicon.ico'
                    )
                )
                  ,array(
                    'id'=>'ftc_text_logo',
                    'type' => 'text',
                    'title' => esc_html__('Text Logo', 'karo'),
                    'default' => 'KaroShop'
                ),
                array(
                    'id'=>'ftc_mobile_layout',
                    'type' => 'switch',
                    'title' => esc_html__('Mobile Layout', 'karo'),
                    'default' => 1,
                    'on' => esc_html__('Enable', 'karo'),
                    'off' => esc_html__('Disable', 'karo'),
                ),
                array(
                    'id'=>'ftc_logo_mobile',
                    'type' => 'media',
                    'compiler'  => 'true',
                    'mode'      => false,
                    'title' => esc_html__('Logo Mobile Image', 'karo'),
                    'desc'      => '',
                    'default' => ''
                )				
              )
            );

            /* Popup Newletter */
            $this->sections[] = array(
                'icon' => 'icofont icofont-double-right',
                'icon_class' => 'icon',
                'subsection' => true,
                'title' => esc_html__('Popup Newletter', 'karo'),
                'fields' => array(                    
                    array(
                        'id'=>'ftc_enable_popup',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Popup Newletter', 'karo'),
                        'desc'     => '',
                        'on' => esc_html__('Yes', 'karo'),
                        'off' => esc_html__('No', 'karo'),
                        'default' => 1,
                    ),
                    array(
                        'id'=>'ftc_bg_popup_image',
                        'type' => 'media',
                        'title' => esc_html__('Popup Newletter Background Image', 'karo'),
                        'desc'     => esc_html__("Select a new image to override current background image", "karo"),
                        'default'   =>''
                    ),                   
                )
            );

            /** Header Options **/
            $this->sections[] = array(
                'icon' => 'icofont icofont-double-right',
                'icon_class' => 'icon',
                'subsection' => true,
                'title' => esc_html__('Header of inner Pages', 'karo'),
                'fields' => array(	
                 array(
                  'id'=>'ftc_header_layout',
                  'type' => 'image_select',
                  'full_width' => true,
                  'title' => esc_html__('Header Layout', 'karo'),
                  'subtitle' => esc_html__('This header style will be showed only in inner pages, please go to Pages > Homepage to change header for front page.', 'karo'),
                  'options' => array(
                    'layout1'   => get_template_directory_uri() . '/admin/images/header/layout1.png'
                    ,'layout2'   => get_template_directory_uri() . '/admin/images/header/layout2.png'
                    ,'layout3'   => get_template_directory_uri() . '/admin/images/header/layout3.png'
                    ,'layout4'   => get_template_directory_uri() . '/admin/images/header/layout4.png'
                    ,'layout5'   => get_template_directory_uri() . '/admin/images/header/layout5.png'
                    ,'layout6'   => get_template_directory_uri() . '/admin/images/header/layout6.png'
                    ,'layout7'   => get_template_directory_uri() . '/admin/images/header/layout7.png'
                    ,'layout8'   => get_template_directory_uri() . '/admin/images/header/layout8.png'
                    ,'layout9'   => get_template_directory_uri() . '/admin/images/header/layout9.png'
                    ,'layout10'   => get_template_directory_uri() . '/admin/images/header/layout10.png'
                    ,'layout11'   => get_template_directory_uri() . '/admin/images/header/layout11.png'
                    ,'layout12'   => get_template_directory_uri() . '/admin/images/header/layout12.png'
                    ,'layout13'   => get_template_directory_uri() . '/admin/images/header/layout13.png'
                    ,'layout14'   => get_template_directory_uri() . '/admin/images/header/layout14.png'
                ),
                  'default' => 'layout1'
              ),
                 array(
                    'id'=>'ftc_header_contact_information',
                    'type' => 'textarea',
                    'title' => esc_html__('Header nav Information', 'karo'),
                    'default' => '',
                ),					
                 array(
                    'id'=>'ftc_middle_header_content',
                    'type' => 'textarea',
                    'title' => esc_html__('Header Content - Information', 'karo'),
                    'default' => '',
                )
                 ,
                  array(
                    'id'=>'ftc_social_header',
                    'type' => 'textarea',
                    'title' => esc_html__('Header Social', 'karo'),
                    'default' => '',
                ),
                  array(
                    'id'=>'ftc_social_header_vertical',
                    'type' => 'textarea',
                    'title' => esc_html__('Header Content Vertical', 'karo'),
                    'default' => '',
                )
                 ,
                 array(   
                    "title"     => esc_html__("Header Sticky", "karo"),
                    "desc"     => esc_html__("Add header sticky. Please disable sticky mega main menu", "karo"),
                    "id"       => "ftc_enable_sticky_header",
                    'default' => 1,
                    "on"       => esc_html__("Enable", "karo"),
                    "off"      => esc_html__("Disable", "karo"),
                    "type"     => "switch",
                )
                 ,
                 array(
                    'id'=>'ftc_header_currency',
                    'type' => 'switch',
                    'title' => esc_html__('Header Currency', 'karo'),
                    'default' => 1,
                    'on' => esc_html__('Enable', 'karo'),
                    'off' => esc_html__('Disable', 'karo'),
                ),
                 array(
                    'id'=>'ftc_header_language',
                    'type' => 'switch',
                    'title' => esc_html__('Header Language', 'karo'),
                    'desc'     => esc_html__("If you don't install WPML plugin, it will display demo html", "karo"),
                    'on' => esc_html__('Yes', 'karo'),
                    'off' => esc_html__('No', 'karo'),
                    'default' => 1,
                ),
                 array(
                    'id'=>'ftc_enable_tiny_shopping_cart',
                    'type' => 'switch',
                    'title' => esc_html__('Shopping Cart', 'karo'),
                    'on' => esc_html__('Yes', 'karo'),
                    'off' => esc_html__('No', 'karo'),
                    'default' => 1,
                ),
                 array(
                        'id' => 'ftc_cart_layout', 
                        'type' => 'select',
                        'title' => esc_html__('Cart Layout', 'karo'),
                        'options' => array(
                            'dropdown' => esc_html__('Dropdown', 'karo') ,
                            'off-canvas'    => esc_html__('Off Canvas', 'karo')
                             ),
                    ),
                 array(
                    'id'=>'ftc_enable_search',
                    'type' => 'switch',
                    'title' => esc_html__('Search Bar', 'karo'),
                    'on' => esc_html__('Yes', 'karo'),
                    'off' => esc_html__('No', 'karo'),
                    'default' => 1,
                ),
                 array(
                    'id'=>'ftc_enable_tiny_account',
                    'type' => 'switch',
                    'title' => esc_html__('My Account', 'karo'),
                    'on' => esc_html__('Yes', 'karo'),
                    'off' => esc_html__('No', 'karo'),
                    'default' => 1,
                ),
                 array(
                    'id'=>'ftc_enable_tiny_wishlist',
                    'type' => 'switch',
                    'title' => esc_html__('Wishlist', 'karo'),
                    'on' => esc_html__('Yes', 'karo'),
                    'off' => esc_html__('No', 'karo'),
                    'default' => 1,
                ),
                 array(   "title"      => esc_html__("Check out", "karo")
                    ,"desc"     => ""
                    ,"id"       => "ftc_enable_tiny_checkout"
                    ,"default"      => "1"
                    ,"on"       => esc_html__("Enable", "karo")
                    ,"off"      => esc_html__("Disable", "karo")
                    ,"type"     => "switch"
                )
             )
);	

$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Breadcrumb', 'karo'),
    'fields' => array(
        array(
            'id'=>'ftc_bg_breadcrumbs',
            'type' => 'media',
            'title' => esc_html__('Breadcrumbs Background Image', 'karo'),
            'desc'     => esc_html__("Select a new image to override current background image", "karo"),
            'default'   =>array(
                'url' => get_template_directory_uri(). '/assets/images/banner-shop.jpg'
            )
        ),
        array(
            'id'=>'ftc_enable_breadcrumb_background_image',
            'type' => 'switch',
            'title' => esc_html__('Enable Breadcrumb Background Image', 'karo'),
            'desc'     => esc_html__("You can set background color by going to Color Scheme tab > Breadcrumb Colors section", "karo"),
            'on' => esc_html__('Yes', 'karo'),
            'off' => esc_html__('No', 'karo'),
            'default' => 1,
        ),                   
    )
);

/** Back top top **/
$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Back to top', 'karo'),
    'fields' => array(
        array(
            'id'=>'ftc_back_to_top_button',
            'type' => 'switch',
            'title' => esc_html__('Enable Back To Top Button', 'karo'),
            'default' => false,
            'on' => esc_html__('Yes', 'karo'),
            'off' => esc_html__('No', 'karo'),
        )  
        ,array(
            'id'=>'ftc_back_to_top_button_on_mobile',
            'type' => 'switch',
            'title' => esc_html__('Enable Back To Top Button On Mobile', 'karo'),
            'default' => false,
            'on' => esc_html__('Yes', 'karo'),
            'off' => esc_html__('No', 'karo'),
        )                   
    )
);
$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Google Map API Key', 'karo'),
    'fields' => array(
        array(
            'id'=>'ftc_gmap_api_key',
            'type' => 'text',
            'title' => esc_html__('Enter your API key', 'karo'),
            'default' => '',
        )                   
    )
);
/* Cookie Notice */
$this->sections[] = array(
    'icon' => 'el el-facetime-video',
    'icon_class' => 'icon',
    'title' => esc_html__('Cookie Notice', 'karo'),
    'fields' => array(
 array (
                'id'       => 'cookies_info',
                'type'     => 'switch',
                'title'    => esc_html__('Show cookies info', 'karo'),
                'subtitle' => esc_html__('Under EU privacy regulations, websites must make it clear to visitors what information about them is being stored. This specifically includes cookies. Turn on this option and user will see info box at the bottom of the page that your web-site is using cookies.', 'karo'),
                'default' => false
            ),
            array (
                'id'       => 'cookies_text',
                'type'     => 'editor',
                'title'    => esc_html__('Popup text', 'karo'),
                'subtitle' => esc_html__('Place here some information about cookies usage that will be shown in the popup.', 'karo'),
                'default' => esc_html__('We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.', 'karo'),
            ),
            array (
                'id'       => 'cookies_policy_page',
                'type'     => 'select',
                'title'    => esc_html__('Page with details', 'karo'),
                'subtitle' => esc_html__('Choose page that will contain detailed information about your Privacy Policy', 'karo'),
                'data'     => 'pages'
            ),
            array (
                'id'       => 'cookies_version',
                'type'     => 'text',
                'title'    => esc_html__('Cookies version', 'karo'),
                'subtitle' => esc_html__('If you change your cookie policy information you can increase their version to show the popup to all visitors again.', 'karo'),
                'default' => 1,
            ),              
    )
);
/* * *  Typography  * * */
$this->sections[] = array(
    'icon' => 'icofont icofont-brand-appstore',
    'icon_class' => 'icon',
    'title' => esc_html__('Styling', 'karo'),
    'fields' => array(				
    )
);	

/** Color Scheme Options  * */
$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Color Scheme', 'karo'),
    'fields' => array(					
       array(
          'id' => 'ftc_primary_color',
          'type' => 'color',
          'title' => esc_html__('Primary Color', 'karo'),
          'subtitle' => esc_html__('Select a main color for your site.', 'karo'),
          'default' => '#a07936',
          'transparent' => false,
      ),				 
       array(
          'id' => 'ftc_secondary_color',
          'type' => 'color',
          'title' => esc_html__('Secondary Color', 'karo'),
          'default' => '#444444',
          'transparent' => false,
      ),
       array(
          'id' => 'ftc_body_background_color',
          'type' => 'color',
          'title' => esc_html__('Body Background Color', 'karo'),
          'default' => '#ffffff',
          'transparent' => false,
      ),	
   )
);

/** Typography Config    **/
$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Typography', 'karo'),
    'fields' => array(
        array(
            'id'=>'ftc_body_font_enable_google_font',
            'type' => 'switch',
            'title' => esc_html__('Body Font - Enable Google Font', 'karo'),
            'default' => 1,
            'folds'    => 1,
            'on' => esc_html__('Yes', 'karo'),
            'off' => esc_html__('No', 'karo'),
        ),
        array(
            'id'=>'ftc_body_font_family',
            'type'          => 'select',
            'title'         => esc_html__('Body Font - Family Font', 'karo'),
            'default'       => 'Arial',
            'options'            => array(
                "Arial" => "Arial"
                ,"Advent Pro" => "Advent Pro"
                ,"Verdana" => "Verdana, Geneva"
                ,"Trebuchet" => "Trebuchet"
                ,"Georgia" => "Georgia"
                ,"Times New Roman" => "Times New Roman"
                ,"Tahoma, Geneva" => "Tahoma, Geneva"
                ,"Palatino" => "Palatino"
                ,"Helvetica" => "Helvetica"
                ,"BebasNeue" => "BebasNeue"
                ,"Poppins" =>"Poppins"
                ,"Droid Serif" => "Droid Serif"


            ),
        ),
        array(
            'id'=>'ftc_body_font_google',
            'type' 			=> 'typography',
            'title' 		=> esc_html__('Body Font - Google Font', 'karo'),
            'google' 		=> true,
            'subsets' 		=> false,
            'font-style' 	=> false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'text-align' 	=> false,
            'color' 		=> false,
            'output'        => array('body'),
            'default'       => array(
                'color'			=> "#000000",
                'google'		=> true,
                'font-family'	=> 'Montserrat'

            ),
            'preview'       => array(
                "text" => esc_html__("This is my font preview!", "karo")
                ,"size" => "30px"
            )
        ),
        array(
            'id'        =>'ftc_secondary_body_font_enable_google_font',
            'title'     => esc_html__('Secondary Body Font - Enable Google Font', 'karo'),
            'on'       => esc_html__("Enable", "karo"),
            'off'      => esc_html__("Disable", "karo"),
            'type'     => 'switch',
            'default'   => 1
        ),
        array(
            'id'            => 'ftc_secondary_body_font_google',
            'type'          => 'typography',
            'title'         => esc_html__('Body Font - Google Font', 'karo'),
            'google'        => true,
            'subsets'       => false,
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'line-height'   => false,
            'text-align'    => false,
            'color'         => false,
            'output'        => array('body'),
            'default'       => array(
                'color'         =>"#444",
                'google'        =>true,
                'font-family'   =>'Lato'                            
            ),
            'preview'       => array(
                "text" => esc_html__("This is my font preview!", "karo")
                ,"size" => "30px"
            )
        ),
        array(
            'id'        =>'ftc_font_size_body',
            'type'      => 'slider',
            'title'     => esc_html__('Body Font Size', 'karo'),
            'desc'     => esc_html__("In pixels. Default is 14px", "karo"),
            'min'      => '10',
            'step'     => '1',
            'max'      => '50',
            'default'   => '14'
        ),	
        array(
            'id'        =>'ftc_line_height_body',
            'type'      => 'slider',
            'title'     => esc_html__('Body Font Line Heigh', 'karo'),
            'desc'     => esc_html__("In pixels. Default is 24px", "karo"),
            'min'      => '10',
            'step'     => '1',
            'max'      => '50',
            'default'   => '24'
        )				
    )
);

/*** WooCommerce Config     ** */
if ( class_exists( 'Woocommerce' ) ) :
    $this->sections[] = array(
     'icon' => 'icofont icofont-cart-alt',
     'icon_class' => 'icon',
     'title' => esc_html__('Ecommerce', 'karo'),
     'fields' => array(				
     )
 );

    /** Woocommerce **/
    $this->sections[] = array(
     'icon' => 'icofont icofont-double-right',
     'icon_class' => 'icon',
     'subsection' => true,
     'title' => esc_html__('Woocommerce', 'karo'),
     'fields' => array(	
        array(  
            "title"      => esc_html__("Product Label", "karo")
            ,"desc"     => ""
            ,"id"       => "product_label_options"
            ,"icon"     => true
            ,"type"     => "info"
        ),
        array(  
            "title"      => esc_html__("Product Sale Label Text", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_product_sale_label_text"
            ,"default"      => "Sale"
            ,"type"     => "text"
        ),
        array(  
            "title"      => esc_html__("Product Feature Label Text", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_product_feature_label_text"
            ,"default"      => "New"
            ,"type"     => "text"
        ),						
        array(  
            "title"      => esc_html__("Product Out Of Stock Label Text", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_product_out_of_stock_label_text"
            ,"default"      => "Sold out"
            ,"type"     => "text"
        ),           		
        array(   
            "title"      => esc_html__("Show Sale Label As", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_show_sale_label_as"
            ,"default"      => "text"
            ,"type"     => "select"
            ,"options"  => array(
                'text'      => esc_html__('Text', 'karo')
                ,'number'   => esc_html__('Number', 'karo')
                ,'percent'  => esc_html__('Percent', 'karo')
            )
        ),
        array(  
            "title"      => esc_html__("Product Hover Style", "karo")
            ,"desc"     => ""
            ,"id"       => "prod_hover_style_options"
            ,"icon"     => true
            ,"type"     => "info"
        ),
        array(  
            "title"      => esc_html__("Hover Style", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_effect_hover_product_style"
            ,"default"      => "style-1"
            ,"type"     => "select"
            ,"options"  => array(
                'style-1'       => esc_html__('Style 1', 'karo')
                ,'style-2'      => esc_html__('Style 2', 'karo')
                ,'style-3'      => esc_html__('Style 3', 'karo')
            )
        ),
        array(  
            "title"      => esc_html__("Back Product Image", "karo")
            ,"desc"     => ""
            ,"id"       => "introduction_enable_img_back"
            ,"icon"     => true
            ,"type"     => "info"
        ),					
        array(   
            "title"      => esc_html__("Enable Second Product Image", "karo")
            ,"desc"     => esc_html__("Show second product image on hover. It will show an image from Product Gallery", "karo")
            ,"id"       => "ftc_effect_product"
            ,"default"      => "1"
            ,"type"     => "switch"
        ),
        array(  
            "title"      => "Number Of Gallery Product Image"
            ,"id"       => "ftc_product_gallery_number"
            ,"default"      => 3
            ,"type"     => "text"
        ),
        array(  
            "title"      => esc_html__("Lazy Load", "karo")
            ,"desc"     => ""
            ,"id"       => "prod_lazy_load_options"
            ,"icon"     => true
            ,"type"     => "info"
        ),
        array(  
            "title"      => esc_html__("Activate Lazy Load", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_prod_lazy_load"
            ,"default"      => 1
            ,"type"     => "switch"
        ),
        array(
            'id'=>'ftc_prod_placeholder_img',
            'type' => 'media',
            'compiler'  => 'true',
            'mode'      => false,
            'title' => esc_html__('Placeholder Image', 'karo'),
            'desc'      => '',
            'default' => array(
                'url' => get_template_directory_uri(). '/assets/images/prod_loading.gif'
            )
        ),
        array(  
            "title"      => esc_html__("Quickshop", "karo")
            ,"desc"     => ""
            ,"id"       => "quickshop_options"
            ,"icon"     => true
            ,"type"     => "info"
        ),
        array(  
            "title"      => esc_html__("Activate Quickshop", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_enable_quickshop"
            ,"default"      => 1
            ,"type"     => "switch"
        ),
        array(  
            "title"      => esc_html__("Catalog Mode", "karo")
            ,"desc"     => ""
            ,"id"       => "introduction_catalog_mode"
            ,"icon"     => true
            ,"type"     => "info"
        ),
        array(  
            "title"      => esc_html__("Enable Catalog Mode", "karo")
            ,"desc"     => esc_html__("Hide all Add To Cart buttons on your site. You can also hide Shopping cart by going to Header tab > turn Shopping Cart option off", "karo")
            ,"id"       => "ftc_enable_catalog_mode"
            ,"default"      => "0"
            ,"type"     => "switch"
        ),
        array(     
            "title"      => esc_html__("Ajax Search", "karo")
            ,"desc"     => ""
            ,"id"       => "ajax_search_options"
            ,"icon"     => true
            ,"type"     => "info"
        ),
        array(     
            "title"      => esc_html__("Enable Ajax Search", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_ajax_search"
            ,"default"      => "1"
            ,"type"     => "switch"
        ),
        array(     
            "title"      => esc_html__("Number Of Results", "karo")
            ,"desc"     => esc_html__("Input -1 to show all results", "karo")
            ,"id"       => "ftc_ajax_search_number_result"
            ,"default"      => 3
            ,"type"     => "text"
        ),
        array(     
            "title"      => esc_html__("Enable Infinite Scroll", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_prod_scroll_load"
            ,"default"      => 1
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Portfolio Full Width", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_port_single_style"
        ,'type' => 'switch'
        ,'default' => 0
        ,'on' => esc_html__('Enable', 'karo')
        ,'off' => esc_html__('Disable', 'karo')
       
        ),
    )
);

/*** Product Category ***/
$this->sections[] = array(
 'icon' => 'icofont icofont-double-right',
 'icon_class' => 'icon',
 'subsection' => true,
 'title' => esc_html__( 'Product Category', 'karo'),
 'fields' => array(
  array(
   'id' => 'ftc_prod_cat_layout',
   'type' => 'image_select',
   'title' => esc_html__('Product Category Layout', 'karo'),
   'des' => esc_html__('Select main content and sidebar alignment.', 'karo'),
   'options' => $ftc_layouts,
   'default' => '0-1-0'
),						
  array(    
    "title"      => esc_html__("Left Sidebar", "karo")
    ,"id"       => "ftc_prod_cat_left_sidebar"
    ,"default"      => "product-category-sidebar"
    ,"type"     => "select"
    ,"options"  => $of_sidebars
),						
  array(    
    "title"      => esc_html__("Right Sidebar", "karo")
    ,"id"       => "ftc_prod_cat_right_sidebar"
    ,"default"      => "product-category-sidebar"
    ,"type"     => "select"
    ,"options"  => $of_sidebars
),
  array(    
    "title"      => esc_html__("Product Columns", "karo")
    ,"id"       => "ftc_prod_cat_columns"
    ,"default"      => "3"
    ,"type"     => "select"
    ,"options"  => array(
        3   => 3
        ,4  => 4
        ,5  => 5
        ,6  => 6
    )
),
  array(    
      "title"      => esc_html__("Products Per Page", "karo")
      ,"desc"     => esc_html__("Number of products per page", "karo")
      ,"id"       => "ftc_prod_cat_per_page"
      ,"default"      => 12
      ,"type"     => "text"
  ),
  array(   
       "title"      => esc_html__("Catalog view", "karo")
       ,"desc"     => esc_html__("Display option to show product in grid or list view", "karo")
       ,"id"       => "ftc_enable_glt"
       ,"default"      => 0
       ,"on"       => esc_html__("Show", "karo")
       ,"off"      => esc_html__("Hide", "karo")
       ,"type"     => "switch"
   ),       
      array(
        'title'      => esc_html__( 'Default catalog view', 'karo' ),
        'desc'  => esc_html__( 'Display products in grid or list view by default', 'karo' ),
        'id'        => 'ftc_glt_default',
        'type'      => 'select',
        "default"      => 'grid',
        'options'   => array(
            'grid'  => esc_html__('Grid', 'karo'),
            'list'  => esc_html__('List', 'karo')
        )
    ), 
  array(   
     "title"      => esc_html__("Top Content Widget Area", "karo")
     ,"desc"     => esc_html__("Display Product Category Top Content widget area", "karo")
     ,"id"       => "ftc_prod_cat_top_content"
     ,"default"      => 1
     ,"on"       => esc_html__("Show", "karo")
     ,"off"      => esc_html__("Hide", "karo")
     ,"type"     => "switch"
 ),
  array(    
    "title"      => esc_html__("Product Thumbnail", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_thumbnail"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(    
    "title"      => esc_html__("Product Label", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_label"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Categories", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_cat"
    ,"default"      => 0
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Title", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_title"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product SKU", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_sku"
    ,"default"      => 0
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Rating", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_rating"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Price", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_price"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Add To Cart Button", "karo")
    ,"desc"     => ""
    ,"id"       => "ftc_prod_cat_add_to_cart"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(    
   "title"      => esc_html__("Product Short Description - Grid View", "karo")
   ,"desc"     => esc_html__("Show product description on grid view", "karo")
   ,"id"       => "ftc_prod_cat_grid_desc"
   ,"default"      => 0
   ,"on"       => esc_html__("Show", "karo")
   ,"off"      => esc_html__("Hide", "karo")
   ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Short Description - Grid View - Limit Words", "karo")
    ,"desc"     => esc_html__("Number of words to show product description on grid view. It is also used for product shortcode", "karo")
    ,"id"       => "ftc_prod_cat_grid_desc_words"
    ,"default"      => 8
    ,"type"     => "text"
),
  array(     
    "title"      => esc_html__("Product Short Description - List View", "karo")
    ,"desc"     => esc_html__("Show product description on list view", "karo")
    ,"id"       => "ftc_prod_cat_list_desc"
    ,"default"      => 1
    ,"on"       => esc_html__("Show", "karo")
    ,"off"      => esc_html__("Hide", "karo")
    ,"type"     => "switch"
),
  array(  
    "title"      => esc_html__("Product Short Description - List View - Limit Words", "karo")
    ,"desc"     => esc_html__("Number of words to show product description on list view", "karo")
    ,"id"       => "ftc_prod_cat_list_desc_words"
    ,"default"      => 50
    ,"type"     => "text"
)					
)
);
/* Product Details Config  */
$this->sections[] = array(
 'icon' => 'icofont icofont-double-right',
 'icon_class' => 'icon',
 'subsection' => true,
 'title' => esc_html__('Product Details', 'karo'),
 'fields' => array(
    array(
       'id' => 'ftc_prod_layout',
       'type' => 'image_select',
       'title' => esc_html__('Product Detail Layout', 'karo'),
       'des' => esc_html__('Select main content and sidebar alignment.', 'karo'),
       'options' => $ftc_layouts,
       'default' => '0-1-1'
   ),
    array(  
        "title"      => esc_html__("Left Sidebar", "karo")
        ,"id"       => "ftc_prod_left_sidebar"
        ,"default"      => "product-detail-sidebar"
        ,"type"     => "select"
        ,"options"  => $of_sidebars
    ),
    array(  
        "title"      => esc_html__("Right Sidebar", "karo")
        ,"id"       => "ftc_prod_right_sidebar"
        ,"default"      => "product-detail-sidebar"
        ,"type"     => "select"
        ,"options"  => $of_sidebars
    ),
    array(  
        "title"      => esc_html__("Product Cloud Zoom", "karo")
        ,"desc"     => esc_html__("If you turn it off, product gallery images will open in a lightbox. This option overrides the option of WooCommerce", "karo")
        ,"id"       => "ftc_prod_cloudzoom"
        ,"default"      => 1
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Attribute Dropdown", "karo")
        ,"desc"     => esc_html__("If you turn it off, the dropdown will be replaced by image or text label", "karo")
        ,"id"       => "ftc_prod_attr_dropdown"
        ,"default"      => 1
        ,"type"     => "switch"
    ),						
    array(  "title"      => esc_html__("Product Thumbnail", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_thumbnail"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Label", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_label"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Navigation", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_show_prod_navigation"
        ,"default"      => 0
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Title", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_title"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Title In Content", "karo")
        ,"desc"     => esc_html__("Display the product title in the page content instead of above the breadcrumbs", "karo")
        ,"id"       => "ftc_prod_title_in_content"
        ,"default"      => 0
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Rating", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_rating"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product SKU", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_sku"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Availability", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_availability"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Excerpt", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_excerpt"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Count Down", "karo")
        ,"desc"     => esc_html__("You have to activate ThemeFTC plugin", "karo")
        ,"id"       => "ftc_prod_count_down"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Price", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_price"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Add To Cart Button", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_add_to_cart"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Categories", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_cat"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Tags", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_tag"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Sharing", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_sharing"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Size Chart", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_show_prod_size_chart"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Size Chart Image", "karo")
        ,"desc"     => esc_html__("Select an image file for all Product", "karo")
        ,"id"       => "ftc_prod_size_chart"
        ,"type"     => "media"
        ,'default' => array(
                        'url' => get_template_directory_uri(). '/assets/images/size-chart.jpg'
                    )
    ),

    
    array(  "title"      => esc_html__("Product Thumbnails", "karo")
        ,"desc"     => ""
        ,"id"       => "introduction_product_thumbnails"
        ,"icon"     => true
        ,"type"     => "info"
    ),
    array(  "title"      => esc_html__("Product Thumbnails Style", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_thumbnails_style"
        ,"default"      => "horizontal" 
        ,"type"     => "select"
        ,"options"  => array(
            'vertical'      => esc_html__('Vertical', 'karo')
            ,'horizontal'   => esc_html__('Horizontal', 'karo')
        )
    ),
    array(  "title"      => esc_html__("Product Tabs", "karo")
        ,"desc"     => ""
        ,"id"       => "introduction_product_tabs"
        ,"icon"     => true
        ,"type"     => "info"
    ),
    array(  "title"      => esc_html__("Product Tabs", "karo")
        ,"desc"     => esc_html__("Enable Product Tabs", "karo")
        ,"id"       => "ftc_prod_tabs"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Tabs Style", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_style_tabs"
        ,"default"      => "defaut"
        ,"type"     => "select"
        ,"options"  => array(
            'default'       => esc_html__('Default', 'karo')
            ,'accordion'    => esc_html__('Accordion', 'karo')
            ,'vertical' => esc_html__('Vertical', 'karo')
        )
    ),
    array(  "title"      => esc_html__("Product Tabs Position", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_tabs_position"
        ,"default"      => "after_summary" 
        ,"fold"     => "ftc_prod_tabs"
        ,"type"     => "select"
        ,"options"  => array(
            'after_summary'     => esc_html__('After Summary', 'karo')
            ,'inside_summary'   => esc_html__('Inside Summary', 'karo')
        )
    ),
    array(  "title"      => esc_html__("Product Custom Tab", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_custom_tab"
        ,"default"      => 1
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"fold"     => "ftc_prod_tabs"
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Product Custom Tab Title", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_custom_tab_title"
        ,"default"      => "Custom tab"
        ,"fold"     => "ftc_prod_tabs"
        ,"type"     => "text"
    ),
    array(  "title"      => esc_html__("Product Custom Tab Content", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_custom_tab_content"
        ,"default"      => "Your custom content goes here. You can add the content for individual product"
        ,"fold"     => "ftc_prod_tabs"
        ,"type"     => "textarea"
    ),
    array(  "title"      => esc_html__("Product Ads Banner", "karo")
        ,"desc"     => ""
        ,"id"       => "introduction_product_ads_banner"
        ,"icon"     => true
        ,"type"     => "info"
    ),
    array(  "title"      => esc_html__("Ads Banner", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_ads_banner"
        ,"default"      => 0
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(     "title"      => esc_html__("Ads Banner Content", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_ads_banner_content"
        ,"default"      => ''
        ,"fold"     => "ftc_prod_ads_banner"
        ,"type"     => "textarea"
    ),
    array(  "title"      => esc_html__("Related - Up-Sell Products", "karo")
        ,"desc"     => ""
        ,"id"       => "introduction_related_upsell_product"
        ,"icon"     => true
        ,"type"     => "info"
    ),
    array(     "title"      => esc_html__("Up-Sell Products", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_upsells"
        ,"default"      => 0
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    ),
    array(  "title"      => esc_html__("Related Products", "karo")
        ,"desc"     => ""
        ,"id"       => "ftc_prod_related"
        ,"default"      => 0
        ,"on"       => esc_html__("Show", "karo")
        ,"off"      => esc_html__("Hide", "karo")
        ,"type"     => "switch"
    )					
)
);

endif;


/* Blog Settings */
$this->sections[] = array(
    'icon' => 'icofont icofont-ui-copy',
    'icon_class' => 'icon',
    'title' => esc_html__('Blog', 'karo'),
    'fields' => array(				
    )
);		

			// Blog Layout
$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Blog Layout', 'karo'),
    'fields' => array(	
        array(
           'id' => 'ftc_blog_layout',
           'type' => 'image_select',
           'title' => esc_html__('Blog Layout', 'karo'),
           'des' => esc_html__('Select main content and sidebar alignment.', 'karo'),
           'options' => $ftc_layouts,
           'default' => '1-1-0'
       ),
        array(   "title"      => esc_html__("Left Sidebar", "karo")
            ,"id"       => "ftc_blog_left_sidebar"
            ,"default"      => "blog-sidebar"
            ,"type"     => "select"
            ,"options"  => $of_sidebars
        ),				
        array(     "title"      => esc_html__("Right Sidebar", "karo")
            ,"id"       => "ftc_blog_right_sidebar"
            ,"default"      => "blog-sidebar"
            ,"type"     => "select"
            ,"options"  => $of_sidebars
        ),
        array(   "title"      => esc_html__("Blog Thumbnail", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_thumbnail"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),										
        array(   "title"      => esc_html__("Blog Date", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_date"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Title", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_title"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Author", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_author"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Comment", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_comment"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Count View", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_count_view"
            ,"default"      => 0
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Read More Button", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_read_more"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Categories", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_categories"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Excerpt", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_excerpt"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Excerpt Strip All Tags", "karo")
            ,"desc"     => esc_html__("Strip all html tags in Excerpt", "karo")
            ,"id"       => "ftc_blog_excerpt_strip_tags"
            ,"default"      => 0
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Excerpt Max Words", "karo")
            ,"desc"     => esc_html__("Input -1 to show full excerpt", "karo")
            ,"id"       => "ftc_blog_excerpt_max_words"
            ,"default"      => "-1"
            ,"type"     => "text"
        )					
    )
);				

/** Blog Detail **/
$this->sections[] = array(
    'icon' => 'icofont icofont-double-right',
    'icon_class' => 'icon',
    'subsection' => true,
    'title' => esc_html__('Blog Details', 'karo'),
    'fields' => array(	
        array(
           'id' => 'ftc_blog_details_layout',
           'type' => 'image_select',
           'title' => esc_html__('Blog Detail Layout', 'karo'),
           'des' => esc_html__('Select main content and sidebar alignment.', 'karo'),
           'options' => $ftc_layouts,
           'default' => '0-1-0'
       ),
        array(  "title"      => esc_html__("Left Sidebar", "karo")
            ,"id"       => "ftc_blog_details_left_sidebar"
            ,"default"      => "blog-detail-sidebar"
            ,"type"     => "select"
            ,"options"  => $of_sidebars
        ),
        array(  "title"      => esc_html__("Right Sidebar", "karo")
            ,"id"       => "ftc_blog_details_right_sidebar"
            ,"default"      => "blog-detail-sidebar"
            ,"type"     => "select"
            ,"options"  => $of_sidebars
        ),
        array(  "title"      => esc_html__("Blog Thumbnail", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_thumbnail"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(     "title"      => esc_html__("Blog Date", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_date"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Title", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_title"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Content", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_content"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Tags", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_tags"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Count View", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_count_view"
            ,"default"      => 0
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Categories", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_categories"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Author Box", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_author_box"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Related Posts", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_related_posts"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        ),
        array(  "title"      => esc_html__("Blog Comment Form", "karo")
            ,"desc"     => ""
            ,"id"       => "ftc_blog_details_comment_form"
            ,"default"      => 1
            ,"on"       => esc_html__("Show", "karo")
            ,"off"      => esc_html__("Hide", "karo")
            ,"type"     => "switch"
        )				
    )
);		
}


public function setHelpTabs() {

}

public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                'opt_name'          => 'smof_data',
                'menu_type'         => 'submenu',
                'allow_sub_menu'    => true,
                'display_name'      => $theme->get( 'Name' ),
                'display_version'   => $theme->get( 'Version' ),
                'menu_title'        => esc_html__('Theme Options', 'karo'),
                'page_title'        => esc_html__('Theme Options', 'karo'),
                'templates_path'    => get_template_directory() . '/admin/et-templates/',
                'disable_google_fonts_link' => true,

                'async_typography'  => false,
                'admin_bar'         => false,
                'admin_bar_icon'       => 'dashicons-admin-generic',
                'admin_bar_priority'   => 50,
                'global_variable'   => '',
                'dev_mode'          => false,
                'customizer'        => false,
                'compiler'          => false,

                'page_priority'     => null,
                'page_parent'       => 'themes.php',
                'page_permissions'  => 'manage_options',
                'menu_icon'         => '',
                'last_tab'          => '',
                'page_icon'         => 'icon-themes',
                'page_slug'         => 'smof_data',
                'save_defaults'     => true,
                'default_show'      => false,
                'default_mark'      => '',
                'show_import_export' => true,
                'show_options_object' => false,

                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => false,
                'output_tag'        => false,

                'database'              => '',
                'system_info'           => false,

                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                ),
                'use_cdn'                   => true,
            );


            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
            }
        }			

    }

    global $redux_ftc_settings;
    $redux_ftc_settings = new Redux_Framework_smof_data();
}
function ftc_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'ftc_removeDemoModeLink');