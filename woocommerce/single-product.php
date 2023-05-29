<?php
$current_url = $_SERVER['REQUEST_URI'];

// Extract the product slug from the URL
$product_slug = basename(parse_url($current_url, PHP_URL_PATH));

// Get the product ID based on the slug
$product = get_page_by_path( $product_slug, OBJECT, 'product' );

$product = wc_get_product( $product );

view('single', [
    'product' => $product
]);