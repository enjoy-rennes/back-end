//DELETE HELP---------------------------------------------------------------------------------------------------------------------------------->

const help = document.getElementById('help');

if (help) {
    help.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-help'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/help/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}



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

//DELETE ADDRESS---------------------------------------------------------------------------------------------------------------------------------->

 const address = document.getElementById('address');

 if (address) {
     address.addEventListener('click', e => {
        
        if (e.target.className === 'btn fa fa-trash delete-address'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/address/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }



//DELETE REQUIERMENT--------------------------------------------------------------------------------------------------------------------------------------------->

const requirement = document.getElementById('requirement');

if (requirement) {
    requirement.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-requirement'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/requirement/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}




//DELETE CATEGORY---------------------------------------------------------------------------------------------------------------------------------->

const category = document.getElementById('category');

if (category) {
    category.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-category'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/category/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}


