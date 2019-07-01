
	function validateForm(form) {
		e=$("#"+form);


		// Initializing Variables With Form Element Values
		var nameReg = /^[A-Za-z]+$/;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		// Validating Name Field.
		valid=true;
		if($('#fname').val().length == 0) {
		valid=false;
			$('#p1').text("* Please enter First Name");// This Segment Displays The Validation Rule For Name
		}
		else{
			$('#p1').hide();
		}

		// Validating Email Field.
		if(!$('#email').val().match(emailReg) || $('#email').val().length == 0) {
		valid=false;
			$('#p2').text("* Please enter valid Email"); // This Segment Displays The Validation Rule For Email
		}
		else{
			$('#p2').hide();
		}
		if ($('#psw').val().length <7 ) {
			valid=false;
			$('#p3').text("* length should be more than 7 character"); // This Segment Displays The Validation Rule For Email
		}
		else{
			$('#p3').hide();
		}

		if ($('#psw').val() != $('#cpsw').val()) {
			valid=false;
			$('#p4').text("* Password doesn\'t match"); // This Segment Displays The Validation Rule For Email
		}
		else{
			$('#p4').hide();
		}

		if(!$('#c2').prop('checked'))
		{
			valid=false;
			$('#p5').text("* Please Agree to terms and conditions");
		}else{
			$('#p5').hide();
		}
		if(valid)
		e.submit();
	}
