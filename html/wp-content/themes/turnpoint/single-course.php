
<?php while (have_posts()) : the_post(); ?>
  <section id="top_course_slider">
    <ul class="rslides" id="top_slides">
      <li>
        <?php the_post_thumbnail(); ?>
          <div class="main-container">
            <div class="main">
              <?php if( get_field( "main_course_header" ) ): ?>
              <?php the_field( "main_course_header" ); ?>
              <?php get_template_part('action_buttons'); ?>
              <!-- <p id="course_time"><?php //get_template_part('course_dates'); ?></p> -->
<style type="text/css">
  body.single-course {

  }
</style>
            <?php endif ?>
            </div>
          </div>
      </li>
    <?php if( get_field( "top_course_slider_1" ) ): ?>
      <li>
        <img src="<?php the_field( "top_course_slider_1" ); ?>">
        <?php if( get_field( "top_course_slider_content_1" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "top_course_slider_content_1" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    <?php if( get_field( "top_course_slider_2" ) ): ?>
      <li>
        <img src="<?php the_field( "top_course_slider_2" ); ?>">
        <?php if( get_field( "top_course_slider_content_2" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "top_course_slider_content_2" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    <?php if( get_field( "top_course_slider_3" ) ): ?>
      <li>
        <img src="<?php the_field( "top_course_slider_3" ); ?>">
        <?php if( get_field( "top_course_slider_content_3" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "top_course_slider_content_3" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    <?php if( get_field( "top_course_slider_4" ) ): ?>
      <li>
        <img src="<?php the_field( "top_course_slider_4" ); ?>">
         <?php if( get_field( "top_course_slider_content_4" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "top_course_slider_content_4" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    </ul>
    <script type="text/javascript">
      $("#top_slides").responsiveSlides({
          speed: 3000,
          auto: true,
          // pager: true,
          nav: true
      });
    </script>
  </section>
  <div class="main-container">
    <div class="main">
      <?php get_template_part('breadcrumbs');?>
      <article <?php post_class(); ?>>
        <?php //get_template_part('post_header');?>
        <div class="entry-content">
          <?php get_template_part('course_essential_info'); ?>
          <?php the_content(); ?>
          <!-- <div class="clearfix push"></div> -->
          <?php if(get_field('course_video_url')) : ?>
          <div id="left_side">
            <div class="videoWrapper">
              <iframe frameborder="0" src="<?php the_field('course_video_url'); ?>"></iframe>
            </div>
          </div>
          <div id="right_side">
            <?php the_field('course_caption_content'); ?>
          </div>
          <div class="clearfix push"></div>
        <?php endif ?>
          <?php get_template_part('action_buttons'); ?>
          <?php //get_template_part('course_dates'); ?>
        </div>
      </article>
    </div>
  </div>
  <div class="clearfix push"></div>
  <section id="bottom_slider">
    <ul class="rslides" id="bottom_slides">
    <?php if( get_field( "bottom_slider_1" ) ): ?>
      <li>
        <img src="<?php the_field( "bottom_slider_1" ); ?>">
        <?php if( get_field( "bottom_slider_content_1" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "bottom_slider_content_1" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    <?php if( get_field( "bottom_slider_2" ) ): ?>
      <li>
        <img src="<?php the_field( "bottom_slider_2" ); ?>">
        <?php if( get_field( "bottom_slider_content_2" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "bottom_slider_content_1" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    <?php if( get_field( "bottom_slider_3" ) ): ?>
      <li>
        <img src="<?php the_field( "bottom_slider_3" ); ?>">
        <?php if( get_field( "bottom_slider_content_3" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "bottom_slider_content_3" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    <?php if( get_field( "bottom_slider_4" ) ): ?>
      <li>
        <img src="<?php the_field( "bottom_slider_4" ); ?>">
         <?php if( get_field( "bottom_slider_content_4" ) ): ?>
        <div class="main-container">
          <div class="main">
            <span><?php the_field( "bottom_slider_content_4" ); ?></span>
          </div>
        </div>
        <?php endif ?>
      </li>
    <?php endif; ?>
    </ul>
    <script type="text/javascript">
      $("#bottom_slides").responsiveSlides({
          speed: 3000,
          auto: true,
          // pager: true,
          nav: true
      });
    </script>
  </section>

  <section id="course_info">
    <div class="main-container">
      <div class="main">
        <?php 
          if( get_field( "course_info" ) ): 
            the_field('course_info');
          endif;
        ?>
        <?php // show tabs if present
          // course_info_tab_1_title = text
          // course_info_tab_1_content  = wysig widget  
          // course_info_tab_1_checklist = wysig widget  
          if( get_field( "course_info_tab_1_title" ) ): 
        ?>
        <ul class="accordion-tabs">
          <li class="tab-header-and-content">
            <a href="#" class="is-active tab-link"><?php the_field('course_info_tab_1_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_1_content') ?>
              <?php the_field('course_info_tab_1_checklist') ?>
            </div>
          </li>
          <?php if( get_field( "course_info_tab_2_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_2_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_2_content') ?>
              <?php the_field('course_info_tab_2_checklist') ?>
            </div>
          </li>
          <?php endif ?>
          <?php if( get_field( "course_info_tab_3_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_3_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_3_content') ?>
              <?php the_field('course_info_tab_3_checklist') ?>
            </div>
          </li>
          <?php endif ?>
          <?php if( get_field( "course_info_tab_4_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_4_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_4_content') ?>
              <?php the_field('course_info_tab_4_checklist') ?>
            </div>
          </li>
          <?php endif ?>
          <?php if( get_field( "course_info_tab_5_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_5_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_5_content') ?>
              <?php the_field('course_info_tab_5_checklist') ?>
            </div>
          </li>
          <?php endif ?>
          <?php if( get_field( "course_info_tab_6_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_6_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_6_content') ?>
              <?php the_field('course_info_tab_6_checklist') ?>
            </div>
          </li>
          <?php endif ?>
          <?php if( get_field( "course_info_tab_7_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_7_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_7_content') ?>
              <?php the_field('course_info_tab_7_checklist') ?>
            </div>
          </li>
          <?php endif ?>
          <?php if( get_field( "course_info_tab_8_title" ) ):  ?>
          <li class="tab-header-and-content">
            <a href="#" class="tab-link"><?php the_field('course_info_tab_8_title') ?></a>
            <div class="tab-content">
              <?php the_field('course_info_tab_8_content') ?>
              <?php the_field('course_info_tab_8_checklist') ?>
            </div>
          </li>
          <?php endif ?>
        </ul>
        <?php endif // end course tabs ?>
        <?php get_template_part('action_buttons'); ?>
        <?php // get_template_part('course_dates'); ?>
        <div class="clearfix push"></div>
      </div>
    </div>
  </section>
  <div id="more_info_modal">
    <div class="modal_popup">
      <input class="modal-state" id="modal-1" type="checkbox" />
      <div class="modal-window">
        <div class="modal-inner">
          <label class="modal-close" for="modal-1"></label>
          <?php //if (!is_user_logged_in()) { // if not logged in show register form with contact form
            echo "<div id='more_info_register'>";
            if (get_field('more_info_popup_content')) :
              the_field('more_info_popup_content');
            else : ?>
              <form accept-charset="UTF-8" action="https://db195.infusionsoft.com/app/form/process/4b92eabb199baf20620e0575e4c9d7c6" class="infusion-form" method="POST">
                <input name="inf_form_xid" type="hidden" value="4b92eabb199baf20620e0575e4c9d7c6" />
                <input name="inf_form_name" type="hidden" value="&quot;More info&quot; pop up" />
                <input name="infusionsoft_version" type="hidden" value="1.36.0.45" />
                <div class="infusion-field">
                    <label for="inf_field_FirstName">First Name *</label>
                    <input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" />
                </div>
                <div class="infusion-field">
                    <label for="inf_field_Email">Email *</label>
                    <input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email" type="text" />
                </div>
                <div class="infusion-field">
                    <label for="inf_field_Phone1">Phone</label>
                    <input class="infusion-field-input-container" id="inf_field_Phone1" name="inf_field_Phone1" type="text" />
                </div>
                <div class="infusion-field">
                    <label for="inf_field_Country">Country *</label>
                    <select id="inf_field_Country" name="inf_field_Country"><option value="">Please select one</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Åland Islands">Åland Islands</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Democratic Republic Of Congo">Democratic Republic Of Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Côte D'Ivoire">Côte D'Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="South Korea">South Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Republic of Macedonia">Republic of Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Federated States of Micronesia">Federated States of Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Réunion">Réunion</option><option value="St. Barthélemy">St. Barthélemy</option><option value="St. Helena, Ascension and Tristan Da Cunha">St. Helena, Ascension and Tristan Da Cunha</option><option value="St. Kitts And Nevis">St. Kitts And Nevis</option><option value="St. Lucia">St. Lucia</option><option value="St. Martin">St. Martin</option><option value="St. Pierre And Miquelon">St. Pierre And Miquelon</option><option value="St. Vincent And The Grenedines">St. Vincent And The Grenedines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Viet Nam">Viet Nam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
                </div>
                <div class="infusion-field">
                    <label for="inf_custom_SubscribetotheTurnPointnewsletter">Subscribe to the TurnPoint newsletter</label>
                    <select id="inf_custom_SubscribetotheTurnPointnewsletter" name="inf_custom_SubscribetotheTurnPointnewsletter"><option value="">Please select one</option><option value="Yes">Yes</option><option value="No">No</option></select>
                </div>
                <input name="ReferenceURL" type="hidden" value="<?php the_permalink();?>" />
                <div class="infusion-submit">
                    <input type="submit" value="Let's connect!" />
                </div>
            </form>
            <script type="text/javascript" src="https://db195.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=435791db8ad6ebe19ccfc3c515bbe9fc"></script>

          <?php 
            endif;
          echo "</div>";
          //}else{ // else show enquiry form
           // echo do_shortcode('[wpuf_form id="438"]');
          //} ?>
          
        </div>
      </div>
    </div>
  </div>
<?php endwhile ?>
<style type="text/css">
  .main-container .main{
    width: 100% !important;
    margin: 0;
    float: none;
  }
</style>
