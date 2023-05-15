<?php
/* Template Name: Providers */

get_header(); ?>

<?php  get_template_part('partials/sections/video', 'background'); ?>

        <section class="section-two providers">
            <div class="container">
                <?php yoast_breadcrumb( '<ul class="breadcrumbs">','</ul>' ); ?>
                <div class="section-top three">
                    <h1 class="section-title title-xl"><?php the_field('name_page_slots'); ?></h1>
                    <div class="section-text content">
                        <p><?php the_field('description_page_slots'); ?></p>
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-wrap">
                        <div class="form-search filter-search">
                            <label class="form-search_label">
                                <input id="search-input" class="form-search_point" type="search" name="search" placeholder="Search casino..." data-type="casino">
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
                                <option value="" disabled selected><?php echo __('Sort', 'slots'); ?></option>
                                <option value="ASC"><?php echo __('A-Z', 'slots'); ?></option>
                                <option value="DESC"><?php echo __('Z-A', 'slots'); ?></option>
                            </select>
                            <svg class="form-select_icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.418419 5.34809C0.976311 4.88397 1.88083 4.88397 2.43872 5.34809L10 11.6385L17.5613 5.34809C18.1192 4.88397 19.0237 4.88397 19.5816 5.34809C20.1395 5.81222 20.1395 6.56471 19.5816 7.02884L10 15L0.418419 7.02884C-0.139473 6.56471 -0.139473 5.81222 0.418419 5.34809Z" />
                            </svg>
                        </label>
                        <button class="form-btn filter-reset">
                            Reset
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.35796 16.9136C0.880678 17.3909 0.880678 18.1647 1.35796 18.642C1.83525 19.1193 2.60909 19.1193 3.08637 18.642L10 11.7284L16.9136 18.642C17.3909 19.1193 18.1647 19.1193 18.642 18.642C19.1193 18.1647 19.1193 17.3909 18.642 16.9136L11.7284 10L18.642 3.08637C19.1193 2.60909 19.1193 1.83525 18.642 1.35796C18.1647 0.880678 17.3909 0.880679 16.9136 1.35796L10 8.27159L3.08637 1.35796C2.60909 0.880678 1.83525 0.880678 1.35796 1.35796C0.880678 1.83525 0.880678 2.60909 1.35796 3.08637L8.27159 10L1.35796 16.9136Z"
                                    fill="white" fill-opacity="0.5" />
                            </svg>
                        </button>
                    </div>
                    <span class="filter-number"></span>
                </div>
                <ul class="providers-list"></ul>
                <button class="providers-load btn-two" style="display: none">Load more</button>
            </div>
        </section>


    <div class="section-wrap">
        <div class="section-box">
            <?php if( have_rows('content_fields') ): ?>
                <?php while( have_rows('content_fields') ): the_row(); ?>
                    <?php if( get_row_layout() == 'text_block_casino_slots' ): ?>
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
                    <?php elseif( get_row_layout() == 'list_block_slots' ): ?>
                        <section class="section-one ">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
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

                    <?php elseif( get_row_layout() == 'faq_casino_slots' ): ?>
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

                    <?php elseif( get_row_layout() == 'play_slot_demos' ): ?>
                        <section class="section-one our" id="our">
                            <div class="container">
                                <div class="section-top">
                                    <h2 class="section-title title-x"><?php the_sub_field('name_block'); ?></h2>
                                </div>
                                <div class="our-content content">
                                    <p><?php the_sub_field('text'); ?></p>
                                    <?php if( have_rows('add_list') ): ?>
                                        <?php while( have_rows('add_list') ): the_row(); ?>
                                            <div class="active"><?php the_sub_field('text'); ?></div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
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
            <ol class="section-content_list"></ol>
        </div>
    </div>

    <script>
        let sections = document.querySelectorAll('.section-one');
        let content_list = document.querySelector('.section-content_list');

        let html = Array.from(sections).map((section, i) => {
            let textElement = section.querySelector('.section-title');
            let text = textElement ? textElement.innerText : '';
            let id = 'section-one-' + i;
            section.id = id;
            return `<li><a href="#${id}">${text}</a></li>`;
        }).join('');

        content_list.innerHTML = html;
    </script>
<?php
get_footer();

