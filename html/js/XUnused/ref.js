/* Author:
	BHRIV
*/

//http://blog.iamcreative.me/code-snippets/add-a-placeholder-atribute-with-jquery/#.UuojFnddUyA
$('input[name$="s"]').attr('placeholder','Search');
//If your adding this to wordpress, you'll have to replace your $ with jQuery

// Calculate Quote
  // when cab selection changed
  // when body selection changed
  // when accessories total changed

var my_byo_cab_price = 0;
var my_byo_body_price = 0;
var my_accessories_total_price = 0;

function calculateQuote() {
  // var byo_cab_price = $('#Single-Cab-price').val();
  
  // var val = 12345678;
  // commaSeparateNumber(testnumber);
  // val = testnumber;

  var get_cab_price = $('#byo_cab-price').text();
  var get_body_price = $('#byo_body-price').text();
  var get_accessories_subtotal = $('#byo_total').text() + ".00";

  var pretty_body_price = $('#byo_body-price').text();
  var clean_body_price = pretty_body_price.replace(/\$/, '');
  // alert(clean_body_price);
  // clean off the $ sign
  get_cab_price = get_cab_price.replace(/\$/, '');
  get_cab_price = get_cab_price.replace(/\./, '');

  get_body_price = get_body_price.replace(/\$/, '');
  get_body_price = get_body_price.replace(/\./, '');

  //get_accessories_subtotal = get_accessories_subtotal.split(":").pop();
  //get_accessories_subtotal = get_accessories_subtotal.replace(/\$/, '');
  get_accessories_subtotal = get_accessories_subtotal.replace(/\./, '');

  var cab_float = parseFloat(get_cab_price);
  cab_float = cab_float/100;
  cab_float = cab_float.toFixed(2);

  var body_float = parseFloat(get_body_price);
  body_float = body_float/100;
  body_float = body_float.toFixed(2);

  // var accessories_float = parseFloat(get_accessories_subtotal);
  // accessories_float = accessories_float/100;
  //get_accessories_subtotal = get_accessories_subtotal.toFixed(2);
  get_accessories_subtotal = parseFloat(get_accessories_subtotal);
  get_accessories_subtotal = get_accessories_subtotal.toFixed(2);
  get_accessories_subtotal = get_accessories_subtotal/100;
  // alert(get_accessories_subtotal);
  
  //var body_float = parseFloat(get_body_price);
  grandtotal = parseFloat(cab_float, 10) + parseFloat(body_float, 10) + parseFloat(get_accessories_subtotal, 10);
  

  //$("#grandtotal").html('$' +grandtotal);
  // pretty Body byo_body-price
  
  //Code for Price Range
  var mean_price = Math.round(grandtotal);;
  var median     = mean_price%100;
  
  if(median > 50){
     mean_price  = mean_price - median + 100; 
  }
  else{
     mean_price  = mean_price - median;
  }
  var upper_range =  mean_price + 500;
  var lower_range =  mean_price - 500;
  var final_range =  "$" + lower_range + " - $" + upper_range;

  $("body").ready(function(){ 
    //var pretty_byo_body_price = $("#byo_body-price").
    function addCommas(nStr)
    {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
    }
    // alert('pretty body $' + addCommas(clean_body_price));
    var final_range_str =  "$" + addCommas(lower_range) + " - $" + addCommas(upper_range);
    $("#grandtotal").text(final_range_str);
    $('#byo_quote_total_price_range').val(final_range_str);
    // alert(addCommas(1231.89));
  }); //end body ready function 

  var subtotal_value = $("#byo_total").text();
  $("#byo_quote_accessories_subtotal_price").val(subtotal_value);

  // var grandtotal_value = $("#grandtotal").text();
  $("#byo_quote_total_price").val(grandtotal);
  
  
  // $("body").ready(function(){ 
  //   //var pretty_byo_body_price = $("#byo_body-price").
  //   function addCommas(nStr)
  //   {
  //     nStr += '';
  //     x = nStr.split('.');
  //     x1 = x[0];
  //     x2 = x.length > 1 ? '.' + x[1] : '';
  //     var rgx = /(\d+)(\d{3})/;
  //     while (rgx.test(x1)) {
  //       x1 = x1.replace(rgx, '$1' + ',' + '$2');
  //     }
  //     return x1 + x2;
  //   }
  //   $("#byo_body-price").text('$' + addCommas(clean_body_price));
  // }); //end body ready function 
  
}
// $('select[name="for_how_many_people[]"]').change(calculateTotal);



