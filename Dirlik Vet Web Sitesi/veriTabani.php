<?php
// Veritabanı bağlantısı
$host = 'localhost';
$dbname = 'randevusistemi';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}

// Form verilerinin alınması
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isim = $_POST['isim'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $tarih = $_POST['tarih'];
    $saat = $_POST['saat'];
    $mesaj = $_POST['mesaj']; // Hayvan türü buraya gelecek

    try {
        // SQL sorgusu
        $sql = "INSERT INTO randevular (isim, email, telefon, tarih, saat, mesaj) 
                VALUES (:isim, :email, :telefon, :tarih, :saat, :mesaj)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':isim' => $isim,
            ':email' => $email,
            ':telefon' => $telefon,
            ':tarih' => $tarih,
            ':saat' => $saat,
            ':mesaj' => $mesaj, // Mesaj sütununa kaydedilir
        ]);

        // Başarılı işlemden sonra yönlendirme
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        echo "Randevu kaydedilirken bir hata oluştu: " . $e->getMessage();
    }
}
?>
