<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bilangan Genap</title>
</head>
<body>
    <div class="menu">
        <?php include 'menu.php'; ?>
        <hr>
    </div>
    <h2>Program Bilangan Genap</h2>

    <form action="" method="post">
        <label>Batas awal:
            <input type="number" name="awal" min="1">
        </label>
        <br><br>
        <label>Batas akhir:
            <input type="number" name="akhir" min="1">
        </label>
        <br><br>
        <input type="submit" value="Tampilkan">
    </form>

    <hr>

    <?php
    if (isset($_POST['awal']) && isset($_POST['akhir'])) {
        $awal  = (int) $_POST['awal'];
        $akhir = (int) $_POST['akhir'];

        echo "<p>Bilangan genap dari {$awal} sampai {$akhir}:</p>";

        for ($i = $awal; $i <= $akhir; $i++) {
            if ($i % 2 == 0) {
                echo $i . "<br>";
            }
        }
    }
    ?>
</body>
</html>