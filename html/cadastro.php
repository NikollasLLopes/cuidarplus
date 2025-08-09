<?php
require 'conexao.php';

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirmar_senha = trim($_POST['confirmar_senha']);
    $tipo_usuario = $_POST['tipo_usuario'];

    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmar_senha) && !empty($tipo_usuario)) {
        if ($senha === $confirmar_senha) {
            // Verifica se email já existe
            $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 0) {
                // Insere usuário
                $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $nome, $email, $senha, $tipo_usuario);
                if ($stmt->execute()) {
                    $sucesso = "Cadastro realizado com sucesso! <a href='login.php'>Clique aqui para entrar</a>";
                } else {
                    $erro = "Erro ao cadastrar!";
                }
            } else {
                $erro = "E-mail já cadastrado!";
            }
        } else {
            $erro = "As senhas não conferem!";
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Cuidar+</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="auth-body">
    <div class="cadastro-container">
        <h2>Criar Conta no Cuidar+</h2>
        <?php if ($erro): ?>
            <p class="msg-erro"><?php echo $erro; ?></p>
        <?php endif; ?>
        <?php if ($sucesso): ?>
            <p class="msg-sucesso"><?php echo $sucesso; ?></p>
        <?php endif; ?>
        <form method="POST" class="auth-form">
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <label>Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" required>

            <label>Tipo de Usuário:</label>
            <select name="tipo_usuario" required>
                <option value="">Selecione...</option>
                <option value="paciente">Paciente</option>
                <option value="familiar/cuidador">Familiar/Cuidador</option>
            </select>

            <button type="submit" class="btn">Cadastrar</button>
        </form>
        <p>Já tem conta? <a href="login.php">Entrar</a></p>
    </div>
</body>
</html>
