<?php
// Enable menus
add_theme_support('menus');
register_nav_menu('primary', 'Primary Menu');
add_filter('show_admin_bar', '__return_false');

// Enable featured images
add_theme_support('post-thumbnails');

add_action('admin_enqueue_scripts', function($hook) {
    // Only load on page editor screens
    if($hook === 'post.php' || $hook === 'post-new.php') {
        // Include Sortable.js from CDN
        wp_enqueue_script(
            'sortablejs',
            'https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js',
            [],
            '1.15.0',
            true
        );

        // Inline script to activate Sortable on our meta boxes
        wp_add_inline_script('sortablejs', "
            document.addEventListener('DOMContentLoaded', function(){
                new Sortable(document.getElementById('css-sortable'), { animation: 150 });
                new Sortable(document.getElementById('js-sortable'), { animation: 150 });
            });
        ");
    }
});


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
    // Enqueue main theme stylesheet
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri()
    );

    // Enqueue per-page selected CSS and JS
    if(is_page()) {
        // CSS
        $selected_css = get_post_meta(get_the_ID(), '_selected_css', true) ?: [];
        foreach($selected_css as $file){
            wp_enqueue_style(
                "page-{$file}",
                get_template_directory_uri() . "/assets/css/{$file}",
                ['theme-style'],
                filemtime(get_template_directory() . "/assets/css/{$file}")
            );
        }

        // JS
        $selected_js = get_post_meta(get_the_ID(), '_selected_js', true) ?: [];
        foreach($selected_js as $file){
            wp_enqueue_script(
                "page-{$file}",
                get_template_directory_uri() . "/assets/js/{$file}",
                [],
                filemtime(get_template_directory() . "/assets/js/{$file}"),
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



// Add meta box
function get_theme_assets($type = 'css') {
    $folder = get_template_directory() . "/assets/{$type}/";
    $files = [];
    if (file_exists($folder)) {
        foreach (glob($folder . "*.$type") as $file) {
            $files[basename($file)] = str_replace(get_template_directory(), '', $file);
        }
    }
    return $files;
}


add_action('add_meta_boxes', function() {
    add_meta_box(
        'page_assets',
        'Custom CSS & JS Files',
        function($post) {
            $css_files = get_theme_assets('css');
            $js_files  = get_theme_assets('js');

            $selected_css = get_post_meta($post->ID, '_selected_css', true) ?: [];
            $selected_js  = get_post_meta($post->ID, '_selected_js', true) ?: [];

            echo "<h4>CSS Files</h4>";
            echo "<ul id='css-sortable'>";
            foreach($css_files as $file => $path){
                $checked = in_array($file, $selected_css) ? 'checked' : '';
                echo "<li class='sortable-item'><label><input type='checkbox' name='selected_css[]' value='{$file}' {$checked}> {$file}</label></li>";
            }
            echo "</ul>";

            echo "<h4>JS Files</h4>";
            echo "<ul id='js-sortable'>";
            foreach($js_files as $file => $path){
                $checked = in_array($file, $selected_js) ? 'checked' : '';
                echo "<li class='sortable-item'><label><input type='checkbox' name='selected_js[]' value='{$file}' {$checked}> {$file}</label></li>";
            }
            echo "</ul>";

            // Add sortable JS later
        },
        'page', 'normal', 'high'
    );
});

add_action('save_post', function($post_id){
    if(isset($_POST['selected_css'])) {
        update_post_meta($post_id, '_selected_css', $_POST['selected_css']);
    } else {
        delete_post_meta($post_id, '_selected_css');
    }

    if(isset($_POST['selected_js'])) {
        update_post_meta($post_id, '_selected_js', $_POST['selected_js']);
    } else {
        delete_post_meta($post_id, '_selected_js');
    }
});
