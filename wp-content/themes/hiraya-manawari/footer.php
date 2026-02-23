

<?php wp_footer(); ?>

<footer class="bg-gray-800 text-white px-4 pt-24 pb-5 sharp-curve-reverse">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-[30%_20%_50%] gap-12 text-left">

            <!-- Brand / Info -->
            <div>
                <h2 class="text-2xl font-extrabold mb-4 tracking-wide uppercase">
                    <?php bloginfo('name'); ?>
                </h2>
                <p class="text-[color:#9ca3af] leading-relaxed mb-3 italic">
                    Bridging Dreams Across Borders – Connecting Nations, Empowering Aspirations
                </p>
                <p class="text-[color:#9ca3af] leading-relaxed">
                    Dream. Connect. Achieve.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 uppercase tracking-wide">
                    Quick Links
                </h3>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'space-y-2',
                    'link_before'    => '',
                    'link_after'     => '',
                    'fallback_cb'    => false,
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'walker'         => new class extends Walker_Nav_Menu {
                        function start_el(&$output, $item, $depth=0, $args=null, $id=0) {
                            $classes = implode(' ', $item->classes);
                            $output .= '<li class="' . esc_attr($classes) . '">';
                            $output .= '<a href="' . esc_attr($item->url) . '" class="text-[color:#9ca3af] hover:text-white transition-colors duration-300">' . esc_html($item->title) . '</a>';
                        }
                        function end_el(&$output, $item, $depth=0, $args=null) {
                            $output .= '</li>';
                        }
                    }
                ]);
                ?>
            </div>

            <!-- Contact / Social -->
            <div>
                <h3 class="text-lg font-semibold mb-4 uppercase tracking-wide">
                    Get in Touch
                </h3>

                <p class="text-[color:#9ca3af] mb-4 flex items-start gap-2">
                    <i class="fas fa-envelope mt-1"></i>
                    info@hiraya-manawari.com
                </p>

                <p class="text-[color:#9ca3af] mb-4 flex items-start gap-2">
                    <i class="fas fa-map-marker-alt mt-1"></i>
                    143-1 Nakadacho, Chuo-ku, Hamamatsu, Shizuoka, Japan 435-0057
                </p>

                <p class="text-[color:#9ca3af] mb-4 flex items-start gap-2">
                    <i class="fas fa-phone mt-1"></i>
                    +83 53 533 9204
                </p>

                <p class="text-[color:#9ca3af] mb-4 flex items-start gap-2">
                    <i class="fas fa-mobile mt-1"></i>
                    +83 90 9949 1606
                </p>
            </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700 mt-16 pt-6 text-center text-sm text-gray-400">
            © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
        </div>

    </div>
</footer>

</body>
</html>