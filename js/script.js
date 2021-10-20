var cathegorie = document.querySelector('.topbar-second .cathgorie')
var cath_select = document.querySelector('.topbar .dynamic-nav2')
cathegorie.addEventListener('mouseover', function(e){
    cath_select.style = 'display: flex'
})
document.querySelector('body').addEventListener('click',function(e){
    cath_select.style = 'display: none'
    document.querySelector('.success').style = 'display: none;'
    document.querySelector('.alert').style = 'display: none;'
})


function confirm_delete(){
	return confirm('Voulez-vous vraiment supprimer cet annonce ?');
}
function confirm_deconnexion(){
	return confirm('Voulez-vous vraiment vous deconnecté');
}


form = document.querySelector('.form')

form.addEventListener('submit', function(e){
    input = document.querySelectorAll('.form div input');
    error = document.querySelectorAll('.error')
    for(i = 0;i<input.length;i++){
        if(input[i].value.trim()==""){
            error[i].style = 'display: block';
            input[i].style = 'border: 2px solid #fd01019c';
            e.preventDefault()
        }
    }
    if(input[0].value.length < 4){
        error[0].style = 'display: block';
        input[0].style = 'border: 2px solid #fd01019c';
        e.preventDefault()
    }else{
        error[0].style = 'display: none';
        input[0].style = 'border: none';
    }
    if(input[2].value.length < 10){
        error[2].style = 'display: block';
        input[2].style = 'border: 2px solid #fd01019c';
        e.preventDefault()
    }else{
        error[2].style = 'display: none';
        input[2].style = 'border: none';
    }
    pwd = /^['a-zA-Z0-9-\s']+$/
    if(pwd.test(input[3].value) == false || input[3].value.length < 6){
        error[3].style = 'display: block';
        input[3].style = 'border: 2px solid #fd01019c';
        e.preventDefault()
    }else{
        error[3].style = 'display: none';
        input[3].style = 'border: none';
    }

})
