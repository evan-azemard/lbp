function panier() {

    let art = document.getElementById("panier_section");
    let div = document.createElement("div");
    let p = document.createElement("p");
    let br = document.createElement("br");
    let but = document.createElement("p");

    let para = "voulez vous vraiment supprimer cette article de votre panier ?";
    let suppr = "Supprimer";
    div.className =  "panier_div";
    p.className =  "panier_p";
    but.className= "button confimr_supp"
    but.append(suppr);
    art.appendChild(div);
    p.append(para)
    div.appendChild(p);
    div.appendChild(br)
    div.appendChild(but);
}

let but = document.querySelectorAll('.button_panier');
but.forEach((el) => el.addEventListener('click', () => panier()))



function confirmer (){
    console.log("l")
}

let confirm = document.querySelectorAll('.confimr_supp');

confirm.forEach((e) => e.addEventListener('click', () => confirmer ()))

/*
const btn = document.querySelector('.button_panier')
btn && btn.addEventListener('click', () => panier())*/
