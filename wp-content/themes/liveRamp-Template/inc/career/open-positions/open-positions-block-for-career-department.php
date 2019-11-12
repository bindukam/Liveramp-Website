<section id="careers-scroll" class="block block-text <?php echo $bg_color; ?> block-text-lt jobs-in-department" ng-app="greenHouseApp">
    <div class="ctn" ng-controller="DepartmentCtrl">
        <header class="header-block open-positions">
            <div class="bordered-bottom">
                <h1 class="title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s"><?php echo $title; ?></h1>
            </div>
        </header>
        <div class="open_jobs">
            <ul>
                <li ng-repeat="job in jobs">
                    <a href="<?php echo home_url();?>/jobs/?gh_jid={{job.id}}">{{ job.title }}</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.ctn -->
</section>
<!-- /.jobs-in-department -->