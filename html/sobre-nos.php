<?php
session_start();
$nome = $_SESSION['nome'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Sobre Nós - Cuidar+</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <!-- Cabeçalho -->
  <header class="topbar">
    <div class="logo">Cuidar+</div>
    <nav class="main-menu">
      <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="servicos.php">O que Fazemos</a></li>
        <li><a href="sobre-nos.php" class="active">Sobre Nós</a></li>
        <li><a href="voluntariado.php">Voluntariado</a></li>
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

  <!-- Banner inicial -->
  <section class="hero" style="background-image: url('../imagens/sobre-nos-banner.jpg');">
    <div class="hero-text">
      <h1>Sobre Nós</h1>
      <p>Cuidar de quem cuida é a nossa missão</p>
    </div>
  </section>

  <!-- História -->
  <section class="sobre-nos">
    <div class="container">
      <h2>Nossa História</h2>
      <p>
        A Cuidar+ nasceu com o propósito de apoiar cuidadores, pacientes e voluntários,
        promovendo bem-estar e qualidade de vida. Nosso trabalho é voltado para fortalecer
        o autocuidado e a rede de apoio, oferecendo informações, capacitação e suporte
        humano para quem dedica seu tempo e amor ao cuidado do próximo.
      </p>
    </div>
  </section>

  <!-- Missão, Visão e Valores -->
  <section class="mvv">
    <div class="container mvv-grid">
      <div class="mvv-item">
        <h3>Missão</h3>
        <p>Promover o cuidado integral de cuidadores e pacientes, valorizando a saúde física, emocional e social.</p>
      </div>
      <div class="mvv-item">
        <h3>Visão</h3>
        <p>Ser referência no apoio e fortalecimento da rede de cuidadores em todo o Brasil.</p>
      </div>
      <div class="mvv-item">
        <h3>Valores</h3>
        <ul>
          <li>Empatia e acolhimento</li>
          <li>Compromisso com a saúde e bem-estar</li>
          <li>Respeito à diversidade</li>
          <li>Trabalho em rede e cooperação</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Botão de contato -->
  <section class="cta">
    <div class="container">
      <h2>Quer saber mais ou falar com a gente?</h2>
      <a href="contato.php" class="btn">Entre em contato</a>
    </div>
  </section>

  <!-- Rodapé -->
  <footer>
    <div class="footer-container">
      <div class="footer-col">
        <h4>Cuidar+</h4>
        <p>Cuidando de quem cuida.</p>
      </div>
      <div class="footer-col">
        <h4>Links rápidos</h4>
        <ul>
          <li><a href="dashboard.php">Home</a></li>
          <li><a href="o_que_fazemos.php">O que Fazemos</a></li>
          <li><a href="sobre_nos.php">Sobre Nós</a></li>
          <li><a href="voluntariado.php">Voluntariado</a></li>
          <li><a href="autocuidado.php">Autocuidado</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contato</h4>
        <p>Email: contato@cuidarmais.com</p>
        <p>WhatsApp: (xx) xxxxx-xxxx</p>
      </div>
    </div>
  </footer>
</body>
</html>
