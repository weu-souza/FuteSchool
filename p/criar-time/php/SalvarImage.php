<?php
function salvarImagemBase64($imageBase64, $nomeOriginal = null) {
    $uploadDir = '../../../global/imagens/imageBdSave/';

    // Remove o prefixo data:image/png;base64, se existir
    if (strpos($imageBase64, 'base64,') !== false) {
        $imageParts = explode('base64,', $imageBase64);
        $imageBase64 = $imageParts[1];
    }

    $imageData = base64_decode($imageBase64);
    if ($imageData === false) {
        return ['sucesso' => false, 'erro' => 'Falha ao decodificar a imagem.'];
    }

    // Verifica se já existe uma imagem igual
    $existingFiles = glob($uploadDir . '*');
    foreach ($existingFiles as $existingFile) {
        $existingData = file_get_contents($existingFile);
        if ($existingData !== false && base64_encode($existingData) === base64_encode($imageData)) {
            $fileName = basename($existingFile);
            return [
                'sucesso' => true,
                'nome' => $fileName,
                'caminho' => '/global/imagens/imageBdSave/' . $fileName
            ];
        }
    }

    // Cria um nome único ou usa o original se fornecido
    $ext = 'png';
    if ($nomeOriginal) {
        $ext = pathinfo($nomeOriginal, PATHINFO_EXTENSION) ?: 'png';
    }
    $fileName = uniqid('img_') . '.' . $ext;

    if (file_put_contents($uploadDir . $fileName, $imageData) === false) {
        return ['sucesso' => false, 'erro' => 'Falha ao salvar a imagem.'];
    }

    return [
        'sucesso' => true,
        'nome' => $fileName,
        'caminho' => '/global/imagens/imageBdSave/' . $fileName
    ];
}
