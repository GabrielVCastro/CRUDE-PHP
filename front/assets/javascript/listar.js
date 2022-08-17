$(document).ready( function () {
    $.get("http://localhost/api/controler/listar.php",
    function(data, status){
        if(data == 'false'){
            $('#users').DataTable({});
            
        }else{
         
            $('#users').DataTable( {
                data: JSON.parse(data),
                columns: [
                    { data: 'id' },
                    { data: 'nome' },
                    { 'render': function (data, type, row) {
                        return '<input id="btnEdit" class="btn btn-warning" type="button" onclick="editarUser(' + row.id + ')" value="Editar" /><input id="btnDelete" class="btn btn-danger ms-3" type="button" onclick="deleteUser(' + row.id + ')" value="Delete" />';
                   
                    }}
                ],
               
               
            });
        }
    });
 
} );

