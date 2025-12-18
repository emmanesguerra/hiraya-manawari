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
        
    </div>
</div>

<!-- Main Content -->
<main class="container mx-auto px-4 py-16 space-y-16 max-w-6xl">
    <?php for($i = 0; $i < 10; $i++): ?>
        <section class="bg-white rounded-lg shadow p-8">
            <h2 class="text-2xl font-bold mb-4">Section <?php echo $i + 1; ?></h2>
            <p class="text-gray-700 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et justo vitae nunc tincidunt dapibus. 
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque gravida 
                velit a ex finibus, ut porttitor lorem consequat. Integer efficitur, leo non tempor laoreet, erat turpis 
                dapibus nulla, a pretium neque magna non lorem. Donec sit amet arcu a neque tempus venenatis.
            </p>
            <p class="text-gray-700 leading-relaxed mt-4">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam 
                rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
            </p>
        </section>
    <?php endfor; ?>
</main>

<?php get_footer(); ?>
