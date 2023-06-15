<?php
while (have_posts()) {
    the_post();
?>


    <?php get_header(); ?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>Don't forget me to replace me later</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home </a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
    </div>






    <div class="container container--narrow page-section">

        <?php




        $theParentId = wp_get_post_parent_id(get_the_ID());
        if ($theParentId) {
        ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_the_permalink($theParentId); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParentId); ?></a> <span class="metabox__main"><?php the_title() ?></span>
                </p>
            </div>



        <?php }

        $testArray = get_pages(array(
            'child_of' => get_the_ID()
        ));

        if ($theParentId or $testArray) {


        ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_the_permalink($theParentId); ?>"><?php echo get_the_title($theParentId); ?></a></h2>
                <ul class="min-list">
                    <?php
                    if ($theParentId) {
                        $findChildrenOf = $theParentId;
                    } else {
                        $findChildrenOf = get_the_Id();
                    }
                    wp_list_pages(array(
                        'title_li' =>  NULL,
                        'child_of' => $findChildrenOf
                    )); ?>
                </ul>
            </div>

        <?php } ?>

        <div class="generic-content">
            <?php the_content(); ?>

            <?php
            $relatedPrograms = get_field('related_program');

            if (count($relatedPrograms) > 0) {
            ?>
                <hr class="section-break" />
                <h2 class="headline headline--medium">Related Program(s)</h2>
                <ul class="link-list min-list">
                    <?php
                    foreach ($relatedPrograms as $program) {
                    ?> <li><a href='<?php echo get_the_permalink($program) ?>'> <?php echo get_the_title($program); ?> </a></li> <?php
                                                                                                                                    }
                                                                                                                                        ?>
                </ul>
            <?php
            }

            ?>



        </div>
    </div>




    <?php get_footer(); ?>

<?php

}
?>