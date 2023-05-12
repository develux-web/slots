<?php

get_header();

$postID = $post->ID;
$features = get_the_terms( $postID, 'features' );
$themes = get_the_terms( $postID, 'themes' );

if( have_rows('game_info_group') ):
while ( have_rows('game_info_group') ) : the_row();
?>

    <?php if(!empty(get_field('video_bg', 'options'))) { ?>
    <div class="section-bg">
        <video muted playsinline autoplay loop>
            <source src="<?php the_field('video_bg', 'options'); ?>" type="video/mp4">
        </video>
        <span></span>
    </div>
    <?php } ?>

    <?php
        $gameRating = get_sub_field('game_rating');
    ?>
        <!--game-->
        <section class="section-two game">
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
                        <?php the_sub_field('game_name'); ?>
                    </h1>
                </div>
                <div class="game-wrap">
                    <div class="game-info">
                        <div class="game-info_top">
                            <?php if( !empty( $gameRating )) { ?>
                                <div class="game-rating">
                                    <span class="game-rating_number">
                                        <?php echo $gameRating ?>
                                    </span>
                                    <span class="game-rating_stars" data-stars="<?php echo $gameRating; ?>"></span>
                                </div>
                            <?php } ?>
                            <button class="geme-up" aria-label="update">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M5.78201 4.16532L5.98489 4.00761C5.94524 4.03843 5.9058 4.06951 5.86658 4.10086C6.5718 3.5686 7.33926 3.11939 8.15081 2.76742C8.12548 2.77757 8.1002 2.78782 8.07495 2.79816C8.04808 2.80945 8.02121 2.82064 7.99434 2.83155C8.02117 2.82031 8.04804 2.80919 8.07495 2.79816C8.12834 2.77574 8.18174 2.75295 8.23513 2.73127C8.20697 2.7432 8.17886 2.75525 8.15081 2.76742C8.96426 2.44127 9.81331 2.21299 10.6814 2.08622C10.6791 2.08649 10.6768 2.08676 10.6745 2.08703C10.6279 2.0933 10.5812 2.09924 10.5353 2.10449C10.5816 2.09838 10.6281 2.09256 10.6745 2.08703C10.6805 2.08622 10.6865 2.08541 10.6925 2.08459C10.7287 2.07935 10.7649 2.07428 10.8011 2.06939C10.7652 2.07451 10.7289 2.07964 10.6925 2.08459C10.6888 2.08513 10.6851 2.08567 10.6814 2.08622C11.5553 1.98277 12.4384 1.98271 13.3123 2.08604C13.273 2.08028 13.2335 2.07473 13.1941 2.06939C13.2819 2.07942 13.3722 2.09195 13.46 2.10449C13.4108 2.09801 13.3616 2.09186 13.3123 2.08604C14.1795 2.21287 15.0294 2.4415 15.8419 2.76824C15.813 2.75579 15.7841 2.74347 15.7551 2.73127C15.8056 2.75178 15.8561 2.77329 15.9067 2.79455C15.9365 2.80675 15.9662 2.81908 15.9959 2.83155C15.9662 2.81947 15.9364 2.80706 15.9067 2.79455C15.8851 2.78571 15.8635 2.77694 15.8419 2.76824C16.656 3.11935 17.4238 3.56839 18.1308 4.10314C18.1004 4.07891 18.0699 4.05485 18.0393 4.03094L18.0026 4.00238C18.0148 4.01187 18.0271 4.02139 18.0393 4.03094L18.2057 4.16032C18.1808 4.14115 18.1559 4.12209 18.1308 4.10314C18.7823 4.62291 19.3759 5.21621 19.896 5.86747C19.877 5.84239 19.8579 5.81739 19.8387 5.79247L19.9682 5.9589C19.9777 5.9711 19.9872 5.98331 19.9967 5.99555L19.9682 5.9589C19.9443 5.9283 19.9202 5.89782 19.896 5.86747C20.431 6.57413 20.8802 7.34153 21.2315 8.15533C21.2228 8.1337 21.214 8.11211 21.2052 8.09053C21.1926 8.06077 21.1802 8.03101 21.1681 8.00125C21.1806 8.03096 21.1929 8.06072 21.2052 8.09053C21.2264 8.141 21.2479 8.19147 21.2684 8.24193C21.2562 8.21301 21.2439 8.18414 21.2315 8.15533C21.5569 8.96362 21.785 9.80906 21.9122 10.6716C21.9115 10.6653 21.9107 10.6591 21.91 10.6528C21.9048 10.6136 21.8999 10.5745 21.8955 10.5359C21.9005 10.5749 21.9054 10.6138 21.91 10.6528C21.912 10.6677 21.914 10.6827 21.916 10.6976C21.9211 10.7323 21.9259 10.767 21.9306 10.8017C21.9257 10.7673 21.9208 10.7325 21.916 10.6976C21.9148 10.689 21.9135 10.6803 21.9122 10.6716C21.964 11.1128 21.9911 11.5544 21.9933 12.0001C21.9933 12.5241 22.4548 13.028 22.9967 13.003C23.5385 12.9779 24 12.5617 24 12.0001C23.9975 10.0797 23.5309 8.18431 22.653 6.47679C21.8027 4.82209 20.5511 3.41563 19.0636 2.30749C17.6263 1.23693 15.9031 0.499845 14.1371 0.196493C12.0753 -0.157008 9.92811 -0.0166095 7.95658 0.702935C6.4328 1.25944 5.01553 2.10793 3.82792 3.20931V1.00374C3.82792 0.479742 3.36641 -0.0241784 2.82459 0.00089846C2.28029 0.0259698 1.82126 0.44215 1.82126 1.00374V5.61183C1.82126 6.15334 2.28029 6.61467 2.82459 6.61467H7.43491C7.95916 6.61467 8.46332 6.15339 8.43824 5.61183C8.41315 5.06779 7.99677 4.60898 7.43491 4.60898H5.27431C5.46573 4.43287 5.66326 4.26337 5.86658 4.10086C5.83829 4.12221 5.8101 4.1437 5.78201 4.16532Z" />
                                    <path
                                            d="M18.218 19.8347L18.0149 19.9925C18.0547 19.9616 18.0943 19.9304 18.1337 19.8989C17.4284 20.4313 16.6608 20.8806 15.8491 21.2326C15.8745 21.2224 15.8999 21.2122 15.9252 21.2018C15.952 21.1905 15.9788 21.1793 16.0057 21.1684C15.9789 21.1797 15.9521 21.1908 15.9252 21.2018C15.8717 21.2242 15.8183 21.247 15.7649 21.2687C15.793 21.2568 15.8211 21.2448 15.8491 21.2326C15.0357 21.5587 14.1867 21.787 13.3186 21.9138C13.3209 21.9135 13.3232 21.9132 13.3256 21.913C13.3722 21.9067 13.4188 21.9008 13.4647 21.8955C13.4184 21.9016 13.372 21.9074 13.3256 21.913C13.3195 21.9138 13.3134 21.9146 13.3074 21.9154C13.2712 21.9207 13.2351 21.9257 13.1989 21.9306C13.2347 21.9255 13.271 21.9204 13.3074 21.9154C13.3111 21.9149 13.3149 21.9143 13.3186 21.9138C12.4447 22.0172 11.5616 22.0173 10.6877 21.914C10.727 21.9197 10.7665 21.9253 10.8059 21.9306C10.7181 21.9206 10.6278 21.908 10.54 21.8955C10.5892 21.902 10.6384 21.9081 10.6877 21.914C9.82051 21.7871 8.97063 21.5585 8.15819 21.2318C8.18704 21.2442 8.21594 21.2565 8.2449 21.2687C8.19436 21.2482 8.14382 21.2267 8.09326 21.2054C8.06349 21.1932 8.03377 21.1809 8.00411 21.1684C8.03383 21.1805 8.06354 21.1929 8.09326 21.2054C8.11488 21.2143 8.13652 21.2231 8.15819 21.2318C7.34398 20.8807 6.57623 20.4316 5.86918 19.8968C5.89954 19.9211 5.93002 19.9451 5.96063 19.969L5.99743 19.9976C5.98514 19.9881 5.97288 19.9786 5.96063 19.969L5.79426 19.8397C5.81916 19.8588 5.84413 19.8779 5.86918 19.8968C5.21766 19.3771 4.62407 18.7838 4.10403 18.1325C4.12302 18.1576 4.14211 18.1826 4.16132 18.2075L4.03178 18.0411C4.02226 18.0289 4.01276 18.0167 4.00329 18.0044L4.03178 18.0411C4.0557 18.0717 4.07979 18.1022 4.10403 18.1325C3.56904 17.4259 3.11979 16.6585 2.76853 15.8447C2.77721 15.8663 2.78597 15.8879 2.79479 15.9094C2.80734 15.9392 2.81979 15.969 2.8319 15.9987C2.8194 15.969 2.80703 15.9392 2.79479 15.9094C2.77356 15.8589 2.75207 15.8085 2.73157 15.7581C2.74376 15.787 2.75608 15.8159 2.76853 15.8447C2.44313 15.0364 2.21501 14.1909 2.08777 13.3283C2.0885 13.3346 2.08924 13.3409 2.08999 13.3472C2.09517 13.3863 2.10007 13.4254 2.10448 13.4641C2.09946 13.4251 2.09463 13.3861 2.08999 13.3472C2.08802 13.3322 2.08601 13.3173 2.08397 13.3024C2.07894 13.2677 2.07407 13.233 2.06937 13.1983C2.07429 13.2327 2.07921 13.2675 2.08397 13.3024C2.08523 13.311 2.08649 13.3197 2.08777 13.3283C2.03597 12.8872 2.00893 12.4456 2.00666 11.9999C2.00666 11.4759 1.54515 10.972 1.00333 10.997C0.461509 11.0221 0 11.4383 0 11.9999C0.00250835 13.9203 0.469077 15.8157 1.34696 17.5232C2.19728 19.1779 3.44893 20.5844 4.93638 21.6925C6.37366 22.7631 8.09686 23.5002 9.86291 23.8035C11.9247 24.157 14.0719 24.0166 16.0434 23.2971C17.5672 22.7406 18.9845 21.8921 20.1721 20.7907V22.9963C20.1721 23.5203 20.6336 24.0242 21.1754 23.9991C21.7197 23.974 22.1787 23.5578 22.1787 22.9963V18.3882C22.1787 17.8467 21.7197 17.3853 21.1754 17.3853H16.5651C16.0408 17.3853 15.5367 17.8466 15.5618 18.3882C15.5868 18.9322 16.0032 19.391 16.5651 19.391H18.7262C18.5347 19.5671 18.337 19.7365 18.1337 19.8989C18.1619 19.8776 18.19 19.8562 18.218 19.8347Z" />
                                </svg>
                            </button>
                        </div>

                        <div class="game-info_wrap">
                            <iframe src="<?php the_sub_field('game_iframe'); ?>" frameborder="0" allowfullscreen="" webkitallowfullscreen="" allow="autoplay" style="width: 100%; height: 100%;" loading="lazy"></iframe>
                            <div class="game-content">
                                    <div class="game-logo">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                             <?php the_post_thumbnail('full'); ?>
                                        <?php endif; ?>
                                    </div>
                                <a href="#" class="game-demo btn-one">
                                    Play demo
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" fill="white" />
                                    </svg>
                                </a>
                                <a href="<?php the_sub_field('button_play_for_real_-_link'); ?>" class="game-play btn-four">
                                    <?php echo __('Play for real', 'slots'); ?>
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="game-descr">
                                <span><?php echo __('By clicking I confirm that I am 18+.', 'slots'); ?></span>
                                <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M38.5044 28.2541C40.414 24.0395 40.8032 19.2931 39.6056 14.8236L36.3704 15.6905C37.3674 19.4115 37.0434 23.363 35.4536 26.8718C33.8638 30.3807 31.1065 33.2297 27.6515 34.9335C24.1966 36.6373 20.2577 37.0904 16.5061 36.2157C12.7546 35.3409 9.42233 33.1924 7.07725 30.1363C4.73217 27.0801 3.51932 23.3054 3.64536 19.4552C3.7714 15.6051 5.22854 11.9177 7.76848 9.02148C10.3084 6.12523 13.774 4.19927 17.5748 3.57176C21.3756 2.94426 25.2763 3.65402 28.6124 5.58013L30.2871 2.67952C26.2799 0.365975 21.5945 -0.486563 17.0292 0.267171C12.4639 1.0209 8.30118 3.33428 5.25032 6.81311C2.19946 10.2919 0.449219 14.721 0.297824 19.3456C0.14643 23.9702 1.60325 28.5043 4.42005 32.1752C7.23685 35.8461 11.2394 38.4268 15.7456 39.4775C20.2518 40.5282 24.983 39.9839 29.1329 37.9374C33.2828 35.8909 36.5947 32.4688 38.5044 28.2541Z"
                                            fill="white" fill-opacity="0.5" />
                                    <path
                                            d="M36.0701 3.51031V7.18288H39.3716V9.24174H36.0701V12.9329H33.8215V9.24174H30.5379V7.18288H33.8215V3.51031H36.0701Z"
                                            fill="white" fill-opacity="0.5" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M25.7373 27.0667C24.9358 27.0667 24.2033 26.9645 23.54 26.7602C22.8767 26.5558 22.3066 26.2691 21.8299 25.8999C21.36 25.5242 20.9938 25.0727 20.7312 24.5453C20.4756 24.018 20.3477 23.4313 20.3477 22.7853C20.3477 22.3964 20.3927 22.0306 20.4825 21.6878C20.5792 21.3384 20.7278 21.022 20.9282 20.7386C21.1355 20.4485 21.398 20.1915 21.7159 19.9673C22.0406 19.7432 22.431 19.5554 22.8871 19.4037C22.1961 19.1071 21.6813 18.6951 21.3427 18.1678C21.0111 17.6404 20.8452 17.0076 20.8452 16.2694C20.8452 15.7091 20.9662 15.1916 21.208 14.717C21.4498 14.2358 21.7884 13.8205 22.2237 13.4711C22.659 13.1218 23.1738 12.8482 23.768 12.6505C24.3692 12.4461 25.0256 12.344 25.7373 12.344C26.449 12.344 27.102 12.4461 27.6962 12.6505C28.2973 12.8482 28.8156 13.1218 29.2509 13.4711C29.6862 13.8205 30.0247 14.2358 30.2666 14.717C30.5084 15.1916 30.6293 15.7091 30.6293 16.2694C30.6293 17.0076 30.4601 17.6404 30.1215 18.1678C29.7829 18.6951 29.2716 19.1071 28.5875 19.4037C29.0367 19.5554 29.4201 19.7432 29.738 19.9673C30.0627 20.1915 30.3253 20.4485 30.5257 20.7386C30.733 21.022 30.885 21.3384 30.9817 21.6878C31.0785 22.0306 31.1268 22.3964 31.1268 22.7853C31.1268 23.4313 30.9956 24.018 30.733 24.5453C30.4773 25.0727 30.1111 25.5242 29.6343 25.8999C29.1645 26.2691 28.5979 26.5558 27.9346 26.7602C27.2712 26.9645 26.5388 27.0667 25.7373 27.0667ZM25.7373 24.753C26.0966 24.753 26.4075 24.7002 26.6701 24.5948C26.9327 24.4893 27.1469 24.3476 27.3127 24.1696C27.4854 23.985 27.6098 23.7708 27.6858 23.5269C27.7687 23.2764 27.8102 23.0095 27.8102 22.726C27.8102 22.4162 27.7756 22.1327 27.7066 21.8757C27.6375 21.6186 27.5234 21.4011 27.3645 21.2231C27.2056 21.0385 26.9914 20.8968 26.7219 20.7979C26.4594 20.6924 26.1311 20.6397 25.7373 20.6397C25.3434 20.6397 25.0118 20.6924 24.7423 20.7979C24.4797 20.8968 24.269 21.0385 24.1101 21.2231C23.9511 21.4011 23.8371 21.6186 23.768 21.8757C23.6989 22.1327 23.6644 22.4162 23.6644 22.726C23.6644 23.0095 23.7024 23.2764 23.7784 23.5269C23.8613 23.7708 23.9857 23.985 24.1515 24.1696C24.3243 24.3476 24.5385 24.4893 24.7941 24.5948C25.0567 24.7002 25.3711 24.753 25.7373 24.753ZM25.7373 18.3062C26.0966 18.3062 26.3903 18.2502 26.6183 18.1381C26.8463 18.0261 27.0259 17.8778 27.1572 17.6932C27.2885 17.5086 27.3783 17.2977 27.4267 17.0604C27.4751 16.8231 27.4993 16.5792 27.4993 16.3287C27.4993 16.1046 27.4682 15.887 27.406 15.6761C27.3438 15.4652 27.2401 15.2806 27.095 15.1224C26.9569 14.9576 26.7737 14.8258 26.5457 14.7269C26.3246 14.628 26.0551 14.5786 25.7373 14.5786C25.4125 14.5786 25.1396 14.628 24.9185 14.7269C24.6974 14.8258 24.5143 14.9576 24.3692 15.1224C24.231 15.2806 24.1308 15.4652 24.0686 15.6761C24.0064 15.887 23.9753 16.1046 23.9753 16.3287C23.9753 16.5792 23.9995 16.8231 24.0479 17.0604C24.0962 17.2977 24.1861 17.5086 24.3174 17.6932C24.4486 17.8778 24.6283 18.0261 24.8563 18.1381C25.0843 18.2502 25.378 18.3062 25.7373 18.3062Z"
                                          fill="white" fill-opacity="0.5" />
                                    <path
                                            d="M9.99199 24.6937H12.8941V17.4262C12.8941 17.0703 12.9044 16.6978 12.9251 16.3089L11.215 17.6635C11.063 17.7756 10.911 17.8448 10.759 17.8712C10.6139 17.8909 10.4757 17.8909 10.3444 17.8712C10.2131 17.8448 10.0956 17.8019 9.99199 17.7426C9.88834 17.6767 9.81234 17.6108 9.76397 17.5449L8.74825 16.2595L13.4537 12.4923H16.107V24.6937H18.5945V26.9085H9.99199V24.6937Z"
                                            fill="white" fill-opacity="0.5" />
                                </svg>
                            </div>
                        </div>
                    </div>
