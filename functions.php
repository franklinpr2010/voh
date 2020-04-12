<?php 

function load_scripts() {
    wp_enqueue_style('flex-slider', get_template_directory_uri() . '/assets/css/flex-slider.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css');
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('templatemo-finance', get_template_directory_uri() . '/assets/css/templatemo-finance-business.css');
    wp_enqueue_style('mdb', get_template_directory_uri() . '/assets/css/mdb.min.css');
    wp_enqueue_style('bulma', get_template_directory_uri() . '/assets/css/bulma.min.css');

    wp_enqueue_script('jquery-two', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery.slim', get_template_directory_uri() . '/vendor/bootstrap/js/jquery.slim.min.js', array('jquery-two'), null, true);
    wp_enqueue_script('accordions', get_template_directory_uri() . '/assets/js/accordions.js', array('jquery-two'), null, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery-two'), null, true);
    wp_enqueue_script('owl-js', get_template_directory_uri() . '/assets/js/owl.js', array('jquery-two'), null, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery-two'), null, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery-two'), null, true);
    wp_enqueue_script('mdb-js', get_template_directory_uri() . '/assets/js/mdb.min.js', array('jquery-two'), null, true);
}

//Fazendo a chamada dos scripts
add_action( 'wp_enqueue_scripts', 'load_scripts' );


/**
 * Adicionando imagem aos post-thumbnails, no caso dos posts
 */
add_theme_support( 'post-thumbnails');
add_theme_support( 'automatic-feed-links' );
add_theme_support('nav-menus');


// BREADCRUMBS  --------------------------------------------------------------------------------------------------------

// Breadcrumbs
function custom_breadcrumbs() {
    $breadcrums_id      = '';
    $breadcrums_class   = '';
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
    // Get the query & post information
    global $post,$wp_query;
    // Do not display on the homepage
    if ( !is_front_page() ) {
        echo '<nav class="Breadcrumb">';
        // Build the breadcrums
        echo '<ol id="' . $breadcrums_id . '">';
        // Home page
        echo '<li class="breadcrumb-item" style="display:inline"><a href="' . get_home_url() . '" title="' . $home_title . '"><i class="fa fa-home" aria-hidden="true"></i></a></li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
 
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="breadcrumb-item" style="display:inline"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                
                
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {

        
             // If it is a custom post type display name and link
             if(get_post_type() != 'post') {
                // If post is a custom post type
                $post_type = get_post_type_object(get_post_type());
                $post_type_object = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                $url_post_type = get_home_url() . '/' . $slug['slug'];
                echo '<li class="breadcrumb-item" style="display:inline"><a class="bread-cat bread-custom-post-type" href="' . $url_post_type . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
             }
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item" style="display:inline">'.$parents.'</li>';
                }
            }
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                echo '<li class="breadcrumb-item" style="display:inline"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
            // Standard page
            if( $post->post_parent ){
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item" style="display:inline"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '<li class="breadcrumb-item" style="display:inline"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {
                // Just display current page if not parents
                echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
        } else if ( is_tag() ) {
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
            // Display the tag name
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
        } 
         if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="breadcrumb-item" style="display:inline"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            
               
            // Month display
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="breadcrumb-item" style="display:inline"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ol>';
        echo '</nav>';
           
    }
       
}