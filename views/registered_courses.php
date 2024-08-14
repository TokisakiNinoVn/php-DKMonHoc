<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['userID'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            padding: 5px 10px;
            border: 1px solid #007BFF;
            border-radius: 5px;
        }
        a:hover {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Registered Courses for <?php echo $_SESSION['name']; ?></h1>
    <table>
        <tr>
            <th>Môn học</th>
            <th>Tiền</th>
            <th>Thời gian đăng ký</th>
        </tr>
        <?php if (!empty($registrations)): ?>
            <?php foreach ($registrations as $registration): ?>
                <tr>
                    <td><?php echo $registration['courseName']; ?></td>
                    <td><?php echo $registration['credit']; ?></td>
                    <td><?php echo $registration['registrationDate']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Không có môn học nào được đăng ký.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="index.php?action=register">Đăng ký thêm môn học</a><br><br>
    <a href="index.php?action=logout">Đăng xuất</a>
</body>
</html>
