<?php
require 'vendor/autoload.php'; // ใช้ autoloader ของ Composer

use Endroid\QrCode\QrCodel;

// รหัส short URL ที่คุณสร้าง
$shortUrl = "http://sibpakorn.com/{$short_code}"; 
// สร้าง QR code
$qrCode = new $QrCodel($short_Url);

// ตั้งค่าขนาดของ QR code
$qrCode->setSize(300);

// บันทึก QR code เป็นไฟล์ (หากต้องการ)
$qrCode->writeFile('qr_code.png');

// แสดง QR code ในหน้าเว็บ
header('Content-Type: ' . $qrCode->getContentType());
echo $qrCode->writeString();
?>