$('#select-Single-Cab').click(function() {  
  $('input:radio[name="byo_cab"]').filter('[value="Single Cab"]').prop("checked", true);
  $('input:radio[name="byo_cab"]').filter('[value="Space Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Dual Cab"]').prop("checked", false);
  // add tickbox highlight
  $('#select-Single-Cab span.tickbox').addClass('active');
  $('#select-Space-Cab span.tickbox').removeClass('active');
  $('#select-Dual-Cab span.tickbox').removeClass('active');

  var byo_cab = $('input[name=byo_cab]:checked', 'form.wpuf-form-add').val();
  $("#byo_cab_value").html("" +byo_cab);

  var byo_cab_price = $('#Single-Cab-price').val();
  $("#byo_cab-price").html("$" +byo_cab_price);

  my_byo_cab_price = byo_cab_price;
  // calculate the total
  calculateQuote();
  
}); 

$('#select-Space-Cab').click(function() {  
  $('input:radio[name="byo_cab"]').filter('[value="Single Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Space Cab"]').prop("checked", true);
  $('input:radio[name="byo_cab"]').filter('[value="Dual Cab"]').prop("checked", false);
  // add tickbox highlight
  $('#select-Single-Cab span.tickbox').removeClass('active');
  $('#select-Space-Cab span.tickbox').addClass('active');
  $('#select-Dual-Cab span.tickbox').removeClass('active');

  var byo_cab = $('input[name=byo_cab]:checked', 'form.wpuf-form-add').val();
  $("#byo_cab_value").html("" +byo_cab);

  var byo_cab_price = $('#Space-Cab-price').val();
  $("#byo_cab-price").html("$" +byo_cab_price);

  my_byo_cab_price = byo_cab_price;
  calculateQuote();
}); 

$('#select-Dual-Cab').click(function() {  
  $('input:radio[name="byo_cab"]').filter('[value="Single Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Space Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Dual Cab"]').prop("checked", true);
  // add tickbox highlight
  $('#select-Single-Cab span.tickbox').removeClass('active');
  $('#select-Space-Cab span.tickbox').removeClass('active');
  $('#select-Dual-Cab span.tickbox').addClass('active');

  var byo_cab = $('input[name=byo_cab]:checked', 'form.wpuf-form-add').val();
  $("#byo_cab_value").html("" +byo_cab);

  var byo_cab_price = $('#Dual-Cab-price').val();
  $("#byo_cab-price").html("$" +byo_cab_price);

  my_byo_cab_price = byo_cab_price;
  calculateQuote();
}); 


// BODY

$('#select-A-Body').click(function() {  
  $('input:radio[name="byo_body"]').filter('[value="A-Body"]').prop("checked", true);
  $('input:radio[name="byo_body"]').filter('[value="Z-Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="Canopy Body"]').prop("checked", false);
  // add tickbox highlight
  $('#select-A-Body span.tickbox').addClass('active');
  $('#select-Z-Body span.tickbox').removeClass('active');
  $('#select-Canopy-Body span.tickbox').removeClass('active');
  //show related accessories
  $('#show_byo_accessories').addClass('A-Body');
  $('#show_byo_accessories').removeClass('Z-Body');
  $('#show_byo_accessories').removeClass('Canopy Body');
  
  var byo_body = $('input[name=byo_body]:checked', 'form.wpuf-form-add').val();
  $("#byo_body_value").html("" +byo_body);

  var byo_body_price = $('#A-Body-price').val();
  $("#byo_body-price").html("$" +byo_body_price);

  my_byo_body_price = byo_body_price;
  calculateQuote();
}); 

