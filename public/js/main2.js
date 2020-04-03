//DELETE PLACE---------------------------------------------------------------------------------------------------------------------------------->

const place = document.getElementById('place');

if (place) {
    place.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-place'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/place/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}


//DELETE GOOD PLAN---------------------------------------------------------------------------------------------------------------------------------->

const good_plan = document.getElementById('good_plan');

if (good_plan) {
    good_plan.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-good_plan'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/good_plan/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}




//DELETE CARD---------------------------------------------------------------------------------------------------------------------------------->

const card = document.getElementById('card');

 if (card) {
     card.addEventListener('click', e => {
        
        if (e.target.className === 'btn fa fa-trash delete-card'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/card/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }




 
//DELETE USER---------------------------------------------------------------------------------------------------------------------------------->

const user = document.getElementById('user');

if (user) {
    user.addEventListener('click', e => {
       
       if (e.target.className === 'btn fa fa-trash delete-user'){
         
           if (confirm('Are you sure?')) {
             const id = e.target.getAttribute('data-id'); 
             
             fetch(`/user/delete/${id}`, {
                 method: 'DELETE'}).then( res => window.location.reload());
           }
       }
    });
}

