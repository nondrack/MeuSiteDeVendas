
<?php
// Detecta página atual pela query string, default Shopee
$loja = $_GET['loja'] ?? 'shopee';

// Dados dos produtos por loja
$produtos = [
    'shopee' => [
        ['nome' => 'Smartphone Xiaomi', 'categoria' => 'Eletrônicos', 'imagem' => 'https://via.placeholder.com/300x180?text=Xiaomi'],
        ['nome' => 'Tênis Esportivo', 'categoria' => 'Moda', 'imagem' => 'https://via.placeholder.com/300x180?text=Tênis+Shopee'],
        ['nome' => 'Relógio Inteligente', 'categoria' => 'Eletrônicos', 'imagem' => 'https://via.placeholder.com/300x180?text=Relógio+Shopee'],
    ],
    'amazon' => [
        ['nome' => 'Kindle Paperwhite', 'categoria' => 'Eletrônicos', 'imagem' => 'https://via.placeholder.com/300x180?text=Kindle+Amazon'],
        ['nome' => 'Fones Bluetooth', 'categoria' => 'Eletrônicos', 'imagem' => 'https://via.placeholder.com/300x180?text=Fones+Amazon'],
        ['nome' => 'Cafeteira Elétrica', 'categoria' => 'Eletrodomésticos', 'imagem' => 'https://via.placeholder.com/300x180?text=Cafeteira+Amazon'],
    ]
];

// Pega categorias únicas para a loja atual
$categorias = array_unique(array_column($produtos[$loja], 'categoria'));

// Nome da loja para exibição no dropdown e título
$nomeLoja = ucfirst($loja);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Produtos - <?= $nomeLoja ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
        }
        .produto-card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .produto-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.15);
        }
        .produto-card img {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .categoria-titulo {
            border-left: 5px solid #dc3545;
            padding-left: 10px;
            margin-top: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #dc3545;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main class="container py-5">
    <h1 class="text-center text-danger mb-5">Produtos da <?= $nomeLoja ?></h1>

    <?php foreach ($categorias as $categoria): ?>
        <h2 class="categoria-titulo"><?= htmlspecialchars($categoria) ?></h2>
        <div class="row">
            <?php foreach ($produtos[$loja] as $produto): ?>
                <?php if ($produto['categoria'] === $categoria): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card produto-card shadow-sm h-100">
                            <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>" class="card-img-top" />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h5>
                                <p class="card-text text-muted">Categoria: <?= htmlspecialchars($produto['categoria']) ?></p>
                                <a href="#" class="btn btn-outline-danger mt-auto">Ver mais</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</body>
</html>



