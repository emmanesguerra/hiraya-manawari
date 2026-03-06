<?php
/*
Template Name: Homepage Template
*/

get_header(); ?>

<!-- Banner Section -->
<div id="banner" style="background: linear-gradient(0deg, #fff, #0da6ff);" class="bg-blue-600 text-white text-center py-40 px-4 transition-all duration-300 sharp-curve">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4"><?php bloginfo('name'); ?></h1>
        <h3 class="text-xl italic my-5">Bridging Dreams Across Borders – Connecting Nations, Empowering Aspirations</h3>
        <p class="text-lg">Dream. Connect. Achieve.</p>
        
<!-- 3D Tilted Carousel
<div class="arc-container mt-16">
  <?php 
  $images = [
  ];
  foreach($images as $img): ?>
    <div class="arc-item">
      <div class="arc-card overflow-hidden rounded-xl">
        <img src="<?php echo $img; ?>" alt="Carousel Image" class="w-full h-full object-cover">
      </div>
    </div>
  <?php endforeach; ?>
</div>
 -->


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
