<?php
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( "<a href='%s'%s>%s</a>",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
    }
}

function custom_post_type_registration() {
    $labels = array(
        'name'               => 'Продукты',
        'singular_name'      => 'Продукт',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'products'),
        'supports'            => array('title', 'editor'),
        'taxonomies'          => array('product_categories'),
    );

    register_post_type('products', $args);
}
add_action('init', 'custom_post_type_registration');

function custom_taxonomy_registration() {
    register_taxonomy(
        'product_categories',
        'products',
        array(
            'label' => 'Категории продуктов',
            'rewrite' => array('slug' => 'product-categories'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'custom_taxonomy_registration');
?>