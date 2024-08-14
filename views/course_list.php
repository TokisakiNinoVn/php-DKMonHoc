<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
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
        form {
            margin: 0;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
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
    <h1>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?></h1>
    <h2>Đăng ký môn học</h2>
    <table>
        <tr>
            <th>Môn học</th>
            <th>Tiền</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?php echo $course['courseName']; ?></td>
                <td><?php echo $course['credit']; ?></td>
                <td>
                    <form action="index.php?action=registerCourse" method="post">
                        <input type="hidden" name="courseID" value="<?php echo $course['courseID']; ?>">
                        <button type="submit">Đăng ký</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?action=showRegisteredCourses">View Registered Courses</a><br><br>
    <a href="index.php?action=logout">Logout</a>
</body>
</html>
