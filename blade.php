<?php
// Load the Blade templating engine
require_once 'vendor/autoload.php';

use RyanChandler\Blade\Blade;

$views = __DIR__ . '/resources/views'; // Path to blade templates
$cache = __DIR__ . '/resources/cache'; // Path to cache directory

$blade = new Blade($views, $cache);

// Function to render a Blade template
function view($template, $data = []) {
    global $blade;

    echo $blade->make($template, $data)->render();
}

// Custom WP Directives
$blade->directive('head', fn () => "<?php  wp_head(); ?>");
$blade->directive('footer', fn () => "<?php  wp_footer(); ?>");
$blade->directive('menu', fn ($options = []) => "<?php  wp_nav_menu($options); ?>");