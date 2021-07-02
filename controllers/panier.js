/*function panier() {

    let article = document.getElementById("panier_section");
    let container = document.createElement("div");
    let form = document.createElement("form");
    let paragraphe = document.createElement("p");
    let br = document.createElement("br");
    let inputid = document.getElementsByClassName('idproduitpanier');*/


/*
    let form = document.getElementById("formpanier");
*/
/*    let submit = document.createElement('input');

    form.method = "post";

    let text = "voulez vous vraiment supprimer cette article de votre panier ?";
    submit.type = "submit";
    submit.value = "Confirmer";
    submit.name = "Confirmer";
    submit.className = "button_panier3";
    container.className = "panier_div";
    paragraphe.className = "panier_p";

    article.appendChild(container);
    paragraphe.append(text);
    container.appendChild(paragraphe);
    container.appendChild(br);
    container.appendChild(form);
    form.appendChild(submit);
    form.appendChild(inputid);*/

/*
    container.appendChild(form);
*/
/*
    form.appendChild(submit);
*/

/*
    but = document.querySelectorAll('.button_panier');
*/
/*
    but.forEach(
  (el) => {
    but.addEventListener('click', () => {
      but.length > 1 && but.shift() // <- on retire le premier element s<il y en a plus que 1
        but.remove()

    })
  }
)*/

/*
}*/

/*let but = document.querySelectorAll('.button_panier');
but.forEach((e) => e.addEventListener('click', () => panier()))*/








/*
const btn = document.querySelector('.button_panier')
btn && btn.addEventListener('click', () => panier())*/

function panier() {
    let article = document.getElementById("panier_section");
    let container = document.createElement("div");
    let paragraphe = document.createElement("p");
    let br = document.createElement("br");

    let form = document.getElementById("formpanier");
    let submit = document.createElement('input');

    form.method = "post";

    let text = "voulez vous vraiment supprimer cette article de votre panier ?";
    submit.type = "submit";
    submit.value = "Confirmer";
    submit.name = "Supprimer";
    submit.className = "button_panier3";
    container.className =  "panier_div";
    paragraphe.className =  "panier_p";

    article.appendChild(container);
    paragraphe.append(text);
    container.appendChild(paragraphe);
    container.appendChild(br);
    container.appendChild(form);
    form.appendChild(submit);

    let but = document.querySelector('.button_panier');

        but.remove()

/*    if (but[1]){
        but[1].remove()
    }*/

}


let but = document.querySelectorAll('.button_panier');
but.forEach((e) => e.addEventListener('click', () => panier()))


