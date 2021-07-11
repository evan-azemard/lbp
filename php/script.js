$(document).ready( function()
{
	$('#inscription').click( function()
	{
		coco = $('#index_article2');
		form = $('#inscription_form');
		co = $('#index_article1');
		$('#index_article1').css("display","none");
		$('#connexion_form').css("display","none");

		if(form.css("display")== 'none')
		{
			form.css("display","flex");
			coco.css("display","flex");
		}
		else
		{
			form.css("display","none");
			coco.css("display","none");
		}
	});

	$('#connexion').click( function()
	{
		co = $('#index_article1');
		$('#index_article2').css("display","none");
		form = $('#connexion_form');
		$('#inscription_form').css("display","none");
		if(form.css("display") == 'none')
		{
			form.css("display","flex");
			co.css("display","flex");
		}
		else
		{
			form.css("display","none");
			co.css("display","none");
		}
	});

	$("#inscription-submit").click(function(e)
	{
		e.preventDefault();

		email = $('#email').val();
		password = $('#password').val();
		passwordV = $('#passwordV').val();

		length = /.{8,30}/;
		symbol = /\W/;
		letter = /\w/;
		digit = /\d/;

		if(length.exec(password) == null || symbol.exec(password) == null ||
			letter.exec(password) == null || digit.exec(password)  == null)
		{
			$("#passwordError").css("display","block");
			return false;
		}
		else
		{
			$("#passwordError").css("display","none");
		}

		if(password != passwordV)
		{
			$('#passwordVError').css("display","block");
			return false;
		}

		$.post(
			"inscription.php",
			{
				nom: $("#nom").val(),
				prenom: $('#prenom').val(),
				email: $('#email').val(),
				password: $('#password').val()
			},
			function(data)
			{
				if(data == "success")
				{
					$("#inscription_form").css("display", "none");
					$("#connexion_form").css("display", "flex");
				}
				else if(data == "err")
				{
					$("main").prepend($("<p></p>").text("Les serveurs ne répondent pas."));
				}
				else if(data == "errMail")
				{
					$("main").prepend($("<p></p>").text("Le mail est déja pris."));
				}
			},
			'text'
		);
	});

	$("#connexion-submit").click(function(e)
	{
		e.preventDefault();

		$.post(
			"connexion.php",
			{
				email: $('#email-co').val(),
				password: $('#password-co').val()
			},
			function(data){
				$("#connexion_form").css("display", "none");
				$("#index_article2").css("display", "none");
				$("header").prepend($('<p></p>').text("Bonjour "+data["nom"]));
			},
			"json"
		);

	});
})
