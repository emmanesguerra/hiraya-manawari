<?php
/*
Template Name: Hiraya Default Template
*/

get_header(); ?>

<!-- Banner Section -->
<div id="banner" class="bg-blue-600 text-white text-center py-20 px-4 transition-all duration-300 sharp-curve">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
    </div>
</div>

<!-- Main Content -->
<main class="container mx-auto px-4 py-16 space-y-16 max-w-6xl">
    <?php
    if(have_posts()) :
        while(have_posts()) : the_post();
            the_content(); // Editable content from WordPress editor
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
