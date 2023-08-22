<!DOCTYPE html>
<html>
<head>
    <title>ประวัติการสร้าง Short URL</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>ประวัติการสร้าง Short URL</h1>
    <?php
    // ทำการเชื่อมต่อฐานข้อมูล MySQL ของคุณ โดยใช้ mysqli หรือ PDO
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "shorturl";

    // สร้างการเชื่อมต่อ
    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
    }

    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลประวัติการสร้าง Short URL
    $sql = "SELECT id, long_url, short_code, click_time FROM urls";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>URL ยาว</th><th>Short Code</th><th>วันที่สร้าง</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["long_url"] . "</td><td>" . $row["short_code"] . "</td><td>" . $row["click_time"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "ไม่พบข้อมูลประวัติการสร้าง Short URL";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    ?>
</body>
</html>