$('#select-Z-Body').click(function() {  
  $('input:radio[name="byo_body"]').filter('[value="A-Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="Z-Body"]').prop("checked", true);
  $('input:radio[name="byo_body"]').filter('[value="Canopy Body"]').prop("checked", false);
  // add tickbox highlight
  $('#select-A-Body span.tickbox').removeClass('active');
  $('#select-Z-Body span.tickbox').addClass('active');
  $('#select-Canopy-Body span.tickbox').removeClass('active');

  //show related accessories
  $('#show_byo_accessories').removeClass('A-Body');
  $('#show_byo_accessories').addClass('Z-Body');
  $('#show_byo_accessories').removeClass('Canopy Body');

  var byo_body = $('input[name=byo_body]:checked', 'form.wpuf-form-add').val();
  $("#byo_body_value").html("" +byo_body);

  var byo_body_price = $('#Z-Body-price').val();
  $("#byo_body-price").html("$" +byo_body_price);

  my_byo_body_price = byo_body_price;
  calculateQuote();
}); 
$('#select-Canopy-Body').click(function() {  
  $('input:radio[name="byo_body"]').filter('[value="A-Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="Z-Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="Canopy Body"]').prop("checked", true);
  // add tickbox highlight
  $('#select-A-Body span.tickbox').removeClass('active');
  $('#select-Z-Body span.tickbox').removeClass('active');
  $('#select-Canopy-Body span.tickbox').addClass('active');
  //show related accessories
  $('#show_byo_accessories').removeClass('A-Body');
  $('#show_byo_accessories').removeClass('Z-Body');
  $('#show_byo_accessories').addClass('Canopy Body');

  var byo_body = $('input[name=byo_body]:checked', 'form.wpuf-form-add').val();
  $("#byo_body_value").html("" +byo_body);

  var byo_body_price = $('#Canopy-Body-price').val();
  $("#byo_body-price").html("$" +byo_body_price);

  my_byo_body_price = byo_body_price;
  calculateQuote();
}); 


// http://stackoverflow.com/questions/596351/how-can-i-get-which-radio-is-selected-via-jquery
  // $('form.wpuf-form-add input[name="byo_body"]').on('change', function() {
  //     // alert($('input[name=byo_body]:checked', 'form.wpuf-form-add').val());// 
  //     var byo_body = $('input[name=byo_body]:checked', 'form.wpuf-form-add').val();
  //     $("#byo_body_value").html("<strong>Body:</strong> " +byo_body);
  //     $('#show_byo_accessories').removeClass('A-Body');
  //     $('#show_byo_accessories').removeClass('Z-Body');
  //     $('#show_byo_accessories').removeClass('Canopy Body');
  //     $('#show_byo_accessories').addClass(byo_body);
      
  // });
  // $('form.wpuf-form-add input[name="byo_cab"]').on('change', function() {
  //     // alert($('input[name=byo_cab]:checked', 'form.wpuf-form-add').val());// 
  //     var byo_cab = $('input[name=byo_cab]:checked', 'form.wpuf-form-add').val();
  //     $("#byo_cab_value").html("<strong>Cab:</strong> " +byo_cab);
  // });


//http://stackoverflow.com/questions/7044301/jquery-unselect-group-of-radio-buttons
  // original-owner-yes

$('#original-owner-yes').click(function() {  
  $('input:radio[name="are_you_the_original_owner"]').filter('[value="Yes"]').prop("checked", true);
  $('input:radio[name="are_you_the_original_owner"]').filter('[value="No"]').prop("checked", false);
  // add tickbox highlight
  $('#original-owner-yes span.tickbox').addClass('active');
  $('#original-owner-no span.tickbox').removeClass('active');

}); 

$('#original-owner-no').click(function() {  
  $('input:radio[name="are_you_the_original_owner"]').filter('[value="Yes"]').prop("checked", false);
  $('input:radio[name="are_you_the_original_owner"]').filter('[value="No"]').prop("checked", true);
  // add tickbox highlight
  $('#original-owner-yes span.tickbox').removeClass('active');
  $('#original-owner-no span.tickbox').addClass('active');

}); 


// $("li.are_you_the_original_owner input[value='Yes']").click(function() {
//   // $("input[value='Yes']").removeClass('button_click');
//   $("li.are_you_the_original_owner input[value='No']").removeClass('button_clicked');
//   $("li.are_you_the_original_owner input[value='Yes']").addClass('button_clicked');
// }); 

// $("li.are_you_the_original_owner input[value='No']").click(function() {
//   // $("input[value='Yes']").removeClass('button_click');
//   $("li.are_you_the_original_owner input[value='Yes']").removeClass('button_clicked');
//   $("li.are_you_the_original_owner input[value='No']").addClass('button_clicked');
// }); 

  // select Cab
