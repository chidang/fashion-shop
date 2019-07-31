<?php 
global $smof_data;
if( !isset($data) ){
	$data = $smof_data;
}

$data = ftc_array_atts(
 array(
    /* FONTS */
    'ftc_body_font_enable_google_font'					=> 1
    ,'ftc_body_font_family'								=> "Arial"
    ,'ftc_body_font_google'								=> "Montserrat"

    ,'ftc_secondary_body_font_enable_google_font'		=> 1
    ,'ftc_secondary_body_font_family'					=> "Arial"
    ,'ftc_secondary_body_font_google'					=> "Montserrat"

    /* COLORS */
    ,'ftc_primary_color'									=> "#a07936"

    ,'ftc_secondary_color'								=> "#444444"

    ,'ftc_body_background_color'								=> "#ffffff"
    /* RESPONSIVE */
    ,'ftc_responsive'									=> 1
    ,'ftc_layout_fullwidth'								=> 0
    ,'ftc_enable_rtl'									=> 0

    /* FONT SIZE */
    /* Body */
    ,'ftc_font_size_body'								=> 14
    ,'ftc_line_height_body'								=> 24

    /* Custom CSS */
    ,'ftc_custom_css_code'								=> ''
), $data);		

$data = apply_filters('ftc_custom_style_data', $data);

extract( $data );

if( $data['ftc_body_font_enable_google_font'] ){
  $ftc_body_font        = $data['ftc_body_font_google']['font-family'];
}
else{
  $ftc_body_font        = $data['ftc_body_font_family'];
}
if( $data['ftc_secondary_body_font_enable_google_font'] ){
     $ftc_secondary_body_font  = $data['ftc_secondary_body_font_google']['font-family'];
}
else{
   $ftc_secondary_body_font  = $data['ftc_secondary_body_font_family'];
}


?>  

/*
1. FONT FAMILY
2. GENERAL COLORS
*/


/* ============= 1. FONT FAMILY ============== */

body{
line-height: <?php echo esc_html($ftc_line_height_body)."px"?>;
}

html,.widget-title.heading-title,
.widget-title.product_title,.newletter_sub_input .button.button-secondary,
#mega_main_menu.primary ul li .mega_dropdown > li.sub-style > .item_link .link_text,
.our-newletter .mc4wp-form-fields p,
.trending-product .wpb_wrapper h1,
#pp_full_res .pp_inline .price span.amount,
.woocommerce div.product .summary .amount,
.woocommerce div.product .summary h1.product_title.entry-title,
.ftc-feature .ftc_feature_content h3,
div.product div.summary form.cart .group_table td .quantity-title,
.single-post article .post-info .entry-title, 
.deal-today h2, 
.woocommerce div.product .product_title,

.section-welcome p,
.h7-freeship .ftc-feature .ftc_feature_content p,
.title-h7 p,
.woocommerce .product-version-2 .products .product .item-description .product-categories,
.woocommerce .featured-deals .product .item-description .product-categories,
.featured-deals .counter-wrapper > div .number-wrapper .number,
.ftc-sb-testimonial_v2 .testimonial-content .byline,
.ftc-sb-testimonial_v2 .testimonial-content .info,
.ftc-shortcode-v2 .post-img .date-time >div,
.ftc-shortcode-v2 .blogs article h3.product_title,
body .ftc-shortcode-v2 .blogs .entry-content p,
.ftc-shortcode-v2 .blogs .tab-blog,
.color-map .wpb_wrapper >p,
.footer-middle-v2 p,
.row-bottom-v2 .copy-com,
.header-layout5 .ftc-search-product .ftc-search,
.h8-banner p,
.h8-banner .ftc-sb-button a,
.jewe-title h2,
.tithome14,
.slideh13 .ring,
.mont,
.hotspot-content-title a,
.single-portfolio .info-content h2.entry-title,
.ftc-portfolio-wrapper .portfolio-inner .item .thumbnail .figcaption h3 a,
.single-portfolio .meta-content .portfolio-info p,
.dark_layout .blogs article h3.product_title a,
.pp_woocommerce div.product .product_title a
{
  font-family: <?php echo esc_html($ftc_body_font) ?>;
}
body,
#mega_main_menu.primary ul li .mega_dropdown > li.sub-style > ul.mega_dropdown,
#mega_main_menu li.multicolumn_dropdown > .mega_dropdown > li .mega_dropdown > li,
#mega_main_menu.primary ul li .mega_dropdown > li > .item_link .link_text,
.info-open,
.info-phone,
.ftc-sb-account .ftc_login > a,
.ftc-sb-account,
.ftc-my-wishlist *,
.dropdown-button span > span,
body p,
.wishlist-empty,
div.product .social-sharing li a,
.ftc-search form,
.ftc-shop-cart,
.conditions-box,
.item-description .product_title,
.item-description .price,
.testimonial-content .info,
.testimonial-content .byline,
.widget-container ul.product-categories ul.children li a,
.widget-container:not(.ftc-product-categories-widget):not(.widget_product_categories):not(.ftc-items-widget) :not(.widget-title),
.ftc-products-category ul.tabs li span.title,
.woocommerce-pagination,
.woocommerce-result-count,
.woocommerce .products.list .product h3.product-name > a,
.woocommerce-page .products.list .product h3.product-name > a,
.woocommerce .products.list .product .price .amount,
.woocommerce-page .products.list .product .price .amount,
.products.list .short-description.list,
div.product .single_variation_wrap .amount,
div.product div[itemprop="offers"] .price .amount,
.orderby-title,
.blogs .post-info,
.blog .entry-info .entry-summary .short-content,
.single-post .entry-info .entry-summary .short-content,
.single-post article .post-info .info-category,
.single-post article .post-info .info-category,
#comments .comments-title,
#comments .comment-metadata a,
.post-navigation .nav-previous,
.post-navigation .nav-next,
.woocommerce-review-link,
.ftc_feature_info,
.woocommerce div.product p.stock,
.woocommerce div.product .summary div[itemprop="description"],
.woocommerce div.product p.price,
.woocommerce div.product .woocommerce-tabs .panel,
.woocommerce div.product form.cart .group_table td.label,
.woocommerce div.product form.cart .group_table td.price,
footer,
footer a,
.blogs article .image-eff:before,
.blogs article a.gallery .owl-item:after,
.our-newletter .mc4wp-form-fields .submit,
.footer-mobile div a,
.dont_show_popup label, .woocommerce div.product span.price,
.woocommerce .products .short-description, .summary.entry-summary form table tr td a.button,

