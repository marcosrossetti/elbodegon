$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');
  //inicializmos la funcion fetchTasks (orden de tareas)
  fetchTasks();
  $('#task-result').hide();


  // search key type event

  $('#call').keypress(function(event){
    var codigo = event.which || event.keyCode;
    if(codigo == '13'){ 
      event.preventDefault()
    }
  });

  $('#search').keyup(function() {
    //Si #search tiene algun valor, se inicializa el ajax, primero inicializando search como una variable let
    if($('#search').val()) {

      let search = $('#search').val();
      //ajax
      $.ajax({
        //definimos el metodo de posteo, la direccion y el dato que vamos a enviar
        url: 'task-search.php',
        data: {search},
        type: 'POST',
        //en caso de ser exitoso, ejecutamos la funcion response
        success: function (response) {
          if(!response.error) {
            //guardamos el string como un objeto con json parse "tasks"
            let tasks = JSON.parse(response);
            let template = '';
            //iteramos "tasks" mostrando solo el campo "name" de la fila encontrada y la dibujamos en un <li>
            tasks.forEach(task => {
              template += `
                     <li><a href="#" class="task-item">${task.name}</a></li>
                    ` 
            });
            //en caso exitoso, mostramos el resultado y mostramos la variable donde se guardo la iteracion de la fila "template"
            $('#task-result').show();
            $('#container').html(template);
          }
        } 
      })
    }
  });

//Add a single Task
  $('#task-form').submit(e => {
    e.preventDefault();
    //creacion de objeto de almacenamiento de los inputs "postData"
    const postData = {
      //guardamos los input dentro de un objeto
      name: $('#name').val(),
      description: $('#description').val(),
      id: $('#taskId').val(),
      cant: $('#cant').val(),
      estado: $('#estado').val(),
      foto: $('#foto').val(),
      id_cat: $('#id_cat').val(),
      devolucion: $('#devolucion').val()
    };
    //validacion ternaria de redireccion segun valor de la variable booleana "edit"
    const url = edit === false ? 'task-add.php' : 'task-edit.php';
    //mostramos por pantalla el objeto y la direccion donde sera enviada para ser procesado
    console.log(postData, url);
    //metodo post por jquery parametros = (direccion url del archivo php, el objeto que guarda los datos a procesar, una funcion de respuesta al
    //procesamiento de dichos datos)
    $.post(url, postData, (response) => {

      console.log(response);
      //limpiamos los input del formulario luego de procesar los datos y devolver una respuesta
      $('#task-form').trigger('reset');
      fetchTasks();
    });
  });





  // Fetching Tasks
  function fetchTasks() {
    //inicializamos el ajax
    $.ajax({
      //definimos una direccion y el tipo de formulario que se va a hacer (GET, toma de datos desde el servidor)
      url: 'tasks-list.php',
      type: 'GET',
      //en caso exitoso, devolvemos la siguiente funcion
      success: function(response) {
        //convertimos el string de php (array comprimidos por metodo json desde el servidor) en un objeto para iterarlo y mostrarlo por pantalla
       console.log(response);

       const tasks = JSON.parse(response);

        let template = '';
        //lo iteramos y dibujamos con un foreach y etiquetas html
        tasks.forEach(task => {
          template += `
                  <tr taskId="${task.id}">
                  <td>${task.id}</td>
                  <td>${task.name}</td>
                  <td>${task.description}</td>
                  <td>${task.cant}</td>
                  <td>${task.estado}</td>
                  <td>${task.foto}</td>
                  <td>${task.devolucion}</td>
                  <td>${task.id_cat}</td>
                  <td>
                    <button class="task-delete btn btn-danger">
                     ELIMINAR
                    </button>
                  </td>
                  <td>
                    <button class="task-item btn btn-warning">
                     EDITAR 
                    </button>
                  </td>
                  </tr>
                `
        });
        //mostramos el dibujo en el id selecionado, asignando la variable a mostrar
        $('#tasks').html(template);
      }
    });
  }




  //escuchamos el evento ".task-item"
  $(document).on('click', '.task-item', (e) => {
  //selecionamos todo lo que contenga la fila de ese boton con parentElement doble para acceder a su <tr>(fila) para obtener su id
    const element = $(this)[0].activeElement.parentElement.parentElement;
    //guardamos el id como una constante que contiene el atributo que contiene la clase que contiene el id de dicha fila
    const id = $(element).attr('taskId');
    //enviamos por metodo post la direccion la variable y ejecutamos la funcion de respuesta por metodo post
    $.post('task-single.php', {id}, (response) => {

      console.log(response);
      
      const task = JSON.parse(response);

      $('#taskId').val(task.id);
      $('#name').val(task.name);
      $('#description').val(task.description);
      
      edit = true;
    });

    e.preventDefault();
  });



  // Delete a Single Task
  // Get a Single Task by Id 
  //escuchamos cuando demos click en cualquier boton "delete" ".task-delete"
  $(document).on('click', '.task-delete', (e) => {

    //se ejecuta la siguiente funcion solo si se confirma el alert
    if(confirm('Are you sure you want to delete it?')) {
//selecionamos todo lo que contenga la fila de ese boton con parentElement doble para acceder a su <tr>(fila) para obtener su id
      const element = $(this)[0].activeElement.parentElement.parentElement;
      //guardamos el id como una constante que contiene el atributo que contiene la clase que contiene el id de dicha fila
      const id = $(element).attr('taskId');
      //ejecutamos la funcion por metodo post para eliminar la fila, damos la direccion, la variable que contiene el identificador (id) y la funcion de respuesta
      $.post('task-delete.php', {id}, (response) => {
        //llamamos a la funcion fetchTasks para reordenar la tabla luego de la eliminacion exitosa
        fetchTasks();
      });
    }
  });
});