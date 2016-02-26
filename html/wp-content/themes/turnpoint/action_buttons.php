<div class="action_buttons">
  <label for="modal-1" class="alt">
    <div class="btn js-btn"><a>More Info</a></div>
  </label>
<?php if( get_field( "course_woocommerce_product_id" ) && get_field( "course_woocommerce_product_sku" ) ): 
   //echo do_shortcode('[add_to_cart id="'.get_field( "course_woocommerce_product_id").'"]');
   ?>
    <button url="<?php echo get_permalink(); ?>?add-to-cart=<?php echo get_field( "course_woocommerce_product_id");?>" class=" add_to_cart_button product_type_simple " rel="nofollow" data-product_id="<?php echo get_field( "course_woocommerce_product_id");?>" data-product_sku="<?php echo get_field( "course_woocommerce_product_sku");?>" data-quantity="1">Count Me In</button>
    <?php $product = new WC_Product(get_field( "course_woocommerce_product_id")); ?>
       
    <?php //if( $product->get_stock_quantity() < 7 ):?>
    <!-- <span>Only <?php echo $product->get_stock_quantity();?> spot(s) left</span> -->
    <?php // endif;?>
  <?php endif; ?>
  <style type="text/css">
  .wpuf-submit .wpuf-label{
    display: none !important;
  }
  .js-btn a{
    text-decoration: none;
    color: #fff;
    margin: 0;
  }
  </style>
</div>