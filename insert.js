$('#form6').submit(function(){
	return false;
});

$('#insert').click(function(){
	$.post(
		$('#form6').attr('action'),
		$('#form6 : input').serializeArray(),
		function(result){
			$('#result').html(result);
		}
	);
});