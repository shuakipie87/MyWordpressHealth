

    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <div class="heading text-center">
                    <span><?php echo esc_html($faq_subheading); ?></span>
                    <h2><?php echo esc_html($faq_heading); ?></h2>
                </div> 
                <div class="faq-box">
                    <div class="search-faq">
                        <input type="search" id="search-solution" placeholder="Type Your Questions Here" name="">
                        <span class="search-icon"></span> 
                        <span class="delete-icon" style="display:none;"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <div class="faq-tab">
                        <div class="loading-img" style="display:none;">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading-gif.gif">
                        </div>
                        <div id="search-faq-result" style="display: none;"></div>
                        <div class="faq-main-sec">  
                        <?php if (have_rows('faq')) : ?>
                            <div class="accordion row" id="accordionExample">
                                <?php 
                                $i = 1; // Counter for unique IDs
                                while (have_rows('faq')) : the_row();
                                    $faq_question = get_sub_field('faq_question');
                                    $faq_answer = get_sub_field('faq_answer');
                                ?>
                                <div class="col-12 col-md-6">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                                                <?php echo esc_html($faq_question); ?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php echo wp_kses_post($faq_answer); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $i++; 
                                endwhile; 
                                ?>
                            </div>
                            
<?php else : ?>
    <p class="text-center">No FAQs found.</p>
<?php endif; ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>