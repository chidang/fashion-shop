<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <?php global $smof_data; ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php 
    ftc_theme_favicon();
    wp_head(); 
    ?>
</head>
<?php
$header_classes = array();
if( isset($smof_data['ftc_enable_sticky_header']) && $smof_data['ftc_enable_sticky_header'] ){
    $header_classes[] = 'header-sticky';
}
?>
<body <?php body_class(); ?>>
    <?php giftsshop_header_mobile_navigation(); ?>

    <div id="page" class="site">
     <a class="skip-link screen-reader-text" href="#content"></a>

     <header id="masthead" class="site-header">

        <div class="header-ftc header-<?php echo esc_attr($smof_data['ftc_header_layout']); ?> ">
           
               <div class="top-barr">
                <div class="container">
                 <div class="top-barr-left">
                    <?php if( $smof_data['ftc_header_language'] ): ?>
                        <div class="ftc-sb-language"><?php echo ftc_wpml_language_selector(); ?></div>
                    <?php endif; ?>
                    <?php if( $smof_data['ftc_header_currency'] ): ?>
                        <div class="header-currency"><?php echo ftc_woocommerce_multilingual_currency_switcher(); ?></div>
                    <?php endif; ?>

                    <?php if( $smof_data['ftc_middle_header_content'] ): ?>
                        <div class="custom_content"><?php echo do_shortcode(stripslashes($smof_data['ftc_middle_header_content'])); ?></div>
                    <?php endif; ?>
                </div>
                <div class="top-barr-right">
                   <?php if( $smof_data['ftc_enable_tiny_account'] ): ?>
                    <div class="ftc-sb-account"><?php echo ftc_tiny_account(); ?>

                </div>
            <?php endif; ?>
            <?php if( class_exists('YITH_WCWL') && $smof_data['ftc_enable_tiny_wishlist'] ): ?>
                <div class="ftc-my-wishlist"><?php echo ftc_tini_wishlist(); ?></div>
            <?php endif; ?>
            <?php if (ftc_has_woocommerce() && $smof_data['ftc_enable_tiny_checkout']): ?>
                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-header">
                    <i class="fa fa-check"></i><?php esc_html_e('Checkout', 'karo'); ?></a>
            <?php endif; ?>

        </div>
    </div>
</div>
<div class="header-content <?php echo esc_attr(implode(' ', $header_classes)); ?>">
    <div class="container">
        <div class="h8-top">
            <div class="mobile-button">
                <div class="mobile-nav">
                    <i class="fa fa-bars"></i>
                </div>
            </div>

            <?php if( $smof_data['ftc_enable_search'] ): ?>
                <div class="ftc-search-product"><?php ftc_get_search_form_by_category(); ?></div>
            <?php endif; ?> 
            <div class="logo-wrapper is-desktop"><?php ftc_theme_logo(); ?></div>
            <div class="logo-wrapper is-mobile"><?php ftc_theme_mobile_logo(); ?></div>
            <div class="menus">
              <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="navigation-primary">
                  <?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
                </div><!-- .container -->
              <?php endif; ?>
            </div>
            <div class="nav-right">

                <?php if( $smof_data['ftc_enable_tiny_shopping_cart'] ): ?>
                    <div class="ftc-shop-cart"><?php echo ftc_tiny_cart(); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="h8-bottom">
          <div class="container">
             <?php
             if ( has_nav_menu( 'vertical' ) ) {
                ?>
                <div class="vertical-menu-wrapper">
                   <div class="vertical-menu-heading"><?php echo ftc_get_vertical_menu_heading(); ?></div>
                   <?php get_template_part( 'template-parts/navigation/navigation', 'vertical' ); ?>
               </div>
               <?php
           }
           ?>
           <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <div class="navigation-primary">
              <?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
          </div><!-- .container -->
      <?php endif; ?>
  </div>
</div>

</div>

</div>


</div>
</header><!-- #masthead -->

<div class="site-content-contain">
  <div id="content" class="site-content">
