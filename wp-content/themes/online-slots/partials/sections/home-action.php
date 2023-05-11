<section class="section-one action" id="action">
    <div class="container">
        <div class="action-wrap">
            <div class="action-text">
                <h2 class="action-title title-x"><?php echo $args['title']; ?></h2>
                <div class="action-content content">
                    <p><?php echo $args['text']; ?></p>
                </div>
                <div class="action-bottom">
                    <a href="<?php echo $args['btn_link']; ?>" class="action-btn btn-one">
                        <?php echo $args['btn_name']; ?>
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.5 10L5.5 18.6603L5.5 1.33974L20.5 10Z" fill="white" />
                        </svg>
                    </a>
                    <img class="action-icon" src="<?php echo $args['logo_company']; ?>" alt="img">
                </div>
            </div>
            <img class="action-img" src="<?php echo $args['logo']; ?>" alt="img">
        </div>
    </div>
</section>
