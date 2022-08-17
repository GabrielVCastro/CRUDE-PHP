function cadastrarUsuario(){
    let usuario = $("#nome").val(),
        senha   = $("#senha").val()
    
    if(!usuario || usuario==''){
        alert('Usuário incorreto')
        return false
    }
    if(!senha || senha==''){
        alert('Senha incorreta')
        return false
    }
    $.post("http://localhost/api/controler/cadastrar.php",
    {
      nome: usuario,
      senha: senha
    },
    function(data, status){
      alert('Usuário cadastrado com sucesso!');
    });
}

