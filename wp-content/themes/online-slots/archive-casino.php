<?php

function display_taxonomy_select($taxonomy) {
    $terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ) );

    ob_start(); ?>

    <label class="form-select filter-hide">
        <select class="form-select_point filter_<?php echo $taxonomy; ?>" name="<?php echo $taxonomy; ?>">
            <option value="" disabled selected><?php echo ucfirst($taxonomy); ?></option>

            <?php foreach ($terms as $term) { ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
            <?php } ?>

        </select>
        <svg class="form-select_icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.418419 5.34809C0.976311 4.88397 1.88083 4.88397 2.43872 5.34809L10 11.6385L17.5613 5.34809C18.1192 4.88397 19.0237 4.88397 19.5816 5.34809C20.1395 5.81222 20.1395 6.56471 19.5816 7.02884L10 15L0.418419 7.02884C-0.139473 6.56471 -0.139473 5.81222 0.418419 5.34809Z" />
        </svg>
    </label>

    <?php
    return ob_get_clean();
}

get_header(); ?>

<?php  get_template_part('partials/sections/video', 'background'); ?>

    <section class="section-two casino">
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="/">
                        <span>OnlineSlots</span>
                    </a>
                </li>
                <li>
                    <span>Best paying casino</span>
                </li>
            </ul>
            <div class="section-top two">
                <h1 class="section-title title-xl"><?php the_field('name_page_casino', 'option'); ?></h1>
                <div class="section-text content">
                    <p><?php the_field('description_page_casino', 'option'); ?></p>
                </div>
                <button class="section-more btn-six">Read more...</button>
            </div>

            <div class="filter">
                <div class="filter-wrap">
                    <div class="form-search filter-search">
                        <label class="form-search_label">
                            <input id="search-input" class="form-search_point" type="search" name="search" placeholder="Search slots..." data-type="casino">
                            <svg class="form-search_icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.192 1.02212C10.8996 0.724681 14.1486 3.46158 14.4488 7.13515C14.5974 8.9537 13.9955 10.6609 12.9 11.9574L19 17.7258L17.6884 19L11.5395 13.1822C10.6032 13.8182 9.49172 14.228 8.27911 14.3253C4.57149 14.6228 1.32252 11.8859 1.02233 8.21228C0.72213 4.5387 3.48439 1.31956 7.192 1.02212ZM8.13087 12.5112C10.8273 12.2949 12.8362 9.95373 12.6179 7.28204C12.3996 4.61034 10.0367 2.61987 7.34025 2.83619C4.6438 3.05251 2.63488 5.39371 2.85321 8.0654C3.07153 10.7371 5.43442 12.7276 8.13087 12.5112Z"
                                      fill="white" fill-opacity="0.5" />
                            </svg>
                        </label>
                        <div id="search-results" class="form-search_box"></div>
                    </div>

                    <label class="form-select filter-sort">
                        <select class="form-select_point" name="sort">
                            <option value="" disabled selected>Sort</option>
                            <option value="ASC">A-Z</option>
                            <option value="DESC">Z-A</option>
                            <option value="rating">Highest Rating</option>
                        </select>
                        <svg class="form-select_icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0.418419 5.34809C0.976311 4.88397 1.88083 4.88397 2.43872 5.34809L10 11.6385L17.5613 5.34809C18.1192 4.88397 19.0237 4.88397 19.5816 5.34809C20.1395 5.81222 20.1395 6.56471 19.5816 7.02884L10 15L0.418419 7.02884C-0.139473 6.56471 -0.139473 5.81222 0.418419 5.34809Z" />
                        </svg>
                    </label>
                    <button class="form-btn filter-add">
                        Filters
                        <svg class="form-btn_icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10.9002 9.2C9.22272 9.2 7.81323 8.0527 7.41359 6.5H1V4.7H7.41359C7.81323 3.1473 9.22272 2 10.9002 2C12.8884 2 14.5002 3.61177 14.5002 5.6C14.5002 7.58822 12.8884 9.2 10.9002 9.2ZM16.2998 4.7H18.9998V6.5H16.2998V4.7ZM6.39982 18.2002C4.72237 18.2002 3.31288 17.0529 2.91324 15.5002H1V13.7002H2.91324C3.31288 12.1475 4.72237 11.0002 6.39982 11.0002C8.38805 11.0002 9.99982 12.6119 9.99982 14.6002C9.99982 16.5884 8.38805 18.2002 6.39982 18.2002ZM11.8 15.5002H19V13.7002H11.8V15.5002ZM8.20018 14.6002C8.20018 15.5943 7.39429 16.4002 6.40018 16.4002C5.40606 16.4002 4.60018 15.5943 4.60018 14.6002C4.60018 13.6061 5.40606 12.8002 6.40018 12.8002C7.39429 12.8002 8.20018 13.6061 8.20018 14.6002ZM12.7 5.59982C12.7 6.59394 11.8941 7.39982 10.9 7.39982C9.90589 7.39982 9.1 6.59394 9.1 5.59982C9.1 4.60571 9.90589 3.79982 10.9 3.79982C11.8941 3.79982 12.7 4.60571 12.7 5.59982Z" />
                        </svg>
                    </button>
                    <button class="form-btn filter-reset">
                        Reset
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.35796 16.9136C0.880678 17.3909 0.880678 18.1647 1.35796 18.642C1.83525 19.1193 2.60909 19.1193 3.08637 18.642L10 11.7284L16.9136 18.642C17.3909 19.1193 18.1647 19.1193 18.642 18.642C19.1193 18.1647 19.1193 17.3909 18.642 16.9136L11.7284 10L18.642 3.08637C19.1193 2.60909 19.1193 1.83525 18.642 1.35796C18.1647 0.880678 17.3909 0.880679 16.9136 1.35796L10 8.27159L3.08637 1.35796C2.60909 0.880678 1.83525 0.880678 1.35796 1.35796C0.880678 1.83525 0.880678 2.60909 1.35796 3.08637L8.27159 10L1.35796 16.9136Z"
                                fill="white" fill-opacity="0.5" />
                        </svg>
                    </button>

                    <?php
                    echo display_taxonomy_select('providers');
                    echo display_taxonomy_select('languages');
                    echo display_taxonomy_select('free-pokies');
                    echo display_taxonomy_select('payment-methods');
                    ?>
                </div>

                <span class="filter-number"></span>
            </div>

            <ol id="filtered-results" class="casino-list"></ol>
            <button class="casino-load btn-two">Load more</button>
        </div>
    </section>


    <div class="section-wrap">
        <div class="section-box">
            <?php if( have_rows('content_fields', 'option') ): ?>
                <?php while( have_rows('content_fields', 'option') ): the_row(); ?>
                    <?php if( get_row_layout() == 'text_block_casino' ): ?>
                        <section class="section-one">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <div class="content">
                                    <?php the_sub_field('text'); ?>
                                </div>
                            </div>
                        </section>
                    <?php elseif( get_row_layout() == 'list_block' ): ?>
                        <section class="section-one ">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class=" title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <ol class="work-list">
                                    <?php if( have_rows('add_list') ): ?>
                                            <?php while( have_rows('add_list') ): the_row(); ?>
                                            <li>
                                                <p class="text-xl"><?php the_sub_field('text'); ?></p>
                                            </li>
                                            <?php endwhile; ?>
                                    <?php endif; ?>
                                </ol>
                            </div>
                        </section>
                    <?php elseif( get_row_layout() == 'best_list_casino' ): ?>
                        <section class="section-one best" id="best">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <ol class="best-list">
                                    <?php if( have_rows('add_list') ): ?>
                                        <?php while( have_rows('add_list') ): the_row(); ?>
                                            <li class="best-list_content content">
                                                <p><?php the_sub_field('text'); ?></p>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ol>
                            </div>
                        </section>

                    <?php elseif( get_row_layout() == 'plus_minus_block' ): ?>
                        <section class="section-one what" id="what">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <ul class="what-list">
                                    <li class="what-list_point title-l">
                                        <h3 class="what-list_title title-l"><span>+</span> Pluses:</h3>
                                        <div class="what-list_content content">
                                            <ul>
                                                <?php if( have_rows('pluses_casino') ): ?>
                                                    <?php while( have_rows('pluses_casino') ): the_row(); ?>
                                                        <li><?php the_sub_field('text'); ?></li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="what-list_point">
                                        <h3 class="what-list_title title-l"><span>-</span> Minuses:</h3>
                                        <div class="what-list_content content">
                                            <ul>
                                                <?php if( have_rows('minuses_casino') ): ?>
                                                    <?php while( have_rows('minuses_casino') ): the_row(); ?>
                                                        <li><?php the_sub_field('text'); ?></li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>

                    <?php elseif( get_row_layout() == 'percentages_block_casino' ): ?>
                        <section class="section-one how" id="how">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <ul class="how-list">
                                    <?php if( have_rows('block') ): ?>
                                        <?php while( have_rows('block') ): the_row(); ?>
                                            <li class="how-list_point">
                                                <img class="how-list_img" src="<?php the_sub_field('image'); ?>" alt="img">
                                                <h3 class="how-list_title title-l"><?php the_sub_field('name'); ?></h3>
                                                <div class="how-list_content content">
                                                    <p><?php the_sub_field('description'); ?></p>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </section>

                    <?php elseif( get_row_layout() == 'faq_casino' ): ?>
                        <section class="section-one faq" id="faq">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <ul class="faq-list">
                                    <?php if( have_rows('add_question') ): ?>
                                        <?php while( have_rows('add_question') ): the_row(); ?>
                                            <li class="faq-list_point">
                                                <div class="faq-list_top">
                                                    <h3 class="faq-list_title title-lg"><?php the_sub_field('question'); ?></h3>
                                                    <svg class="faq-list_arrow" width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M0.732233 0.696431C1.70854 -0.231818 3.29146 -0.231818 4.26777 0.696431L17.5 13.2773L30.7322 0.696431C31.7085 -0.231818 33.2915 -0.231818 34.2678 0.696431C35.2441 1.62468 35.2441 3.12967 34.2678 4.05792L17.5 20.0002L0.732233 4.05792C-0.244078 3.12967 -0.244078 1.62468 0.732233 0.696431Z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div class="faq-list_bottom">
                                                    <div class="faq-list_text content">
                                                        <p><?php the_sub_field('ansfer'); ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </section>

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="section-content">
              <span class="section-content_title">
               Content
               <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M2.33474 5.77847C2.78105 5.40718 3.50467 5.40718 3.95098 5.77847L10 10.8108L16.049 5.77847C16.4953 5.40718 17.219 5.40718 17.6653 5.77847C18.1116 6.14977 18.1116 6.75177 17.6653 7.12307L10 13.5L2.33474 7.12307C1.88842 6.75177 1.88842 6.14977 2.33474 5.77847Z"
                      fill="white" />
               </svg>
              </span>
            <ol class="section-content_list">
                <li><a href="#payound">What is a Payout Casino?</a></li>
                <li><a href="#work">How The Site Works</a></li>
                <li><a href="#want">Want To Play Real Money Online Slots? We've Got You Covered.</a></li>
                <li><a href="#audited">Unaudited Vs Audited Payout Percentages</a></li>
                <li><a href="#best">Tips for player – how to chose best paying online casino</a></li>
                <li><a href="#what">What is a Payout Casino?</a></li>
                <li><a href="#how">How Payout Percentages at Online Casinos Are Audited?</a></li>
                <li><a href="#faq">FAQ</a></li>
            </ol>
        </div>
    </div>

<?php get_footer(); ?>
