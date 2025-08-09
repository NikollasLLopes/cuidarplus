<?php
session_start();
include('conexao.php'); // ajuste o caminho conforme sua estrutura

// Verifica se usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$nome = $_SESSION['nome'] ?? null;
$tipo = $_SESSION['tipo_usuario'] ?? null;

$mensagem = "";
$mensagem_tipo = ""; 

function buscarDadosUsuario($conexao, $id) {
    $sql = "SELECT nome, email, tipo_usuario FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nome, $email, $tipo_usuario);
    if ($stmt->fetch()) {
        $stmt->close();
        return ['nome'=>$nome, 'email'=>$email, 'tipo_usuario'=>$tipo_usuario];
    }
    $stmt->close();
    return null;
}

// Busca dados para preencher o formulário (inicialmente)
$dados = buscarDadosUsuario($conexao, $id_usuario);
if (!$dados) {
    // Usuário não encontrado no banco (problema)
    $mensagem = "Usuário não encontrado.";
    $mensagem_tipo = "erro";
} else {
    $nome_bd = $dados['nome'];
    $email_bd = $dados['email'];
    $tipo_usuario_bd = $dados['tipo_usuario'];
}

// Processa exclusão da conta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_conta'])) {
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    if ($stmt->execute()) {
        $stmt->close();
        session_destroy();
        header("Location: login.php?msg=conta_excluida");
        exit();
    } else {
        $mensagem = "Erro ao excluir conta.";
        $mensagem_tipo = "erro";
    }
}

// Processa edição dos dados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['excluir_conta'])) {
    $nome_post = trim($_POST['nome'] ?? '');
    $email_post = trim($_POST['email'] ?? '');
    $senha_post = $_POST['senha'] ?? '';
    $conf_senha_post = $_POST['confirmar_senha'] ?? '';
    $tipo_post = $_POST['tipo_usuario'] ?? '';

    // Validações básicas
    if (empty($nome_post) || empty($email_post) || empty($tipo_post)) {
        $mensagem = "Por favor, preencha todos os campos obrigatórios.";
        $mensagem_tipo = "erro";
    } elseif (!filter_var($email_post, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "E-mail inválido.";
        $mensagem_tipo = "erro";
    } elseif ($senha_post !== $conf_senha_post) {
        $mensagem = "As senhas não conferem.";
        $mensagem_tipo = "erro";
    } else {
        // Atualiza banco
        if (empty($senha_post)) {
            // Sem mudar senha
            $sql = "UPDATE usuarios SET nome=?, email=?, tipo_usuario=? WHERE id=?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssi", $nome_post, $email_post, $tipo_post, $id_usuario);
        } else {
            // Atualiza com nova senha (hash)
            $senha_hash = password_hash($senha_post, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nome=?, email=?, senha=?, tipo_usuario=? WHERE id=?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssssi", $nome_post, $email_post, $senha_hash, $tipo_post, $id_usuario);
        }

        if ($stmt->execute()) {
            $mensagem = "Dados atualizados com sucesso!";
            $mensagem_tipo = "sucesso";
            $_SESSION['nome'] = $nome_post;
            $_SESSION['tipo_usuario'] = $tipo_post;

            // Atualiza variáveis para preencher o formulário com dados novos
            $nome_bd = $nome_post;
            $email_bd = $email_post;
            $tipo_usuario_bd = $tipo_post;
        } else {
            $mensagem = "Erro ao atualizar dados. Tente novamente.";
            $mensagem_tipo = "erro";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Perfil - Cuidar+</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        /* Caso queira destacar as mensagens aqui, se ainda não tiver no seu style.css */
        .msg-sucesso { color: green; font-weight: 600; margin-bottom: 15px; }
        .msg-erro { color: red; font-weight: 600; margin-bottom: 15px; }
        form { max-width: 450px; margin: 0 auto 40px; }
        form label { display: block; margin-top: 15px; font-weight: 600; }
        form input, form select {
            width: 100%; padding: 10px; margin-top: 5px; border-radius: 5px; border: 1.5px solid #ccc; font-size: 15px;
        }
        form button {
            margin-top: 20px; padding: 12px; width: 100%; border: none; border-radius: 6px; font-weight: 700; font-size: 16px;
            cursor: pointer;
        }
        .btn-salvar {
            background-color: #3498db; color: white;
        }
        .btn-salvar:hover {
            background-color: #2980b9;
        }
        .btn-excluir {
            background-color: #e74c3c; color: white;
            margin-top: 10px;
        }
        .btn-excluir:hover {
            background-color: #c0392b;
        }
        main {
            max-width: 600px;
            margin: 30px auto;
            padding: 0 10px;
        }
    </style>
</head>
<body>

<header class="topbar">
  <div class="logo">Cuidar+</div>
  <nav>
    <ul class="menu">
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="servicos.php">O que Fazemos</a></li>
      <li><a href="sobre-nos.php">Sobre Nós</a></li>
      <li><a href="voluntariado.php">Voluntariado</a></li>
      <li><a href="autocuidado.php">Autocuidado</a></li>
    </ul>
  </nav>
  <div class="topbar-right">
    <?php if ($nome): ?>
      <span class="welcome-text">Olá, <?= htmlspecialchars($nome) ?></span>
      <a href="editar.php">Editar Perfil</a>
      <a href="logout.php">Sair</a>
    <?php else: ?>
      <a href="login.php" class="btn-entrar" id="btnEntrar">Entrar</a>
    <?php endif; ?>
  </div>
</header>

<main>
    <h2>Editar Perfil</h2>

    <?php if ($mensagem): ?>
        <p class="msg-<?= $mensagem_tipo ?>"><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome_bd ?? '') ?>" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email_bd ?? '') ?>" required>

        <label for="senha">Nova senha (deixe em branco para manter a atual):</label>
        <input type="password" id="senha" name="senha">

        <label for="confirmar_senha">Confirmar nova senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha">

        <label for="tipo_usuario">Tipo de usuário:</label>
        <select id="tipo_usuario" name="tipo_usuario" required>
            <option value="paciente" <?= ($tipo_usuario_bd ?? '') === 'paciente' ? 'selected' : '' ?>>Paciente</option>
            <option value="familiar" <?= ($tipo_usuario_bd ?? '') === 'familiar' ? 'selected' : '' ?>>Familiar / Cuidador</option>
        </select>

        <button type="submit" class="btn-salvar">Salvar alterações</button>
    </form>

    <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.')">
        <button type="submit" name="excluir_conta" class="btn-excluir">Excluir minha conta</button>
    </form>

    <a href="dashboard.php">Voltar ao Dashboard</a>
</main>

<footer class="footer">
  <p>&copy; 2025 Cuidar+ - Todos os direitos reservados.</p>
</footer>

</body>
</html>
