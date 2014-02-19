
<?php

if(function_exists('feature_products')) {
$features_products = feature_products(4);
?>

<div class="container"><div class="row-fluid"><div class="span12">
            <div id="da-slider" class="da-slider">
                <?php foreach($features_products as $product): ?>
                <div class="da-slide">
                    <h2><a href="<?php echo get_permalink($product->ID); ?>"><?php echo  esc_attr($product->post_title); ?></a></h2>
                    <p>
                        <?php echo  esc_attr($product->post_excerpt); ?>

                    </p>
                    <div class="da-link">
                    <?php echo "<div class='pull-left da-pricing'>Price: ".wpmp_currency_sign().wpmp_product_price($product->ID)."</div><div class='pull-right'>".wpmp_waytocart($product)."</div>"; ?>
                    </div>
                    <div class="da-img">
                        <?php centrino_thumb($product, array(300,200)); ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <nav class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </nav>
            </div>
</div></div></div>
<script>
    jQuery(function($) {

        $('#da-slider').cslider({
            autoplay	: true,
            bgincrement	: 450
        });

    });
</script>
<?php } ?>