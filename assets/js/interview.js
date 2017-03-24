$(document).ready(function(){
	function check_resign(){
		if($('#resign').is(":checked")){
			$('.pengganti').removeClass('hide');
		}else{
			$('.pengganti').addClass('hide');
		}			
	}
	check_resign();
	$('#resign').change(function(){
		check_resign();
	});

	function check_called(){
		if($('#called').is(":checked")){
			$('.box-minute').removeClass('hide');
		}else{
			$('.box-minute').addClass('hide');
		}			
	}
	check_called();
	$('#called').change(function(){
		check_called();
	});

	function check_minute(){
		if($('#minute').val()=='1'){
			$('.box-know').removeClass('hide');
		}else{
			$('.box-know').addClass('hide');
		}			
	}
	check_minute();
	$('#minute').change(function(){
		check_minute();
	});

	function check_know(){
		if($('#know').val()=='1'){
			$('.box-unknow').addClass('hide');
			$('.box-register').removeClass('hide');
			$('.box-invite').addClass('hide');
		}else if($('#know').val()=='2'){
			$('.box-unknow').removeClass('hide');
			$('.box-register').addClass('hide');
			$('.box-invite').removeClass('hide');
		}else{
			$('.box-unknow').addClass('hide');
			$('.box-register').addClass('hide');
			$('.box-invite').addClass('hide');
		}			
	}
	check_know();
	$('#know').change(function(){
		check_know();
	});

	function check_register(){
		if($('#register').val()=='1'){
			$('.box-closing').removeClass('hide');
			$('.box-invite').addClass('hide');
		}else if($('#register').val()=='2'){
			$('.box-closing').addClass('hide');
			$('.box-invite').removeClass('hide');
		}else{
			$('.box-closing').addClass('hide');
			$('.box-invite').addClass('hide');
		}			
	}
	check_register();
	$('#register').change(function(){
		check_register();
	});

	function check_invite(){
		if($('#invite').val()=='1'){
			$('.box-email').removeClass('hide');
			$('.box-not-interest').addClass('hide');
			$('.box-partner').removeClass('hide');
		}else if($('#invite').val()=='2'){
			$('.box-email').addClass('hide');
			$('.box-not-interest').removeClass('hide');
			$('.box-partner').addClass('hide');
		}else{
			$('.box-email').addClass('hide');
			$('.box-not-interest').addClass('hide');
			$('.box-partner').addClass('hide');
		}			
	}
	check_invite();
	$('#invite').change(function(){
		check_invite();
	});

	// function check_minute(){
	// 	var radio = $('input[type=radio][name=minute]:checked').val();
	// 	if(radio==1){
	// 		$('.box-smoker').removeClass('hide');
	// 		$('.box-minute-tidak').addClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-smoker').addClass('hide');
	// 		$('.box-minute-tidak').removeClass('hide');
	// 	}			
	// }
	// check_minute();
	// $('input[type=radio][name=minute]').change(function(){
	// 	check_minute();
	// });

	// function check_smoker(){
	// 	var radio = $('input[type=radio][name=smoker]:checked').val();
	// 	if(radio==1){
	// 		$('.box-callagain').removeClass('hide');
	// 		$('.box-smoker-tidak').addClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-callagain').addClass('hide');
	// 		$('.box-smoker-tidak').removeClass('hide');
	// 	}			
	// }
	// check_smoker();
	// $('input[type=radio][name=smoker]').change(function(){
	// 	check_smoker();
	// });

	// function check_callagain(){
	// 	var radio = $('input[type=radio][name=callagain]:checked').val();
	// 	if(radio==1){
	// 		$('.box-verification').removeClass('hide');
	// 		$('.box-tanya-jawab-1').removeClass('hide');
	// 		$('.box-callagain-tidak').addClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-verification').addClass('hide');
	// 		$('.box-tanya-jawab-1').addClass('hide');
	// 		$('.box-callagain-tidak').removeClass('hide');
	// 	}			
	// }
	// check_callagain();
	// $('input[type=radio][name=callagain]').change(function(){
	// 	check_callagain();
	// });

	// function check_plagiat(){
	// 	var radio = $('input[type=radio][name=plagiat]:checked').val();
	// 	if(radio==1){
	// 		$('.box-plagiat-ya').removeClass('hide');
	// 		$('.box-plagiat-tidak').addClass('hide');
	// 		$('.box-tanya-jawab-2').removeClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-plagiat-ya').addClass('hide');
	// 		$('.box-plagiat-tidak').removeClass('hide');
	// 		$('.box-tanya-jawab-2').addClass('hide');
	// 	}			
	// }
	// check_plagiat();
	// $('input[type=radio][name=plagiat]').change(function(){
	// 	check_plagiat();
	// });

	// function check_signature(){
	// 	var radio = $('input[type=radio][name=signature]:checked').val();
	// 	if(radio==1){
	// 		$('.box-signature-ya').removeClass('hide');
	// 		$('.box-signature-tidak').addClass('hide');
	// 		$('.box-tanya-jawab-3').removeClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-signature-ya').addClass('hide');
	// 		$('.box-signature-tidak').removeClass('hide');
	// 		$('.box-tanya-jawab-3').addClass('hide');
	// 	}			
	// }
	// check_signature();
	// $('input[type=radio][name=signature]').change(function(){
	// 	check_signature();
	// });

	// function check_facetoface(){
	// 	var radio = $('input[type=radio][name=facetoface]:checked').val();
	// 	if(radio==1){
	// 		$('.box-facetoface-ya').removeClass('hide');
	// 		$('.box-facetoface-tidak').addClass('hide');
	// 		$('.box-tanya-jawab-4').removeClass('hide');			
	// 	}else if(radio==2){
	// 		$('.box-facetoface-ya').addClass('hide');
	// 		$('.box-facetoface-tidak').removeClass('hide');
	// 		$('.box-tanya-jawab-4').addClass('hide');
	// 	}			
	// }
	// check_facetoface();
	// $('input[type=radio][name=facetoface]').change(function(){
	// 	check_facetoface();
	// });

	// function check_overseas(){
	// 	var radio = $('input[type=radio][name=overseas]:checked').val();
	// 	if(radio == 1 || radio === undefined){
	// 		$('.box-overseas-ya').addClass('hide');
	// 		$('.box-visa').addClass('hide');
	// 		$('.box-country').addClass('hide');
	// 	}else{
	// 		$('.box-overseas-ya').removeClass('hide');
	// 		$('.box-visa').removeClass('hide');
	// 		$('.box-country').removeClass('hide');
	// 	}			
	// }
	// check_overseas();
	// $('input[type=radio][name=overseas]').change(function(){
	// 	check_overseas();
	// });
	// function check_visa(){
	// 	var radio = $('input[type=radio][name=visa]:checked').val();
	// 	if(radio == 1){
	// 		$('.box-visa-ya').removeClass('hide');
	// 	}else{
	// 		$('.box-visa-ya').addClass('hide');
	// 	}			
	// }
	// check_visa();
	// $('input[type=radio][name=visa]').change(function(){
	// 	check_visa();
	// });

	// function check_grandprize(){
	// 	var radio = $('input[type=radio][name=grandprize]:checked').val();
	// 	if(radio == 1){
	// 		$('.box-grandprize-tidak').addClass('hide');
	// 		$('.box-tanya-jawab-5').removeClass('hide');
	// 	}else if(radio == 2){
	// 		$('.box-grandprize-tidak').removeClass('hide');
	// 		$('.box-tanya-jawab-5').addClass('hide');
	// 	}			
	// }
	// check_grandprize();
	// $('input[type=radio][name=grandprize]').change(function(){
	// 	check_grandprize();
	// });
		
	// function check_passport(){
	// 	var radio = $('input[type=radio][name=passport]:checked').val();
	// 	if(radio==1){
	// 		$('.box-passport-ya').removeClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-passport-ya').addClass('hide');
	// 	}			
	// }
	// check_passport();
	// $('input[type=radio][name=passport]').change(function(){
	// 	check_passport();
	// });
	
	// function check_campaign(){
	// 	var radio = $('input[type=radio][name=campaign]:checked').val();
	// 	if(radio==1){
	// 		$('.box-campaign-ya').removeClass('hide');
	// 	}else if(radio==2){
	// 		$('.box-campaign-ya').addClass('hide');
	// 	}			
	// }
	// check_campaign();
	// $('input[type=radio][name=campaign]').change(function(){
	// 	check_campaign();
	// });

	// function check_city_f2f(){
	// 	var val = $('#city_f2f').val();
	// 	$.ajax({
	// 		url:base_url+'index.php/interview/get_city',
	// 		type:'post',
	// 		data:{id:val},
	// 		success:function(str){
	// 			$('.f2f_detail').html(str);
	// 		}
	// 	});
	// }
	// check_city_f2f();
	// $('#city_f2f').change(function(){
	// 	check_city_f2f();
	// });	
});