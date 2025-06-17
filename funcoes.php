<?php 

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function form_em_branco() {
    return empty($_POST['usuario']) || empty($_POST['senha']);
}

function ha_campos_em_branco($dados) {
    return  empty($dados['nome']) || 
            empty($dados['preco']) || 
            empty($dados['quantidade']);
}

function produto_em_branco() {
    return empty($_POST['nome']) || 
           empty($_POST['preco']) || 
           empty($_POST['quantidade']);
}

function usuario_campos_em_branco($dados) {
    return  empty($dados['usuario']) || 
            empty($dados['senha']) || 
            empty($dados['email']);
}

function valor_e_valido($valor){
    return floatval($valor['preco']) > 0;
}

function tratar_erros () {

    if (!isset($_GET['code'])) {
        return;
    }

    $code = (int)$_GET['code'];

    switch($code) {

        case 0: 
            $erro = '<h3>Você não tem permissão para acessar a página de destino</h3>';
            break;
        
        case 1:
            $erro = '<h3>Usuário ou senha inválidos. Tente novamente</h3>';
            break;

        case 2:
            $erro = '<h2>Por favor, preencha todos os campos do cadastro</h2>';
            break;

        case 3:
            $erro = '<h3>Erro ao executar consulta ao banco de dados. 
                    Tente novamente mais tarde, ou contate o suporte</h3>';
            break;

        case 4: 
            $erro = '<h3>Valor inválido, insira outro valor.';
            break;
        
        default:
            $erro = "";
            break;
    }

    echo $erro;


}

?>