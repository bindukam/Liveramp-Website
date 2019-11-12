<?php

$career_options = new CareerOptions();
$all_open_positions = $career_options->all_open_positions();
$all_open_positions_in_ny = $career_options->all_open_positions_in_ny();
$all_open_positions_title = get_field('all_open_positions_title' , 'option');
$all_open_positions_in_ny_title = get_field('all_open_positions_in_new_york_title' , 'option');
$new_york_office_job_index_page_url = get_field('new_york_office_job_index_page' , 'option')

?>

<section id="careers-scroll" class="block <?php echo $bg_color; ?> block-text-lt departments">
    <div class="ctn " ng-app="greenHouseApp">
        <header class="header-block open-positions departments-heading">
            <h1 class="title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s"><?php echo $title; ?></h1>
        </header>
        <div id="green-house-views-container" ng-controller="DepartmentsCtrl" class="row" data-autoscroll="false">

            <a class="departments-anchor show-{{department.id}}"
               href="/{{ url(department.name, 'department') }}/?did={{department.id}}"
               ng-repeat="department in departments">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                    <div class="department">
                        <h2 class="dep-title" custom-description="{title: '{{department.name}}' }">{{ department.name
                            }}</h2>

                        <p class="dep-detail">{{ department.description }}</p>
                    </div>
                </div>
            </a>

            <!--Static  section start (This sections data are inserted manually and API is not responsible for it) -->
            <?php
            if(!empty($all_open_positions)) :
            ?>
            <a class="departments-anchor" href="/open-positions/">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                    <div class="department">
                        <h2 class="dep-title">
                           <?php if(!empty($all_open_positions_title)):
                            echo $all_open_positions_title;
                            else:
                               echo "All Open Positions";
                            endif;
                            ?>
                            </h2>

                        <p class="dep-detail"><?php echo $all_open_positions['description']; ?></p>
                    </div>
                </div>
            </a>

            <?php endif;

            if(!empty($all_open_positions_in_ny)) :
                ?>
                <a class="departments-anchor" href="<?php echo $new_york_office_job_index_page_url; ?>">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                        <div class="department">
                            <h2 class="dep-title"></h2>
                            <h2 class="dep-title">
                                <?php if(!empty($all_open_positions_in_ny_title)):
                                    echo $all_open_positions_in_ny_title;
                                else:
                                    echo "All Open Positions In New York";
                                endif;
                                ?>
                            </h2>

                            <p class="dep-detail"><?php echo $all_open_positions_in_ny['description']; ?></p>
                        </div>
                    </div>
                </a>

            <?php endif; ?>
            <!--Static section end (This sections data are inserted manually and API is not responsible for it) -->


        </div>

        <?php
        if (have_rows('social_media_section')):
            while (have_rows('social_media_section')) : the_row();
                $title = get_sub_field("title");
                ?>
                <div class="social-icon-section">
                    <h2 class="social-bottom-heading wow fadeInUp" data-wow-delay="300ms"
                        data-wow-duration="1.2s"><?php echo $title; ?></h2>

                    <div class="social-link-container">
                        <ul class="social-links wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1.2s">
                            <?php
                            if (have_rows('social_links')):
                                while (have_rows('social_links')) : the_row();
                                    $social_site_link = get_sub_field("social_site_link");
                                    $social_icon = get_sub_field("social_icon");
                                    ?>

                                    <li>
                                        <a target="_blank" href="<?php echo $social_site_link; ?>">
                                            <img src="<?php echo $social_icon; ?>"/>
                                        </a>
                                    </li>
                                <?php
                                endwhile;
                            endif;
                            ?>

                        </ul>
                    </div>
                </div>

            <?php

            endwhile;
        endif;
        ?>

    </div>
</section>
<!-- /.departments -->