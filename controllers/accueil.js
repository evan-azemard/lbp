/*
a = "t";

let valider = document.querySelector('.jsaccueil');

valider.addEventListener("click", () => {

    let email = document.querySelector('.jsemail').value;
    let id = document.querySelector('.jsid').value;
    let message = document.querySelector('.jsmessage').value;



    var cont = {
        id : id,
        mp : message,
        email : email
    }

    var tojson = JSON.stringify(cont);

    localStorage.setItem("ex",tojson);

    $.post(
		"accueil.php",
		{
            email: email ,
            id: id,
            mp: message,
		});

  $.ajax({
        type: "GET", url: "data.json", dataType: "text",
        success: function (data) {
            res = JSON.parse(JSON.stringify(data))
            res = JSON.parse(data)


            const result = res.filter(item => item.nom.toLocaleLowerCase().includes(val.toLocaleLowerCase()));

            console.log(res)
            console.log(result)

        }
})
*/
