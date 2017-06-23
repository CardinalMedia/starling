<?php

  class Cardinal_Assets{

    function __construct(){

      add_action('wp_enqueue_scripts', array( $this, 'load_scripts' ) );

    }

    public function load_scripts(){
      global $post;

      wp_enqueue_style('cardinal/css', get_template_directory_uri() . '/dist/styles/main.css', false, filemtime( get_template_directory() . '/dist/styles/main.css' )	);


      wp_deregister_script( 'jquery' );

      wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
      wp_enqueue_script( 'jquery' );

      wp_enqueue_script('cardinal/js', get_template_directory_uri() . '/dist/scripts/main.js', ['jquery'], filemtime( get_template_directory() . '/dist/scripts/main.js' ), true);
      
    }

  }

  $setup = new Cardinal_Assets();