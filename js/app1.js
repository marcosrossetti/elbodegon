//agregar herramientas

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
                        const rta = JSON.parse(response);
                            console.log(rta);
                            if(rta == 1){
                                window.location = "administrar.php";
                            }            
        });
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
                            <label for="nombreProducto" class="form-label">Nombre Del Producto: ${rta.nombre}</label>
                            <br>
                            <label for="nombreProducto" class="form-label">Nuevo Nombre:</label>
                            <input type="text" class="form-control mb-3" id="nuevoNombreProducto" required>
                            <label for="cantidadProducto" class="form-label">Cantidad disponible: ${rta.cantidad}</label>
                            <br>
                            <label for="cantidadProducto" class="form-label">Nueva Cantidad:</label>
                            <input type="number" class="form-control mb-3" min="1" id="nuevaCantidad" required>
                            <br>
                            <label for="cantidadProducto" class="form-label">Nueva Imagen</label>
                            <input type="text" class="form-control mb-3" min="1" id="nuevaImagen" required>
                            
                            
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
                        imagen : $("#nuevaImagen").val(),
                        id: id
                        

                     };

                        console.log(postData);

                        
        
                $.post(url, postData, (response) => {
                        const rta = JSON.parse(response);
                            console.log(rta);
                            if(rta == 1){
                                window.location = "administrar.php";
                            }            
                        console.log(response);
        });

        });
                                
        });


});
