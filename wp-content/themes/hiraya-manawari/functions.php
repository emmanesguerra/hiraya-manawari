<?php
// Enable menus
add_theme_support('menus');
register_nav_menu('primary', 'Primary Menu');
add_filter('show_admin_bar', '__return_false');

// Enable featured images
add_theme_support('post-thumbnails');

function hiraya_manawari_scripts() {
    wp_enqueue_style('hiraya-style', get_stylesheet_uri());
    wp_enqueue_style('hiraya-main', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'hiraya_manawari_scripts');

// Load page templates from /templates folder
add_filter('theme_page_templates', function($templates) {
    $path = get_template_directory() . '/templates/';
    $new_templates = [];

    foreach (glob($path . '*.php') as $file) {
        $template_data = get_file_data($file, [
            'Template Name' => 'Template Name'
        ]);

        if (!empty($template_data['Template Name'])) {
            // Use the same key WordPress detected
            $key = 'templates/' . basename($file);
            $new_templates[$key] = $template_data['Template Name'];
        }
    }

    // Merge but overwrite WordPress auto-added templates with the same key
    $merged = array_merge($templates, $new_templates);

    // Return only the WordPress-style keys (remove your custom keys)
    foreach ($merged as $key => $name) {
        if (strpos($key, 'custom_') === 0) {
            unset($merged[$key]);
        }
    }

    return $merged;
});

function theme_enqueue_styles() {
    // Enqueue the main theme stylesheet (style.css)
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri() // usually points to style.css in theme root
    );

    // Enqueue custom CSS in assets/css/style.css
    wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/assets/css/style.css',
        ['theme-style'], // dependency
        filemtime(get_template_directory() . '/assets/css/style.css')
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

