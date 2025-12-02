<?php
$conn = mysqli_connect("localhost", "root", "", "ahp_perikanan");
if (isset($_POST['batal'])) {
    header("location:../data.php");
}


$kota = $_POST['kota'] ?? "";
$c1 = $_POST['c1'] ?? "";
$c2 = $_POST['c2'] ?? "";
$c3 = $_POST['c3'] ?? "";
if (isset($_POST['tambah'])) {
    $query = "INSERT INTO data_perikanan(lokasi,c1_produksi,c2_rtp,c3_kapal) VALUES 
    ('$kota','$c1','$c2','$c3')";
    if (mysqli_query($conn, $query)) {
        header("location:../data.php");
    } else {
        echo "data gagal ditambahkan";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <?php require_once "../include/navbar.php" ?>
    <h2 style="text-align: center;">Tambah Data</h2>
    <div class="container-fluid" style="display: flex; justify-content:center;">
        <div class="card">
            <div class="card-body">
                <form action="tambah.php" method="post" style="padding:10px">
                    <table class="w-100">
                        <tr>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Nama Kota:</label>
                                <input type="text" name="kota" class="form-control" style="width: 300px;">
                            </div>
                        </tr>
                        <tr>
                            <div class="mb-3">
                                <label for="c1" class="form-label">C1:</label>
                                <input type="text" name="c1" class="form-control" style="width: 300px;">
                            </div>
                        </tr>
                        <tr>
                            <div class="mb-3">
                                <label for="c2" class="form-label">C2:</label>
                                <input type="text" name="c2" class="form-control" style="width: 300px;">
                            </div>
                        </tr>
                        <tr>
                            <div class="mb-3">
                                <label for="c3" class="form-label">C3:</label>
                                <input type="text" name="c3" class="form-control" style="width: 300px;">
                            </div>
                        </tr>
                        <tr class="m-4">
                            <td>
                                <button type="submit" name="tambah" class="btn btn-success w-100 mt-1 mb-1">Tambah</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="batal" class="btn btn-danger w-100">Batal</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>