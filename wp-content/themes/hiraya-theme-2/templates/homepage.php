<?php
/*
Template Name: Homepage Template
*/

get_header(); ?>


<!-- Main Content -->
<main class="container mx-auto px-4 max-w-6xl">

    <div class="banner-container row g-0 align-items-stretch m-3 p-3">
        <div class="col-6 info d-flex">
            <div class="banner p-5 text-left flex-fill">
                <h3 class="mb-0 text-white">Welcome to</h3>
                <h1 class="mb-4 text-white">Hiraya Manawari</h1>
                <p class="text-lg text-gray-700">Discover the beauty of Filipino culture and heritage through our curated content.</p>
                <a href="#explore" class="btn btn-link mt-4">Explore Now</a>
            </div>
        </div>
        <div class="col-6 image d-flex">
            <img src="https://media.istockphoto.com/id/1568051602/photo/smiling-businesswoman-posing-in-modern-office.jpg?s=612x612&w=0&k=20&c=6YE4Wjak2gqSKsNa72JgxjXNngQB4WuAEca6JKwFKVI=" alt="Banner Image" class="img-fluid flex-fill">
        </div>
    </div>

    <?php
    if(have_posts()) :
        while(have_posts()) : the_post();
            the_content(); // Editable content from WordPress editor
        endwhile;
    endif;
    ?>
</main>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
            const headerOffset = 80; // adjust if you have a fixed header
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth' // smooth scroll
            });
            }
        });
    });
</script>

<?php get_footer(); ?>
 