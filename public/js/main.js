//DELETE SOCIETY---------------------------------------------------------------------------------------------------------------------------------->

const society = document.getElementById('society');

 if (society) {
     society.addEventListener('click', e => {
        
        if (e.target.className === 'btn fa fa-trash delete-society'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/society/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }

//DELETE ADRESS---------------------------------------------------------------------------------------------------------------------------------->

 const adress = document.getElementById('adress');

 if (adress) {
     adress.addEventListener('click', e => {
        
        if (e.target.className === 'btn fa fa-trash delete-adress'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/adress/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }



//--------------------------------------------------------------------------------------------------------------------------------------------->

const requierement = document.getElementById('requierement');

if (requierement) {
    requierement.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-requierement'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/requierement/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}

