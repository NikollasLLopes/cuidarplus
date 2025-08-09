<?php
session_start();
$nome = $_SESSION['nome'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Autocuidado - Cuidar+</title>
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
      <li><a href="voluntariado.php">Voluntariado</a></li>
      <li><a href="autocuidado.php" class="active">Autocuidado</a></li>
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
  <section class="autocuidado-intro container">
    <h1>Autocuidado no dia a dia</h1>
    <p>Este espaço é dedicado a oferecer dicas rápidas e práticas para você, cuidador, cuidar de si mesmo nos pequenos momentos do seu dia.  
      Se deseja um acompanhamento mais aprofundado e contínuo, conheça nosso projeto <a href="voluntariado.php">Voluntariado</a>, que oferece suporte especializado para cuidadores.</p>
  </section>

  <section class="dicas-praticas container">
    <h2>Dicas práticas para o seu autocuidado</h2>
    <ul>
      <li>Faça pequenas pausas para respirar profundamente durante o dia.</li>
      <li>Lembre-se de se hidratar regularmente.</li>
      <li>Inclua alongamentos simples para aliviar a tensão muscular.</li>
      <li>Procure manter uma alimentação equilibrada mesmo com a rotina corrida.</li>
      <li>Reserve momentos para atividades que te tragam prazer, mesmo que breves.</li>
      <li>Priorize uma boa noite de sono para renovar as energias.</li>
    </ul>
  </section>

  <section class="videos container">
    <h2>Vídeos para ajudar no seu bem-estar</h2>

    <!--
      Aqui você pode colocar os vídeos do YouTube usando iframe embed.
      Exemplo de embed:

      <div class="video-item">
        <iframe width="320" height="180" src="https://www.youtube.com/embed/SEU_VIDEO_ID" 
          title="Video de meditação" frameborder="0" allowfullscreen></iframe>
        <p>Título ou breve descrição do vídeo</p>
      </div>

      Para adicionar mais vídeos, copie e cole o bloco acima com o link do vídeo desejado.
    -->

    <div class="video-item">
      <iframe width="320" height="180" src="https://www.youtube.com/embed/inpok4MKVLM" 
        title="Meditação guiada para iniciantes" frameborder="0" allowfullscreen></iframe>
      <p>Meditação guiada para iniciantes (5 minutos)</p>
    </div>

    <div class="video-item">
      <iframe width="320" height="180" src="https://www.youtube.com/embed/v7AYKMP6rOE" 
        title="Alongamento para aliviar tensão" frameborder="0" allowfullscreen></iframe>
      <p>Alongamento para aliviar a tensão muscular (7 minutos)</p>
    </div>

    <div class="video-item">
      <iframe width="320" height="180" src="https://www.youtube.com/embed/tEmt1Znux58" 
        title="Exercícios de respiração para ansiedade" frameborder="0" allowfullscreen></iframe>
      <p>Exercícios de respiração para ansiedade (5 minutos)</p>
    </div>
  </section>

  <section class="frases-motivacionais container">
    <h2>Para inspirar seu cuidado</h2>
    <blockquote>“Cuidar de si não é egoísmo, é necessidade.”</blockquote>
    <blockquote>“Pequenos momentos de autocuidado fazem grandes diferenças.”</blockquote>
    <blockquote>“Você merece atenção e carinho tanto quanto quem você cuida.”</blockquote>
  </section>
</main>

<footer class="footer">
  <p>&copy; 2025 Cuidar+ - Todos os direitos reservados.</p>
</footer>
</body>
</html>
