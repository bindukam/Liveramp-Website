<?php
  function layout_title ($title) {
    echo '<h4 style="background-color:red; color:white; text-align:center; padding:0; margin:0">'.$title.'</h4>';
  }
  
  if(!isset($pageid)){
    $pageid=null;
  }

  if(have_rows('modules', $pageid)){

    while(have_rows('modules', $pageid)){
      the_row();

      if ( !get_sub_field('deactivate') ) {
          layout_title(get_row_layout());
          include ('acf-modules/'.get_row_layout().'.php');
      }
    }
  }
?>
