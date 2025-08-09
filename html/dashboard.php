<?php
session_start();

$nome = $_SESSION['nome'] ?? null;
$tipo = $_SESSION['tipo_usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidar+</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>

<!-- =========================
     CABEÇALHO / MENU
========================= -->
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

 <?php if (!$nome): ?>
    <div id="imagemLogin" style="display:none; position: fixed; top: 20%; left: 50%; transform: translateX(-50%); z-index: 999;">
      <img src="imagens/entrar-prompt.png" alt="Entre no site" style="max-width: 300px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.2);" />
    </div>
  <?php endif; ?>

  <?php if (!$nome): ?>
  <script>
    setTimeout(() => {
      const imgLogin = document.getElementById('imagemLogin');
      if (imgLogin) {
        imgLogin.style.display = 'block';
      }
    }, 15000);
     const btnFechar = document.getElementById('fecharImagemLogin');
  if (btnFechar) {
    btnFechar.addEventListener('click', () => {
      const imgLogin = document.getElementById('imagemLogin');
      if (imgLogin) {
        imgLogin.style.display = 'none';
      }
    });
  }
  </script>
  
  <?php endif; ?>
<!-- =========================
     IMAGEM PRINCIPAL COM FRASE
========================= -->
<section class="hero">
    <!-- SUBSTITUIR "img/hero.jpg" pela sua imagem -->
    <div class="hero-image" style="background-image: url('../img/inicial_cuidador.png');">
        <div class="hero-text">
            <h1>O cuidado de hoje é a saúde de amanhã</h1>
            <p>Pequenos gestos de cuidado fazem grandes diferenças</p>
        </div>
    </div>
</section>

<!-- =========================
     SEGUNDA IMAGEM COM BOTÃO
========================= -->
<section class="banner">
    <!-- SUBSTITUIR "img/autocuidado.jpg" -->
    <div class="banner-image" style="background-image: url('../img/secundario_inicial_cuidador.png');">
        <div class="banner-content">
            <h2>Cuidar de si é valorizar a vida</h2>
            <a href="autocuidado.php" class="btn-banner">Conheça nossos exercícios de autocuidado</a>
        </div>
    </div>
</section>

<!-- =========================
     TERCEIRA IMAGEM COM BOTÃO
========================= -->
<section class="banner">
    <!-- SUBSTITUIR "img/voluntario.jpg" -->
    <div class="banner-image" style="background-image: url('../img/voluntariado.png');">
        <div class="banner-content">
            <h2>Seja a mudança que quer ver no mundo</h2>
            <a href="voluntariado.php" class="btn-banner">Seja um voluntário</a>
        </div>
    </div>
</section>

<!-- =========================
     NOSSOS PROJETOS (3 CARDS)
========================= -->
<section class="projetos">
    <h2>Nossos Projetos</h2>
    <p class="subtitulo">Conheça o trabalho que a Cuidar+ faz por você!</p>

    <div class="cards-container">
        
        <!-- Card 1 -->
        <div class="card-projeto">
            <img src="../img/primeiro_card.jpg" alt="Cuidar de Quem Cuida">
            <h3>Cuidar de Quem Cuida</h3>
            <p>Encontros de apoio e escuta ativa para cuidadores compartilharem experiências, dúvidas e soluções.</p>
            <a href="voluntariado.php#cuidar-de-quem-cuida" class="btn-projeto">Saiba mais</a>
        </div>

        <!-- Card 2 -->
        <div class="card-projeto">
            <img src="../img/segundo_card.jpg" alt="Pausa para Respirar">
            <h3>Pausa para Respirar</h3>
            <p>Sessões de meditação e relaxamento guiado para reduzir o estresse e melhorar o bem-estar.</p>
            <a href="voluntariado.php#pausa-para-respirar" class="btn-projeto">Saiba mais</a>
        </div>

        <!-- Card 3 -->
        <div class="card-projeto">
            <img src="../img/terceiro_card.jpg" alt="5 Minutos para Mim"> 
            <h3>5 Minutos para Mim</h3>
            <p>Pequenos hábitos e exercícios rápidos de autocuidado físico e emocional para o dia a dia.</p>
            <a href="voluntariado.php#5-minutos-para-mim" class="btn-projeto">Saiba mais</a>
        </div>

    </div>
</section>

<!-- =========================
     RODAPÉ
========================= -->
<footer class="footer">
    <p>&copy; 2025 Cuidar+ - Todos os direitos reservados.</p>
</footer>

</body>
</html>
