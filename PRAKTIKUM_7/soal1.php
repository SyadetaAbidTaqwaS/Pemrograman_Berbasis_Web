<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jenis Kendaraan Berdasarkan Banyaknya Roda</title>
</head>
<body>    
    <div class="menu">
        <?php include 'menu.php'; ?>
    </div>

    <h2>Program Pendeteksi Kendaraan</h2>

    <form action="" method="post">
        <label>Jumlah Roda:
            <input type="number" name="roda" min="1">
        </label>
        <input type="submit" value="Cek">
    </form>

    <hr>

    <?php
    if (isset($_POST['roda'])) {
        $jroda = (int) $_POST['roda'];

        switch ($jroda) {
            case 2:
                echo "Motor";
                break;
            
            case 3:
                echo "Becak";
                break;

            case 4:
                echo "Mobil";
                break;

            case 6:
                echo "Truk";
                break;

            case 8:
                echo "Tronton";
                break;

            default:
                echo "Tidak ada kendaraan dengan {$jroda} roda";
        }
    }
    ?>
</body>
</html>