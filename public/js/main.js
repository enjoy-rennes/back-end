 const society = document.getElementById('society');

 if (society) {
     society.addEventListener('click', e => {
        
        if (e.target.className === 'btn btn-danger delete-society'){
          
            if (confirm('Are you sure?')) {
              const id = e.target.getAttribute('data-id'); 
              
              fetch(`/society/delete/${id}`, {
                  method: 'DELETE'}).then( res => window.location.reload());
            }
        }
     });
 }