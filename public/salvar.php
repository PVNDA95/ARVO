<?php
$menu = json_decode(file_get_contents('../data/menu.json'), true);

$id = $_POST['id'] ?: uniqid();
$novoItem = [
    'id' => $id,
    'nome' => $_POST['nome'],
    'descricao' => $_POST['descricao'],
    'preco' => (float) $_POST['preco'],
    'categoria_id' => $_POST['categoria_id'],
    'imagem' => $_POST['imagem']
];

$atualizado = false;
foreach ($menu as &$item) {
    if ($item['id'] === $id) {
        $item = $novoItem;
        $atualizado = true;
        break;
    }
}
unset($item);

if (!$atualizado) {
    $menu[] = $novoItem;
}

file_put_contents('../data/menu.json', json_encode($menu, JSON_PRETTY_PRINT));
header('Location: index.php');
exit;