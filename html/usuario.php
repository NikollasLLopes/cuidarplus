<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nome = $_SESSION['nome'];
$tipo = $_SESSION['tipo_usuario'];

// Consulta os dados do usuário logado
$email = $_SESSION['email'] ?? '';
$sql_usuario = "SELECT * FROM usuarios WHERE nome = '$nome'";
$resultado_usuario = mysqli_query($conexao, $sql_usuario);
$usuario = mysqli_fetch_assoc($resultado_usuario);

// Consulta as medicações do usuário
$id_usuario = $usuario['id'];
$sql_medicacoes = "SELECT * FROM medicacoes WHERE id_usuario = $id_usuario";
$resultado_medicacoes = mysqli_query($conexao, $sql_medicacoes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil - Cuidar+</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <h2>Perfil de <?php echo $nome; ?></h2>
    <p><strong>Tipo:</strong> <?php echo ucfirst($tipo); ?></p>
    <p><strong>E-mail:</strong> <?php echo $usuario['email']; ?></p>

    <h3>Minhas Medicações</h3>
    <ul>
      <?php while ($med = mysqli_fetch_assoc($resultado_medicacoes)): ?>
        <li>
          <strong><?php echo $med['nome_medicacao']; ?></strong> - 
          <?php echo $med['dosagem']; ?> às 
          <?php echo $med['horario']; ?> 
          (<?php echo $med['frequencia']; ?>)<br>
          <em><?php echo $med['anotacoes']; ?></em>
        </li>
      <?php endwhile; ?>
    </ul>

    <a href="dashboard.php">← Voltar</a>
  </div>
</body>
</html>
