

$(document).ready(function() {
    $(".eliminar-btn").click(function() {
    
      var fila = $(this).closest("tr");
      var id = fila.find("td:first").text();
      const BASE_URL = "http://localhost:8000/api"

      Swal.fire({
        title: '¿Estás seguro?',
        text: '¡No podrás revertir esto!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, bórralo!',
        cancelButtonText:"Cancelar"
      }).then(async(result)  =>  {
        if (result.isConfirmed) {
            $.ajax({
                url: `${BASE_URL}/user/delete`,
                type:"POST",
                data:{id:id},
                success: function(response){
                    Swal.fire({
                      title:"Eliminado",
                      text:"El usuario ha sido eliminado correctamente",
                      icon:"success",
                      confirmButtonText:"Aceptar"
                  })
                  setTimeout(()=>{
                    window.location.href = "/";
                  },2000)
                   
                },error: function(jqXHR, textStatus, errorThrown){
                   console.log('Error en la solicitud AJAX:');
                   console.log('jqXHR:', jqXHR.responseJSON);
                   console.log('textStatus:', textStatus);
                   console.log('errorThrown:', errorThrown);
                   Swal.fire({
                       title: 'Error!',
                       text: jqXHR.responseJSON,
                       icon: 'error',
                       confirmButtonText: 'OK'
                   })
               }
             })
        }
      });

  
    });
  });