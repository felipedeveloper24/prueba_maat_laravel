$(document).ready(()=>{

    $("#actualizar").click(function(e){
        const BASE_URL = "http://localhost:8000/api"
        e.preventDefault();
        let inputId = $("#id_actualizar").val();
        let inputName = $("#name_actualizar").val();
        let inputEmail = $("#email_actualizar").val();
        let inputPassword = $("#password_actualizar").val();
        console.log(inputId);
        console.log(inputName)
        console.log(inputEmail)
        console.log(inputPassword)
        if(inputName.length == 0  || inputEmail.length == 0 || inputPassword.length == 0){
            Swal.fire({
                title: 'Error!',
                text: 'Debes rellenar todos los campos',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
           
        }else{

            console.log("Está todo bien")
            
            $.ajax({
                url: `${BASE_URL}/user/update`,
                type: 'POST',
                data: { id:inputId, name: inputName, email:inputEmail, password:inputPassword },
                success: function(response) {
                
                  Swal.fire({
                    title: 'Usuario',
                    text: 'Se ha actualizado correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                  });
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