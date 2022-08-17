$(document).ready( function () {
    $.get("http://localhost/api/controler/listar.php",
    function(data, status){
        if(data == 'false'){
            $('#users').DataTable({});
            
        }else{
            
            console.log(JSON.parse(data))
            $('#users').DataTable( {
                data: JSON.parse(data),
                columns: [
                    { data: 'id' },
                    { data: 'nome' },
                    {"defaultContent": "<a href='/front/editar.html?edit="+JSON.stringify(data.id)+"' class='btn btn-warning'><i class='fa-solid fa-user-pen'></i></a><a href='' class='btn btn-danger ms-3'><i class='fa-solid fa-trash-can'></i></a>"}  
                ],
             
              
            });
        }
    });
 
} );

