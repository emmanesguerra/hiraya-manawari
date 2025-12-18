

<?php wp_footer(); ?>

<footer class="bg-gray-800 text-white px-4 pt-24 pb-5 sharp-curve-reverse">
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-left">

            <!-- Brand / Info -->
            <div>
                <h2 class="text-2xl font-extrabold mb-4 tracking-wide uppercase">
                    <?php bloginfo('name'); ?>
                </h2>
                <p class="text-gray-300 leading-relaxed">
                    Building meaningful digital experiences that help turn ideas into reality.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4 uppercase tracking-wide">
                    Quick Links
                </h3>
                <ul class="space-y-2">
                    <li>
                        <a href="<?php echo home_url(); ?>" class="text-gray-300 hover:text-white transition">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact / Social -->
            <div>
                <h3 class="text-lg font-semibold mb-4 uppercase tracking-wide">
                    Get in Touch
                </h3>
                <p class="text-gray-300 mb-4">
                    hello@example.com<br>
                    +63 900 000 0000
                </p>

                <div class="flex space-x-5">
                    <!-- Facebook -->
                    <a href="#" aria-label="Facebook"
                    class="p-2 rounded-full hover:bg-white/10 transition hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24h11.495v-9.294H9.691V11.01h3.13V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.715-1.796 1.763v2.313h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z"/>
                        </svg>
                    </a>

                    <!-- X (Twitter) -->
                    <a href="#" aria-label="X"
                    class="p-2 rounded-full hover:bg-white/10 transition hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2H21.5l-7.118 8.13L22 22h-6.243l-4.89-6.407L5.31 22H2l7.594-8.678L2 2h6.405l4.42 5.787L18.244 2zm-1.095 18h1.804L7.01 3.86H5.086L17.149 20z"/>
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="#" aria-label="LinkedIn"
                    class="p-2 rounded-full hover:bg-white/10 transition hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14C2.239 0 1 1.239 1 2.766v18.468C1 22.761 2.239 24 5 24h14
                                    c1.761 0 3-1.239 3-2.766V2.766C22 1.239 20.761 0 19 0zM8.339 20.452H5.671V9.003h2.668v11.449z
                                    M7.004 7.793c-.855 0-1.548-.694-1.548-1.548
                                    0-.855.693-1.548 1.548-1.548s1.548.693 1.548 1.548c0 .854-.693 1.548-1.548 1.548z
                                    M20.452 20.452h-2.668v-5.569
                                    c0-1.327-.027-3.037-1.851-3.037
                                    -1.852 0-2.135 1.445-2.135 2.939v5.667h-2.668V9.003h2.559v1.561h.036
                                    c.356-.675 1.227-1.386 2.526-1.386
                                    2.702 0 3.2 1.778 3.2 4.091v7.183z"/>
                        </svg>
                    </a>
                </div>

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