$('#select-Single-Cab').click(function() {  
  $('input:radio[name="byo_cab"]').filter('[value="Single Cab"]').prop("checked", true);
  $('input:radio[name="byo_cab"]').filter('[value="Space Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Dual Cab"]').prop("checked", false);
  // add tickbox highlight
  $('#select-Single-Cab span.tickbox').addClass('active');
  $('#select-Space-Cab span.tickbox').removeClass('active');
  $('#select-Dual-Cab span.tickbox').removeClass('active');

}); 
$('#select-Space-Cab').click(function() {  
  $('input:radio[name="byo_cab"]').filter('[value="Single Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Space Cab"]').prop("checked", true);
  $('input:radio[name="byo_cab"]').filter('[value="Dual Cab"]').prop("checked", false);
  // add tickbox highlight
  $('#select-Single-Cab span.tickbox').removeClass('active');
  $('#select-Space-Cab span.tickbox').addClass('active');
  $('#select-Dual-Cab span.tickbox').removeClass('active');
}); 

$('#select-Dual-Cab').click(function() {  
  $('input:radio[name="byo_cab"]').filter('[value="Single Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Space Cab"]').prop("checked", false);
  $('input:radio[name="byo_cab"]').filter('[value="Dual Cab"]').prop("checked", true);
  // add tickbox highlight
  $('#select-Single-Cab span.tickbox').removeClass('active');
  $('#select-Space-Cab span.tickbox').removeClass('active');
  $('#select-Dual-Cab span.tickbox').addClass('active');
}); 


$('#select-A-Body').click(function() {  
  $('input:radio[name="byo_body"]').filter('[value="Z-Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="Canopy Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="A-Body"]').prop("checked", true);
  // add tickbox highlight
  $('#select-A-Body span.tickbox').addClass('active');
  $('#select-Z-Body span.tickbox').removeClass('active');
  $('#select-Canopy-Body span.tickbox').removeClass('active');

}); 

$('#select-Z-Body').click(function() {  
  $('input:radio[name="byo_body"]').filter('[value="Z-Body"]').prop("checked", true);
  $('input:radio[name="byo_body"]').filter('[value="Canopy Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="A-Body"]').prop("checked", false);
  // add tickbox highlight
  $('#select-A-Body span.tickbox').removeClass('active');
  $('#select-Z-Body span.tickbox').addClass('active');
  $('#select-Canopy-Body span.tickbox').removeClass('active');
}); 

$('#select-Canopy-Body').click(function() {  
  $('input:radio[name="byo_body"]').filter('[value="Z-Body"]').prop("checked", false);
  $('input:radio[name="byo_body"]').filter('[value="Canopy Body"]').prop("checked", true);
  $('input:radio[name="byo_body"]').filter('[value="A-Body"]').prop("checked", false);
  // add tickbox highlight
  $('#select-A-Body span.tickbox').removeClass('active');
  $('#select-Z-Body span.tickbox').removeClass('active');
  $('#select-Canopy-Body span.tickbox').addClass('active');
}); 

/**** Add Class On Click  (Show / Hide) ****/ 

$('#show_hide_click ul li').click(function() {
  $('#show_hide_click ul li').removeClass('active');    
  $(this).addClass('active');
});

/**** BYO Switching ****/

$('#byo_cab a').click(function() {
  
  $('#form-steps').removeClass('show-byo_body');
  $('#form-steps').removeClass('show-byo_accessories'); 
  $('#form-steps').removeClass('show-byo_summary');
  $('#form-steps').removeClass('show-byo_enter_details');
  $('#form-steps').addClass('show-byo_cab');
  
}); 

$('#byo_body a').click(function() {
  
  $('#form-steps').removeClass('show-byo_cab');
  $('#form-steps').removeClass('show-byo_accessories'); 
  $('#form-steps').removeClass('show-byo_summary');
  $('#form-steps').removeClass('show-byo_enter_details');
  $('#form-steps').addClass('show-byo_body');
  
}); 

$('#byo_accessories a').click(function() {
  
  $('#form-steps').removeClass('show-byo_cab');
  $('#form-steps').removeClass('show-byo_body'); 
  $('#form-steps').removeClass('show-byo_summary');
  $('#form-steps').removeClass('show-byo_enter_details');
  $('#form-steps').addClass('show-byo_accessories');
  
}); 

