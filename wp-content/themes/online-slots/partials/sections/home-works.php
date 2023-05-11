<section class="section-one work" id="work">
    <div class="container">
        <div class="section-top">
            <h2 class="section-title title-x"><?php echo $args['title']; ?></h2>
        </div>
        <ol class="work-list">
            <?php
            $rows = $args['list'];
            if( $rows ) { ?>
                <?php foreach( $rows as $row ) { ?>
                    <li>
                        <p class="text-xl"><?php echo $row['text']; ?></p>
                    </li>
                <?php  }
            } ?>
        </ol>
    </div>
</section>
