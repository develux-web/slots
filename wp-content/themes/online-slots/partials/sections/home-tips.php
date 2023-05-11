<section class="section-one tips" id="tips">
    <div class="container">
        <div class="tips-wrap">
            <div class="tips-info">
                <div class="tips-info_top">
                    <h2 class="tips-info_title title-x"><?php echo $args['title']; ?></h2>
                    <a href="<?php echo $args['btn_link']; ?>" class="tips-info_btn btn-two"><?php echo $args['btn_name']; ?></a>
                </div>
                <ol class="tips-info_list">
                    <?php
                    $rows = $args['list'];
                    if( $rows ) { ?>
                       <?php foreach( $rows as $row ) { ?>
                            <li><?php echo $row['text']; ?></li>
                      <?php  }
                    } ?>
                </ol>
            </div>
            <div class="tips-text">
                <h3 class="tips-text_title title-x"><?php echo $args['title_desc']; ?></h3>
                <div class="tips-text_content content">
                    <?php echo $args['text_desc']; ?>
                </div>
            </div>
        </div>
    </div>
</section>
