//DELETE SOCIETY---------------------------------------------------------------------------------------------------------------------------------->

const society = document.getElementById('society');

 if (society) {
     society.addEventListener('click', e => {
        
        if (e.target.className === 'btn fa fas fa-trash delete-society'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/society/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }

 //DELETE ADDRESS--------------------------------------------------------------------------------------------------------------------------------->

const address = document.getElementById('address');

if (address) {
    address.addEventListener('click', e => {
       
       if (e.target.className === 'fa fa-trash delete-address'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/address/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}

//DELETE RECEIPT---------------------------------------------------------------------------------------------------------------------------------->

const receipt = document.getElementById('receipt');

 if (receipt) {
     receipt.addEventListener('click', e => {
        
        if (e.target.className === 'btn fa fa-trash delete-receipt'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/receipt/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }