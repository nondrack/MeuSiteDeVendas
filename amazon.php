<?php include 'header.php'; ?>

<?php
// produtos.php

// Array de produtos com categorias atualizadas
$produtos = [
    ['nome' => 'Headset Gamer RGB', 'categoria' => 'Acessórios Gamer', 'imagem' => 'img/headset.jpg'],
    ['nome' => 'Mouse Gamer RGB', 'categoria' => 'Mouses', 'imagem' => 'img/mouse.jpg'],
    ['nome' => 'Teclado Mecânico RGB', 'categoria' => 'Teclados', 'imagem' => 'img/teclado.jpg'],
    ['nome' => 'Placa de Vídeo RTX 3080', 'categoria' => 'Placas de Vídeo', 'imagem' => 'img/placa-video.jpg'],
    ['nome' => 'Mousepad Gamer', 'categoria' => 'Acessórios Gamer', 'imagem' => 'img/mousepad.jpg'],
    ['nome' => 'Teclado RGB Compacto', 'categoria' => 'Teclados', 'imagem' => 'img/teclado-compacto.jpg'],
    ['nome' => 'Mouse Sem Fio Gamer', 'categoria' => 'Mouses', 'imagem' => 'img/mouse-sem-fio.jpg'],
    ['nome' => 'Placa de Vídeo GTX 1660', 'categoria' => 'Placas de Vídeo', 'imagem' => 'img/placa-video-gtx.jpg'],
];

// Categorias fixas conforme solicitado
$categorias = ['Acessórios Gamer', 'Placas de Vídeo', 'Teclados', 'Mouses'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Produtos Gamer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center text-primary mb-5">Produtos Gamer</h1>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs mb-3" id="categoriaTabs" role="tablist">
      <?php foreach ($categorias as $index => $categoria): ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $index === 0 ? 'active' : '' ?>"
                  id="tab-<?= $index ?>" data-bs-toggle="tab" data-bs-target="#categoria-<?= $index ?>"
                  type="button" role="tab" aria-controls="categoria-<?= $index ?>"
                  aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
            <?= $categoria ?>
          </button>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" id="categoriaTabsContent">
      <?php foreach ($categorias as $index => $categoria): ?>
        <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="categoria-<?= $index ?>" role="tabpanel" aria-labelledby="tab-<?= $index ?>">
          <div class="row">
            <?php foreach ($produtos as $produto): ?>
              <?php if ($produto['categoria'] === $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                  <div class="card produto-card shadow-sm h-100">
                    <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title"><?= $produto['nome'] ?></h5>
                      <p class="card-text text-muted">Categoria: <?= $produto['categoria'] ?></p>
                      <a href="#" class="btn btn-outline-primary mt-auto">Ver mais</a>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
