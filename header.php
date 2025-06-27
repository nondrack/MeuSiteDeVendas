<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos da Shopee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-weight: bold;
      color: #dc3545;
    }
    .nav-link.active {
      font-weight: bold;
      color: #dc3545 !important;
    }
    .dropdown-menu .active {
      background-color: #dc3545;
      color: white;
    }
    .hero-section {
      padding: 60px 0;
      text-align: center;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      margin-top: 30px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
$nomeDropdown = 'Dropdown';

if ($paginaAtual == 'shopee.php') {
  $nomeDropdown = 'Shopee';
} elseif ($paginaAtual == 'amazon.php') {
  $nomeDropdown = 'Amazon';
}
?>

<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);

switch ($paginaAtual) {
    case 'shopee.php':
        $nomeDropdown = 'Shopee';
        break;
    case 'amazon.php':
        $nomeDropdown = 'Amazon';
        break;
    default:
        $nomeDropdown = 'Produtos';
}
?>




<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-danger fw-bold" href="index.php?loja=shopee">
            <i class="bi bi-shop"></i> MeuCatálogo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $loja === 'shopee' ? 'active text-danger fw-bold' : '' ?>" href="shopee.php">Shopee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $loja === 'amazon' ? 'active text-danger fw-bold' : '' ?>" href="amazon.php">Amazon</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="index.php" method="GET">
                <input type="hidden" name="loja" value="<?= htmlspecialchars($loja) ?>">
                <input class="form-control me-2" type="search" name="q" placeholder="Buscar produtos..." aria-label="Buscar produtos" />
                <button class="btn btn-outline-danger" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
</header>




<!-- Conteúdo principal -->
<main class="container">
  <section class="hero-section">
    <h1 class="display-5 mb-3">Bem-vindo à página de produtos <?= $nomeDropdown ?></h1>
    <p class="lead text-muted">Confira abaixo os melhores produtos selecionados especialmente para você!</p>
  </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
