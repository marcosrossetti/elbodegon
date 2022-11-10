$(document).on('click','#examinar',function (){
    let id = $(this).data('id');
    console.log(id);

        const url = "modules/prestamoEX.php";

    const postData = {
        id : id
    };

    $.ajax({
         type: "POST",
         url: "modules/prestamoEX.php",
         data: {id:id},
         success: function(response) { 
        console.log(response);
        const rta = JSON.parse(response);

        
        let template = '';

              
               $.each(rta, function(i, item){
          // console.log(rta[i].nombreH); 
          const n = [ rta[i].nombreH ];
          const im = [ rta[i].url_img ];
          const c = [ rta[i].cantidad ];
          console.log(n);
          console.log(im);
          console.log(c);   

          template += `
                  <div class="col">
                            <div class="card">
                              <img src="${im}" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">${n}</h5>
                                <p class="card-text">${c}</p>
                              </div>
                            </div>
                          </div>
                `
              }); 

          $("#modalExaminar").modal("show"); 
          $("#divInfo").html(template);

        }});    
  }); 


$(document).on('click','#entrego',function (){
    let id = $(this).data('id');
    console.log(id);
    const url = "modules/prestamoEN.php";
    const postData = {
        id : id
    };

    $.ajax({
         type: "POST",
         url: "modules/prestamosEN.php",
         data: {id:id},
         success: function(response) { 
            console.log(response);
            const rta = JSON.parse(response);
            if(rta == 1){
                window.location = "prestamos.php";
            }
        }});    
  });

