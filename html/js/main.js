/* Site Specific Functions
* - customizations of plugin js needs
* - non-page specific functions
*
*/

// ===========================
// FontAwesome Sprinkles
// ===========================

// Add fontawesome icons for checkbox
// $( "#search_filter span.acps_form_control_wrap label" ).prepend( "<i class='fa fa-minus-square-o'></i><i class='fa fa-check-square'></i>" );
// Make checkboxes switchable
// $('#search_filter span.acps_form_control_wrap label').click(function() {
//     $(this).toggleClass('selected');
// }); 


// ===========================
// Flip Map List View
// ===========================

// Load the map first to ensure full width propogation, then show list to ensure results are displayed


// ===========================
// Search Forms
// ===========================

// Hide spacer in Advanced Search form
$( "#search_filter span.acps_form_control_wrap br" ).addClass('hidden');

// Add custom Placeholder to override plugin setting
$('input[name$="keywords"]').attr('placeholder','Search by name, credits, keywords...');

// ===========================
// Switch Views
// ===========================

$('#show_hide_switch ul li').click(function() {
    $('#show_hide_switch ul li').removeClass('active');
    $(this).addClass('active');
  });
  

  $('#filter_view a').click(function() {
  	$('#show_filter').toggleClass('hidden');
  	$('#hide_filter').toggleClass('hidden');
    $('#filter_view').toggleClass('active');
    $('#filter_results').toggleClass('hidden');
  });
  $('a.show_search').click(function() {
  	$('#search_holder').toggleClass('hidden');
    $('a.show_search').toggleClass('active');
  });
  

// ===========================
// Date Time Picker
// ===========================

// $(document).ready(function(){
//     $("#dtBox").DateTimePicker({
//       dateTimeFormat: "yyyy-MM-dd hh:mm:ss",
//       dateFormat: "yyyy-MM-dd"
//     });
//  });


// =========================== 
// Tipsy
// ===========================


$(function() {
  // $('#logo-holder').tipsy({trigger: 'hover',fallback: "Home.", gravity: 'n'});
  $('a.show_search i.fa-times-circle-o').tipsy({trigger: 'hover',fallback: "Close", gravity: 'n'});
  $('#profile_tip').tipsy({trigger: 'hover',fallback: "Dashboard", gravity: 'n'});
  $('#messages_tip').tipsy({trigger: 'hover',fallback: "Messages", gravity: 'n'});
  $('#search_tip').tipsy({trigger: 'hover',fallback: "Search Bar", gravity: 'n'});
  $('#menu_tip').tipsy({trigger: 'hover',fallback: "Menu", gravity: 'n'});
  $('#show_filter').tipsy({trigger: 'hover',fallback: "Display all options", gravity: 'n'});
  // $('#book_a_session').tipsy({trigger: 'hover',fallback: "Book a session.", gravity: 'n'});
  $('#contact_seller').tipsy({trigger: 'hover',fallback: "Send a message via Trudio", gravity: 'n'});
  $('#back_up a').tipsy({trigger: 'hover',fallback: "Scroll back to the top", gravity: 'n'});
 // $('li.wpuf-submit input.btn').tipsy({trigger: 'hover',fallback: "Clicking this button will add the Update to this page and will send a notification to your Supporters.", gravity: 'w'});
 // $('#update_protest').tipsy({trigger: 'hover',fallback: "Clicking this button to see the Update Form where you can add new content to your post.", gravity: 'w'});
});


// ===========================
// Show Hide sub-content
// ===========================

$(document).ready(function(){
  $( "#upskiller" ).hover(
    function() {
      $('#upskiller').addClass('turn-on');
      $('#entrepreneur').removeClass('turn-on');
      $('#career_shifter').removeClass('turn-on');

      $('#upskiller_details').removeClass('hidden');
      $('#entrepreneur_details').addClass('hidden');
      $('#career_shifter_details').addClass('hidden');

    }, function() {
      // mouseout
    }
  );
  $( "#entrepreneur" ).hover(
    function() {
      $('#upskiller').removeClass('turn-on');
      $('#entrepreneur').addClass('turn-on');
      $('#career_shifter').removeClass('turn-on');

      $('#upskiller_details').addClass('hidden');
      $('#entrepreneur_details').removeClass('hidden');
      $('#career_shifter_details').addClass('hidden');

    }, function() {
      // mouseout
    }
  );
  $( "#career_shifter" ).hover(
    function() {
      $('#upskiller').removeClass('turn-on');
      $('#entrepreneur').removeClass('turn-on');
      $('#career_shifter').addClass('turn-on');

      $('#upskiller_details').addClass('hidden');
      $('#entrepreneur_details').addClass('hidden');
      $('#career_shifter_details').removeClass('hidden');
      
    }, function() {
      // mouseout
    }
  );
  // $('#career_shifter').on('click touchstart', function(e){
  //   $('#upskiller').removeClass('turn-on');
  //   $('#entrepreneur').removeClass('turn-on');
  //   $('#career_shifter').addClass('turn-on');
  //   e.preventDefault();
  // });
});