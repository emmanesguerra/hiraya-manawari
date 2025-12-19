<?php
/*
Template Name: Homepage
*/

get_header(); ?>

<!-- Banner Section -->
<div id="banner" class="bg-blue-600 text-white text-center py-40 px-4 transition-all duration-300 sharp-curve">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Welcome to <?php bloginfo('name'); ?></h1>
        <p class="text-lg">Your dream starts here</p>
        
<!-- 3D Tilted Carousel -->
<div class="arc-container mt-16">
  <?php 
  $images = [
      "https://picsum.photos/id/1015/400/250",
      "https://picsum.photos/id/1016/400/250",
      "https://picsum.photos/id/1018/400/250",
      "https://picsum.photos/id/1020/400/250",
      "https://picsum.photos/id/1024/400/250",
      "https://picsum.photos/id/1025/400/250"
  ];
  foreach($images as $img): ?>
    <div class="arc-item">
      <div class="arc-card overflow-hidden rounded-xl">
        <img src="<?php echo $img; ?>" alt="Carousel Image" class="w-full h-full object-cover">
      </div>
    </div>
  <?php endforeach; ?>
</div>



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
