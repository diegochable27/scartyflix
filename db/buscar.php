<?php
$busqueda = $_POST['busqueda'];
$query = "SELECT * FROM productos WHERE nombre LIKE ?";
$stmt = $conn->prepare($query);
$param = "%{$busqueda}%";
$stmt->bind_param('s', $param);
$stmt->execute();
$result = $stmt->get_result();
$productos = $result->fetch_all(MYSQLI_ASSOC);
?>