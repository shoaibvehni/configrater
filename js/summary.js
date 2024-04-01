/*!
// SUMMARY - Contents
// ------------------------------------------------

 1. Global Settings
 2. Set Default Colors
 3. Select Colors
 4. Select Type Base
 5. Select Tytpe Shell
 6. Set Default Selection
 7. Quantity
 
/*!---------- 1. GLOBAL SETTINGS ----------*/ 

//define global variables

var price_1=0, price_2=0, price_3=0, price_4=0, price_5=0, price_6=0;
var code_1 = '00', code_2 = '00', code_3 = '00', code_4 = '00', code_5 = '00', code_6 = '00';
var item_quantity = 1;
var total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);



/*!---------- 2. SET DEFAULT COLORS ----------*/ 

//Shell Color (show on first load)

$('#price1-1').ready(function(){
	price_1 = parseFloat($('#price1-1').data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $('#price1-1').data('code');
	$('#code_3').text('cod. ' + code_3);
});

//Base Color (show on first load)

$('#price2-1').ready(function(){
	price_2 = parseFloat($('#price2-1').data('price'));
	$('#total_2').text(price_2 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5);
	$('#count_tot').text(total_basket);	
	
	code_2 = $('#price2-1').data('code');
	$('#code_2').text('cod. ' +code_2);	
});

/*!---------- 3. SELECT COLORS ----------*/ 

//Shell Colors

$('#price1-1').click(function(){
	price_1 = parseFloat($('#price1-1').data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $('#price1-1').data('code');
	$('#code_3').text('cod. ' + code_3);
});

$('#price1-2').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-3').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-4').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-5').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-6').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-7').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-8').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-9').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-10').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-11').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});
$('#price1-12').click(function(){
	price_1 = parseFloat($(this).data('price'));
	$('#total').text(price_1 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_3 = $(this).data('code');
	$('#code_3').text('cod. ' + code_3);
});

//Base Wood Colors

$('#price2-1').click(function(){
	price_2 = parseFloat($('#price2-1').data('price'));
	$('#total_2').text(price_2 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5);
	$('#count_tot').text(total_basket);	
	
	code_2 = $('#price2-1').data('code');
	$('#code_2').text('cod. ' +code_2);	
});
$('#price2-2').click(function(){
	price_2 = parseFloat($(this).data('price'));
	$('#total_2').text(price_2 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_2 = $(this).data('code');
	$('#code_2').text('cod. ' + code_2);	
});
$('#price2-3').click(function(){
	price_2 = parseFloat($(this).data('price'));
	$('#total_2').text(price_2 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_2 = $(this).data('code');
	$('#code_2').text('cod. ' + code_2);	
});
$('#price2-4').click(function(){
	price_2 = parseFloat($(this).data('price'));
	$('#total_2').text(price_2 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_2 = $(this).data('code');
	$('#code_2').text('cod. ' + code_2);	
});

//Base Wire Colors

$('#price4-1').click(function(){
	price_5 = parseFloat($(this).data('price'));
	$('#total_4').text(price_5 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_5 = $(this).data('code');
	$('#code_5').text('cod. ' +code_5);	
});
$('#price4-2').click(function(){
	price_5 = parseFloat($(this).data('price'));
	$('#total_4').text(price_5 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_5 = $(this).data('code');
	$('#code_5').text('cod. ' + code_5);	
});
	
//Cover Colors

$('#price3-1').click(function(){
	price_3 = parseFloat($('#price3-1').data('price'));
	$('#total_3').text(price_3 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_4 = $('#price3-1').data('code');
	$('#code_4').text('cod. ' + code_4);	
});
$('#price3-2').click(function(){
	price_3 = parseFloat($(this).data('price'));
	$('#total_3').text(price_3 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_4 = $(this).data('code');
	$('#code_4').text('cod. ' + code_4);	
});
$('#price3-3').click(function(){
	price_3 = parseFloat($(this).data('price'));
	$('#total_3').text(price_3 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_4 = $(this).data('code');
	$('#code_4').text('cod. ' + code_4);	
});
$('#price3-4').click(function(){
	price_3 = parseFloat($(this).data('price'));
	$('#total_3').text(price_3 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_4 = $(this).data('code');
	$('#code_4').text('cod. ' + code_4);	
});
$('#price3-5').click(function(){
	price_3 = parseFloat($(this).data('price'));
	$('#total_3').text(price_3 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_4 = $(this).data('code');
	$('#code_4').text('cod. ' + code_4);	
});	

/*!---------- 4. SELECT TYPE BASE ----------*/ 

//Select Base Wire	

$("#price0-2").click(function(){
    var $this = $(this);
    if($this.data('clicked', true)) {
		price_4 = parseFloat($(this).data('price'));
		$('#total_1').text(price_4 + ' $');
		total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
		$('#count_tot').text(total_basket);	
		
		$("#color-wood").hide();
		$(".summary-wood").hide();
		$("#color-wire").show();
		$(".summary-wire").show();
	
		code_1 = $(this).data('code');
		$('#code_1').text('cod. ' + code_1);
		
		//if wire is active color default wire color
		
		price_5 = parseFloat($(this).data('price'));
		$('#total_4').text(price_5 + ' $');
		total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
		$('#count_tot').text(total_basket);	
		 
		code_5 = $('#price4-1').data('code');
		$('#code_5').text('cod. ' +code_5);	
		}
	});
	
//Select Base Wood	

$('#price0-1').click(function(){
	price_4 = parseFloat($('#price0-1').data('price'));
	$('#total_1').text(price_4 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	$("#color-wood").show();
	$(".summary-wood").show();
	$("#color-wire").hide();
	$(".summary-wire").hide();
	
	code_1 = $('#price0-1').data('code');
	$('#code_1').text('cod. ' + code_1);	
});

/*!---------- 5. SELECT TYPE SHELL ----------*/ 

//Select Shell Pillow

$('#price5-2').click(function(){
	$(this).data('clicked', true);
	//type shell pillow
	price_6 = parseFloat($('#price5-2').data('price'));
	$('#total_5').text(price_6 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);
	
	$("#pillow").show();
	$("#pillow-side").show();
	$("#pillow-back").show();
	
	$("#color-pillow").show();
	$(".summary-pillow").show();
	
	code_6= $('#price5-2').data('code');
	$('#code_6').text('cod. ' + code_6);
	
	//if pillow is active show default pillow color
	
	price_3 = parseFloat($('#price3-1').data('price'));
	$('#total_3').text(price_3 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	code_4 = $('#price3-1').data('code');
	$('#code_4').text('cod. ' + code_4);	
});

//Select Shell Plastic

	$('#price5-1').click(function(){
	price_6 = parseFloat($('#price5-1').data('price'));
	$('#total_5').text(price_6 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);
	
	$("#pillow").hide();
	$("#pillow-side").hide();
	$("#pillow-back").hide();
	
	$("#color-pillow").hide();
	$(".summary-pillow").hide();
	
	code_6= $('#price5-1').data('code');
	$('#code_6').text('cod. ' + code_6);
});

/*!---------- 6. SET DEFAULT SELECTION ----------*/ 

//Shell plastic (show on first load)

$('#price5-1').ready(function(){
	price_6 = parseFloat($('#price5-1').data('price'));
	$('#total_5').text(price_6 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);

	$("#pillow").hide();
	$("#pillow-side").hide();
	$("#pillow-back").hide();
	
	$("#color-pillow").hide();
	$(".summary-pillow").hide();
	
	code_6= $('#price5-1').data('code');
	$('#code_6').text('cod. ' + code_6);
});

//Base Wood (show on first load)

$('#price0-1').ready(function(){
	
	price_4 = parseFloat($('#price0-1').data('price'));
	$('#total_1').text(price_4 + ' $');
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
	
	$("#color-wood").show();
	$(".summary-wood").show();
	$("#color-wire").hide();
	$(".summary-wire").hide();
	
	code_1 = $('#price0-1').data('code');
	$('#code_1').text('cod. ' + code_1);
});

/*!---------- 7. QUANTITY ----------*/ 

//add to box button

$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
	
//set quantity 

$('#num_item_basket').click(function(){
	item_quantity = document.getElementById('quantity').value;
	total_basket = item_quantity*(price_1 + price_2 + price_3 + price_4 + price_5 + price_6);
	$('#count_tot').text(total_basket);	
});