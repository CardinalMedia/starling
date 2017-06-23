<?php

  class Cardinal_Content_Types {

    function __construct(){

      add_action( 'init', array( $this, 'content_types' ) );

    }

    function content_types(){
      
    }

  }