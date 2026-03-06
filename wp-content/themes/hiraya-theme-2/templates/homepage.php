<?php
/*
Template Name: Homepage Template
*/

get_header(); ?>


<!-- Main Content -->
<main class="container mx-auto px-4 max-w-6xl">

    <div class="banner-container row g-0 align-items-stretch m-3">
        <div class="col-6 info d-flex">
            <div class="active banner p-5 text-left flex-fill">
                <h3 class="mb-0 text-white">Welcome to</h3>
                <h1 class="mb-4 text-white">Hiraya Manawari 1</h1>
                <p class="text-lg text-gray-700">Discover the beauty of Filipino culture and heritage through our curated content.</p>
                <a href="#explore" class="btn btn-link mt-4">Explore Now</a>
            </div>
            <div class="banner p-5 text-left flex-fill">
                <h3 class="mb-0 text-white">Welcome to</h3>
                <h1 class="mb-4 text-white">Hiraya Manawari 2</h1>
                <p class="text-lg text-gray-700">Discover the beauty of Filipino culture and heritage through our curated content.</p>
                <a href="#explore" class="btn btn-link mt-4">Explore Now</a>
            </div>
            <div class="banner p-5 text-left flex-fill">
                <h3 class="mb-0 text-white">Welcome to</h3>
                <h1 class="mb-4 text-white">Hiraya Manawari 3</h1>
                <p class="text-lg text-gray-700">Discover the beauty of Filipino culture and heritage through our curated content.</p>
                <a href="#explore" class="btn btn-link mt-4">Explore Now</a>
            </div>
            <div class="slider-pagination"></div>
        </div>
        <div class="col-6 image d-flex">
            <img src="https://media.istockphoto.com/id/1568051602/photo/smiling-businesswoman-posing-in-modern-office.jpg?s=612x612&w=0&k=20&c=6YE4Wjak2gqSKsNa72JgxjXNngQB4WuAEca6JKwFKVI=" alt="Banner Image" class="active img-fluid flex-fill">
            <img src="https://www.thestrategyinstitute.org/images/business-strategy-23.png" alt="Banner Image" class="img-fluid flex-fill">
            <img src="https://londonsba.org.uk/wp-content/uploads/2023/09/hands-table-during-business-meeting-1.jpg" alt="Banner Image" class="img-fluid flex-fill">
        </div>
    </div>

    <div class="about-container row g-0 align-items-stretch m-3 p-3">
        <section>
            <h1 class="text-center mb-3">About Us</h1>

            <p><b>Hiraya Manawari</b> is a startup founded on a vision of possibility, connection, and shared progress. Our name carries deep cultural significance and reflects the very foundation of our mission.</p>

            <p>The word Hiraya originates from an ancient Filipino term meaning “the fruit of one’s hopes, dreams, and aspirations.” It represents imagination transformed into reality — the courage to envision a better future and the determination to pursue it.</p>

            <p>Manawari, also derived from Filipino usage, conveys the sense of “may it be fulfilled” or “may it come to pass.” It embodies affirmation, belief, and the hopeful realization of aspirations through perseverance and faith.</p>

            <p>Combined, <b>Hiraya Manawari</b> expresses a powerful philosophy: may your dreams be realized. It is both a declaration and a commitment — a guiding principle that shapes our identity and purpose as an organization.</p>

            <p>As a company, we aspire to serve as a bridge between <b>Japan, the Philippines, and Nepal</b>, fostering meaningful collaboration, cultural understanding, and sustainable partnerships. We are dedicated to connecting people, ideas, and opportunities across these nations, strengthening mutual growth and shared success.</p>

            <p>Hiraya Manawari exists to be part of each individual’s journey toward achieving their dreams and aspirations. Through integrity, innovation, and purposeful engagement, we strive to empower communities and contribute to a future where ambitions are not only envisioned but fulfilled.</p>
        </section>
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const banners = document.querySelectorAll(".banner-container .banner");
    const images = document.querySelectorAll(".banner-container .image img");
    const paginationContainer = document.querySelector(".slider-pagination");

    let current = 0;
    let interval;

    function createPagination() {
        banners.forEach((_, index) => {
            const dot = document.createElement("button");
            if (index === 0) dot.classList.add("active");

            dot.addEventListener("click", () => {
                current = index;
                showSlide(current);
                resetInterval();
            });

            paginationContainer.appendChild(dot);
        });
    }

    function updatePagination() {
        const dots = document.querySelectorAll(".slider-pagination button");
        dots.forEach(dot => dot.classList.remove("active"));
        dots[current].classList.add("active");
    }

    function showSlide(index) {
        banners.forEach(b => b.classList.remove("active"));
        images.forEach(img => img.classList.remove("active"));

        banners[index].classList.add("active");
        images[index].classList.add("active");

        updatePagination();
    }

    function nextSlide() {
        current++;
        if (current >= banners.length) current = 0;
        showSlide(current);
    }

    function startInterval() {
        interval = setInterval(nextSlide, 5000);
    }

    function resetInterval() {
        clearInterval(interval);
        startInterval();
    }

    createPagination();
    startInterval();
});
</script>

<?php get_footer(); ?>
 