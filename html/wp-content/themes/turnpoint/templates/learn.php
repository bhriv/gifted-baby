<?php /* Template Name: Learn */ ?>
<?php while (have_posts()) : the_post(); ?>
 <div class="alert alert-error" id="landscape_warning">
            GIFTED BABY is optimized to play in Landscape orientation on small screen devices. Please ensure your device is in Landscape.<br>
            <span id="landscape_warning_close"><strong>Hide this message</strong></span>
        </div>
        
        <div class="main-container">
            <div class="main wrapper clearfix">
                <section id="phone" style=" z-index:3;">
                <div id="main_game_holder">
                    <header>
                        <ul>
                            <li id="blackjackjs_logo"><a href="">Gifted Baby</a></li>
                            <!-- <li class="cheatmode"><i class="fa fa-pie-chart"></i> <span id="deck_stack">5/6</span> <span id="penetration">80</span>&#37;</li> -->
                            <li class=""><i class="fa fa-hand-stop-o"></i> Hands: <span id="total_hands">0</span></li>
                            <li class=""><i class="fa fa-pie-chart"></i> Wins: <span id="win_average">0</span>&#37; <small><em>skill</em></small> <span id="luck_average">0</span>&#37; <small><em>luck</em></small></li>
                            <li class="cheatmode"><i class="fa fa-graduation-cap"></i> Teacher: <span id="teacher"></span></li>
                            <!-- <li class="cheatmode"><i class="fa fa-balance-scale"></i> Odds: <span id="odds">4.5</span>&#37;</li> -->
                            <li>
                                <div id="money">
                                    <span id="cash"><i class="fa fa-bank"></i> Bankroll: &#36;<span></span></span>
                                    <!-- <div id="bank" style="display:none;">Winnings: $<span></span></div> -->
                                </div>
                            </li>
                        </ul>
                    </header>
                    <div id="table">
                        <?php 
                          $general_args = array(
                            'post_status' => 'publish',
                            'post_type' => 'article',
                            'posts_per_page' => -1,
                            'order' => 'ASC'
                         );
                         $general_faq_query = new WP_Query($general_args);
                        ?>
                        <?php $general_faq_item = 1; if($general_faq_query->have_posts()) : ?>
                        <script>
                          var people = [<?php while($general_faq_query->have_posts()) : $general_faq_query->the_post() ?>{"name": "<?php the_title();?>","img_url": "<?php the_post_thumbnail_url(); ?>"},<?php $general_faq_item++; endwhile ?>];
                          console.log(people[0].name+' '+people[1].name+' '+people[2].name, 'info');
                        </script>
                        <?php endif; wp_reset_query(); ?>
                        <div id="card_holder">
                            <!-- Main Game Play Area -->

                            <!-- <input type="text" id="ps"> -->
                            <!-- <input type="text" id="ds"> -->
                            
                            <div id="game">
                                <!-- Gifted Baby -->

                                <div id="left" class="people">
                                    <img src="" alt="" width="100" height="100">
                                    <p class="name">left</p>
                                </div>
                                <div id="right" class="people">
                                    <img src="" alt="" width="100" height="100">
                                    <p class="name">right</p>
                                </div>
                                <!-- Gifted Baby -->


                                <div id="dealer">
                                    <div id="dhand"></div>
                                </div>
                                <div id="player">
                                    <div id="phand"></div>
                                </div>
                                <div class="alert alert-error hide" id="alert">
                                    <span></span>
                                </div>
                            </div>
                       
                            <div class="modal hide fade" id="myModal">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                                    <h3>Out of cash!</h3>
                                </div>
                                <div class="modal-body">
                                    <p>You ran out of cash! We hope you enjoyed playing this game of BlackjackJS</p>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn" href="#" id="cancel">Nah</a> <a class=
                                    "btn btn-primary" href="#" id="newGame">Yes!</a>
                                </div>
                            </div>
                            <!-- <div id="start_new_game">
                                <p>You will be assigned a player name and ID when you start a new game.</p>
                            </div> -->
                            <div id="newgame" class="modal">
                                <div class="modal-header" id="game_logo">
                                    <!-- <button class="close" data-dismiss="modal" type="button">&times;</button> -->
                                    <h3>Blackjack.JS</h3>
                                    <p><em>Powered by Lumious</em></p>
                                </div>
                                <div class="modal-body">
                                    <p>House Rules: Dealer stands on all 17's. No splitting.</p>
                                    <p>A random username will be selected after selecting your experience level:</p>
                                    <p>
                                        <ul>
                                            <li>
                                                <label for="radio-choice-1"><input type="radio" name="player_level" id="radio-choice-1" tabindex="1" value="expert">Expert</label>
                                                <label for="radio-choice-2"><input type="radio" name="player_level" id="radio-choice-2" tabindex="2" value="average" checked>Intermediate</label>
                                                <label for="radio-choice-3"><input type="radio" name="player_level" id="radio-choice-3" tabindex="3" value="beginner">Beginner</label>
                                            </li>
                                        </ul>
                                    </p>
                                    <!-- <p><a id="checkMoves">checkMoves</a></p> -->
                                    <p><button class="action restart" id="startgame">Start Game</button></p>
                                </div>
                            </div>
                            <div id="game_info" class="modal" style="display:none;">
                                <div class="modal-header">
                                    <p><strong>xAPI Deployed: Revolutionize Training Effectiveness with Learning Analytics</strong></p>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        George Churchwell<br>
                                        Tech 2000, Inc.<br>
                                        <a href="mailto:georgech@t2000inc.com">georgech@t2000inc.com</a><br>
                                        <a href="tel:+17038610653">+1 703.861.0653</a> 
                                    </p>
                                    <button class="close" data-dismiss="modal" type="button" id="info_close">&times;</button>
                                </div>
                            </div>
                        </div>
                        <div id="actions"  style="display:none;">
                            <div class="play">
                                <div id="bet_holder">
                                    <label>Bet: $</label>
                                    <!-- <i id="bankroll" class="fa fa-money"></i>  -->
                                    <input class="input-small" id="wager" type="text">
                                    <!-- <a href="#" id="REGISTERED">REGISTERED()</a> -->
                                    
                             <!--        <a href="#" id="getactor">getactor</a>
                                    <a id="BLACKJACK" class="test_outcome">BLACKJACK()</a>  
                                    <a id="WIN" class="test_outcome">WIN()</a>  
                                    <a id="WIN_DEALER_BUST" class="test_outcome">WIN_DEALER_BUST()</a>  
                                    <a id="LOSS" class="test_outcome">LOSS()</a>    
                                    <a id="LOSS_DEALER_BLACKJACK" class="test_outcome">LOSS_DEALER_BLACKJACK()</a>  
                                    <a id="BUSTED" class="test_outcome">BUSTED()</a>    
                                    <a id="PUSH" class="test_outcome">PUSH()</a>   -->  
                                </div>
                                <ul>
                                    <li><button class="action" id="deal">Deal</button></li>
                                    <li><button class="action" disabled id="double">Double Down</button></li>
                                    <li><button class="action" disabled id="hit">Hit</button></li>
                                    <li><button class="action" disabled id="stand">Stand</button></li>
                                    <li class="split-row">
                                        <button class="action" disabled id="insurance">Buy Insurance</button>
                                        <!-- <button class="btn action" disabled id="split">Split</button> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <footer>
                        <ul>
                            <li id="actor"><i class="fa fa-user"></i> Player: <span id="actor_name"></span></li>
                            <li id="cheat_mode" class="cheatmode"><i class="fa fa-power-off"></i> Cheat Mode<!--  <span>Off</span><span style="display:none;">On</span> --></li>
                            <li id="buy_hint" class="cheatmode"><i class="fa fa-question-circle"></i> Buy Hint</li>
                            <li id="info_show"><i class="fa fa-info-circle"></i> Info</li>
                            <li id="" class="clickable"><a href="javascript:location.reload(true)"><i class="fa fa-refresh"></i> Restart</a></li>                            
                        </ul>
                    </footer>
                </div>
            </section>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <!-- <footer class="wrapper">
                <h3>footer</h3>
            </footer> -->
        </div> 
<?php endwhile; ?>


