let typeElement = document.querySelector('#type');
let typeHelp = document.querySelector('#typeHelp');



// liste des regex
const regexCategory = /^[A-Za-zÀ-ÿ-]+$/;


// constante pour la catégorie 
const checkCategory = () => {
    typeElement.classList.remove('border-danger', 'border-success', 'border-3')
    // permet de remove les class ajouté à bootstrap au moment de l'input 
    typeHelp.classList.add('d-none');
    // ajout de la classe d-none pour enlevé le message 

    if (typeElement.value== '') {
        return
    }
// permet de réinitialisé le champ si il est vide, return sert à stoppé la boucle si rien n'est écrit

    // refait une nouvelle instance à chaque input (évite le true/false/true/false ...)
    let isValid = regexCategory.test(typeElement.value)

    if (isValid == false) {
        typeElement.classList.add('border-danger', 'border-3')
        typeHelp.classList.remove('d-none');
    } else {
        typeElement.classList.add('border-success', 'border-3')
        typeHelp.classList.add('d-none');
    }
}


// écouteur d'évènements à l'appui de la touche du clavier
typeElement.addEventListener('keyup', checkCategory);