#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link .link_text,
.h7-freeship .feature-title >a,
.woocommerce .product-version-2 .product .item-description h3.product_title,
.woocommerce .product-version-2 div.product span.price,
.woocommerce .featured-deals .header-title .product_title,
.woocommerce .featured-deals .products .product .item-description h3.product-name a,
.woocommerce .featured-deals .product .item-description .price,
.woocommerce .featured-deals div.product .countdown-meta,
.woocommerce .featured-deals .product .item-description .meta_info a,
.ftc-sb-testimonial_v2 .testimonial-content .name,
.h10wi .woocommerce ul.product_list_widget li .item-description h3.product-name,
.header-layout7 #mega_main_menu.primary ul li .mega_dropdown > li.sub-style > .item_link .link_text,
.header-layout8 #mega_main_menu.primary ul li .mega_dropdown > li.sub-style > .item_link .link_text,
.header-layout5 #mega_main_menu.primary ul li .mega_dropdown > li.sub-style > .item_link .link_text,
.header-layout6 #mega_main_menu.primary ul li .mega_dropdown > li.sub-style > .item_link .link_text,
.jewe-title p,
.testi-home12 .ftc-sb-testimonial_v2 .testimonial-content .info,
.single-text-25 .ftc-sb-button a.ftc-button
{
  font-family: <?php echo esc_html($ftc_secondary_body_font) ?>;
}
body,
.site-footer,
.woocommerce div.product form.cart .group_table td.label,
.woocommerce .product .conditions-box span,
.item-description .meta_info .yith-wcwl-add-to-wishlist a,  .item-description .meta_info .compare,
.info-company li i,
.social-icons .ftc-tooltip:before,
.tagcloud a,
.details_thumbnails .owl-nav > div:before,
div.product .summary .yith-wcwl-add-to-wishlist a:before,
.pp_woocommerce div.product .summary .compare:before,
.woocommerce div.product .summary .compare:before,
.woocommerce-page div.product .summary .compare:before,
.woocommerce #content div.product .summary .compare:before,
.woocommerce-page #content div.product .summary .compare:before,
.woocommerce div.product form.cart .variations label,
.woocommerce-page div.product form.cart .variations label,
.pp_woocommerce div.product form.cart .variations label,
blockquote,
.ftc-number h3.ftc_number_meta,
.woocommerce .widget_price_filter .price_slider_amount,
.wishlist-empty,
.woocommerce div.product form.cart .button,
.woocommerce table.wishlist_table
{
    font-size: <?php echo esc_html($ftc_font_size_body) ?>px;
}
/* ========== 2. GENERAL COLORS ========== */
/* ========== Primary color ========== */
.header-currency:hover .ftc-currency > a,
.ftc-sb-language:hover li .ftc_lang,
.woocommerce a.remove:hover,
.dropdown-container .ftc_cart_check > a.button.view-cart:hover,
.ftc-my-wishlist a:hover,
.ftc-sb-account .ftc_login > a:hover,
.header-currency .ftc-currency ul li:hover,
.dropdown-button span:hover,
body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab.vc_active > a,
body.wpb-js-composer .vc_general.vc_tta-tabs .vc_tta-tab > a:hover,
#mega_main_menu.primary > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link:hover *,
#mega_main_menu.primary > .menu_holder.sticky_container > .menu_inner > ul > li.current-menu-item > .item_link *,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
#mega_main_menu.primary .mega_dropdown > li > .item_link:hover *,
#mega_main_menu.primary .mega_dropdown > li.current-menu-item > .item_link *,
.woocommerce .products .product .price,
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce .products .star-rating,
.woocommerce-page .products .star-rating,
.star-rating:before,
div.product div[itemprop="offers"] .price .amount,
div.product .single_variation_wrap .amount,
.pp_woocommerce .star-rating:before,
.woocommerce .star-rating:before,
.woocommerce-page .star-rating:before,
.woocommerce-product-rating .star-rating span,
ins .amount,
.ftc-meta-widget .price ins,
span.amount,
.ftc-meta-widget .star-rating,
.ul-style.circle li:before,
.woocommerce form .form-row .required,
.blogs .comment-count i,
.blog .comment-count i,
.single-post .comment-count i,
.single-post article .post-info .info-category,
.single-post article .post-info .info-category .cat-links a,
.single-post article .post-info .info-category .vcard.author a,
.ftc-breadcrumb-title .ftc-breadcrumbs-content,
.ftc-breadcrumb-title .ftc-breadcrumbs-content span.current,
.ftc-breadcrumb-title .ftc-breadcrumbs-content a:hover,
.ftc-meta-widget.item-description .meta_info a:hover,
.ftc-meta-widget.item-description .meta_info .yith-wcwl-add-to-wishlist a:hover,
.grid_list_nav a.active,
.ftc-quickshop-wrapper .owl-nav > div.owl-next:hover,
.ftc-quickshop-wrapper .owl-nav > div.owl-prev:hover,
.shortcode-icon .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-orange .vc_icon_element-icon,
.comment-reply-link .icon,
body table.compare-list tr.remove td > a .remove:hover:before,
a:hover,
a:focus,
.vc_toggle_title h4:hover,
.vc_toggle_title h4:before,
.blogs article h3.product_title a:hover,
article .post-info a:hover,
article .comment-content a:hover,
.main-navigation li li.focus > a,
.main-navigation li li:focus > a,
.main-navigation li li:hover > a,
.main-navigation li li a:hover,
.main-navigation li li a:focus,
.main-navigation li li.current_page_item a:hover,
.main-navigation li li.current-menu-item a:hover,
.main-navigation li li.current_page_item a:focus,
.main-navigation li li.current-menu-item a:focus,.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a, article .post-info .cat-links a,article .post-info .tags-link a,
.vcard.author a,article .entry-header .caftc-link .cat-links a,.woocommerce-page .products.list .product h3.product-name a:hover,
.woocommerce .products.list .product h3.product-name a:hover,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:focus, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link,
.ftc-sb-testimonial .testimonial-content .byline,
.content-collection .below-title span,
#dropdown-list.drop:before,
#mega_main_menu.primary > .menu_holder.sticky_container > .menu_inner > ul > li > .item_link:hover *, #mega_main_menu.primary > .menu_holder.sticky_container > .menu_inner > ul > li.current-menu-item > .item_link *, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *, #mega_main_menu.primary .mega_dropdown > li > .item_link:hover *, #mega_main_menu.primary .mega_dropdown > li.current-menu-item > .item_link *,
.blog-home .ftc-sb-blogs.ftc-slider .blogs article .post-info header.entry-header span.author a:hover,
.ftc-sb-testimonial .testimonial-content .name a:hover,
.ftc-feature .feature-content:hover a,
.woocommerce-info::before,
#mega_main_menu.primary ul .mega_dropdown > li.current-menu-item > .item_link, #mega_main_menu.primary ul .mega_dropdown > li > .item_link:focus, #mega_main_menu.primary ul .mega_dropdown > li > .item_link:hover, #mega_main_menu.primary ul li.post_type_dropdown > .mega_dropdown > li > .processed_image:hover,
.woocommerce #content table.wishlist_table.cart a.remove:hover,
#mega_main_menu.primary .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.primary .mega_dropdown > li > .item_link:focus *, #mega_main_menu.primary .mega_dropdown > li > .item_link:hover *, #mega_main_menu.primary li.post_type_dropdown > .mega_dropdown > li > .processed_image:hover > .cover > a > i,
.widget-container.ftc-product-categories-widget ul.product-categories li:hover  span.icon-toggle:before, .widget-container.ftc-product-categories-widget ul.product-categories li a:hover,
.woocommerce div.product:hover .product_title a:hover,
.ftc_blog_widget .post_list_widget .post-title:hover,
.comment-meta a:hover,
.comment-meta a:focus,
.contact_info_map .info_contact .info_column ul:before,
.static-top div .wpb_wrapper .ftc-feature .feature-content a.feature-icon, 
.ftc-my-wishlist a:hover i, .ftc-my-wishlist a:hover span,
.newsletterpopup .close-popup:hover:after,
.about-milestone .content-milestones div.ftc-number:hover:before,
.woocommerce .woocommerce-ordering .orderby ul li:hover a, 
.woocommerce-page .woocommerce-ordering .orderby ul li:hover a,
.woocommerce-page .products.list .product h3.product-name a:hover,
.woocommerce ul.cart_list li a:hover, .woocommerce ul.product_list_widget li a:hover,
.single-post .widget-container.widget_categories ul li:hover, 
.single-post .widget-container.widget_categories ul li a:hover, 
.blog .widget-container.widget_categories ul li:hover, 
.left-blog-sidebar .widget-container.widget_categories ul li:hover,
.right-blog-sidebar .widget-container.widget_categories ul li:hover,
.ftc_blog_widget .post_list_widget .post-title:hover , 
.ftc-blogs-widget span.author:hover i, .ftc-blogs-widget span.author:hover a,
.ftc-shop-cart .ftc_cart_list li .cart-item-wrapper h3 a:hover,
.ftc-shop-cart .dropdown-container ul.ftc_cart_list span.woocommerce-Price-amount.amount,
.woocommerce .products .product .price .amount, .woocommerce-page .products .product .price .amount, .product-price .amount,
.single-product #right-sidebar section.widget-container.widget_recently_viewed_products ul li .ftc-meta-widget a:hover
, .header-ftc .header-content .ftc-shop-cart .ftc-cart-tini:hover
, p.woocommerce-mini-cart__buttons.buttons > a.button.wc-forward:hover
, #dokan-seller-listing-wrap ul.dokan-seller-wrap li .store-content .store-info .store-data h2 a:hover
,.ftc-product-video-button:hover:after,
.header-layout5 a.ftc-cart-tini.cart-item-canvas .cart-total:before,
.footer-middle-v2 .mc4wp-form-fields .sub .button-sub:hover input[type="submit"],
.footer-middle-v2 .mc4wp-form-fields .sub .button-sub:hover:before,
.ftc-sb-testimonial_v2 .testimonial-content .byline,
.h8-banner .ftc-sb-button a.ftc-button:hover,
.top-barr a.checkout-header:hover,
.top-barr .lang_sel_click >ul >li >a:hover,
.top-barr .wcml_currency_switcher >a:hover,
.header-layout6 a.ftc-cart-tini.cart-item-canvas .cart-total:before,
.header-layout7 a.ftc-cart-tini.cart-item-canvas .cart-total:before,
.header-layout8 a.ftc-cart-tini.cart-item-canvas .cart-total:before,
.top-barr-left .header-currency ul li:hover,
.h10-s .owl-nav > div:hover,
.blog-v2.ftc-shortcode-v2 article a.button-readmore:hover,
.dark_layout .blog-home .ftc-sb-blogs.ftc-slider .blogs article .post-info header.entry-header .date-time,
.dark_layout .blog-home .ftc-sb-blogs.ftc-slider .blogs article .post-info header.entry-header span.author,
.dark_layout .blog-home .ftc-sb-blogs.ftc-slider .blogs article .post-info header.entry-header span.author a,
.header-layout9 .left-9 ul li i,
.social-header ul li a:hover i,
.header-layout10 .left-9 ul li .fa-lightbulb-o,
.ring:before,
.home12-category .count-cate,
.header-layout10 .left-9 ul li i,
.header-layout9 .ftc-my-wishlist a:hover:before,
.dark_layout .ftc-sb-testimonial .testimonial-content .name a:hover,
.dark_layout .ftc-sb-testimonial .active.center .testimonial-content .name a:hover,
.hotspot-product .star-rating span::before,
.btn-fresh:hover,
.ftc-portfolio-wrapper .portfolio-inner .item .thumbnail .figcaption h3 a:hover,
.button-noback .blogs article a.button-readmore,
.button-noback article a.button-readmore:after,
.header-hn  .ftc-search-product .ftc-search .search-button:hover,
.header-hn .btn-q:hover i,
.header-hn a.ftc-cart-tini:hover,
.lang-ver ul li:hover i,
.insta-tagr p a:hover,
.header-ftc.header-layout14 .header-content .lang-ver .ftc-shop-cart .ftc-cart-tini .cart-total,
 .header-layout14 .mobile-button:hover .fa-bars:before,
 .footer-center-h9 .copy a:hover,
 .latofont .menu-footer a:hover,
 .after-loop-wrapper span.page-load-status:hover,
 .threesixty-product-360 .nav_bar a:hover
{
    color: <?php echo esc_html($ftc_primary_color) ?>;
}
.ftc-footer .copy-com a:hover, .woocommerce a.remove:hover,.footer-mobile > div > a>i, .mobile-wishlist .fa-heart, .mobile-wishlist .tini-wishlist:hover span.count-wish,
.ftc-shortcode-v2 article a.button-readmore:hover,
.header-layout7 #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover > .link_content > .link_text,
.header-layout7 #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link > .link_content > .link_text,
.row-bottom-v2 .copy-com a,
.h8-banner .ftc-sb-button a:hover,
.mobile-menu-wrapper.menu-fix #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *, .ftc-mobile-wrapper #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current_page_item > .item_link > .link_content > .link_text, .ftc-mobile-wrapper #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link > .link_content > .link_text, .ftc-mobile-wrapper #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
.ftc-mobile-wrapper #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.menu-item-has-children:hover > .item_link:after,
.dark-layout.woocommerce-page .products .product:hover .star-rating,
.woocommerce .product-not-slide .load-more-wrapper .button,
 .woocommerce .product-not-slide.products-v2 .product .item-description .meta_info a:hover,
 .ftc-search-product .ftc-search .search-button:hover,
 .woocommerce .product .item-description .meta_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse .icon-heart, .woocommerce .product .item-description .meta_info .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse .icon-heart
{
    color: <?php echo esc_html($ftc_primary_color) ?> !important;
}
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:focus, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-page-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-post-ancestor > .item_link, #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link, .ftc-button.ftc-button-2, .ftc-button.ftc-button-3,
.about-milestone .left-banner .ftc-sb-button a:hover,
.color-map,
.dots-count .owl-dots > .owl-dot:hover >span,
.header-layout10 .header-content ,
 body .header-layout9 .button.button-secondary:hover,
 .woocommerce.columns-2 .ftc-product.product-not-slide.products-v2 .products .product:nth-child(2n+1) >div.item-description:before, .woocommerce.columns-2 .ftc-product.product-not-slide.products-v2 .products .product:nth-child(4) >div.item-description:before, .woocommerce.columns-2 .ftc-product.product-not-slide.products-v2 .products .product:nth-child(8) >div.item-description:before,
 .woocommerce .product-not-slide.products-v2 .product .item-description .meta_info > div.add-to-cart:hover:before,
 .header-layout3.header-ftc .header-content .ftc-shop-cart .ftc-cart-tini .cart-total,
 .woocommerce-account a.dokan-btn-theme:hover,
