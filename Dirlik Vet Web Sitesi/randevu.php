<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style2.Css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Randevu</title>
</head>
<body>
<div id="Genel">
        <div id="Menü">
            
            <div id="Başlık" class="Başlıkk">
                <a href="index.php" class="baş">Anasayfa</a>
                <a href="index.php" class="baş">Hizmetlerimiz</a>
                <a href="index.php" class="baş">Personel</a>
                <a href="index.php" class="baş">Videolar</a>
                <a href="index.php" class="baş">Hakkımızda</a>
                <a href="randevu.php" class="baş">Randevu</a>
                <a href="index.php" class="baş">İletişim</a>
            </div>
        </div>
        <div class="container mt-5">
            <h2 class="text-center">Randevu Al</h2>
            <form action="veriTabani.php" method="post">
                <div class="mb-3">
                    <label for="isim" class="form-label" >Ad Soyad:</label>
                    <input type="text" class="form-control" id="isim" name="isim" placeholder="Ad Soyad - ( ... ) içinde evcil hayvanınızın ismi" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-posta:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telefon" class="form-label">Telefon:</label>
                    <input type="text" class="form-control" id="telefon" name="telefon">
                </div>
                <div class="mb-3">
                    <label for="tarih" class="form-label">Tarih:</label>
                    <input type="date" class="form-control" id="tarih" name="tarih" required>
                </div>
                <div class="mb-3">
                    <label for="saat" class="form-label">Saat:</label>
                    <input type="time" class="form-control" id="saat" name="saat" required>
                </div>
                <div class="mb-3">
                    <label for="mesaj" class="form-label">Evcil Hayvan Türü:</label>
                    <textarea class="form-control" id="mesaj" name="mesaj"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    
        

       
    <script src="script.js"></script>
</div>
<?php
$host = 'localhost';
$dbname = 'RandevuSistemi';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isim = $_POST['isim'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $tarih = $_POST['tarih'];
    $saat = $_POST['saat'];
    $evcilHayvanTuru = $_POST['mesaj'];


    try {
        $sql = "INSERT INTO randevular (isim, email, telefon, tarih, saat, evcilHayvanTuru) 
                VALUES (:isim, :email, :telefon, :tarih, :saat, :evcilHayvanTuru)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':isim' => $isim,
            ':email' => $email,
            ':telefon' => $telefon,
            ':tarih' => $tarih,
            ':saat' => $saat,
            ':evcilHayvanTuru' => $evcilHayvanTuru,
        ]);
        echo "Randevu başarıyla kaydedildi!";
    } catch (PDOException $e) {
        echo "Randevu kaydedilirken bir hata oluştu: " . $e->getMessage();
    }
}






?>

 
</body>
</html>