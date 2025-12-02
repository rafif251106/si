<?php
$conn = mysqli_connect("localhost", "root", "", "ahp_perikanan");
$query = "SELECT * FROM data_perikanan";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<head>
    <link rel="stylesheet" href="./css/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/navbar.css">

</head>

<body>
    <?php
    require_once __DIR__ . "/include/navbar.php";
    ?>
    <div class="container-sm">
        <h2>Data Mentah</h2>
        <h6>C1 = Produksi Perikanan Tangkap (Ton)</h6>
        <h6>C2 = RTP Perikanan Tangkap (Unit)</h6>
        <h6>C3 = Kapal / Perahu (Unit) (C3)</h6>
        <button class="btn btn-primary mb-3" onclick="window.location.href='CRUD/tambah.php'">Tambah Data</button>
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>ID</th>
                <th>Nama</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>Action</th>
            </tr>
            <?php foreach ($data as $d): ?>
                <tr>
                    <?php foreach ($d as $key => $val): ?>
                        <td><?php echo $val ?></td>
                    <?php endforeach ?>
                     <td>
                         <button class="btn btn-primary" onclick="window.location.href='CRUD/edit.php?id=<?php echo $d['id'] ?>'">Edit</button>
                         <button class="btn btn-danger" onclick="window.location.href='CRUD/delete.php?id=<?php echo $d['id'] ?>'">Delete</button>
                     </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>