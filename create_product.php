<?php
include 'database/connection.php';
$categories = $db->query('SELECT * FROM category WHERE status = 1')->fetchAll();
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $status = (isset($_POST["status"]) && $_POST["status"]) ? 1 : 0;
    $created_at = date("Y-m-d");
    try {
        $db
            ->prepare("INSERT INTO product(name, status, created_at) VALUES('$name', $status, '$created_at')")
            ->execute();
    } catch (Exception $e) {
        $error = 'create failed';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/styles.css">
    <title>Create product</title>
</head>

<body>
    <section>
        <a href="index.php">go back</a>
        <h4>create new product</h4>
        <?php include 'template/product_form.php'; ?>
    </section>
</body>

</html>