$('#byo_summary a').click(function() {
  
  $('#form-steps').removeClass('show-byo_cab');
  $('#form-steps').removeClass('show-byo_accessories'); 
  $('#form-steps').removeClass('show-byo_body');
  $('#form-steps').removeClass('show-byo_enter_details');
  $('#form-steps').addClass('show-byo_summary');
   
}); 


$('#byo_enter_details a').click(function() {
   
   var valid = true;
   var msg   = "";
   if(! $('#select-A-Body span').hasClass("active") && ! $('#select-Z-Body span').hasClass("active") && ! $('#select-Canopy-Body span').hasClass("active")){
      msg = "Please select any body." ;
      valid = false;
   }
   if(valid){
  $('#byo_cab').removeClass('active');  
  $('#byo_body').removeClass('active');
  $('#byo_accessories').removeClass('active');
  $('#byo_summary').removeClass('active');
  $('#byo_enter_details').addClass('active');
  
  $('#form-steps').removeClass('show-byo_cab');
  $('#form-steps').removeClass('show-byo_accessories'); 
  $('#form-steps').removeClass('show-byo_summary');
  $('#form-steps').removeClass('show-byo_body');
  $('#form-steps').addClass('show-byo_enter_details');
  
  $('.byo_details').parents('li.wpuf-el').show();
  }
  else{
     alert(msg);
     setTimeout(function(){
        $('#byo_body a').trigger('click');
        
     }, 300);
  }
  
  
}); 
$(' #byo_summary a').click(function() {
   var valid = true;
   var msg   = "";
   if(! $('#select-A-Body span').hasClass("active") && ! $('#select-Z-Body span').hasClass("active") && ! $('#select-Canopy-Body span').hasClass("active")){
      msg = "Please select any body." ;
      valid = false;
   }
   if(valid){
  
      var valid2 = true;
      var msg2   = "";
      if($('#first_name').val()==""){
     
         valid2 = false;
         msg2 = "First Name is required.";
         }
      
      if($('#family_name').val()==""){
         valid2 = false;
         msg2   =  msg2 + "\nLast Name is required.";
         }
      if ($('#wpuf-email').val() == "") {
         valid2 = false;
         msg2 = msg2 + "\nEmail is required.";
      }
   
      if ($('#telephone_number').val() == "") {
         valid2 = false;
         msg2 = msg2 + "\nTelephone is required.";
      }

      
     if(valid2){
        $('#form-steps').removeClass('show-byo_cab');
        $('#form-steps').removeClass('show-byo_accessories'); 
        $('#form-steps').removeClass('show-byo_enter_details');
        $('#form-steps').addClass('show-byo_summary');
        $('#form-steps').removeClass('show-byo_body');

        $('#byo_cab').removeClass('active');  
        $('#byo_body').removeClass('active');
        $('#byo_accessories').removeClass('active');
        $('#byo_enter_details').removeClass('active');
        $('#byo_summary').addClass('active');
        $("input[name='rs_captcha']").parents('.wpuf-el').show();
     }
     else{
        alert(msg2);
        setTimeout(function(){
           $('#byo_enter_details a').trigger('click');
        
        }, 300);
     }
  
  
  }
  else{
     alert(msg);
     setTimeout(function(){
        $('#byo_body a').trigger('click');
      
     }, 300);
  }
  
   
  
}); 


// BYO Next Button 



$('#byo_step-2, #byo_body a').click(function() {
   
   
   var valid = true;
   var msg   = "";
   
   if(! $('#select-Single-Cab span').hasClass("active") && ! $('#select-Space-Cab span').hasClass("active") && ! $('#select-Dual-Cab span').hasClass("active")){
      
         msg   = msg + "\nPlease select any cab.";
         valid = false;
   }
   if(valid){
     $('#form-steps').removeClass('show-byo_cab');
     $('#form-steps').removeClass('show-byo_accessories'); 
     $('#form-steps').removeClass('show-byo_summary');
     $('#form-steps').removeClass('show-byo_enter_details');
     $('#form-steps').addClass('show-byo_body');

     $('#byo_cab').removeClass('active');  
     $('#byo_body').addClass('active');
     $('#byo_accessories').removeClass('active');
     $('#byo_summary').removeClass('active');
     $('#byo_enter_details').removeClass('active');
  }
  else{
     alert(msg);
     setTimeout(function(){
        $('#byo_cab a').trigger('click');
        
     }, 300);
  }
  
}); 

