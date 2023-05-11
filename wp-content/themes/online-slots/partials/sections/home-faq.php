<div class="section-wrap">
    <div class="section-box">
        <!--faq-->
        <section class="section-one faq" id="faq">
            <div class="container">
                <div class="section-top">
                    <h2 class="section-title title-x"><?php echo $args['title']; ?></h2>
                </div>
                <ul class="faq-list">
                    <?php
                    $rows = $args['list'];
                    if( $rows ) { ?>
                        <?php foreach( $rows as $row ) { ?>
                            <li class="faq-list_point">
                                <div class="faq-list_top">
                                    <h3 class="faq-list_title title-lg"><?php echo $row['question']; ?></h3>
                                    <svg class="faq-list_arrow" width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.732233 0.696431C1.70854 -0.231818 3.29146 -0.231818 4.26777 0.696431L17.5 13.2773L30.7322 0.696431C31.7085 -0.231818 33.2915 -0.231818 34.2678 0.696431C35.2441 1.62468 35.2441 3.12967 34.2678 4.05792L17.5 20.0002L0.732233 4.05792C-0.244078 3.12967 -0.244078 1.62468 0.732233 0.696431Z"
                                        />
                                    </svg>
                                </div>
                                <div class="faq-list_bottom">
                                    <div class="faq-list_text content">
                                        <p><?php echo $row['answer']; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php  }
                    } ?>
                </ul>
            </div>
        </section>
        <!--/faq-->
    </div>
</div>
