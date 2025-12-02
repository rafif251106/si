<?php

$id = $_GET['id'] ?? 0;
$conn = mysqli_connect("localhost", "root", "", "ahp_perikanan");
$query = "DELETE FROM data_perikanan WHERE id = " . $id;
if (mysqli_query($conn, $query)) {
    header("location:../data.php");
} else {
    echo "data gagal dihapus";
}

?>