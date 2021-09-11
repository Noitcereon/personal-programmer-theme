<?php

// When using a child theme, GeneratePress will automatically enqueue the necessary style.css files. 
// You don’t need to enqueue the parent or child theme CSS files in your functions.php file.
// GeneratePress ChildTheme Article: https://docs.generatepress.com/article/using-child-theme/


/**
 * This function modifies the main WordPress query to remove 
 * pages from search results.
 *
 * @param object $query The main WordPress query.
 */
function exclude_pages_from_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post' ) );
    }    
}
add_action( 'pre_get_posts', 'exclude_pages_from_search_results' );
?>