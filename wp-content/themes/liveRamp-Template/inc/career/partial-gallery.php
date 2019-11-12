<?php
$bg_color_class = get_sub_field('background_color') ? 'bg-' . get_sub_field('background_color') : 'bg-grey-lt';
$image_count = 0;
$images = array();
if (have_rows('gallery_images')):
    while (have_rows('gallery_images')) : the_row();
        $images[] = get_sub_field('each_image');
        $image_count++;
    endwhile;
endif;

switch ($image_count) :
    case 3:
        require_once __DIR__ . '/image-gallery/gallery-for-3-images.php';
        break;
    case 4:
        require_once __DIR__ . '/image-gallery/gallery-for-4-images.php';
        break;
    case 5:
        require_once __DIR__ . '/image-gallery/gallery-for-5-images.php';
        break;
    case 7:
        require_once __DIR__ . '/image-gallery/gallery-for-7-images.php';
        break;
    default:
        echo "<section class='block bg-grey-x-lt'>
                    <div class='ctn'>
                        <h2 class='title error'>
                        Error: Number of image for this gallery is incorrect . Currently you have uploaded total $image_count image. Total image should be 3 or 4 or 5 or 7.
                            Layout of the gallery will be decided by the application based on the number of image count.
                        </h2>
                    </div>
                </section>";
endswitch;