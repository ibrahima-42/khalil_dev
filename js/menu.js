let drop =document.querySelector('.drop');
let sous =document.querySelector('.sous-menu');

sous.style.display='none';

drop.addEventListener('mouseover', function(){
    sous.style.display='block';
})

drop.addEventListener('mouseout', function(){
    sous.style.display='block';
})