.woocommerce-account .dokan-btn-theme:hover,
body .snptwdgt-container .snptwdgt__item .snptcrd__button:hover
{
 background-color: <?php echo esc_html($ftc_primary_color) ?> !important;
}
.karo .tp-bullet.selected,
.dropdown-container .ftc_cart_check > a.button.checkout:hover,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.woocommerce-page .widget_price_filter .price_slider_amount .button:hover,
body input.wpcf7-submit:hover,
.woocommerce .products.list .product   .item-description .add-to-cart a:hover,
.woocommerce .products.list .product   .item-description .button-in a:hover,
.woocommerce .products.list .product   .item-description .meta_info  a:not(.quickview):hover,
.woocommerce .products.list .product   .item-description .quickview i:hover,
.counter-wrapper > div,
.tp-bullets .tp-bullet:after,
.woocommerce .product .conditions-box .onsale,
.woocommerce #respond input#submit:hover, 
.woocommerce a.button:hover,
.woocommerce button.button:hover, 
.woocommerce input.button:hover,
.woocommerce .products .product  .images .button-in:hover a:hover,
.vc_color-orange.vc_message_box-solid,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li a.next:hover,
.woocommerce-page nav.woocommerce-pagination ul li a.next:hover,
.woocommerce nav.woocommerce-pagination ul li a.prev:hover,
.woocommerce-page nav.woocommerce-pagination ul li a.prev:hover,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce .form-row input.button:hover,
.load-more-wrapper .button:hover,
body .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab:hover,
body .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab.vc_active,
.woocommerce div.product form.cart .button:hover,
.woocommerce div.product div.summary p.cart a:hover,
div.product .summary .yith-wcwl-add-to-wishlist a:hover,
.woocommerce #content div.product .summary .compare:hover,
div.product .social-sharing li a:hover,
.tagcloud a:hover,
.woocommerce .wc-proceed-to-checkout a.button.alt:hover,
.woocommerce .wc-proceed-to-checkout a.button:hover,
.woocommerce-cart table.cart input.button:hover,
.owl-dots > .owl-dot span:hover,
.owl-dots > .owl-dot.active span,
footer .style-3 .newletter_sub .button.button-secondary.transparent,
body .vc_tta.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-title > a,
body .vc_tta.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a:hover,
body div.pp_details a.pp_close:hover:before,
.vc_toggle_title h4:after,
body.error404 .page-header a,
body .button.button-secondary,
.pp_woocommerce div.product form.cart .button,
.shortcode-icon .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-orange.vc_icon_element-background,
.style1 .ftc-countdown .counter-wrapper > div,
.style2 .ftc-countdown .counter-wrapper > div,
.style3 .ftc-countdown .counter-wrapper > div,
#cboxClose:hover,
body > h1,
table.compare-list .add-to-cart td a:hover,
.vc_progress_bar.wpb_content_element > .vc_general.vc_single_bar > .vc_bar,
div.product.vertical-thumbnail .details-img .owl-controls div.owl-prev:hover,
div.product.vertical-thumbnail .details-img .owl-controls div.owl-next:hover,
ul > .page-numbers.current,
ul > .page-numbers:hover,
article a.button-readmore:hover,.text_service a,.vc_toggle_title h4:before,.vc_toggle_active .vc_toggle_title h4:before,
.post-item.sticky .post-info .entry-info .sticky-post,
.woocommerce .products.list .product   .item-description .compare.added:hover,
.woocommerce .product   .item-description .meta_info a:hover,
.woocommerce-page .product   .item-description .meta_info a:hover,
.ftc-shop-cart a.ftc_cart .cart-number,
.counter-wrapper > div,
.owl-dots > .owl-dot span:hover, .owl-dots > .owl-dot.active span,
.decorative-icon p.icon-left:before,
.decorative-icon p.icon-right:before,
.woocommerce .product .conditions-box .onsale,
.about-milestone .content-milestones .ftc-number .number:before,
.woocommerce .product   .item-description .meta_info a:hover, 
.woocommerce-page .product   .item-description .meta_info a:hover,
.ftc-sb-button a.ftc-button-2,
article a.button-readmore:hover,
footer .ftc_newletter_sub .newletter_sub .button.button-secondary.transparent:hover,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover,
.trending-product .ftc-sb-button a.ftc-button-2,
.wedding-collection .ftc-sb-button a.ftc-button-3,
footer .ftc_newletter_sub .newletter_sub .button.button-secondary.transparent:hover,
.trending-product .ftc-sb-button a.ftc-button-3,
.woocommerce #content nav.woocommerce-pagination ul li a:hover, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links >span:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .navigation.pagination .nav-links >span.page-numbers.current,
body .subscribe_comingsoon .newletter_sub_input .button.button-secondary:hover,
.single-post .form-submit input#submit:hover, .single-post .form-submit:focus,
.dropdown-container .ftc_cart_check > a.button.checkout:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover, .woocommerce-page .widget_price_filter .price_slider_amount .button:hover, body input.wpcf7-submit:hover, #cboxClose:hover,
#to-top a,
.our-newletter .mc4wp-form-fields .sub .submit:hover,
.newsletterpopup p.button-popup input.submit,
.ftc-mobile-wrapper .menu-text .btn-toggle-canvas.btn-danger,
p.return-to-shop a.button.wc-backward:hover, button#place_order:hover, 
section.ftc-items-widget .widget-title-wrapper h3.widget-title:after
, p.woocommerce-mini-cart__buttons.buttons > a.button.checkout.wc-forward:hover
, .cookies-buttons a.btn.btn-size-small.btn-color-primary.cookies-accept-btn:hover
,.cookies-buttons  a.cookies-more-btn, input[type="submit"].dokan-btn-theme,
a.dokan-btn-theme, .dokan-btn-theme
, input[type="submit"].dokan-btn-theme:hover
, input[type="submit"].dokan-btn-theme:active, a.dokan-btn-theme:active, .dokan-btn-theme:active
, body div.pp_pic_holder a.pp_close:hover, .dokan-single-store .dokan-store-tabs ul li a:hover,
body .tp-bullets.home7 .tp-bullet.selected .h7,
body .tp-bullets.home9 .tp-bullet.selected .h7,
body .tp-bullets.home7 .tp-bullet:hover .h7,
body .tp-bullets.home9 .tp-bullet:hover .h7,
.header-layout5 a.ftc-cart-tini.cart-item-canvas .cart-total,
.header-layout5 .ftc-droplist:hover .icon-ftc-droplist,
.header-layout5 .ftc-droplist:hover .icon-ftc-droplist:before,
.header-layout5 .ftc-droplist:hover .icon-ftc-droplist:after,
.social-v2 li a:hover .box-r,
.bor-date,
.header-layout6 .header-content a.ftc-cart-tini.cart-item-canvas .cart-total,
.header-layout7 .header-content a.ftc-cart-tini.cart-item-canvas .cart-total,
.header-layout8 .header-content a.ftc-cart-tini.cart-item-canvas .cart-total,
.header-layout8 .h8-top .ftc-search-product .ftc-search .search-button,
.header-layout9.header-ftc .header-content .ftc-shop-cart .ftc-cart-tini .cart-total,
.ring,
.btn-now:hover,
.ftc-sb-testimonial_v2 .owl-nav > div:hover,
ul.dot-ul .active .dotslide,
.product-version-3 .owl-nav > div:hover,
.hotspot-btn:after,
.ftc-portfolio-wrapper .portfolio-inner .item .thumbnail .icon-group .zoom-img:hover,
.ftc-portfolio-wrapper .item .icon-group .po-social-sharing:hover:before,
.ftc-portfolio-wrapper .filter-bar li.current, .ftc-portfolio-wrapper .filter-bar li:hover,
.single-portfolio .single-navigation a:hover:before ,
.dark_layout .blog-home .ftc-sb-blogs.ftc-slider .blogs article .post-info header.entry-header .date-time:after,
.header-layout11.header-ftc .header-content .ftc-shop-cart .ftc-cart-tini .cart-total,
.section-centerh14 .widget .tagcloud a:hover,
.woocommerce .product-not-slide .load-more-wrapper .button:after,
footer .footer-center-h9 .social-icons li a:hover,
footer .footer-center-h9 .button-sub input[type="submit"]:hover,
footer .footer-center-h9 p.pas:after,
.header-content .container > div.header-hn .cart-item .cart-total,
.woocommerce .products.list .product .item-description .meta_info a:hover
{
    background-color: <?php echo esc_html($ftc_primary_color) ?>;
}
.dropdown-container .ftc_cart_check > a.button.view-cart:hover,
.dropdown-container .ftc_cart_check > a.button.checkout:hover,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.woocommerce-page .widget_price_filter .price_slider_amount .button:hover,
body input.wpcf7-submit:hover,
.counter-wrapper > div,
#right-sidebar .product_list_widget:hover li,

