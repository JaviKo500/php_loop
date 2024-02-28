<?php
   /*
      * Plugin Name: Jk Related Post
      * Plugin URI: https://github.com/
      * Description: test plugin
      * Version: 1.0
      * Author: Javiko500
      * Author URI: https://github.com/JaviKo500
      * License: GPL2
      */
   add_filter('the_content', 'addRelatedPost');

   function addRelatedPost( $content) {
      if( !is_singular('post') ){
         return $content;
      }
      $categories = get_the_terms(get_the_ID(), 'category');
      $categoriesIds = array();
      foreach ($categories as $category) {
         $categoriesIds[] = $category->term_id;
      }

      $loop = new WP_Query(array(
         'category_in' => $categoriesIds,
         'post_per_page' => 4,
         'post_not_in' => array( get_the_ID() ),
         'orderby' => 'rand'
      ));

      if ( $loop->have_posts()) {
         $content .= 'Related posts: <br/> <ul>';
         while ( $loop->have_posts()) {
            $loop->the_post();
            $content .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
         }
         $content .= '</ul>';
      }
      wp_reset_query();
      return $content;
   }
?>