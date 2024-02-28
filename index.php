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
      return $content;
   }
?>