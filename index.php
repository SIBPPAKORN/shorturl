<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "shorturl");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_error) {
    die("การเชื่อมต่อกับฐานข้อมูลล้มเหลว: " . $mysqli->connect_error);
}

// ฟังก์ชันสำหรับสร้าง short code
function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $long_url = $_POST["long_url"];
    $short_code = generateShortCode();

    // เพิ่มข้อมูล URL ลงในฐานข้อมูล
    $sql = "INSERT INTO urls (long_url, short_code) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $long_url, $short_code);

    if ($stmt->execute()) {
        $short_url = "http://sibpakorn.com/{$short_code}";
        echo "Short URL: <a href=\"$short_url\">$short_url</a>";
    } else {
        echo "เกิดข้อผิดพลาดในการสร้าง Short URL";
    }

    $stmt->close();
}

// ...

if (isset($_GET["code"])) {
    $code = $_GET["code"];

    // บันทึกข้อมูลสถิติการคลิก
    $sql = "INSERT INTO url_statistics (short_code) VALUES (?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $code);

    if ($stmt->execute()) {
        // ค้นหา URL จาก short code
        $sql = "SELECT long_url FROM urls WHERE short_code = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $code);

        if ($stmt->execute()) {
            $stmt->bind_result($long_url);
            if ($stmt->fetch()) {
                header("Location: $long_url");
                exit();
            } else {
                echo "Short URL ไม่พบ";
            }
        } else {
            echo "เกิดข้อผิดพลาดในการค้นหา Short URL";
        }
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลสถิติ";
    }

    $stmt->close();
}

// ...

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Short URL Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px #888888;
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>สร้าง Short URL</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="long_url">URL ที่คุณต้องการสร้าง Short URL:</label>
        <input type="text" name="long_url" id="long_url" required>
        <input type="submit" value="สร้าง Short URL" id="submitButton"> 
    </form>

    <script>
       
        var submitButton = document.getElementById("submitButton");
        submitButton.addEventListener("click", function() {
           
        });
    </script>
</body>
</html>
