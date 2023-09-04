<?php
get_header();
while (have_posts()) {
    the_post(); ?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">

        <div class="generic-content">
            <?php the_content(); ?>
        </div>

        <?php
        $relatedPrograms = get_field('related_programs');

        foreach ($relatedPrograms as $programs) { ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Subject(s) Taught</h2>
            <ul class="link-list min-list">
                <li><a href="<?php echo get_the_permalink($programs) ?>"><?php echo  get_the_title($programs) ?></a></li>
            </ul>
        <?php
        }

        ?>

    </div>
<?php
}
get_footer();
?>