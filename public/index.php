<?php
$menu = json_decode(file_get_contents('../data/menu.json'), true);
$categorias = json_decode(file_get_contents('../data/categorias.json'), true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>LiveMenu Clone</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <h1>Cardápio Digital</h1>
    <nav id="categorias">
      <button data-categoria="todos" class="active">Todos</button>
      <?php foreach ($categorias as $cat): ?>
        <button data-categoria="<?= $cat['id'] ?>"><?= $cat['nome'] ?></button>
      <?php endforeach; ?>
    </nav>
  </header>

  <main id="produtos">
    <?php foreach ($menu as $item): ?>
      <div class="produto" data-categoria="<?= $item['categoria_id'] ?>">
        <img src="assets/img/<?= $item['imagem'] ?>" alt="<?= $item['nome'] ?>">
        <h2><?= $item['nome'] ?></h2>
        <p><?= $item['descricao'] ?></p>
        <span class="preco">R$ <?= number_format($item['preco'], 2, ',', '.') ?></span>
        <button class="ver-btn">Ver Produto</button>
      </div>
    <?php endforeach; ?>
  </main>

  <script src="assets/js/script.js"></script>
</body>
</html>
