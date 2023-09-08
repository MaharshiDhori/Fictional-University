<?php
get_header();
pageBanner(array(
    'title' => 'All Campuses',
    'subtitle' => 'A very convential campuses located in the world.'
));
?>

<div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php
        while (have_posts()) {
            the_post(); ?>
            <li><a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a></li>
        <?php
        }
        echo paginate_links();
        ?>
    </ul>



    <!-- Below code is usefull when you have a google map api -->

    <!-- <div class="acf-map">
        <?php
        while (have_posts()) {
            the_post();
            $mapLocation = get_field('map_location');
        ?>
        <div class="marker" data-lat="<?php echo $mapLocation['lat']; ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        <?php echo $mapLocation['address']; ?>

    </div>

        <?php
        }
        echo paginate_links();
        ?>
        </div> -->
    <?php
    get_footer();
    ?>