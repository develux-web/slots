<section class="section-one slots" id="slots">
    <div class="container">
        <ul class="slots-list">
            <li class="slots-list_point active">
                <div class="slots-item">
                    <div class="section-item_text">
                        <h2 class="slots-item_title title-x"><?php echo $args['title']; ?></h2>
                        <div class="slots-item_content content">
                            <?php echo $args['text']; ?>
                        </div>
                    </div>
                </div>
            </li>

            <?php
            $featured_posts = $args['slots'];
            if( $featured_posts ): ?>
                    <?php foreach( $featured_posts as $post ):
                        setup_postdata($post); ?>
                        <li class="slots-list_point">
                            <a href="<?php the_permalink(); ?>" class="slots-item">
                                <div class="slots-item_img">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <span class="slots-item_name"><?php the_title(); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </ul>
    </div>
</section>
