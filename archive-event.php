<?php
get_header();
pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'See what is going on in our World!'
));
?>
<!-- <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Events
            <?php
            // the_archive_title();
            // if(is_category( )) {
            //    single_cat_title();
            // } if(is_author()){
            //   echo'Posts by '; the_author() ;
            // } 
            ?>
        </h1>
        <div class="page-banner__intro">
            <p>See what is going on in our World! </p>
        </div>
    </div>
</div> -->

<div class="container container--narrow page-section">
<?php
      $today = date('Ymd');
      $homepageEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_per_page' => 3,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      ));

      while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post(); 
        get_template_part('template-parts/content', 'event');
    }
    echo paginate_links();
    ?>
    <hr class="section-break">
    <p>Looking for a recap of past events? <a href="<?php echo site_url( '/past-events' ) ?>">Check out our past events archive.</a></p>
</div>
<?php
get_footer();
?>