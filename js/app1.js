//editar ofertas

console.log("Jquery is Working");
$(document).on('click','#buttonModal',function (){
                     

                     
                     
                     


                        
                    $(document).on('click','#submit',function (){
                        const url = "modules/administrarMod.php";
                        
                        // console.log(foto);

                     const postData = {
                        imagen : $("#imagen").val(),
                        producto : $("#producto").val(),
                        cantidad : $("#cantidad").val()
                        

                     };

                        console.log(postData);

                        
        
                $.post(url, postData, (response) => {
                        // const alumno = JSON.parse(response);
                        console.log(response);
                        

                    
        });
                    });
                    	
                    
                    


		}); 
