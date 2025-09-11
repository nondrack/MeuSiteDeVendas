
<?php

// Classe Produto
class Produto {
    public string $nome;
    public string $categoria;
    public string $imagem;

    public function __construct(string $nome, string $categoria, string $imagem) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->imagem = $imagem;
    }
}

// Classe Loja
class Loja {
    public string $nome;
    /** @var Produto[] */
    private array $produtos;

    public function __construct(string $nome, array $produtos = []) {
        $this->nome = $nome;
        $this->produtos = $produtos;
    }

    public function adicionarProduto(Produto $produto): void {
        $this->produtos[] = $produto;
    }

    public function getProdutos(): array {
        return $this->produtos;
    }

    public function getCategorias(): array {
        $categorias = array_map(fn($produto) => $produto->categoria, $this->produtos);
        return array_unique($categorias);
    }

    public function getNomeFormatado(): string {
        return ucfirst($this->nome);
    }
}

// Classe para gerenciar múltiplas lojas
class GerenciadorDeLojas {
    /** @var Loja[] */
    private array $lojas = [];

    public function adicionarLoja(Loja $loja): void {
        $this->lojas[$loja->nome] = $loja;
    }

    public function getLoja(string $nome): ?Loja {
        return $this->lojas[$nome] ?? null;
    }
}

// Criando instância do gerenciador
$gerenciador = new GerenciadorDeLojas();

// Criando lojas e produtos
$shopee = new Loja('shopee', [
    new Produto('Smartphone Xiaomi', 'Eletrônicos', 'https://via.placeholder.com/300x180?text=Xiaomi'),
    new Produto('Tênis Esportivo', 'Moda', 'https://via.placeholder.com/300x180?text=Tênis+Shopee'),
    new Produto('Relógio Inteligente', 'Eletrônicos', 'https://via.placeholder.com/300x180?text=Relógio+Shopee'),
]);

$amazon = new Loja('amazon', [
    new Produto('Kindle Paperwhite', 'Eletrônicos', 'https://via.placeholder.com/300x180?text=Kindle+Amazon'),
    new Produto('Fones Bluetooth', 'Eletrônicos', 'https://via.placeholder.com/300x180?text=Fones+Amazon'),
    new Produto('Cafeteira Elétrica', 'Eletrodomésticos', 'https://via.placeholder.com/300x180?text=Cafeteira+Amazon'),
]);

// Adiciona lojas ao gerenciador
$gerenciador->adicionarLoja($shopee);
$gerenciador->adicionarLoja($amazon);

// Detecta loja atual via query string (default: shopee)
$lojaAtualNome = $_GET['loja'] ?? 'shopee';
$lojaAtual = $gerenciador->getLoja($lojaAtualNome);

if (!$lojaAtual) {
    die("Loja não encontrada.");
}

// Obtendo dados
$produtos = $lojaAtual->getProdutos();
$categorias = $lojaAtual->getCategorias();
$nomeLoja = $lojaAtual->getNomeFormatado();

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



