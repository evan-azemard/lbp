function panier() {

    let article = document.getElementById("panier_section");
    let container = document.createElement("div");
    let paragraphe = document.createElement("p");
    let br = document.createElement("br");

    let form = document.getElementById("formpanier");
    let submit = document.createElement('input');
    let butt = document.getElementsByClassName('button_panier');
    form.method = "post";
    butt.className = "invisible";

    let text = "voulez vous vraiment supprimer cette article de votre panier ?";
    submit.type = "submit";
    submit.value = "Confirmer et supprimer ? ";
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

    let but = document.querySelectorAll('.button_panier');
    form.appendChild(but)

}

let but = document.querySelectorAll('.button_panier');
but.forEach((el) => el.addEventListener('click', () => panier(but)))





/*
const btn = document.querySelector('.button_panier')
btn && btn.addEventListener('click', () => panier())*/
