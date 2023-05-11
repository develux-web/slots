<div class="section-bg">
    <video muted playsinline autoplay loop>
        <source src="<?php echo $args['video']; ?>" type="video/mp4">
    </video>
</div>
<section class="start">
    <div class="container">
        <div class="start-wrap">
            <img class="start-logo" src="<?php echo $args['logo']; ?>" alt="img">
            <h1 class="start-title title-xl"><?php echo $args['title']; ?></h1>
            <?php if( $args['btn_name'] ): ?>
            <a href="<?php echo $args['btn_link']; ?>" class="start-btn btn-one">
                <?php echo $args['btn_name']; ?>
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" fill="white" />
                </svg>
            </a>
            <?php endif; ?>
            <ul class="start-list">
                <?php
                $images = $args['images'];
                if( $images ): ?>
                        <?php foreach( $images as $link ): ?>
                        <li><img src="<?php echo $link; ?>" alt="image"></li>
                        <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>
