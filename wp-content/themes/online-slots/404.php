<?php

get_header();

?>
<?php if(!empty(get_field('background_video', 'option'))) { ?>
<div class="section-bg">
    <video muted="" playsinline="" autoplay="" loop="">
        <source src="<?php the_field('background_video', 'option'); ?>" type="video/mp4">
    </video>
</div>
<?php } ?>

<!--mistake-->
<section class="mistake">
    <div class="container">
        <div class="mistake-wrap">
            <?php
                $image = get_field('image', 'option');
                echo wp_get_attachment_image( $image, 'full' );
            ?>
            <h1 class="mistake-title title-xl">
                <?php the_field('title', 'option'); ?>
            </h1>        .
            <?php if(!empty(get_field('content', 'option'))) { ?>
            <a href="<?php the_field('button', 'option'); ?>" class="mistake-btn btn-one">
                <?php the_field('content', 'option'); ?>
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" fill="white"></path>
                </svg>
            </a>
            <?php } ?>
        </div>
    </div>
</section>
<!--/page-->
<?php
get_footer();





