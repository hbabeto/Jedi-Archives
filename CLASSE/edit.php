<?php
include ("../classe/Db.class.php");

$db = new Db();
$db->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $db->setTabela("posts");
    $db->excluir("id = $id");
    header("Location: forum.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['author'])) {
    $id = $_POST['edit_id'];
    $dados = array(
        'titulo' => $_POST['title'],
        'conteudo' => $_POST['content'],
        'autor' => $_POST['author']
    );
    $db->setTabela("posts");
    $db->alterar("id = $id", $dados);
    header("Location: forum.php");
    exit();
}

$db->setTabela("posts");
$postagens = $db->consultar('*', null, 'criado_em DESC');

$postagensHtml = '';
$editPost = null;
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $editPost = $db->consultar('*', "id = $id")[0];
}
foreach ($postagens as $postagem) {
    $postagensHtml .= '<div class="post">';
    $postagensHtml .= '<h2>' . $postagem['titulo'] . '</h2>';
    $postagensHtml .= '<p>Autor: ' . $postagem['autor'] . '</p>';
    $postagensHtml .= '<p>' . $postagem['conteudo'] . '</p>';
    $postagensHtml .= '<form action="forum.php" method="post" style="display:inline-block;">';
    $postagensHtml .= '<input type="hidden" name="delete_id" value="' . $postagem['id'] . '">';
    $postagensHtml .= '<input type="submit" value="Excluir">';
    $postagensHtml .= '</form>';
    $postagensHtml .= '<form action="edit.php" method="get" style="display:inline-block;">';
    $postagensHtml .= '<input type="hidden" name="edit_id" value="' . $postagem['id'] . '">';
    $postagensHtml .= '<input type="submit" value="Alterar">';
    $postagensHtml .= '</form>';
    $postagensHtml .= '</div>';
}

$html = file_get_contents("../HTML/edit.html");

$html = str_replace("#mensagem#", isset($mensagem) ? $mensagem : '', $html);
$html = str_replace("#postagens#", $postagensHtml, $html);

if ($editPost) {
    $editForm = '<h1>Editar Postagem</h1>';
    $editForm .= '<form action="forum.php" method="post">';
    $editForm .= '<input type="hidden" name="edit_id" value="' . $editPost['id'] . '">';
    $editForm .= '<label for="edit_title">Título:</label>';
    $editForm .= '<input type="text" id="edit_title" name="title" value="' . $editPost['titulo'] . '" required><br><br>';
    $editForm .= '<label for="edit_content">Conteúdo:</label><br>';
    $editForm .= '<textarea id="edit_content" name="content" rows="10" cols="50" required>' . $editPost['conteudo'] . '</textarea><br><br>';
    $editForm .= '<label for="edit_author">Seu nome:</label>';
    $editForm .= '<input type="text" id="edit_author" name="author" value="' . $editPost['autor'] . '" required><br><br>';
    $editForm .= '<input type="submit" value="Salvar">';
    $editForm .= '</form>';
    $html = str_replace("#editForm#", $editForm, $html);
} else {
    $html = str_replace("#editForm#", '', $html);
}

echo $html;
?>
