//agregar herramientas

console.log("Jquery is Working");
$(document).on('click','#buttonModal',function (){

    $(document).on('click','#submit',function (){
        const url = "modules/administrarMod.php";
        
        // console.log(foto);

        const postData = {
            producto : $("#producto").val(),
            cantidad : $("#cantidad").val()
            

        };

        console.log(postData);

        
        if(postData.producto != '' && postData.cantidad != ''){
            $.post(url, postData, (response) => {
                const rta = JSON.parse(response);
                console.log(rta);
                if(rta == 1){
                    window.location = "administrar.php";
                }            
            });
        }
    });

}); 

//editar herramienta
$(document).on('click','#editar',function (){
    let id = $(this).data('id');
        console.log(id);

        const postData = {
                        id : id
                     };
                     const url = "modules/editarMod.php";

                        console.log(postData);
                $.post(url, postData, (response) => {
                        const rta = JSON.parse(response);

        let template = `
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarModalLabel">Editar Herramienta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editarModal">
                            <img class="card-img-top img-auto item-image" src= "${rta.img}">
                            <label for="nombreProducto" class="form-label">Nuevo Nombre:</label>
                            <input type="text" class="form-control mb-3" id="nuevoNombreProducto" value="${rta.nombre}" required>
                            <label for="cantidadProducto" class="form-label">Nueva Cantidad:</label>
                            <input type="number" class="form-control mb-3" min="1" id="nuevaCantidad" value="${rta.cantidad}" required>
                            <br>
                            
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" id="submitEditar" class="btn btn-primary">Editar</button>
                        
                    </div>
                            </form>
                        </div>

                        
                </div>
            </div>
        </div>

        `;

        $(template).modal("show");
        console.log(response);

        $(document).on('click','#submitEditar',function (){
            const url = "modules/editarMod2.php";
                        
                        // console.log(foto);

                     const postData = {
                        producto : $("#nuevoNombreProducto").val(),
                        cantidad : $("#nuevaCantidad").val(),
                        id: id
                        

                     };
                     
                         console.log(postData);
                         if(postData.producto && postData.cantidad){
                            // console.log("pim");
                            $.post(url, postData, (response) => {
                        const rta = JSON.parse(response);
                            console.log(rta);
                            if(rta == 1){
                                window.location = "administrar.php";
                            }            
                        console.log(response);
                            });
                         }else{
                            let timerInterval
                            Swal.fire({
                              title: 'Complete todos los datos para seguir!',
                              html: 'Cerrando en.. 2 Segundos',
                              timer: 2000,
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
                                console.log('I was closed by the timer')
                              }
})
                         }
                        
        
                
                     

                       

        });
                                
        });


});

//eliminar herramienta
$(document).on('click','#eliminar',function (){
    let id = $(this).data('id');
        console.log(id);
        const postData = {
                        id : id
                     };
                     const url = "modules/eliminarMod.php";

                        console.log(postData);
                $.post(url, postData, (response) => {
                    const rta = JSON.parse(response);
                    if(rta == 1){
                                window.location = "administrar.php";
                            }   
                    console.log(response);   

                });


    });