$('#byo_step-3, #byo_accessories a').click(function() {
   
   var valid = true;
   var msg   = "";
   if(! $('#select-A-Body span').hasClass("active") && ! $('#select-Z-Body span').hasClass("active") && ! $('#select-Canopy-Body span').hasClass("active")){
      msg = "Please select any body." ;
      valid = false;
   }
   if(valid){
  $('#form-steps').removeClass('show-byo_cab');
  $('#form-steps').addClass('show-byo_accessories'); 
  $('#form-steps').removeClass('show-byo_summary');
  $('#form-steps').removeClass('show-byo_enter_details');
  $('#form-steps').removeClass('show-byo_body');

  $('#byo_cab').removeClass('active');  
  $('#byo_body').removeClass('active');
  $('#byo_accessories').addClass('active');
  $('#byo_summary').removeClass('active');
  $('#byo_enter_details').removeClass('active');
  }
  else{
     alert(msg);
     setTimeout(function(){
        $('#byo_body a').trigger('click');
        
     }, 300);
  }
  
}); 



$('#byo_step-4').click(function() {

  $('#form-steps').removeClass('show-byo_cab');
  $('#form-steps').removeClass('show-byo_accessories'); 
  $('#form-steps').addClass('show-byo_enter_details');
  $('#form-steps').removeClass('show-byo_summary');
  $('#form-steps').removeClass('show-byo_body');

  $('#byo_cab').removeClass('active');  
  $('#byo_body').removeClass('active');
  $('#byo_accessories').removeClass('active');
  $('#byo_enter_details').addClass('active');
  $('#byo_summary').removeClass('active');
  $('.byo_details').parents('li.wpuf-el').show();
  
}); 

$('#byo_step-5').click(function() {
   
   var valid = true;
   var msg   = "";
   if($('#first_name').val()==""){
     
      valid = false;
      msg = "First Name is required.";
      }
      
   if($('#family_name').val()==""){
      valid = false;
      msg   =  msg + "\nLast Name is required.";
      }
   if ($('#wpuf-email').val() == "") {
      valid = false;
      msg = msg + "\nEmail is required.";
   }
   
   if ($('#telephone_number').val() == "") {
      valid = false;
      msg = msg + "\nTelephone is required.";
   }

      
  if(valid){
     $('#form-steps').removeClass('show-byo_cab');
     $('#form-steps').removeClass('show-byo_accessories'); 
     $('#form-steps').removeClass('show-byo_enter_details');
     $('#form-steps').addClass('show-byo_summary');
     $('#form-steps').removeClass('show-byo_body');

     $('#byo_cab').removeClass('active');  
     $('#byo_body').removeClass('active');
     $('#byo_accessories').removeClass('active');
     $('#byo_enter_details').removeClass('active');
     $('#byo_summary').addClass('active');
     $("input[name='rs_captcha']").parents('.wpuf-el').show();
  }
  else{
     alert(msg);
     setTimeout(function(){
        $('#byo_enter_details a').trigger('click');
        
     }, 300);
  }
  
}); 








// Parts Switching


$('#part a').click(function() {
  
 // $('#form-steps').removeClass('show-details');
  //$('#form-steps').removeClass('show-upload');
//  $('#form-steps').addClass('show-part');
  
});
$('#part_step-2').click(function() {
   var valid = true;
   var msg   = "";
   if($('#part_first_name').val()==""){
     
      valid = false;
      msg = "First Name is required.";
      }
      
   if($('#part_family_name').val()==""){
      valid = false;
      msg   =  msg + "\nLast Name is required.";
      }
   if($('#wpuf-part_email').val()==""){
      valid = false;
      msg   =  msg + "\nEmail is required.";
      }
      
  if(valid){
     $('#form-steps').removeClass('show-details');
     $('#form-steps').removeClass('show-upload');
     $('#form-steps').addClass('show-part');

     $('#details').removeClass('active');
     $('#part').addClass('active');
     $('#upload').removeClass('active');
  }
  else{
     alert(msg);
  }
  
});

$('#upload a').click(function() {
  
 // $('#form-steps').removeClass('show-details');
 // $('#form-steps').removeClass('show-part');
  //$('#form-steps').addClass('show-upload');
  
});



