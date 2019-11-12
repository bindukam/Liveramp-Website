<?php
/*
Template Name: Style Guide
*/
get_header(); ?>
<style>
    
</style>
<div class="white-bkg" data-sticky-container>
    <div class="grid-container style-nav white-bkg margin-bottom-2" >
        <div class="grid-x sticky" data-sticky data-margin-top="0">
            <div class="cell">
                <ul class="menu flexo-regular light-slate" data-smooth-scroll data-offset='20' data-threshold='100'  data-magellan>
                  <li><a href="#type" class="blue-slate nav-link">Typography</a></li>
                  <!-- <li><a href="#colors" class="blue-slate nav-link">Colors</a></li> -->
                  <li><a href="#themes" class="blue-slate nav-link">Themes</a></li>
                </ul>
            </div>
        </div>
    </div>    
</div>

<div class="grid-container">
    <div class="grid-x">
        <div class="cell">
            <i class="fab fa-adn"></i>
        </div>
    </div>
</div>

<div class="grid-container">
    <div class="grid-x grid-margin-y">
        <div class="cell" id="type" data-magellan-target="type">
            <hr>
            <h1>Typography</h1>
            
        </div>
        <div class="cell">
            <div class="grid-x grid-margin-x grid-margin-y medium-up-2">
                <div class="cell">
                    <h4 class="allcaps margin-bottom-2">FONT STYLES</h4>
                    <h1>AaBbCc</h1>
                    <h3>Flexo</h3>
                    <p>
                        ABCDEFGHIJKLMNOPQRSTUVWXYZ
                        abcdefghijklmnopqrstuvwxyz
                        0123456789
                        ~%!@#$%^&*-_=+
                         []{}()|\/<>‘’”,.;:?
                    </p>
                </div>
                <div class="cell">
                    <h4 class="allcaps margin-bottom-2">Headings</h4>
                    <h1>H1 - Flexo Bold size: 42/44</h1>
                    <h2>H2 - Flexo Bold size: 36/44</h2>
                    <h3>H3 - Flexo Bold size: 24</h3>
                    <h4>H4 - Flexo Bold size: 18</h4>
                    <h5>H5 - Flexo Bold size 16</h5>
                </div>
                <div class="cell">
                    <h4 class="allcaps margin-bottom-2">Font Weights</h4>
                    <h5 class="flexo-regular">Flexo Reular</h5>
                    <h5 class="flexo-medium">Flexo Medium</h5>
                    <h5 class="flexo-demi">Flexo Demi</h5>
                    <h5 class="flexo-bold">Flexo Bold</h5>

                    
                </div>
                <div class="cell">
                    <h4 class="allcaps margin-bottom-2">Body Copy</h4>
                    <p class="large"><b>Large Paragraph</b></p>
                    <p class="large">
                        Paragraph Large | Flexo - Medium - Regular - #56565B - 18px, 28 line spacing, 10 new line.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed vel quas optio necessitatibus.
                    </p>
                    <p>&nbsp;</p>
                    <p><b>
                        Regular Paragraph
                    </b></p>
                    <p>
                        Paragraph Text | Flexo - Medium - Regular - #56565B - 16px, 26 line spacing, 10 new line. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus expedita suscipit recusandae autem, totam magni aspernatur temporibus sapiente natus.
                    </p>
                    <p>&nbsp;</p>
                    <p><b>
                        Tags
                    </b></p>
                    <p class="tag1">
                       Tag 1 Flexo Regular 14px 
                    </p>
                    <p class="tag2">
                       Tag 2 Flexo Regular 12px 
                    </p>
                    
                </div>
                
                
                <div class="cell" id="themes" data-magellan-target="themes">
                    <h2>Color Themes</h2>
                </div>
                <div class="cell">
                    
                </div>
                
                <div class="cell dark-blue-theme">
                    <h1>Good for Business, <br>
                    great for business</h1>
                    <p class="large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure soluta corporis voluptates fuga nostrum <a href="#">Lorem ipsum dolor.</a> possimus, reprehenderit inventore, architecto ex laboriosam. Magnam, fugit, voluptates!</p>
                    <p class="large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus impedit ut possimus.</p>
                    <a href="#" class="button">A Button</a>
                </div>
                <div class="cell medium-blue-theme">
                    <h3>Good for Business, <br>
                    great for business</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure soluta corporis voluptates fuga nostrum <a href="#">Lorem ipsum dolor.</a> possimus, reprehenderit inventore, architecto ex laboriosam. Magnam, fugit, voluptates!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo error, nihil suscipit.</p>
                    <a href="#" class="button">A Button</a> 
                </div>

            </div>
        </div>
 
    </div>
</div>


<?php /* Start loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer();
