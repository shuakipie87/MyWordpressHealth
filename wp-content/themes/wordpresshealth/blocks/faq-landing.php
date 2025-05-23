<section id="faq" class="faq py-70 pb-70">
    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <div class="heading text-center pb-70">
                 
                    <h2><?php echo get_sub_field('faq_heading'); ?></h2>
                       <span><?php echo get_sub_field('faq_subheading'); ?></span>
                </div> 
                <div class="faq-box">
                    <div class="faq-tab">
                        <div class="loading-img" style="display:none;">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading-gif.gif">
                        </div>
                        <div id="search-faq-result" style="display: none;"></div>
                        <div class="faq-main-sec">  
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="accordion" id="accordionLeft">
                                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingLeft<?php echo $i; ?>">
                                                    <button class="accordion-button collapsed" 
                                                        type="button" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#collapseLeft<?php echo $i; ?>" 
                                                        aria-controls="collapseLeft<?php echo $i; ?>">
                                                        <?php echo get_sub_field("accordion_title{$i}"); ?>
                                                    </button>
                                                </h2>
                                                <div id="collapseLeft<?php echo $i; ?>" 
                                                    class="accordion-collapse collapse" 
                                                    aria-labelledby="headingLeft<?php echo $i; ?>" 
                                                    data-bs-parent="#accordionLeft">
                                                    <div class="accordion-body">
                                                        <?php echo get_sub_field("accordion_content{$i}"); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="accordion" id="accordionRight">
                                        <?php for ($i = 5; $i <= 8; $i++) : ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingRight<?php echo $i; ?>">
                                                    <button class="accordion-button collapsed" 
                                                        type="button" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#collapseRight<?php echo $i; ?>" 
                                                        aria-controls="collapseRight<?php echo $i; ?>">
                                                        <?php echo get_sub_field("accordion_title{$i}"); ?>
                                                    </button>
                                                </h2>
                                                <div id="collapseRight<?php echo $i; ?>" 
                                                    class="accordion-collapse collapse" 
                                                    aria-labelledby="headingRight<?php echo $i; ?>" 
                                                    data-bs-parent="#accordionRight">
                                                    <div class="accordion-body">
                                                        <?php echo get_sub_field("accordion_content{$i}"); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>