$('#part_step-3').click(function() {
   var valid = true;
   var msg   = "";
  
  
   if($('#post_content').val()==""){
      valid = false;
      msg = "Description is required.";
         }
         
   if(! $('#o1').is(':checked') &&  ! $('#o2').is(':checked') 
   
   && ! $('#o3').is(':checked') && ! $('#o4').is(':checked') 
   && ! $('#o5').is(':checked') && ! $('#o6').is(':checked') 
   && ! $('#o7').is(':checked') && ! $('#o8').is(':checked')
    && ! $('#o9').is(':checked')){
      valid = false;
      msg =  msg + "\nPlease select atleast one part.";
   }
   
   if(valid){
  $('#form-steps').removeClass('show-details');
  $('#form-steps').addClass('show-upload');
  $('#form-steps').removeClass('show-part');

  $('#details').removeClass('active');
  $('#part').removeClass('active');
  $('#upload').addClass('active');
 }
 else{
    alert(msg);
 }
  
});

/**** Add Class On Click  (Show / Hide) ****/ 

$('#show_hide_click ul li').click(function() {
  $('#show_hide_click ul li').removeClass('active');    
  $(this).addClass('active');
});

// *** Parts Switching ***

$('#details a').click(function() {
  
  $('#form-steps').removeClass('show-part');
  $('#form-steps').removeClass('show-upload');
  $('#form-steps').addClass('show-details');
  
}); 

$('#part a').click(function() {
  
   var valid = true;
   var msg   = "";
   if($('#part_first_name').val()==""){
     
      valid = false;
      msg = "First Name is required.";
      }
      
   if($('#part_family_name').val()==""){
      valid = false;
      msg   =  msg + "\nLast Name is required.";
      }
   if($('#wpuf-part_email').val()==""){
      valid = false;
      msg   =  msg + "\nEmail is required.";
      }
      
  if(valid){
     $('#form-steps').removeClass('show-details');
     $('#form-steps').removeClass('show-upload');
     $('#form-steps').addClass('show-part');

     $('#details').removeClass('active');
     $('#part').addClass('active');
     $('#upload').removeClass('active');
  }
  else{
     alert(msg);
   setTimeout(function(){ $('#form-steps').addClass('show-details');
     $('#form-steps').removeClass('show-upload');
     $('#form-steps').removeClass('show-part');

     $('#details').addClass('active');
     $('#part').removeClass('active');
     $('#upload').removeClass('active');},300);
    
  }
  
  
});

$('#upload a').click(function() {
   var valid = true;
   var msg   = "";
   var step = 2;
   if($('#part_first_name').val()==""){
     
      valid = false;
      msg = "First Name is required.";
      var step = 1;
      }
      
   if($('#part_family_name').val()==""){
      valid = false;
      var step = 1;
      msg   =  msg + "\nLast Name is required.";
      }
   if($('#wpuf-part_email').val()==""){
      valid = false;
      var step = 1;
      msg   =  msg + "\nEmail is required.";
      }
      
   if($('#post_content').val()==""){
      valid = false;
      msg = msg + "\nDescription is required.";
         }
         
   if(! $('#o1').is(':checked') &&  ! $('#o2').is(':checked') 
   
   && ! $('#o3').is(':checked') && ! $('#o4').is(':checked') 
   && ! $('#o5').is(':checked') && ! $('#o6').is(':checked') 
   && ! $('#o7').is(':checked') && ! $('#o8').is(':checked')
    && ! $('#o9').is(':checked')){
      valid = false;
      msg =  msg + "\nPlease select atleast one part.";
   }
   
   if(valid){
  $('#form-steps').removeClass('show-details');
  $('#form-steps').addClass('show-upload');
  $('#form-steps').removeClass('show-part');

  $('#details').removeClass('active');
  $('#part').removeClass('active');
  $('#upload').addClass('active');
 }
 else{
    alert(msg);
    if (step == 2 ){
 setTimeout(function(){$('#form-steps').removeClass('show-details');
  $('#form-steps').removeClass('show-upload');
  $('#form-steps').addClass('show-part');

  $('#details').removeClass('active');
  $('#part').addClass('active');
  $('#upload').removeClass('active');},300);
}
else{
   setTimeout(function(){ $('#form-steps').addClass('show-details');
     $('#form-steps').removeClass('show-upload');
     $('#form-steps').removeClass('show-part');

     $('#details').addClass('active');
     $('#part').removeClass('active');
     $('#upload').removeClass('active');},300);
}
 }
 
 
 
  
});


