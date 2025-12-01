<?php
session_start();
if (!isset($_SESSION['bobotc1']) && !isset($_SESSION['bobotc2']) && !isset($_SESSION['bobotc3'])) {
    echo "<script>alert('Anda belum melakukan perhitungan bobot!!'); window.location='./perhitungan.php'</script>";
}

if (isset($_POST['vektor']) || isset($_POST['ratio']) || isset($_POST['CI'])) {
    $c1a = $_POST['c1a'] ?? "";
    $c1b = $_POST['c1b'] ?? "";
    $c1c = $_POST['c1c'] ?? "";

    $c2a = $_POST['c2a'] ?? "";
    $c2b = $_POST['c2b'] ?? "";
    $c2c = $_POST['c2c'] ?? "";

    $c3a = $_POST['c3a'] ?? "";
    $c3b = $_POST['c3b'] ?? "";
    $c3c = $_POST['c3c'] ?? "";

    $bobotc1 = $_POST['bobotc1'] ?? "";
    $bobotc2 = $_POST['bobotc2'] ?? "";
    $bobotc3 = $_POST['bobotc3'] ?? "";

    $konsistensic1 = "($c1a * $bobotc1) + ($c1b * $bobotc2) + ($c1c * $bobotc3)";
    $konsistensic2 = "($c2a * $bobotc1) + ($c2b * $bobotc2) + ($c2c * $bobotc3)";
    $konsistensic3 = "($c3a * $bobotc1) + ($c3b * $bobotc2) + ($c3c * $bobotc3)";

    $hasilc1 = ((float)$c1a * (float)$bobotc1) + ((float)$c1b * (float)$bobotc2) + ((float)$c1c * (float)$bobotc3);
    $hasilc2 = ((float)$c2a * (float)$bobotc1) + ((float)$c2b * (float)$bobotc2) + ((float)$c2c * (float)$bobotc3);
    $hasilc3 = ((float)$c3a * (float)$bobotc1) + ((float)$c3b * (float)$bobotc2) + ((float)$c3c * (float)$bobotc3);

    $hasilc1 = round($hasilc1, 3);
    $hasilc2 = round($hasilc2, 3);
    $hasilc3 = round($hasilc3, 3);
}

if (isset($_POST['ratio']) || isset($_POST['CI'])) {
    $c1a = $_POST['c1a'] ?? "";
    $c1b = $_POST['c1b'] ?? "";
    $c1c = $_POST['c1c'] ?? "";

    $c2a = $_POST['c2a'] ?? "";
    $c2b = $_POST['c2b'] ?? "";
    $c2c = $_POST['c2c'] ?? "";

    $c3a = $_POST['c3a'] ?? "";
    $c3b = $_POST['c3b'] ?? "";
    $c3c = $_POST['c3c'] ?? "";

    $bobotc1 = $_POST['bobotc1'] ?? "";
    $bobotc2 = $_POST['bobotc2'] ?? "";
    $bobotc3 = $_POST['bobotc3'] ?? "";

    $hasilc1 = $_POST['hasilc1'];
    $hasilc2 = $_POST['hasilc2'];
    $hasilc3 = $_POST['hasilc3'];

    $perhitunganc1 = "$hasilc1 / $bobotc1";
    $perhitunganc2 = "$hasilc2 / $bobotc2";
    $perhitunganc3 = "$hasilc3 / $bobotc3";

    $hasilpc1 = (float)$hasilc1 / (float)$bobotc1;
    $hasilpc2 = (float)$hasilc2 / (float)$bobotc2;
    $hasilpc3 = (float)$hasilc3 / (float)$bobotc3;

    $hasilpc1 = round($hasilpc1, 3);
    $hasilpc2 = round($hasilpc2, 3);
    $hasilpc3 = round($hasilpc3, 3);

    $lambda = ((float)$hasilpc1 + (float)$hasilpc2 + (float)$hasilpc3) / 3;
    $lambda = round($lambda, 3);
}

