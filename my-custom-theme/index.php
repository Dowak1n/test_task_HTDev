<?php get_header(); ?>

<?php
$args = array(
    'post_type' => 'products',
    'posts_per_page' => 10,
);

$products_query = new WP_Query($args);

if ($products_query->have_posts()) :
    while ($products_query->have_posts()) : $products_query->the_post(); ?>
        <article <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile;
    wp_reset_postdata();
else : ?>
    <p><?php _e('Извините, продукты не найдены.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>