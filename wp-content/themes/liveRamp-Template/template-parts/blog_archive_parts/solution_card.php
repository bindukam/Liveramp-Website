<?php $interests = get_the_terms( get_the_ID(), 'interest' ); ?>
<?php $roles = get_the_terms( get_the_ID(), 'role' ); ?>
<?php $sort_bys = get_the_terms( get_the_ID(), 'sort_by' ); ?>

<!-- <a href="<?php echo the_permalink(); ?>"> -->
   <div
      class="solution-card click-card"
      data-url="<?php the_permalink() ?>"
      data-interests="<?php if ( ! empty( $interests ) && ! is_wp_error( $interests ) ){
                           foreach ( $interests as $interest ) {
                             echo  $interest->slug ;
                             echo " ";
                           }
                        }?>"
      data-roles="<?php if ( ! empty( $roles ) && ! is_wp_error( $roles ) ){
                           foreach ( $roles as $role ) {
                             echo  $role->slug ;
                             echo " ";
                           }
                        }?>"
      data-sort_bys="<?php if ( ! empty( $sort_bys ) && ! is_wp_error( $sort_bys ) ){
         foreach ( $sort_bys as $sort_by ) {
           echo  $sort_by->slug ;
         }
      }?>">
      <div class="card-title pad-1 green-bkg white">
        <h4><?php the_title(); ?></h4>
        data-roles="<?php if ( ! empty( $roles ) && ! is_wp_error( $roles ) ){
           foreach ( $roles as $role ) {
             echo  $role->slug ;
             echo " ";
           }
        }?>
        <br><br>
        data-interests="<?php if ( ! empty( $interests ) && ! is_wp_error( $interests ) ){
           foreach ( $interests as $interest ) {
             echo  $interest->slug ;
             echo " ";
           }
        }?>
        <br><br>
      
      </div>
      <div class="card-content pad-1">
         <?php the_excerpt(); ?>
      </div>
      <div class="card-cta pad-1">
         <!-- <a href="<?php the_permalink(); ?>"> -->
            <button>Learn More</button>
         <!-- </a> -->
      </div>
   </div>
<!-- </a> -->
