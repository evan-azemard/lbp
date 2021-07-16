let submitButton = document.getElementById("submit");
submitButton.addEventListener("click", () => {
	deleteErrors();
	setInput();
})

function deleteErrors() {
    const errorDivs = document.querySelectorall(".error_ins2");
    const errorLis = document.querySelectorAll(".lierror");
    const errorUls = document.querySelectorAll(".ulerror");
    for (let ulError of errorUls) {
        ulError.remove();
    }
}

function setInput() {
    let errors = [];
    const pseudo = document.getElementById("pseudo").value;
    const tel = document.getElementById("téléphone").value;
    const password = document.getElementById("password").value;
    const email = document.getElementById("email").value;
    const r_password = document.getElementById("confirme_password").value;
    const age = document.getElementById("age").value;
    const prenom = document.getElementById("prenom").value;
    const nom = document.getElementById("nom").value;
    let choix = document.getElementById("choix1").checked
    const choix2 = document.getElementById("choix2").checked
    const adresse = document.getElementById("adresse").value;
    if (choix === true) {
        choix = "vendeur";
    }
    if (choix2 === true) {
        choix = "user";
    }
    $.post("password.php", {
        password: password,
        email: email
    }, function(data) {
        if (pseudo.trim().length > 0 && tel.trim().length > 0 && password.trim().length > 0 && email.trim().length > 0 && r_password.trim().length > 0 && age.trim().length > 0 && prenom.trim().length > 0 && nom.trim().length > 0 && choix.trim().length > 0 && adresse.trim().length > 0) {

            	let mail;
				let preg;
				let hpass;

				let val = data;

				if (val === "preg"){
					preg = false;
				}else {
					preg = true;
				}
				if (val === "mail"){
					mail = false;
				}else {
					mail = true;
				}
				if (val === "pregmail"){
					mail = false;
					preg = false;
				}
				if (mail === true && preg === true){
					hpass = val;
				}


            if (mail === false) {
                errors.push("Rentrer une adresse email valide");
            }
            if (preg === false) {
                errors.push("Il faut au moins: 1 caractère spécial, majuscule, minuscule, nombre.");
            }
            if (pseudo.length > 12) {
                errors.push("Le pseudo est trop long");
            }
            if (pseudo.length < 4) {
                errors.push("Le pseudo est trop court");
            }
            if (nom.length > 15) {
                errors.push("Le nom est trop long");
            }
            if (nom.length < 3) {
                errors.push("Le nom est trop court");
            }
            if (prenom.length > 12) {
                errors.push("Le prénom est trop long");
            }
            if (prenom.length < 3) {
                errors.push("Le prénom est trop court");
            }
            if (password !== r_password) {
                errors.push("Le mot de passe répété n'est pas le même");
            }
            if (password.length < 8) {
                errors.push("Le mot de passe est trop court");
            }
            if (pseudo === password) {
                errors.push("Le pseudo et le mot de passe ne doivent pas être identiques");
            }
            if (age < 18) {
                errors.push("Il faut avoir 18 ans !");
            }
        } else {
            errors.push("Veuillez remplir tout les champs !")
        }
        const errorLis = document.getElementsByClassName("lierror");
        const errorDiv = document.getElementById("error");
        const ul = document.createElement("ul");
        ul.classList.add("ulerror");
        if (errors.length > 0) {
            errorDiv.classList.add("error_ins2");
            errorDiv.appendChild(ul);
            for (let error of errors) {
                const li = document.createElement("li");
                li.classList.add("lierror");
                li.append("•" + error);
                ul.appendChild(li);
            }
        }else if (errors.length < 1){
            $.post("password.php", {
                pseudo: pseudo,
                password: hpass,
                tel: tel,
                email: email,
                age: age,
                prenom: prenom,
                nom: nom,
                adresse: adresse,
                rank: rank
            },function(data) {
                console.log(data)
            });
		}
    });
}
submitButton.addEventListener("click", () => {
	deleteErrors();
	setInput();
})