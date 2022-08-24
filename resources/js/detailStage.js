// On récupère l'élément sur lequel on veut détecter le clic
// On écoute l'événement click, notre callback prend un paramètre que nous avons appelé event ici
// On utilise la fonction preventDefault de notre objet event pour empêcher le comportement par défaut de cet élément lors du clic de la souris

const field = document.getElementById('mon-lien');

field.addEventListener('click', function (event) {
    event.preventDefault();
});
