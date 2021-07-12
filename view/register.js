    document.addEventListener('DOMContentLoaded', function(event) {

		document.getElementById("clike").addEventListener("click", () => {


			let input = document.getElementById("register_text");

			input = input.value

			$.post(
                    "register.php",
                    {
                        data: input,
                    });

			$.ajax({
				type: 'POST',
				url: '',
				data: {
					data: input
				}
			})
		})
	})