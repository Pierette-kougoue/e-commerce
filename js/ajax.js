//getHttpRequest est la fonction qui initialise et retourne objet XMLHttpRequest
var getHttpRequest = function(){
    var httpRequest = false

    if(window.XMLHttpRequest){
        httpRequest = new XMLHttpRequest();
        if(httpRequest.overrideMimeType){
            httpRequest.overrideMimeType(('text/xml'));
        }
    }
    else if(window.ActiveXObject){  
        try{
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e){
            try{
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){}
        }
    }

    if(!httpRequest){
        alert('Abondon : (Impossible de créer une instance XMLHTTP');
        return false;
    }
    return httpRequest
}

var links = document.querySelectorAll('.ajouter')
for(var i=0;i<links.length; i++){
    var link = links[i]
    link.addEventListener('click', function(e){
        e.preventDefault()//On retire le comportement par defaut des lien
        var httprequest = getHttpRequest()//création d'un objet XMLHttpRequest
        httprequest.onreadystatechange = function(){// onreadystatechange est un system d'evenement qui permet de détecté l'evolution de la requete 
          if(httprequest.readyState === 4){//on verify que le readyStade soit a 4 donc que la requete ait fini de charger 
              httprequest.responseText//on recupere la reponse de la requete
              document.querySelector('.count').innerHTML = httprequest.responseText//On affiche la reponse dans la div ayant la classe count
          }
        }
        httprequest.open('GET',this.getAttribute('href'), true )//appel de la page en get et la methode getAttribute retourne l'adresse de la page ainsi que les information entrez dans url
        httprequest.send()//la methode send permet de execute la requete
    })
}