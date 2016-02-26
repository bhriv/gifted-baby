<?php /* Template Name: Home */ ?>
<section id="home_slider">
  <ul class="rslides" id="overview">
  <?php if( get_field( "home_slider_1" ) ): ?>
    <li>
      <img src="<?php the_field( "home_slider_1" ); ?>">
      <?php if( get_field( "home_slider_content_1" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_slider_content_1" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
<?php $live = true; if($live) : ?>
  <?php if( get_field( "home_slider_2" ) ): ?>
    <li>
      <img src="<?php the_field( "home_slider_2" ); ?>">
      <?php if( get_field( "home_slider_content_2" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_slider_content_2" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  <?php if( get_field( "home_slider_3" ) ): ?>
    <li>
      <img src="<?php the_field( "home_slider_3" ); ?>">
      <?php if( get_field( "home_slider_content_3" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_slider_content_3" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  <?php if( get_field( "home_slider_4" ) ): ?>
    <li>
      <img src="<?php the_field( "home_slider_4" ); ?>">
       <?php if( get_field( "home_slider_content_4" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_slider_content_4" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
<?php endif ?>
  </ul>
</section>
<section id="go_anywhere">
  <?php  get_template_part('home_page_nav');?>
  <ul class="rslides" id="">
  <?php if( get_field( "home_go_anywhere" ) ): ?>
    <li>
      <img src="<?php the_field( "home_go_anywhere" ); ?>">
    </li>
  <?php endif; ?>
  </ul>
  <!-- go anywhere from here -->
  <ul class="rslides" id="destination">
  <?php if( get_field( "home_banner_1" ) ): ?>
    <li>
      <img src="<?php the_field( "home_banner_1" ); ?>">
      <?php if( get_field( "home_banner_content_1" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_banner_content_1" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  </ul>
</section>
<section id="join_our_community">
  <div id="switcher_pad" class="pad"></div>
  <?php //get_template_part('home_page_nav');?>
  <div class="main-container">
    <div class="main clearfix">
      <ul id="skill_switcher">
        <li id="upskiller" class="turn-on">
          <div class="skill_title">
            <p>Upskiller</p>
            <img src="<?= site_url()?>/assets/Arnas.jpg">
          </div>
        </li>
        <li id="entrepreneur">
          <div class="skill_title">
            <p>Entrepreneur</p>
            <img src="<?= site_url()?>/assets/TurnPoint_Nina.jpg">
          </div>
        </li>
        <li id="career_shifter">
          <div class="skill_title">
            <p>Career Shifter</p>
            <img src="<?= site_url()?>/assets/Hayley.jpg">
          </div>
        </li>
      </ul>
    <ul id="skill_details">
      <li id="upskiller_details" class="">
        <div class="skill_content">
          <h3>Freelance Logo Designer to UX</h3>
          <p>A former logo and identity designer from Lithuania, Arnas added coding to his skillset and began specializing in UX. After mastering web development tools, he started working remotely from Asia for a UK-based web development agency with clients based all over the world. </p>
        </div>
      </li>
      <li id="entrepreneur_details" class="hidden">
        <h3>Product Marketer to Running a Business</h3>
        <p>Nina worked in product marketing for Adidas in Germany but set up her own business last year. She now runs an online graduate consulting business to help Russian postgraduates get into top business schools. This allows her to travel and live and work anywhere. From Paris to Geneva and Bali.</p>
      </li>
      <li id="career_shifter_details" class="hidden">
        <h3>From Marketer to Fiction Writer</h3>
        <p>Hayley previously worked as a marketing manager for a film distribution, production and events company, based on an island in Sydney Harbour.  After leaving her previous job she reinvented herself as a manuscript editor and writer with a black book of contacts of clients all around the world. </p>
      </li>
    </ul>
    </div>
  </div>

  <div>
    <ul id="term_links">
      <li><a href="<?= site_url()?>/category/technology/"><img src="<?= site_url()?>/assets/icons/technology.jpg">technology</a></li>
      <li><a href="<?= site_url()?>/category/self/"><img src="<?= site_url()?>/assets/icons/self.jpg">self</a></li>
      <li><a href="<?= site_url()?>/category/marketing/"><img src="<?= site_url()?>/assets/icons/marketing.jpg">marketing</a></li>
      <li><a href="<?= site_url()?>/category/creative/"><img src="<?= site_url()?>/assets/icons/creative.jpg">creative</a></li>
      <li><a href="<?= site_url()?>/category/entrepreneurship/"><img src="<?= site_url()?>/assets/icons/entrepreneurship.jpg">entrepreneurship</a></li>
    </ul>
  </div>

  <ul class="rslides">
  <?php if( get_field( "home_banner_2" ) ): ?>
    <li>
      <img src="<?php the_field( "home_banner_2" ); ?>">
      <?php if( get_field( "home_banner_content_2" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_banner_content_2" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  </ul>
</section>

<!-- <section id="4">
  
</section>
 -->
<!-- 7.5
 [link to Rotb product page]
Self [link to 9 to thrive product page]
Marketing [link to digital marketing product page]
Creative [Link to Digital Marketing or Rotb product pages]
Entrepreneurship [Link to building online course product page]

7.6  Build your knowledge, skills and make a shift by enrolling on our highly output-oriented courses.

 -->

<section id="upcoming_courses">
  <div class="pad"></div>
  <?php //get_template_part('home_page_nav');?>
  <div class="main-container">
    <div class="main clearfix">
  <?php 
    if( get_field( "upcoming_courses_overview" ) ):
      the_field( "upcoming_courses_overview" );
    endif ?>
    <div class="clearfix"></div>
      <div class="cards_profiles">
        <?php get_template_part('featured_courses');?>
      </div>
      <p><a href="/courses"><button>SEE ALL COURSES</button></a></p>
    </div>
  </div>
</section>
<section id="7" class="section_7">
  <ul class="rslides">
  <?php if( get_field( "home_banner_3" ) ): ?>
    <li>
      <img src="<?php the_field( "home_banner_3" ); ?>">
      <?php if( get_field( "home_banner_content_3" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_banner_content_3" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  </ul>
</section>

<section id="recent_articles">
  <div class="pad"></div>
  <div class="main-container">
    <div class="main clearfix">
<?php 
    if( get_field( "recent_articles_overview" ) ):
      the_field( "recent_articles_overview" );
    endif ?>
    <div class="clearfix"></div>
    <?php get_template_part('recent_articles');?>
    </div>
    <p><a href="/articles"><button>READ MORE</button></a></p>
  </div>
</section>

<section id="9">
  <ul class="rslides">
  <?php if( get_field( "home_banner_4" ) ): ?>
    <li>
      <img src="<?php the_field( "home_banner_4" ); ?>">
      <?php if( get_field( "home_banner_content_4" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_banner_content_4" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  </ul>
</section>

<section id="recent_quotes">
  <div class="pad"></div>
  <?php //get_template_part('home_page_nav'); ?>
  <div class="main-container">
    <div class="main clearfix">
      <h3>Join our Community</h3>
      <?php the_content()?>
      <?php get_template_part('recent_quotes');?>
      <!-- <img src="">companies -->
    </div>
  </div>
</section>
<?php // if (is_user_logged_in()) : ?>
<div class="clearfix"></div>
<section id="as_seen_in">
  <h3>As Seen In</h3>
  <p>These people are talking about us</p>
  <ul>
  <?php if( get_field( "as_seen_in_1" ) ): ?>
    <li><?php the_field( "as_seen_in_1" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_2" ) ): ?>
    <li><?php the_field( "as_seen_in_2" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_3" ) ): ?>
    <li><?php the_field( "as_seen_in_3" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_4" ) ): ?>
    <li><?php the_field( "as_seen_in_4" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_5" ) ): ?>
    <li><?php the_field( "as_seen_in_5" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_6" ) ): ?>
    <li><?php the_field( "as_seen_in_6" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_7" ) ): ?>
    <li><?php the_field( "as_seen_in_7" ); ?></li>
  <?php endif; ?>
  <?php if( get_field( "as_seen_in_8" ) ): ?>
    <li><?php the_field( "as_seen_in_8" ); ?></li>
  <?php endif; ?>
  </ul>
  <div class="clearfix"></div>
</section>
<?php // endif; ?>
<div class="clearfix"></div>
<section id="11">
  <ul class="rslides">
  <?php if( get_field( "home_banner_5" ) ): ?>
    <li>
      <img src="<?php the_field( "home_banner_5" ); ?>">
      <?php if( get_field( "home_banner_content_5" ) ): ?>
      <div class="main-container">
        <div class="main">
          <span><?php the_field( "home_banner_content_5" ); ?></span>
        </div>
      </div>
      <?php endif ?>
    </li>
  <?php endif; ?>
  </ul>
</section>
<div class="clearfix"></div>
<div id="letsconnect_modal">
    <div class="modal_popup">
      <input class="modal-state" id="modal-2" type="checkbox" />
      <div class="modal-window">
        <div class="modal-inner">
          <label class="modal-close" for="modal-2"></label>
          <?php //if (!is_user_logged_in()) { // if not logged in show register form with contact form
            echo "<div id='more_info_register'>";
            //echo do_shortcode('[wpuf_profile type="registration" id="437"]');  ?>
            <p>Hi!<br>
              There are so many things happening at TurnPoint even we have trouble keeping up!  Sign up here for our weekly dose of inspiration, articles and learning opportunities for digital nomads, global citizens and others passionate about the changing nature of work.
            </p>
              <form accept-charset="UTF-8" action="https://db195.infusionsoft.com/app/form/process/e70ed205e3cbbb0ceb7fa3d7a4ec7414" class="infusion-form" method="POST">
                <input name="inf_form_xid" type="hidden" value="e70ed205e3cbbb0ceb7fa3d7a4ec7414" />
                <input name="inf_form_name" type="hidden" value="Sign up for TurnPoint Newsletter Pop up" />
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
                    <label for="inf_field_Country">Country *</label>
                    <select id="inf_field_Country" name="inf_field_Country"><option value="">Please select one</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Åland Islands">Åland Islands</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Democratic Republic Of Congo">Democratic Republic Of Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Côte D'Ivoire">Côte D'Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="South Korea">South Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Republic of Macedonia">Republic of Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Federated States of Micronesia">Federated States of Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Réunion">Réunion</option><option value="St. Barthélemy">St. Barthélemy</option><option value="St. Helena, Ascension and Tristan Da Cunha">St. Helena, Ascension and Tristan Da Cunha</option><option value="St. Kitts And Nevis">St. Kitts And Nevis</option><option value="St. Lucia">St. Lucia</option><option value="St. Martin">St. Martin</option><option value="St. Pierre And Miquelon">St. Pierre And Miquelon</option><option value="St. Vincent And The Grenedines">St. Vincent And The Grenedines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Viet Nam">Viet Nam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
                </div>
                <div class="infusion-field">
                    <label for="inf_custom_Interests">Interests *</label>
                    <select id="inf_custom_Interests" name="inf_custom_Interests"><option value="">Please select one</option><option value="9 to Thrive Course">9 to Thrive Course</option><option value="Ruby on The Beach Course">Ruby on The Beach Course</option><option value="Build an Online Course">Build an Online Course</option><option value="Wordpress Course">Wordpress Course</option><option value="Future of Work">Future of Work</option></select>
                </div>
                <div class="infusion-submit">
                    <input type="submit" value="Stay connected!" />
                </div>
            </form>
            <script type="text/javascript" src="https://db195.infusionsoft.com/app/webTracking/getTrackingCode?trackingId=435791db8ad6ebe19ccfc3c515bbe9fc"></script>


          <?php echo "</div>";
          //}else{ // else show enquiry form
           // echo do_shortcode('[wpuf_form id="438"]');
          //} ?>
          
        </div>
      </div>
    </div>
  </div>
