<?php
/*
 * Plugin Name: Add to Cart Button & Tags on Shop
 * Description: Add an add to cart button and show the product tags on the shop grid.
 */

// show tags
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_product_loop_tags', 5 );

function woocommerce_product_loop_tags() {
    global $post, $product;

    $tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

    echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( '', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' );
}

// Add "Add to Cart" buttons in Divi shop pages
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20 );