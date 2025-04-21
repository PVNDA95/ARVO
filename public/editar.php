<?php
$menu = json_decode(file_get_contents('../data/menu.json'), true);
$categorias = json_decode(file_get_contents('../data/categorias.json'), true);

$id = $_GET['id'] ?? null;
$item = ['id' => '', 'nome' => '', 'descricao' => '', 'preco' => '', 'categoria_id' => '', 'imagem'=>''];

if ($id) {
    foreach ($menu as $m) {
        if ($m['id'] === $id) {
            $item = $m;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Editar' : 'Adicionar' ?> Item</title>
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>
    <h1><?= $id ? 'Editar' : 'Adicionar' ?> Item</h1>
    <form action="salvar.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
        <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($item['nome']) ?>"></label><br>
        <label>Descrição: <input type="text" name="descricao" value="<?= htmlspecialchars($item['descricao']) ?>"></label><br>
        <label>Preço: <input type="number" step="0.01" name="preco" value="<?= htmlspecialchars($item['preco']) ?>"></label><br>
        <label>Imagem: <input type="text" name="imagem" value="<?= htmlspecialchars($item['imagem']) ?>"></label><br>
        <label>Categoria:
            <select name="categoria_id">
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] === $item['categoria_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>