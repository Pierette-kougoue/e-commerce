let modal = null
const openModal = function(e){//fontion d'ouverture de la boite modal
    e.preventDefault() //bloque le comportement par defaut d'un element ici il sagit d'un lien
    const target = document.querySelector(e.target.getAttribute('href'))//getAttribute me renvoye le contenu de l'attribut href qui ici est id de la boite modale
    //et grace a la methode querySelector on recupère l'element la boite modale grace a sont id recupère precedament
    target.style.display=null //on ajoute un display a null a la boite modal
    target.removeAttribute('aria-hidden')//on retire attribut aria-hidden pour rendre la boite modal visible
    target.setAttribute('aria-modal', 'true') //on modifi l'attribut aria-modal a true
    modal = target
    modal.querySelector('.btn-close').addEventListener('click',closeModal)//On ajoute sur l'element ayant la classe btn-close un evement qui execute la fontion closeModal 
    modal.querySelector('.stop').addEventListener('click',stopPropagation)//On ajoute sur l'element ayant la classe btn-close un evement qui execute la fontion stopPropagation
}

const closeModal = function(e){//la fontion de fermture de la boite modal
    if(modal === null) return
    e.preventDefault()
    modal.style.display = 'none'
    modal.setAttribute('aria-hidden', 'true')
    modal.removeAttribute('aria-modal')
    modal.querySelector('.btn-close').removeEventListener('click',closeModal)
    modal.querySelector('.stop').removeEventListener('click',stopPropagation)
    modal = null
}

const stopPropagation = function(e){//la fontion pour blocke la fermeture de la boite modal
    e.stopPropagation();
}
document.querySelectorAll('.js-modal').forEach(a=>{//pour chaque element ayant la classe js-modal ajoute un evenement qui exectute le fontion openModal
    a.addEventListener('click',openModal)
})
window.addEventListener('keydown',function(e){//Ajout d'un evenement sur une touche du clavier
    if(e.key === "Escape" || e.key === "Esc"){//la methode key permet de lire une touche du clavier
        closeModal(e)
    }
})