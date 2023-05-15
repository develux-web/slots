<?php

get_header();

$casinoInfo = get_field('casino_info');
$postID = $post->ID;
$lang= get_the_terms( $postID, 'lang' );
$pokies = get_the_terms( $postID, 'pokies' );
$providers = get_the_terms( $postID, 'providers' );
$payment = get_the_terms( $postID, 'payment' );
?>
<?php if(!empty(get_field('video_bg', 'options'))) { ?>
<div class="section-bg">
    <video muted playsinline autoplay loop>
        <source src="<?php the_field('video_bg', 'options'); ?>" type="video/mp4">
    </video>
    <span></span>
</div>
<?php } ?>
<!--casino-->
<section class="section-two casino">
    <div class="container">
        <ul class="breadcrumbs">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<li id="breadcrumbs">','</li>' );
            }
            ?>
        </ul>
        <div class="section-top five">
            <h1 class="section-title title-xl">
                <?php echo get_field('casino_name'); ?>
            </h1>
        </div>
        <div class="casino-wrap">
            <div class="casino-info">
                <div class="casino-info_logo">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php endif; ?>
                </div>
                <div class="casino-info_buttons">
                    <a href="<?php echo get_field('play_demo'); ?>" class="casino-info_play btn-one">
                        Play demo
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" fill="white" />
                        </svg>
                    </a>
                    <a href="<?php echo get_field('get_bonus'); ?>" class="casino-info_bonus btn-four">
                        Get bonus
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 3.97217H16.8159C17.0135 3.44164 17.0531 2.86526 16.9299 2.31279C16.8067 1.76014 16.5258 1.25524 16.1215 0.858987C15.5537 0.309044 14.7944 0.00132964 14.0039 0.000343926C13.2136 -0.00082796 12.4535 0.3052 11.8844 0.853458L9.99997 2.73249L8.12163 0.858987C7.55343 0.308701 6.79357 0.000686808 6.00255 1.09368e-06C5.21154 -0.000668549 4.45134 0.306194 3.88228 0.855644C3.47648 1.25174 3.19455 1.75714 3.07065 2.31026C2.94677 2.86354 2.98611 3.44096 3.18416 3.9723H0.999943C0.734764 3.9723 0.4803 4.0776 0.2928 4.2651C0.1053 4.45277 0 4.70704 0 4.97224V8.97236C0 9.23754 0.1053 9.49183 0.2928 9.67933C0.4803 9.867 0.734743 9.9723 0.999943 9.9723V18.9697C0.999943 19.2349 1.10524 19.4894 1.29291 19.6769C1.48041 19.8644 1.73472 19.9697 1.99988 19.9697H18.0002C18.2653 19.9697 18.5196 19.8644 18.7071 19.6769C18.8948 19.4894 19.0001 19.2349 19.0001 18.9697V9.97187C19.2653 9.97187 19.5198 9.86657 19.7073 9.67907C19.8948 9.49157 20 9.23712 20 8.97192V4.97198C20 4.70664 19.8948 4.45234 19.7073 4.26484C19.5198 4.07734 19.2653 3.97187 19.0001 3.97187L19 3.97217ZM13.3012 2.26526C13.4881 2.08111 13.7402 1.97815 14.0025 1.97865C14.265 1.97932 14.5166 2.08362 14.7026 2.26861C14.8926 2.45326 15 2.70691 15 2.97172C15 3.23673 14.8926 3.49038 14.7026 3.67483L14.405 3.97216L11.589 3.97232L13.3012 2.26526ZM5.29725 3.67586C5.10623 3.4907 4.99875 3.23589 4.99959 2.9697C5.00026 2.70369 5.10908 2.44954 5.3011 2.26522C5.48826 2.08056 5.7409 1.97727 6.00387 1.97827C6.26687 1.97945 6.51867 2.08441 6.70433 2.27074L8.41073 3.97247H5.59403L5.29725 3.67586ZM1.99977 5.97223H18.0001V7.97229H1.99977V5.97223ZM2.99972 9.97217H8.99972L8.99989 17.9697H2.99988L2.99972 9.97217ZM16.9999 17.9697H10.9999V9.97217H16.9999V17.9697Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="casino-contain">
                <div class="casino-box">
                    <div class="casino-time">
                        <span class="casino-time_label">Time left</span>
                        <ul class="casino-time_number" data-countdown="<?php echo $casinoInfo['time_left']; ?>"></ul>
                    </div>
                    <span class="casino-title">
                        <?php echo get_field('casino_title'); ?>
                    </span>
                    <ul class="casino-price">
                        <li>
                            <span class="casino-label">Min deposit</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['min_deposit']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Max deposit</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['max_deposit']; ?>
                            </span>
                        </li>
                    </ul>
                    <?php foreach ($casinoInfo['max_deposit'] as $value){ ?>
                    <div class="casino-best">
                        <span class="casino-label">Best game</span>
                        <span class="casino-name">
                            <?php echo $value['best_game_title']; ?>
                        </span>
                        <a href="<?php echo $value['best_game_link']; ?>" class="casino-play btn-two">
                            Play
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" />
                            </svg>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="casino-web">
                        <span class="casino-label">Website</span>
                        <a href="<?php echo $casinoInfo['website']; ?>" class="casino-link">
                            <?php echo $casinoInfo['website_title']; ?>
                        </a>
                    </div>
                    <div class="casino-lang">
                        <span class="casino-label">Languages</span>
                        <ul class="casino-lang_list">
                            <?php foreach ($lang as $item) { ?>
                                <li>
                                   <?php
                                    $image = get_term_meta( $item->term_id, 'thumbnail_id', true );
                                    echo wp_get_attachment_image( $image, 'full' );
                                    ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="casino-content">
                    <ul class="casino-check">
                        <?php foreach (get_field('casino_check') as $value) { ?>
                            <li><?php echo $value['casino_check_item']; ?></li>
                        <?php } ?>
                    </ul>
                    <ul class="casino-tabs">
                        <li>
                            <span class="casino-label">Author:</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['author']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Updated:</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['updated']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Number of games:</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['number_of_games']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Licences</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['licences']; ?>
                            </span>
                        </li>
                    </ul>
                    <div class="casino-text content">
                        <p><?php echo $casinoInfo['casino_content']; ?></p>
                    </div>
                    <div class="casino-free">
                        <span class="casino-sub">Free Pokies</span>
                        <ul class="casino-free_list">
                            <?php foreach ($pokies as $poky) { ?>
                            <li><a href="#"><?php echo ($poky->name); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="casino-providers">
                        <span class="casino-sub">Providers</span>
                        <ul class="casino-providers_list">
                            <?php foreach ($providers as $item) { ?>
                            <li>
                                <a href="<?php echo get_term_link($item->term_id) ?>">
                                    <div class="casino-providers_img">
                                        <?php
                                        $image = get_term_meta( $item->term_id, 'thumbnail_id', true );
                                        echo wp_get_attachment_image( $image, 'full' );
                                        ?>
                                    </div>
                                    <?php echo ($item->name); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="casino-payment">
                        <span class="casino-sub">Payment methods</span>
                        <ul class="casino-payment_list">
                            $payment
                            <?php foreach ($payment as $item) { ?>
                            <li>
                                <a href="#">
                                    <div class="casino-payment_img">
                                        <?php
                                        $image = get_term_meta( $item->term_id, 'thumbnail_id', true );
                                        echo wp_get_attachment_image( $image, 'full' );
                                        ?>
                                    </div>
                                    <?php echo ($item->name); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <ul class="casino-data">
                        <li>
                            <span class="casino-label">Established</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['established']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Owner</span>
                            <span class="casino-name">
                                  <?php echo $casinoInfo['owner']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Support</span>
                            <span class="casino-name">
                                  <?php echo $casinoInfo['support']; ?>
                            </span>
                        </li>
                        <li>
                            <span class="casino-label">Currencies</span>
                            <span class="casino-name">
                                <?php echo $casinoInfo['currencies']; ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <button class="casino-more btn-two">
            <span>More info</span>
            <span>Hide info</span>
        </button>
    </div>
</section>
<!--/casino-->


 <?php if( get_field('show_bonus') ) { ?>
<!--bonus-->
<section class="section-one bonus">
    <div class="container">
        <div class="bonus-wrap">
            <?php $welcomeBonus = get_field('welcome_bonus'); ?>
            <div class="bonus-text">
                <h2 class="bonus-title title-x">
                    <?php echo $welcomeBonus['welcome_bonus_title']; ?>
                </h2>
                <p class="bonus-descr text-xxl">
                    <?php echo $welcomeBonus['welcome_bonus_content']; ?>
                </p>
            </div>
            <a href="<?php echo $welcomeBonus['welcome_bonus_link']; ?>" class="bonus-btn btn-four">
                <?php echo $welcomeBonus['welcome_bonus_text']; ?>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 3.97217H16.8159C17.0135 3.44164 17.0531 2.86526 16.9299 2.31279C16.8067 1.76014 16.5258 1.25524 16.1215 0.858987C15.5537 0.309044 14.7944 0.00132964 14.0039 0.000343926C13.2136 -0.00082796 12.4535 0.3052 11.8844 0.853458L9.99997 2.73249L8.12163 0.858987C7.55343 0.308701 6.79357 0.000686808 6.00255 1.09368e-06C5.21154 -0.000668549 4.45134 0.306194 3.88228 0.855644C3.47648 1.25174 3.19455 1.75714 3.07065 2.31026C2.94677 2.86354 2.98611 3.44096 3.18416 3.9723H0.999943C0.734764 3.9723 0.4803 4.0776 0.2928 4.2651C0.1053 4.45277 0 4.70704 0 4.97224V8.97236C0 9.23754 0.1053 9.49183 0.2928 9.67933C0.4803 9.867 0.734743 9.9723 0.999943 9.9723V18.9697C0.999943 19.2349 1.10524 19.4894 1.29291 19.6769C1.48041 19.8644 1.73472 19.9697 1.99988 19.9697H18.0002C18.2653 19.9697 18.5196 19.8644 18.7071 19.6769C18.8948 19.4894 19.0001 19.2349 19.0001 18.9697V9.97187C19.2653 9.97187 19.5198 9.86657 19.7073 9.67907C19.8948 9.49157 20 9.23712 20 8.97192V4.97198C20 4.70664 19.8948 4.45234 19.7073 4.26484C19.5198 4.07734 19.2653 3.97187 19.0001 3.97187L19 3.97217ZM13.3012 2.26526C13.4881 2.08111 13.7402 1.97815 14.0025 1.97865C14.265 1.97932 14.5166 2.08362 14.7026 2.26861C14.8926 2.45326 15 2.70691 15 2.97172C15 3.23673 14.8926 3.49038 14.7026 3.67483L14.405 3.97216L11.589 3.97232L13.3012 2.26526ZM5.29725 3.67586C5.10623 3.4907 4.99875 3.23589 4.99959 2.9697C5.00026 2.70369 5.10908 2.44954 5.3011 2.26522C5.48826 2.08056 5.7409 1.97727 6.00387 1.97827C6.26687 1.97945 6.51867 2.08441 6.70433 2.27074L8.41073 3.97247H5.59403L5.29725 3.67586ZM1.99977 5.97223H18.0001V7.97229H1.99977V5.97223ZM2.99972 9.97217H8.99972L8.99989 17.9697H2.99988L2.99972 9.97217ZM16.9999 17.9697H10.9999V9.97217H16.9999V17.9697Z" />
                </svg>
            </a>
        </div>
    </div>
</section>
<!--/bonus-->
<?php } ?>




<div class="section-wrap">



    <div class="section-box">
        <?php
        if( have_rows('casino_data') ):
        while ( have_rows('casino_data') ) : the_row();
        ?>
        <?php if( get_row_layout() == 'casino_text' ) {
            $gameFishinText = get_sub_field('text'); ?>
            <!--basic-->
            <section class="section-one <?php echo $gameFishinText[0]['section_id']; ?>" id="<?php echo $gameFishinText[0]['section_id']; ?>">
                <div class="container">

                <?php foreach ($gameFishinText as $item) {
                    if ( $item['acf_fc_layout'] == 'text_header' ): ?>
                            <div class="section-top">
                                <h2 class="section-title title-x">
                                    <?php echo $item['block_text']['text_header'] ; ?>
                                </h2>
                            </div>

                    <?php elseif( $item['acf_fc_layout'] == 'text_inner' ): ?>
                            <div class="basic-content content">
                                <p><?php echo $item['block_text']['text_content'] ; ?></p>
                            </div>
                    
                    <?php elseif ( $item['acf_fc_layout'] == 'table' ): ?>

                        <div class="golden-content content">
                            <div class="wp-block-table">
                                <table>
                                    <tr>
                                        <?php foreach ($gameFishinText[1]['table_headers'] as $table_header) { ?>
                                            <th><?php echo $table_header; ?></th>
                                        <?php } ?>
                                    </tr>
                                    <?php foreach ($item['block_table'] as $item) { ?>
                                        <tr>
                                            <td><?php echo $item['payment_method'] ; ?></td>
                                            <td><?php echo $item['free'] ; ?></td>
                                            <td><?php echo $item['time'] ; ?></td>
                                            <td><?php echo $item['min_limit'] ; ?></td>
                                            <td><?php echo $item['max_limit'] ; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <?php

                            if(!empty($gameFishinText[1]['table_caption'])) { ?>
                            <p><em>
                                    <?php echo $gameFishinText[1]['table_caption']; ?>
                                </em></p>
                            <?php }
                            if(!empty($gameFishinText[1]['content_table'])) { ?>
                            <?php echo $gameFishinText[1]['content_table']; ?>
                            <?php } ?>
                        </div>
                    <?php endif;
                } ?>

                </div>
            </section>
            <!--/basic-->
        <?php } elseif( get_row_layout() == 'casino_list' ){
            $gameList = get_sub_field('slot_list_item'); ?>
            <!--work-->
            <section class="section-one <?php echo get_sub_field('section_id') ?>" id="<?php echo get_sub_field('section_id') ?>">
                <div class="container">
                    <div class="section-top">
                        <h2 class="section-title title-x">
                            <?php echo $gameList['slot_list_header'] ; ?>
                        </h2>
                    </div>
                    <ol class="work-list">
        <?php foreach ($gameList['slot_list_block'] as $item) {
            if ( $item['slot_list_text'] ): ?>
                        <li>
                            <p class="text-xl"><?php echo $item['slot_list_text'] ; ?></p>
                        </li>
            <?php endif;
        } ?>
                    </ol>
                </div>
            </section>
            <!--/work-->
        <?php } elseif( get_row_layout() == 'casino_list_column' ){
            $gameList = get_sub_field('casino_list_item'); ?>
            <!--register-->
            <section class="section-one <?php echo get_sub_field('section_id') ?>" id="<?php echo get_sub_field('section_id') ?>">
                <div class="container">
                    <div class="section-top">
                        <h2 class="section-title title-x">
                            <?php echo $gameList['casino_list_header'] ; ?>
                        </h2>
                    </div>
                    <ul class="register-list">
                        <?php foreach ($gameList['casino_list_block'] as $item) {
                            if ( $item['casino_list_header'] ): ?>
                                        <li class="register-list_point">
                                            <div class="register-list_content content">
                                                <h3>
                                                    <?php echo $item['casino_list_header'] ; ?>
                                                </h3>
                                                <p><?php echo $item['casino_list_text'] ; ?></p>
                                            </div>
                                            <div class="register-list_img">
                                                <?php
                                                $image = $item['casino_list_image'];
                                                echo wp_get_attachment_image( $image, 'full' );
                                                ?>
                                            </div>
                                        </li>
                            <?php endif;
                        } ?>
                    </ul>
                </div>
            </section>
            <!--/register-->

        <?php } elseif( get_row_layout() == 'casino_faq' ){
            $gameFAQ = get_sub_field('faq'); ?>
            <!--faq-->
            <section class="section-one <?php echo get_sub_field('section_id') ?>" id="<?php echo get_sub_field('section_id') ?>">
                <div class="container">
                    <div class="section-top">
                        <h2 class="section-title title-x">
                            <?php echo $gameFAQ['faq_header'] ; ?>
                        </h2>
                    </div>
                    <ul class="faq-list">
        <?php foreach ($gameFAQ['faq_item'] as $item) { ?>
                        <li class="faq-list_point">
                            <div class="faq-list_top">
                                <h3 class="faq-list_title title-lg">
                                    <?php echo $item['faq_title'] ; ?>
                                </h3>
                                <svg class="faq-list_arrow" width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M0.732233 0.696431C1.70854 -0.231818 3.29146 -0.231818 4.26777 0.696431L17.5 13.2773L30.7322 0.696431C31.7085 -0.231818 33.2915 -0.231818 34.2678 0.696431C35.2441 1.62468 35.2441 3.12967 34.2678 4.05792L17.5 20.0002L0.732233 4.05792C-0.244078 3.12967 -0.244078 1.62468 0.732233 0.696431Z"
                                    />
                                </svg>
                            </div>
                            <div class="faq-list_bottom">
                                <div class="faq-list_text content">
                                    <p><?php echo $item['faq_content'] ; ?></p>
                                </div>
                            </div>
                        </li>
        <?php } ?>
                    </ul>
                </div>
            </section>
            <!--/faq-->
        <?php } ?>
        <?php
        endwhile;
        endif;
        ?>
    </div>


    <div class="section-content">
      <span class="section-content_title">
       <?php echo __('Content', 'slots'); ?>
           <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M2.33474 5.77847C2.78105 5.40718 3.50467 5.40718 3.95098 5.77847L10 10.8108L16.049 5.77847C16.4953 5.40718 17.219 5.40718 17.6653 5.77847C18.1116 6.14977 18.1116 6.75177 17.6653 7.12307L10 13.5L2.33474 7.12307C1.88842 6.75177 1.88842 6.14977 2.33474 5.77847Z"
                  fill="white" />
           </svg>
      </span>
    </div>
</div>

<?php

get_footer();