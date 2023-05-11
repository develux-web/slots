<?php
/* Template Name: Privacy Policy */

get_header();

if( have_rows('privacy_page') ):
    while ( have_rows('privacy_page') ) : the_row();
        if( get_row_layout() == 'section_two_inner' ):
        $fieldsSectionTwo = get_sub_field('section_two');
?>
<?php if(!empty(get_field('background_video'))) { ?>
<div class="section-bg">
    <video muted="" playsinline="" autoplay="" loop="">
        <source src="<?php the_field('background_video'); ?>" type="video/mp4">
    </video>
    <span></span>
</div>
<?php } ?>
<!--page-->
<section class="section-two page">
    <div class="container">
        <ul class="breadcrumbs">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<li id="breadcrumbs">','</li>' );
                }
            ?>
        </ul>
        <div class="section-top six">
            <?php if( !empty($fieldsSectionTwo['section_two__title'])) { ?>
            <h1 class="section-title title-xl">
            <h1 class="section-title title-xl">
                <?php echo $fieldsSectionTwo['section_two__title']; ?>
            </h1>
            <?php } ?>
            <?php if( !empty($fieldsSectionTwo['section_two__content'])) { ?>
            <div class="section-text content">
                <?php echo $fieldsSectionTwo['section_two__content']; ?>
            </div>
            <?php } ?>
        </div>



    </div>
</section>
<!--/page-->
<!--play-->
<?php
elseif( get_row_layout() == 'section_one_play_inner' ):
    $fieldsSectionTwo = get_sub_field('section_one_play');
?>
<section class="section-one play" id="play">
    <div class="container">
        <div class="section-top">
            <?php if( !empty($fieldsSectionTwo['section_one_play__title'])) { ?>
                <h2 class="section-title title-x">
                    <?php echo $fieldsSectionTwo['section_one_play__title']; ?>
                </h2>
            <?php } ?>
        </div>
        <?php if( !empty($fieldsSectionTwo['section_one_play__content'])) { ?>
            <div class="play-content content">
                <?php echo $fieldsSectionTwo['section_one_play__content']; ?>
            </div>
        <?php } ?>
    </div>
</section>
<!--/play-->
<!--want-->
<?php
elseif( get_row_layout() == 'section_one_want_inner' ):
$fieldsSectionTwo = get_sub_field('section_one_want');
?>
<section class="section-one want" id="want">
    <div class="container">
        <div class="section-top">
            <?php if( !empty($fieldsSectionTwo['section_one_want__title'])) { ?>
                <h2 class="section-title title-x">
                    <?php echo $fieldsSectionTwo['section_one_want__title']; ?>
                </h2>
            <?php } ?>
        </div>
        <?php if( !empty($fieldsSectionTwo['section_one_want__content'])) { ?>
            <div class="want-content content">
                <?php echo $fieldsSectionTwo['section_one_want__content']; ?>
            </div>
        <?php } ?>
    </div>
</section>
<!--/want-->

<?php

endif;
endwhile;

else :
endif;
get_footer();