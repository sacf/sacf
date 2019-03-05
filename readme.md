## filters

// remove admin menu
add_filter('sacf/admin_menu', '__return_false');

// change default group and field values
add_filter('sacf/defaults', function($defaults) {
    $defaults['fields']['tab']['placement'] = 'left';
    return $defaults;
});

// change paths to template partials and includes
add_filter('sacf/paths', function($paths) {
    $paths['parts-layouts'] = '/template-parts/acf-layouts/';
    return $paths;
});