.ftc-meta-widget.item-description .meta_info a:hover,
.ftc-meta-widget.item-description .meta_info .yith-wcwl-add-to-wishlist a:hover,
.ftc-products-category ul.tabs li:hover,
.ftc-products-category ul.tabs li.current,
body .vc_tta.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-title > a,
body .vc_tta.vc_tta-accordion .vc_tta-panel .vc_tta-panel-title > a:hover,
body div.pp_details a.pp_close:hover:before,
.wpcf7 p input:focus,
.wpcf7 p textarea:focus,
.woocommerce form .form-row .input-text:focus,
body .button.button-secondary,
.ftc-quickshop-wrapper .owl-nav > div.owl-next:hover,
.ftc-quickshop-wrapper .owl-nav > div.owl-prev:hover,
#cboxClose:hover, .woocommerce-account .woocommerce-MyAccount-navigation li.is-active,
.ftc-product-items-widget .ftc-meta-widget.item-description .meta_info .compare:hover,
.ftc-product-items-widget .ftc-meta-widget.item-description .meta_info .add_to_cart_button a:hover,
.woocommerce .product   .item-description .meta_info .add-to-cart a:hover,
.ftc-meta-widget.item-description .meta_info .add-to-cart a:hover,
footer .ftc_newletter_sub .newletter_sub .button.button-secondary.transparent:hover,
.trending-product >.wpb_wrapper,
.trending-product .ftc-sb-button a.ftc-button-2,
.trending-product >.wpb_wrapper,
footer .ftc_newletter_sub .newletter_sub .button.button-secondary.transparent:hover,
.trending-product .ftc-sb-button a.ftc-button-3,
.woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select,
footer .ftc_newletter_sub .newletter_sub .button.button-secondary.transparent:hover,
footer .ftc_newletter_sub .newletter_sub .button.button-secondary.transparent:focus,
.wpcf7 p input:focus, .wpcf7 p textarea:focus, .woocommerce form .form-row .input-text:focus,
.our-newletter .mc4wp-form-fields .sub .submit:hover, .ftc-mobile-wrapper .menu-text .btn-toggle-canvas.btn-danger
, p.woocommerce-mini-cart__buttons.buttons > a.button.wc-forward:hover
, p.woocommerce-mini-cart__buttons.buttons > a.button.checkout.wc-forward:hover
, input[type="submit"].dokan-btn-theme, a.dokan-btn-theme, .dokan-btn-theme
, input[type="submit"].dokan-btn-theme:hover
, input[type="submit"].dokan-btn-theme:active, a.dokan-btn-theme:active, .dokan-btn-theme:active,
.header-ftc #mega_main_menu li.default_dropdown > .mega_dropdown > li.menu-item.drop_to_right > .item_link:hover:before,
.dark_layout article a.button-readmore:hover,
.header-layout9 #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li:hover > .item_link,
.header-layout9 #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .item_link:hover,
.header-layout9  #mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
.woocommerce .version3-deals  .product .item-description .meta_info a,
.section-centerh14 .widget .tagcloud a:hover,
footer .footer-center-h9 .button-sub input[type="submit"]:hover
{
    border-color: <?php echo esc_html($ftc_primary_color) ?>;
}
.trending-product >.wpb_wrapper,
.our-newletter .mc4wp-form-fields .sub .submit:hover,
.home11-bot .ftc-sb-button a.ftc-button:hover,
.btn-now:hover
{
border-color: <?php echo esc_html($ftc_primary_color) ?> !important;
}
#ftc_language ul ul,
.header-currency ul,
.ftc-account .dropdown-container,
.ftc-shop-cart .dropdown-container,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current_page_item,
#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
#mega_main_menu > .menu_holder > .menu_inner > ul > li.current_page_item > a:first-child:after,
#mega_main_menu > .menu_holder > .menu_inner > ul > li > a:first-child:hover:before,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link:before,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current_page_item > .item_link:before,
#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li > .mega_dropdown,
.woocommerce .product .conditions-box .onsale:before,
.woocommerce .product .conditions-box .featured:before,
.woocommerce .product .conditions-box .out-of-stock:before,
.dropdown-menu-header:hover #dropdown-list,
.woocommerce-info, .ftc-enable-ajax-search,
body .tp-bullets.home7 .tp-bullet.selected .h7:after,
body .tp-bullets.home7 .tp-bullet:hover .h7:after,
.social-v2 li a:hover .box-r:after,
.dots-count .owl-dots > .owl-dot:hover >span:after,
.dots-count .owl-dots > .owl-dot.active >span:after,
.bor-date:after,
.top-barr .ftc-sb-language ul ul
{
    border-top-color: <?php echo esc_html($ftc_primary_color) ?>;
}
.woocommerce .products.list .product:hover  .item-description:after,
.woocommerce-page .products.list .product:hover  .item-description:after,
body .tp-bullets.home9 .tp-bullet.selected .h7:after,
body .tp-bullets.home9 .tp-bullet:hover .h7:after
{
    border-left-color: <?php echo esc_html($ftc_primary_color) ?>;
}
footer#colophon .ftc-footer .widget-title:before,
#customer_login h2 span:before,
.cart_totals  h2 span:before,
body .tp-bullets.home7 .tp-bullet.selected .h7:before,
body .tp-bullets.home7 .tp-bullet:hover .h7:before,
.social-v2 li a:hover .box-r:before,
.dots-count .owl-dots > .owl-dot:hover >span:before,
.dots-count .owl-dots > .owl-dot.active >span:before,
.bor-date:before
{
    border-bottom-color: <?php echo esc_html($ftc_primary_color) ?>;
}
body .tp-bullets.home9 .tp-bullet.selected .h7:before,
body .tp-bullets.home9 .tp-bullet:hover .h7:before
{
    border-right-color: <?php echo esc_html($ftc_primary_color) ?>;
}

