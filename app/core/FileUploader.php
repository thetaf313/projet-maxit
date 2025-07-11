<?php

namespace App\Core;

class FileUploader
{

    public static function upload(array $file): ?string
    {
        $uploadDir = UPLOAD_DIR;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Vérifie qu'il n'y a pas d'erreur
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $filename = uniqid() . '_' . basename($file['name']);
        $targetPath = $uploadDir . $filename;

        // Déplace le fichier uploadé
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        }

        return null;
    }
}
