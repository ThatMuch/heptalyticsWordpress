<?php
$title  = get_field("title");
?>

<section class="faq-section mb-50">
    <div class="container">
        <h2 class="faq-section__title"><?= $title ?></h2>
        <?php
        $args = array(
            'post_type' => 'faq',
        );
        $faq_query = new WP_Query($args);
        if ($faq_query->have_posts()) :
            $count = 1;
            while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                <div class="faq-item">
                    <button class="accordion-faq">
                        <div class="faq-question"><?php the_title() ?></div>
                    </button>
                    <div class="panel-faq">
                        <div class="faq-answer"><?php the_content() ?></div>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php _e("Désolée, il n'y a pas de FAQs"); ?></p>
        <?php endif; ?>
    </div>
</section>
