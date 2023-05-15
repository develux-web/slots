<?php get_header(); ?>
        <div class="section-bg">
            <video muted playsinline autoplay loop>
                <source src="<?php the_field('video_bg', 'option'); ?>" type="video/mp4">
            </video>
            <span></span>
        </div>
        <!--page-->
        <section class="section-two page">
            <div class="container">
                <ul class="breadcrumbs">
                    <li>
                        <a href="/">
                            <span>OnlineSlots</span>
                        </a>
                    </li>
                    <li>
                        <span>Privacy Policy</span>
                    </li>
                </ul>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="section-top six">
                        <h1 class="section-title title-xl"><?php the_title(); ?></h1>
                        <div class="section-text content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </section>

<?php get_footer(); ?>
