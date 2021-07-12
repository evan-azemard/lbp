let button = document.getElementById("clike");
let input = document.getElementById("register_text");
input = input.value;

function deco ()
{
	if (button.style.backgroundColor !== "green"){

		button.style.backgroundColor = "green";
	}else {
		button.style.backgroundColor = "orange";
	}
}

function setInput ()
{
	let input = document.getElementById("register_text");
	input = input.value;

	$.post(
		"test.php",
		{
			data: input
		},
		function(data, status)
		{
			// Traitement des données reçues (data)
			alert("Data: " + data + "\nStatus: " + status);
		});

	/*$.ajax({
		type: 'POST',
		url: 'test.php',
		data: {
			data: input
		}
	})*/
}


button.addEventListener("click", () => {

	setInput();
	deco();

})




/*
    document.addEventListener('DOMContentLoaded', function(event) {
*/
/*$.ajax({
    type: 'POST',
    url: 'test.php',
    data: {
        data: input
    }
})*/