<?php
endwhile;
endif;
?>

                    <?php if( have_rows('game_box_group') ):
                    while ( have_rows('game_box_group') ) : the_row();

                        $gameSoftwareLinks = get_sub_field('software_links');
                        $gameVolatility = get_sub_field('volatility');
                    ?>
                    <div class="game-box">
                        <span class="game-label">
                            <?php echo __('Slot Data', 'slots'); ?>
                        </span>
                        <div class="game-point">
                            <span class="game-sub">
                                <?php echo __('Software:', 'slots'); ?>
                            </span>
                            <?php if( !empty( $gameSoftwareLinks )) { ?>
                                <ul class="game-links">
                                    <?php
                                    foreach ($gameSoftwareLinks as $value) {
                                        $item = $value['software_item']
                                    ?>
                                    <li>
                                        <a href="<?php echo $item['software_link'] ?>">
                                            <?php echo $item['software_text'] ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                        <div class="game-point">
                            <span class="game-sub">
                                <?php echo __('Volatility:', 'slots'); ?>
                            </span>
                            <?php if( !empty( $gameVolatility )) { ?>
                                <ul class="game-links">
                                    <?php
                                    foreach ($gameVolatility as $value) { ?>
                                        <li><?php echo $value['volatility_text']; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                        <div class="game-point">
                            <ul class="game-list">
                                <?php if( !empty(get_sub_field('rtp'))) { ?>
                                <li>
                                    <span class="game-sub">
                                        <?php echo __('RTP:', 'slots'); ?>
                                    </span>
                                    <span class="game-number">
                                        <?php the_sub_field('rtp'); ?>
                                    </span>
                                </li>
                                <?php } ?>
                                <?php if( !empty(get_sub_field('paylines'))) { ?>
                                <li>
                                    <span class="game-sub">
                                        <?php echo __('Paylines:', 'slots'); ?>
                                    </span>
                                    <span class="game-number">
                                        <?php the_sub_field('paylines'); ?>
                                    </span>
                                </li>
                                <?php } ?>
                                <?php if( !empty(get_sub_field('reels'))) { ?>
                                <li>
                                    <span class="game-sub">
                                        <?php echo __('Reels:', 'slots'); ?>
                                    </span>
                                    <span class="game-number">
                                         <?php the_sub_field('reels'); ?>
                                    </span>
                                </li>
                                <?php } ?>
                                <?php if( !empty(get_sub_field('top_win'))) { ?>
                                <li>
                                    <span class="game-sub">
                                        <?php echo __('Top Win:', 'slots'); ?>
                                    </span>
                                    <span class="game-number">
                                        <?php the_sub_field('top_win'); ?>
                                    </span>
                                </li>
                                <?php } ?>
                                <?php if( !empty(get_sub_field('min_bet'))) { ?>
                                <li>
                                    <span class="game-sub">
                                        <?php echo __('Min Bet:', 'slots'); ?>
                                    </span>
                                    <span class="game-number">
                                        <?php the_sub_field('min_bet'); ?>
                                    </span>
                                </li>
                                <?php } ?>
                                <?php if( !empty(get_sub_field('max_bet'))) { ?>
                                <li>
                                    <span class="game-sub">
                                        <?php echo __('Max Bet:', 'slots'); ?>
                                    </span>
                                    <span class="game-number">
                                        <?php the_sub_field('max_bet'); ?>
                                    </span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="game-point">
                            <span class="game-sub">
                                <?php echo __('Features:', 'slots'); ?>
                            </span>
                            <ul class="game-tabs">
                                <?php foreach ($features as $item) { ?>
                                    <li>
                                        <a href="<?php echo get_term_link($item->term_id) ?>">
                                            <?php echo ($item->name); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="game-point">
                            <span class="game-sub">
                                <?php echo __('Themes:', 'slots'); ?>
                            </span>
                            <ul class="game-tabs">
                                <?php foreach ($themes as $item) { ?>
                                    <li>
                                        <a href="<?php echo get_term_link($item->term_id) ?>">
                                            <?php echo ($item->name); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <?php
                    endwhile;
                    endif;
                    ?>

                </div>
            </div>
        </section>
        <!--/game-->



    <div class="section-wrap">
        <div class="section-box">
<?php
if( have_rows('slot_data') ):
    while ( have_rows('slot_data') ) : the_row();
        ?>

            <?php if( get_row_layout() == 'slot_content' ) {
                $gameText = get_sub_field('text'); ?>
                <!--fishin-->
                <section class="section-one fishin" id="<?php echo get_sub_field('section_id') ?>">
                    <div class="container">
                        <?php foreach ($gameText as $item) {
                            if ( $item['acf_fc_layout'] == 'text_header' ): ?>
                            <div class="section-top">
                                <h2 class="section-title title-x">
                                     <?php echo $item['block_text']['text_header'] ; ?>
                                </h2>
                            </div>
                            <?php elseif( $item['acf_fc_layout'] == 'text_inner' ): ?>
                            <div class="fishin-content content">
                                <p><?php echo $item['block_text']['text_content'] ; ?></p>
                            <?php elseif ( $item['acf_fc_layout'] == 'text_with_class_active_inner' ): ?>
                                <div class="active">
                                    <?php echo $item['block_text']['text_block_with_class_active'] ; ?>
                                </div>
                            </div>
                            <?php endif;
                        } ?>
                    </div>
                </section>
                <!--/fishin-->
            <?php } elseif( get_row_layout() == 'slot_list' ){
                $gameList = get_sub_field('slot_list_item'); ?>
            <!--work-->
            <section class="section-one work" id="<?php echo get_sub_field('section_id') ?>">
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
                                    <p class="text-xl">
                                        <?php echo $item['slot_list_text'] ; ?>
                                    </p>
                                </li>
                            <?php endif;
                        } ?>
                    </ol>
                </div>
            </section>
            <!--/work-->
            <?php } elseif( get_row_layout() == 'slot_fishin_content' ){
            $gameFishinText = get_sub_field('text'); ?>
            <!--our-->
            <section class="section-one our" id="<?php echo get_sub_field('section_id') ?>">
                <div class="container">
                    <?php foreach ($gameFishinText as $item) {
                    if ( $item['acf_fc_layout'] == 'text_header' ): ?>
                        <div class="section-top">
                            <h2 class="section-title title-x">
                                <?php echo $item['block_text']['text_header'] ; ?>
                            </h2>
                        </div>
                    <?php elseif( $item['acf_fc_layout'] == 'text_inner' ): ?>
                    <div class="our-content content">
                        <p><?php echo $item['block_text']['text_content'] ; ?></p>
                        <?php elseif ( $item['acf_fc_layout'] == 'text_with_class_active_inner' ): ?>
                            <div class="active">
                                <?php echo $item['block_text']['text_block_with_class_active'] ; ?>
                            </div>
                        <?php endif;
                        } ?>
                    </div>
                </div>
            </section>
            <!--/our-->
        <?php } elseif( get_row_layout() == 'slot_faq' ){
            $gameFAQ = get_sub_field('faq'); ?>
            <!--faq-->
            <section class="section-one faq" id="<?php echo get_sub_field('section_id') ?>">
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