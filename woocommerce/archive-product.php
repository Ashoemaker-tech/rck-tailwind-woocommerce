<?php

    $products = wc_get_products([
        'limit' => -1, // Retrieve all products
    ]);

    $catalog_orderby_options = array(
    'price'      => __('Price: low to high', 'woocommerce'),
    'price-desc' => __('Price: high to low', 'woocommerce'),
);

$orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'price';

view('shop',[
    'products' => $products,
    'catalog_orderby_options' => $catalog_orderby_options,
    'orderby' => $orderby
]);