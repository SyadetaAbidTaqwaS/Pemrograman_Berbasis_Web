<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Hewan</title>
</head>
<body>    
    <div class="menu">
        <?php include 'menu.php'?>
    </div>
    <form action="" method="post">
        <p>Masukan 5 Nama Hewan</p>
        <label>Hewan Ke-1
            <input type="text" name="hewan[]">
        </label><br>
        
        <label>Hewan Ke-2
            <input type="text" name="hewan[]">
        </label><br>
        
        <label>Hewan Ke-3
            <input type="text" name="hewan[]">
        </label><br>
        
        <label>Hewan Ke-4
            <input type="text" name="hewan[]">
        </label><br>
        
        <label>Hewan Ke-5
            <input type="text" name="hewan[]">
        </label><br>
        
        <input type="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['hewan'])) {
        $hewan = $_POST['hewan'];
        foreach ($hewan as $h) {
            echo $h . "<br>";
        }
    }
    ?>
</body>
</html>