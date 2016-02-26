<div class="span9 outlined" style="max-width: 880px !important;">
  <div class="client-document-container">
    <div class="" id="client-document">
      <div class="client-doc-header status_sent" id=
      "client-document-status">
        <div class="client-doc-name">
          <img alt="Logo for Trudio" height="32" id="client-document-logo" src="<?php echo site_url();?>/images/logo.png" width="152">
        </div>
        <div style='clear:right;'></div>
        <div class="client-doc-from client-doc-address">
          <h3>From</h3>
          <div>
            <strong>Trudio</strong> <span class="company-address">Los Angeles<br>
            California<br>
            <!-- ACN: 155 384 642<br>
            ABN: 29 155 384 642<br>
            <br> -->
            payments@trud.io<br>
            http://trud.io</span>
            <br>
            <strong><?php echo get_post_meta( $post->ID, 'invoice_from', true ); ?></strong>
          </div>
        </div>

        <div style='clear:both;'></div>

        <div class="client-doc-for client-doc-address">
          <h3>Invoice To</h3>

          <div>
            <strong><?php echo get_post_meta( $post->ID, 'invoice_to', true ); ?></strong> 
            <span class="company-address"><?php echo get_post_meta( $post->ID, 'recipient_email_address', true ); ?></span>
          </div>

          <div class="do-not-print">
            
          </div>
        </div>

        <div class="client-doc-details">
          <table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td class="label">Booking ID</td>

                <td class="definition">
                <strong><?php the_title() ?></strong></td>
              </tr>

              <tr>
                <td class="label">Issue Date</td>
                <td class="definition"><?php the_date('Y-m-d', '', ''); ?></td>
              </tr>

              <!-- <tr>
                <td class="label">Due Date</td>
                <td class="definition"><span class=
                "due-date"><?php the_date('Y-m-d', '', ''); ?> <span class=
                'secondary'></span></span></td>
              </tr> -->

              <tr class="subject subject-address-on-right">
                <td class="label">For</td>
                <td class="definition"><?php echo get_post_meta( $post->ID, 'artist_name', true ); ?></td>
              </tr>
              <?php if ($user_id == $author_id ) { ?>
              <tr class="subject subject-address-on-right do-not-print">
                <td class="label"><a href="<?php echo site_url();?>/edit-invoice/?pid=<?php echo $post->ID;?>">Edit Invoice</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div style='clear:both;'></div>

        <div class="subject-address-on-left client-doc-address" style="display:none">
          <h3>Subject</h3>
          <div>
            <?php echo get_post_meta( $post->ID, 'artist_name', true ); ?> Trudio Session
          </div>
        </div>
      </div>

      <table border="0" cellpadding="0" cellspacing="0" class=
      "client-doc-items">
        <thead class="client-doc-items-header">
          <tr>
            <th class="item-type first">Services</th>

            <th class="item-description">Details</th>

            <th class="item-qty">Songs</th>

            <th class="item-unit-price">Days</th>

            <th class="item-amount last">Amount</th>
          </tr>
        </thead>

        <tbody class="client-doc-rows">
          <tr class="row-odd">
            <td class="item-type first desktop">
            <?php 
              $repeat_field = get_post_meta( $post->ID, 'services_needed', true ); 
              if ( $repeat_field ) {
                  $values = explode( '| ', $repeat_field );
                  foreach ($values as $value) {
                    echo '<em>'.$value.'</em><br>';
                  }
              } 
            ?> 
            </td>

            <td class="item-description">
              <p><strong>Start Date</strong> <?php echo get_post_meta( $post->ID, 'proposed_start_date', true ); ?> </p>
              <p><strong>Description: </strong></p>
              <p><?php the_content(); ?></p>
            </td>

            <td class="item-qty desktop"><?php echo get_post_meta( $post->ID, 'number_of_songs', true ); ?></td>

            <td class="item-unit-price desktop"><?php echo get_post_meta( $post->ID, 'number_of_days', true ); ?></td>

            <td class="item-amount last">$<?php echo $session_quote ?> <span class=
            "tax-column-span"></span></td>
          </tr>
        </tbody>

        <tbody class="client-doc-summary">
          <tr>
            <td class="label" colspan="4">Subtotal</td>
            <td class="subtotal">$<?php echo $session_quote ?>.00</td>
          </tr>
          <tr>
            <td class="label first" colspan="4">
              <span><small>Including TAX
            <!-- <span class="tax-percent">(10.00%)</span> -->
                </small>
              </span>
            </td>
            <td class="subtotal">
              <?php 
                $tax_amount = get_post_meta( $post->ID, 'includes_tax_amount', true ); 
                if ($tax_amount < 1){
                  $tax_amount = 'N/A';
                }
                echo '$'.$tax_amount;
              ?> 
            </td>
          </tr>
          <tr class="total">
            <td class="label" colspan="4">Total Invoice Amount</td>
            <td class="total" id="total-amount">$<?php echo $session_quote ?>.00</td>
          </tr>
          <tr>
            <td class="label first" colspan="4">
              <span>Current Payment Status:</span>
            </td>
            <td class="subtotal">
              <?php $current_payment_status = get_post_meta( $post->ID, 'current_payment_status', true ); 
                switch ($current_payment_status) {
                  case 'D':
                    $payment_status = 'Due';
                    break;
                  case 'S':
                    $payment_status = 'Submitted';
                    break;
                  case 'P':
                    $payment_status = 'Paid';
                    break;
                  default:
                    $payment_status = 'Due';
                    break;
                }
                echo $payment_status;
              ?>
            </td>
          </tr>
        <?php 
          $transaction_id = get_post_meta( $post->ID, 'transaction_id', true ); 
          if ($transaction_id != 'no_transaction_id') :
        ?>
          <tr>
            <td class="label first" colspan="4">
              <span><strong>Transaction ID:</strong></span>
            </td>
            <td class="subtotal">
            <?php 
              echo $transaction_id;
            ?>
            </td>
          </tr>
    <?php endif ?>
        </tbody>
      </table>  
      <?php 
        if($payment_status == 'Due') : 
      ?>
      <div class="client-doc-notes">
        <h3>Payment Notes</h3>
        <p>Trudio uses Stripe for secure payment processing. No credit card details or other sensitive information is every stored on Trudio servers. <a href="https://stripe.com/" target="blank">Stripe</a> is a highly secure payment gateway that is trusted by millions of people.</p>
        <p>For your benefit your payment will be held in escrow by Trudio until your session is complete. If a refund is required it will be processed as detailed by the <a href="<?php echo site_url();?>/terms-of-use">Terms of Use</a>.</p>
        <div class="clearfix"></div>
        <hr>
        <div class="do-not-print">
          <?php 
              echo do_shortcode('
              [stripe name="Trudio Invoice" description="To '.get_post_meta( $post->ID, 'invoice_to', true ).'" amount="'.$session_quote.'00"]
                [stripe_number label="Contact Phone/Cell Number" id="contact_number" placeholder="310-123-45678"]
                [stripe_checkbox label="I agree to the Terms of Use" id="agree_toc" required="true"]
              [/stripe]'
            );
          ?>
        </div>
      </div>
<?php endif ?>
    </div>
  </div>
</div>