/* ========== Secondary color ========== */
body,
.ftc-shoppping-cart a.ftc_cart:hover,
#mega_main_menu.primary ul li .mega_dropdown > li.sub-style > .item_link .link_text,
.woocommerce a.remove,
body.wpb-js-composer .vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tab,
.woocommerce .products .star-rating.no-rating,
.woocommerce-page .products .star-rating.no-rating,
.star-rating.no-rating:before,
.pp_woocommerce .star-rating.no-rating:before,
.woocommerce .star-rating.no-rating:before,
.woocommerce-page .star-rating.no-rating:before,
.woocommerce .product .images .group-button-product > div a,
.woocommerce .product .images .group-button-product > a, 
.vc_progress_bar .vc_single_bar .vc_label,
.vc_btn3.vc_btn3-size-sm.vc_btn3-style-outline,
.vc_btn3.vc_btn3-size-sm.vc_btn3-style-outline-custom,
.vc_btn3.vc_btn3-size-md.vc_btn3-style-outline,
.vc_btn3.vc_btn3-size-md.vc_btn3-style-outline-custom,
.vc_btn3.vc_btn3-size-lg.vc_btn3-style-outline,
.vc_btn3.vc_btn3-size-lg.vc_btn3-style-outline-custom,
.style1 .ftc-countdown .counter-wrapper > div .countdown-meta,
.style2 .ftc-countdown .counter-wrapper > div .countdown-meta,
.style3 .ftc-countdown .counter-wrapper > div .countdown-meta,
.style4 .ftc-countdown .counter-wrapper > div .number-wrapper .number,
.style4 .ftc-countdown .counter-wrapper > div .countdown-meta,
body table.compare-list tr.remove td > a .remove:before,
.woocommerce-page .products.list .product h3.product-name a
{
    color: <?php echo esc_html($ftc_secondary_color) ?>;
}
.dropdown-container .ftc_cart_check > a.button.checkout,
.pp_woocommerce div.product form.cart .button:hover,
.info-company li i,
body .button.button-secondary:hover,
div.pp_default .pp_close, body div.pp_woocommerce.pp_pic_holder .pp_close,
body div.ftc-product-video.pp_pic_holder .pp_close,
body .ftc-lightbox.pp_pic_holder a.pp_close,
#cboxClose
{
    background-color: <?php echo esc_html($ftc_secondary_color) ?>;
}
.dropdown-container .ftc_cart_check > a.button.checkout,
.pp_woocommerce div.product form.cart .button:hover,
body .button.button-secondary:hover,
#cboxClose
{
    border-color: <?php echo esc_html($ftc_secondary_color) ?>;
}

/* ========== Body Background color ========== */
body
{
    background-color: <?php echo esc_html($ftc_body_background_color) ?>;
}