jQuery( document ).ready(function() {
        
        	
        	

        	//escuchamos el evento ".task-item"
  $(document).on('click', '#submit', (e)=>{
  	const password = $('#form2Example22').val();
    $.post('modules/loginMod.php', {password}, (response) => {

			
      //   	console.log(password);
      // console.log(response);
      let respuesta = JSON.parse(response);
      console.log(respuesta.error);
      console.log(respuesta.nom_ape);



      if(respuesta.error = "error" && respuesta.nom_ape == undefined){
        // Swal.fire({
        //   position: 'top-mid',
        //   icon: 'error',
        //   title: 'Credencial inválida',
        //   showConfirmButton: false,
        //   timer: 1500
        // }).then(function(){
        //                       window.location="login.php";

        //                       });

        $( "#submit" ).effect( "shake" );

      }else{
        let dni = respuesta.dni;
        
                           let timerInterval
                            Swal.fire({
                              title: 'Bienvenido ' + respuesta.nom_ape,
                              html: 'Será redirigido a su interfaz en 3 segundos',
                              timer: 3000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                  b.textContent = Swal.getTimerLeft()
                                }, 100)
                              },
                              willClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer');

                                $.post('user/index.html', {dni}, (response2) => {
                                console.log(response2);
                                
                                window.location.href="user/index.php?user=" + respuesta.nom_ape;

                              });


                              }
                            })

                            
                          
        
      }

      
      


      
    });

    e.preventDefault();
  });
                 

        
});