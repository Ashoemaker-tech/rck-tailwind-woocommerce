<?php
$orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'price';

$args = array(
    'limit' => -1,
    'orderby' => $orderby,
);

$products = wc_get_products($args);

$catalog_orderby_options = array(
    'price'      => __('Price: low to high', 'woocommerce'),
    'price-desc' => __('Price: high to low', 'woocommerce'),
);

// Sort the products array based on the selected sorting order
usort($products, function($a, $b) use ($orderby) {
    if ($orderby === 'price') {
        return $a->get_price() - $b->get_price();
    } elseif ($orderby === 'price-desc') {
        return $b->get_price() - $a->get_price();
    }
    return 0;
});

view('shop', [
    'products' => $products,
    'catalog_orderby_options' => $catalog_orderby_options,
    'orderby' => $orderby
]);