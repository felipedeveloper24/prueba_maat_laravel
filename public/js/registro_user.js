
$(document).ready(()=>{

    $("#enviar").click(function(e){
        const BASE_URL = "http://localhost:8000/api"
        e.preventDefault();
        let inputName = $("#name").val();
        let inputEmail = $("#email").val();
        let inputPassword = $("#password").val();
      
        if(inputName.length == 0  || inputEmail.length == 0 || inputPassword.length == 0){
            Swal.fire({
                title: 'Error!',
                text: 'Debes rellenar todos los campos',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
           
        }else{
            $.ajax({
                url: `${BASE_URL}/user/create`,
                type: 'POST',
                data: { name: inputName, email:inputEmail, password:inputPassword },
                success: function(response) {
                
                  Swal.fire({
                    title: 'Formulario enviado',
                    text: 'Se ha registrado correctamente',
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