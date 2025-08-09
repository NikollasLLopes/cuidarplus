<?php
session_start();
$nome = $_SESSION['nome'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Voluntariado - Cuidar+</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>

<header class="topbar">
  <div class="logo">Cuidar+</div>
  <nav class="main-menu">
    <ul>
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="servicos.php">O que Fazemos</a></li>
      <li><a href="sobre-nos.php">Sobre Nós</a></li>
      <li><a href="voluntariado.php" class="active">Voluntariado</a></li>
      <li><a href="autocuidado.php">Autocuidado</a></li>
    </ul>
  </nav>
  <div class="topbar-right">
    <?php if ($nome): ?>
      <span class="welcome-text">Olá, <?php echo htmlspecialchars($nome); ?></span>
      <a href="logout.php" class="btn-entrar">Sair</a>
    <?php else: ?>
      <a href="login.php" class="btn-entrar">Entrar</a>
    <?php endif; ?>
  </div>
</header>

<main>
  <section class="voluntariado-intro">
    <div class="container">
      <h1>Voluntariado no Cuidar+</h1>
      <p>Seja parte da nossa rede de apoio. Escolha uma forma de ajudar e faça a diferença na vida de cuidadores e pacientes.</p>
    </div>
  </section>

  <section class="voluntariado-lista container">

    <article id="escuta-ativa" class="voluntariado-item">
      <h2>Voluntário(a) de Escuta Ativa</h2>
      <p>Ofereça apoio emocional via ligações, chats ou encontros online para cuidadores e pacientes que precisam desabafar, tirar dúvidas ou compartilhar experiências. Ajude a diminuir o isolamento e ofereça conforto em momentos difíceis.</p>
      <a href="cadastro_voluntario.php#escuta-ativa" class="btn-voluntario">Quero ser voluntário</a>
    </article>

    <article id="facilitador-grupos" class="voluntariado-item">
      <h2>Voluntário(a) Facilitador(a) de Grupos de Apoio</h2>
      <p>Organize e conduza grupos de apoio online ou presenciais para cuidadores e familiares, promovendo rodas de conversa, troca de experiências e oficinas leves. Ajude a fortalecer a comunidade e criar uma rede de acolhimento.</p>
      <a href="cadastro_voluntario.php#facilitador-grupos" class="btn-voluntario">Quero ser voluntário</a>
    </article>

    <article id="autocuidado" class="voluntariado-item">
      <h2>Voluntário(a) para Autocuidado e Bem-Estar</h2>
      <p>Ministre sessões rápidas de meditação, yoga, alongamento ou técnicas de relaxamento, presenciais ou por videochamadas. Ajude cuidadores a encontrarem tempo e ferramentas para cuidar de si mesmos.</p>
      <a href="cadastro_voluntario.php#autocuidado" class="btn-voluntario">Quero ser voluntário</a>
    </article>

    <article id="rede-apoio" class="voluntariado-item">
      <h2>Voluntário(a) para Troca de Serviços e Apoio Logístico</h2>
      <p>Facilite a troca de ajuda entre cuidadores, como acompanhamento em consultas, revezamento em cuidados, ajuda com compras ou tarefas domésticas. Ajude a criar uma rede local de suporte e solidariedade.</p>
      <a href="cadastro_voluntario.php#rede-apoio" class="btn-voluntario">Quero ser voluntário</a>
    </article>

  </section>
</main>

<footer class="footer">
  <p>&copy; 2025 Cuidar+ - Todos os direitos reservados.</p>
</footer>

</body>
</html>
