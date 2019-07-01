$(document).ready(function()
{
		$(".error").hide();
		
	$user=$("[name='email']");
	$pass=$("[name='password']");
	$("#validate").on("click",function(e)
	{
		if($user.val()=='')
		{
			e.preventDefault();
			$("#Uvalid").show();

		}else{
			$('#Uvalid').hide();
		}
		if($pass.val()=='')
		{
			e.preventDefault();
			$("#Pvalid").show();
		}else{
			$("#Pvalid").hide();
		}

	});
});