/**** Switchable Opacity ****/ 

$('#view_all_trigger a').click(function() {
  $('#show_hide_click ul li').removeClass('active');  
// add the new class to the child elements with the targeted class
  $('#trigger_list').find('.A').removeClass('not-in-focus');
  $('#trigger_list').find('.C').removeClass('not-in-focus');
  $('#trigger_list').find('.Z').removeClass('not-in-focus');

  $('#trigger_list').find('.A').addClass('in-focus');
  $('#trigger_list').find('.C').addClass('in-focus');
  $('#trigger_list').find('.Z').addClass('in-focus');
});

$('#show_hide_click ul li#trigger-A-Body').click(function() {
// add the new class to the child elements with the targeted class

  $('#trigger_list').find('.C').removeClass('in-focus');
  $('#trigger_list').find('.Z').removeClass('in-focus');


  $('#trigger_list').find('.A').addClass('in-focus');
  $('#trigger_list').find('.A .Z').addClass('in-focus');
  $('#trigger_list').find('.A .C').addClass('in-focus');
  // $('#trigger_list').find('.A').removeClass('not-in-focus');
// remove the target class from the child elements that currently have the targeted class
  
});

$('#show_hide_click ul li#trigger-Canopy-Body').click(function() {
// add the new class to the child elements with the targeted class
  $('#trigger_list').find('.A').removeClass('in-focus');
  $('#trigger_list').find('.Z').removeClass('in-focus');


  $('#trigger_list').find('.C').addClass('in-focus');
  $('#trigger_list').find('.C .Z').addClass('in-focus');
  $('#trigger_list').find('.C .A').addClass('in-focus');
});

$('#show_hide_click ul li#trigger-Z-Body').click(function() {
// add the new class to the child elements with the targeted class
  $('#trigger_list').find('.C').removeClass('in-focus');
  $('#trigger_list').find('.A').removeClass('in-focus');


  $('#trigger_list').find('.Z').addClass('in-focus');
  $('#trigger_list').find('.Z .A').addClass('in-focus');
  $('#trigger_list').find('.Z .C').addClass('in-focus');
});


/**** Fancybox Preferences *****/

$(document).ready(function() {
	  
	  $('.fancybox').fancybox();

	  // $('.fancybox_wide').fancybox({
	  //   width: '840'
	  // });

	});

// http://www.pastie.org/1864757
// http://stackoverflow.com/questions/5886555/check-if-input-empty-on-submit
$("#myregister-form").submit(function(){
        var isFormValid = true;
        $(".required input").each(function(){
            if ($.trim($(this).val()).length == 0){
                $(this).addClass("highlight");
                isFormValid = false;
            } else {
                $(this).removeClass("highlight");
            }
        });
        if(!isFormValid) {
          alert("Please fill in all the required fields (indicated by *)");
        }
        return isFormValid;
    });

  

      
      $('#byo_step-2').click(function(){
        
               });
               
      $('#byo_step-3').click(function(){
         
               });
	// $(document).ready(function() {
	  
	//   $('.fancybox').fancybox({
	//     padding: 0,
	//     width: '640',
	//     // height: '400',
	//     'type'        : 'iframe',
	//     scrolling: 'no'
	//   });

	//   $('.fancybox_wide').fancybox({
	//     width: '840'
	//   });

	// });

/***** Site Loading Overylay *****/

	// HIDE Loader after set time
	// (function(){
	//   var myDiv = document.getElementById("loader_overlay");

	//   var show = function(){
	//     myDiv.style.display = "block";
	//     setTimeout(hide, 6000);  // 4 = 4000seconds
	//   }

	//   var hide = function(){
	//     myDiv.style.display = "none";
	//   }
	//   show();

	// })();  

   // captcha jquery
   
   $(document).ready(function() {
	  
   	  $("input[name='rs_captcha']").parents('.wpuf-el').hide();
        $("input[name='rs_captcha']").parents('.wpuf-el').addClass('reCaptcha');
   	  

   	});