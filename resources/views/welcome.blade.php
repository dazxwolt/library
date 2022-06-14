<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторы книг</title>
    <style>
        td:nth-child(5),td:nth-child(6){text-align:center;}
        table{border-spacing: 0;border-collapse: collapse;}
        td, th{padding: 10px;border: 1px solid black;}
    </style>
</head>
<body>
<?php
$db_server='library';
$db_name='library';
$db_user='root';
$db_password='root';

try {

$db = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id, author_id, book_id FROM author_books";
$statement = $db->prepare($sql);
$statement->execute();
$result_array = $statement->fetchAll();
echo "<table><tr><th>ID</th><th>Автор ID</th><th>Книга ID</th></tr>";
foreach ($result_array as $result_row) {
    echo "<tr>";
    echo "<td>" . $result_row["id"]  . "</td>";
    echo "<td>" . $result_row["author_id"]    . "</td>";
    echo "<td>" . $result_row["book_id"]   . "</td>";
    echo "</tr>";
}
echo "</table>"; 
}
 
catch(PDOException $e) {
    echo "Ошибка при создании записи в базе данных: " . $e->getMessage();
}
 
$db = null;
?> 
</body>
</html>