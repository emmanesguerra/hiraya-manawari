<?php
/*
Template Name: Hiraya Contact Template
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
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            <!-- Left: Form -->
            <div class="flex justify-center md:justify-end animate-fade-in">
                <?php
                if(have_posts()) :
                    while(have_posts()) : the_post();
                        the_content(); // Editable content from WordPress editor
                    endwhile;
                endif;
                ?>
            </div>

            <!-- Right: Illustration -->
            <div class="bg-white p-10 rounded-3xl shadow-xl">
                <h1 class="text-5xl font-bold text-gray-800 mb-6 animate-fade-in">
                    Have Some Questions?
                </h1>
                <p class="text-gray-600 mb-10 text-lg">
                    We’re here to help. Send us a message and we’ll respond as soon as possible.
                </p>

                <?php
                if (isset($_POST['submit_contact'])) {
                    $name = sanitize_text_field($_POST['name']);
                    $email = sanitize_email($_POST['email']);
                    $subject = sanitize_text_field($_POST['subject']);
                    $message = sanitize_textarea_field($_POST['message']);

                    $to = 'emmanesguerra2013@example.com';
                    $mail_subject = 'Contact Form: ' . $subject;
                    $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";

                    if (wp_mail($to, $mail_subject, $message, $headers)) {
                        echo '<div class="mb-6 p-4 text-green-700 bg-green-100 rounded-lg shadow-sm animate-fade-in">
                                Thank you! Your message has been sent.
                              </div>';
                    } else {
                        echo '<div class="mb-6 p-4 text-red-700 bg-red-100 rounded-lg shadow-sm animate-fade-in">
                                Oops! Something went wrong. Try again.
                              </div>';
                    }
                }
                ?>

                <form method="post"  action="<?php echo esc_url( get_permalink() ); ?>" class="space-y-6">
                    <div class="relative">
                        <input type="text" name="name" placeholder="Your Name" required
                               class="peer w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <div class="relative">
                        <input type="email" name="email" placeholder="Your Email" required
                               class="peer w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <div class="relative">
                        <input type="text" name="subject" placeholder="Subject" required
                               class="peer w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    </div>

                    <div class="relative">
                        <textarea name="message" placeholder＝”Your Message”required
                                  class="peer w-full p-4 border border-gray-300 rounded-xl h-36 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 transition"></textarea>
                    </div>

                    <button type="submit" name="submit_contact"
                            class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-700 shadow-lg transition transform hover:-translate-y-1 hover:scale-105">
                        Send Message
                    </button>
                </form>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>
