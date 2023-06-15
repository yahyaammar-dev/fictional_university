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
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs </a> <span class="metabox__main"><?php the_title(); ?></span>
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
            <?php the_content();
           

            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'event',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => 'related_program',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"',
                    )
                )
            ));


            if($homepageEvents->have_posts()){
                echo '<hr class="section-break" />';
                echo '<h2 class="headline headline--medium">Upcoming' . get_the_title() .'Events</h2>';
    
                while ($homepageEvents->have_posts()) {
                    $homepageEvents->the_post();
                ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="#">
                            <span class="event-summary__month"><?php
    
                                                                $eventDate = new DateTime(get_field('event_date'));
                                                                echo $eventDate->format('M');
    
                                                                ?></span>
                            <span class="event-summary__day">
                                <?php echo $eventDate->format('d'); ?>
                            </span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="#"><?php the_title(); ?></a></h5>
                            <p> <?php wp_trim_words(the_excerpt(), 55) ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                        </div>
                    </div>
                <?php
                }
            }


            ?>


        </div>
    </div>

    <?php get_footer(); ?>

<?php

}
?>