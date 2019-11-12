<?php
$office_id = get_sub_field("choose_office");
$office = new office($office_id);
?>

<section class="block block-text-dk">
    <div class="open-positions">

        <div  class="all_departments">
            <?php foreach($office->get_departments() as $department): ?>
            <div class="open-positions-by-department">
                <h2><?php echo $department->name; ?></h2>
                <ul>
                <?php foreach($department->jobs as $job): ?>
                    <li><a href="/jobs/?gh_jid=<?php echo $job->id ?>" class="transition"><?php echo $job->title ?></a></li>
                <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>