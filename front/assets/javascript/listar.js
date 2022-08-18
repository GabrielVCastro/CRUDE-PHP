$(document).ready(function () {
    $.get("http://localhost/api/controler/listar.php",
        function (data, status) {
            if (data == 'false') {
                $('#users').DataTable({});

            } else {

                $('#users').DataTable({
                    data: JSON.parse(data),
                    columns: [
                        { data: 'id' },
                        { data: 'nome' },
                        {
                            'render': function (data, type, row) {

                                return '<input id="btnEdit" class="btn btn-warning" type="button" onclick="abrirModalUserEdit(' + row.id + ')" value="Editar" /><input id="btnDelete" class="btn btn-danger ms-3" type="button" onclick="deleteUser(' + row.id + ')" value="Delete" />';

                            }
                        }
                    ],

                });
            }
        });

});


function abrirModalUserEdit(id, nome) {
    $.post("http://localhost/api/controler/buscarUser.php",
        {
            id: id
        },
        function (data, status) {
            data = JSON.parse(data)
            $("#nome").val(data[0].nome)
            $("#userId").val(data[0].id)
            $("#modalEditarUsuario").modal('show')

        });
}

function editarUser() {
    let nome = $("#nome").val(),
        id = $("#userId").val(),
        senha = $("#senha").val();

    $.post("http://localhost/api/controler/editar.php",
        {
            id: id,
            nome: nome,
            senha: senha
        },
        function (data, status) {
            if (data) {
                $("#modalEditarUsuario").modal('hide')
                alert('Editado com successo')
                window.location.href = ''
            } else {
                alert('Algo deu errado')
            }

        });

}


function deleteUser(id) {
    Swal.fire({
        title: 'Deseja Realmente Deletar o Usuário?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, desejo deletar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("http://localhost/api/controler/deletar.php",
            {
                id: id
            },
            function (data, status) {
               
                if (data == 'sucesso'){
                    Swal.fire(
                        'Deletado!',
                        'Usuárioi foi deletado com sucesso.',
                        'success'
                    )
                    setTimeout(() =>{
                        window.location.href = ''
                    },1000)
                } else {
                    alert('Algo deu errado')
                }
            });
         
        }
    })
}