if (isset($_POST['CI'])) {
    $c1a = $_POST['c1a'] ?? "";
    $c1b = $_POST['c1b'] ?? "";
    $c1c = $_POST['c1c'] ?? "";

    $c2a = $_POST['c2a'] ?? "";
    $c2b = $_POST['c2b'] ?? "";
    $c2c = $_POST['c2c'] ?? "";

    $c3a = $_POST['c3a'] ?? "";
    $c3b = $_POST['c3b'] ?? "";
    $c3c = $_POST['c3c'] ?? "";

    $bobotc1 = round($_POST['bobotc1'] ?? "", 3);
    $bobotc2 = round($_POST['bobotc2'] ?? "", 3);
    $bobotc3 = round($_POST['bobotc3'] ?? "", 3);

    $hasilc1 = $_POST['hasilc1'];
    $hasilc2 = $_POST['hasilc2'];
    $hasilc3 = $_POST['hasilc3'];

    $hasilpc1 = $_POST['hasilpc1'];
    $hasilpc2 = $_POST['hasilpc2'];
    $hasilpc3 = $_POST['hasilpc3'];

    $lambda = $_POST['lambda'];

    $perhitungan = "($lambda - 3)/(3-1)";
    $hasil = ((float)$lambda - 3) / (3 - 1);
    $hasil = round($hasil, 4);

    $_SESSION["CI"] = $hasil;
}
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
        <h2>Hitung Nilai CI</h2>
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>Kriteria</th>
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>EVN (Bobot Prioritas)</th>
            </tr>
            <form action="hitungCI.php" method="post">
                <tr>
                    <th>C1</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1a" class="form-control" value="<?= $c1a ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1b" class="form-control" value="<?= $c1b ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c1c" class="form-control" value="<?= $c1c ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="bobotc1" class="form-control" readonly value="<?= $_SESSION['bobotc1'] ?? "" ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2a" class="form-control" value="<?= $c2a ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2b" class="form-control" value="<?= $c2b ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c2c" class="form-control" value="<?= $c2c ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="bobotc2" class="form-control" value="<?= $_SESSION['bobotc2'] ?? "" ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3a" class="form-control" value="<?= $c3a ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3b" class="form-control" value="<?= $c3b ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="c3c" class="form-control" value="<?= $c3c ?? "" ?>">
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" readonly name="bobotc3" class="form-control" value="<?= $_SESSION['bobotc3'] ?? "" ?>">
                        </div>
                    </td>
                </tr>

        </table>
    </div>
    <hr>
    <div class="container-sm">
        <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
            <tr class="table-dark">
                <th>Kriteria</th>
                <th colspan="2">Matriks Konsistensi</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <th>C1</th>
                <td colspan="2">
                    <div class="mb-3">
                        <input type="text" name="konsistensic1" class="form-control" value="<?= $konsistensic1 ?? "" ?>" readonly>
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" name="hasilc1" class="form-control" value="<?= $hasilc1 ?? "" ?>" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <th>C2</th>
                <td colspan="2">
                    <div class="mb-3">
                        <input type="text" name="konsistensic2" class="form-control" value="<?= $konsistensic2 ?? "" ?>" readonly>
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" name="hasilc2" class="form-control" value="<?= $hasilc2 ?? "" ?>" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <th>C3</th>
                <td colspan="2">
                    <div class="mb-3">
                        <input type="text" name="konsistensic3" class="form-control" value="<?= $konsistensic3 ?? "" ?>" readonly>
                    </div>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="text" name="hasilc3" class="form-control" value="<?= $hasilc3 ?? "" ?>" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <button type="submit" name="vektor" class="btn btn-danger w-100">Jumlahkan</button>
                </td>
            </tr>
            </form>
        </table>
    </div>
    <hr>
    <div class="container-sm">
        <form action="hitungCI.php" method="post">

            <input type="text" name="c1a" class="form-control" value="<?= $c1a ?? "" ?>" hidden>
            <input type="text" name="c2a" class="form-control" value="<?= $c2a ?? "" ?>" hidden>
            <input type="text" name="c3a" class="form-control" value="<?= $c3a ?? "" ?>" hidden>

            <input type="text" name="c1b" class="form-control" value="<?= $c1b ?? "" ?>" hidden>
            <input type="text" name="c2b" class="form-control" value="<?= $c2b ?? "" ?>" hidden>
            <input type="text" name="c3b" class="form-control" value="<?= $c3b ?? "" ?>" hidden>

            <input type="text" name="c1c" class="form-control" value="<?= $c1c ?? "" ?>" hidden>
            <input type="text" name="c2c" class="form-control" value="<?= $c2c ?? "" ?>" hidden>
            <input type="text" name="c3c" class="form-control" value="<?= $c3c ?? "" ?>" hidden>

            <input type="text" name="bobotc1" class="form-control" value="<?= $_SESSION['bobotc1'] ?? "" ?>" hidden>
            <input type="text" name="bobotc2" class="form-control" value="<?= $_SESSION['bobotc2'] ?? "" ?>" hidden>
            <input type="text" name="bobotc3" class="form-control" value="<?= $_SESSION['bobotc3'] ?? "" ?>" hidden>

            <input type="text" name="hasilc1" class="form-control" value="<?= $hasilc1 ?? "" ?>" hidden>
            <input type="text" name="hasilc2" class="form-control" value="<?= $hasilc2 ?? "" ?>" hidden>
            <input type="text" name="hasilc3" class="form-control" value="<?= $hasilc3 ?? "" ?>" hidden>

            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th>Kriteria</th>
                    <th colspan="2">Perhitungan</th>
                    <th>Hasil</th>
                </tr>
                <tr>
                    <th>C1</th>
                    <td colspan="2">
                        <div class="mb-3">
                            <input type="text" name="perhitunganc1" class="form-control" value="<?= $perhitunganc1 ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="hasilpc1" class="form-control" value="<?= $hasilpc1 ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C2</th>
                    <td colspan="2">
                        <div class="mb-3">
                            <input type="text" name="perhitunganc2" class="form-control" value="<?= $perhitunganc2 ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="hasilpc2" class="form-control" value="<?= $hasilpc2 ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>C3</th>
                    <td colspan="2">
                        <div class="mb-3">
                            <input type="text" name="perhitunganc3" class="form-control" value="<?= $perhitunganc3 ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="hasilpc3" class="form-control" value="<?= $hasilpc3 ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Lambda Max (Rata-rata (λmax))</th>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="lambda" class="form-control" value="<?= $lambda ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="submit" name="ratio" class="btn btn-danger w-100">Jumlahkan</button>
                    </td>
                </tr>
        </form>
        </table>
    </div>
    <div class="container-sm">
        <form action="hitungCI.php" method="post">

            <input type="text" name="c1a" class="form-control" value="<?= $c1a ?? "" ?>" hidden>
            <input type="text" name="c2a" class="form-control" value="<?= $c2a ?? "" ?>" hidden>
            <input type="text" name="c3a" class="form-control" value="<?= $c3a ?? "" ?>" hidden>

            <input type="text" name="c1b" class="form-control" value="<?= $c1b ?? "" ?>" hidden>
            <input type="text" name="c2b" class="form-control" value="<?= $c2b ?? "" ?>" hidden>
            <input type="text" name="c3b" class="form-control" value="<?= $c3b ?? "" ?>" hidden>

            <input type="text" name="c1c" class="form-control" value="<?= $c1c ?? "" ?>" hidden>
            <input type="text" name="c2c" class="form-control" value="<?= $c2c ?? "" ?>" hidden>
            <input type="text" name="c3c" class="form-control" value="<?= $c3c ?? "" ?>" hidden>

            <input type="text" name="bobotc1" class="form-control" value="<?= $_SESSION['bobotc1'] ?? "" ?>" hidden>
            <input type="text" name="bobotc2" class="form-control" value="<?= $_SESSION['bobotc2'] ?? "" ?>" hidden>
            <input type="text" name="bobotc3" class="form-control" value="<?= $_SESSION['bobotc3'] ?? "" ?>" hidden>

            <input type="text" name="hasilc1" class="form-control" value="<?= $hasilc1 ?? "" ?>" hidden>
            <input type="text" name="hasilc2" class="form-control" value="<?= $hasilc2 ?? "" ?>" hidden>
            <input type="text" name="hasilc3" class="form-control" value="<?= $hasilc3 ?? "" ?>" hidden>

            <input type="text" name="hasilpc1" class="form-control" value="<?= $hasilpc1 ?? "" ?>" hidden>
            <input type="text" name="hasilpc2" class="form-control" value="<?= $hasilpc2 ?? "" ?>" hidden>
            <input type="text" name="hasilpc3" class="form-control" value="<?= $hasilpc3 ?? "" ?>" hidden>

            <input type="text" name="lambda" class="form-control" value="<?= $lambda ?? "" ?>" hidden>

            <table border="1" cellpadding="15px" class="table table-light table-hover table-bordered border-primary">
                <tr class="table-dark">
                    <th colspan="3">Hitung Consistency Index (CI) - Kriteria</th>
                </tr>
                <tr>
                    <th>Perhitungan</th>
                    <th>Hasil</th>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="perhitungan" class="form-control" value="<?= $perhitungan ?? "" ?>" readonly>
                        </div>
                    </td>
                    <td>
                        <div class="mb-3">
                            <input type="text" name="hasil" class="form-control" value="<?= $hasil ?? "" ?>" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="CI" class="btn btn-danger w-100">Jumlahkan</button>
                    </td>
                </tr>
        </form>
        </table>
    </div>
</body>