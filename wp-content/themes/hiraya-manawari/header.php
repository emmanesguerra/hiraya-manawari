<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <!-- NAVBAR -->
    <nav id="navbar" class="relative md:fixed md:top-0 w-full bg-blue-600 text-white z-50 transition-all duration-300">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">

            <!-- Logo -->
            <div class="logo text-2xl font-extrabold tracking-wide uppercase">
                <a href="<?php echo home_url(); ?>" class="hover:text-gray-200 transition-colors duration-200">
                    <?php bloginfo('name'); ?>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 font-semibold text-lg">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex space-x-8 font-semibold text-lg relative',
                    'fallback_cb'    => false,
                ]);
                ?>

            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="focus:outline-none p-2">
                    <!-- Hamburger Icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-600 px-4 pb-4">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col space-y-1 font-semibold',
                'fallback_cb'    => false,
            ]);
            ?>
        </div>
    </nav>
</header>

<!-- Mobile toggle JS -->
<script>
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});
</script>



