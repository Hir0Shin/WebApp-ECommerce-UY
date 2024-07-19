<!-- WEB APPLICATION DEVELOPMENT 1 -->
<!-- PRACTICAL EXAM -->
<!-- UY - 20000472810 -->

<?php
include './Database/ManagementDB.php';

try {
    // CONNECTING TO DATABASE
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $line = $db->prepare("SELECT * FROM products");
    $line->execute();

    // SHOWING EXISTING DATA FROM DATABASE
    $showA = $line->fetchAll();
    foreach ($showA as $show) {
        echo "<tr>";
        echo "<td>" . $show["ProductID"] ."</td>";
        echo "<td>" . $show["ProductName"] ."</td>";
        echo "<td>" . $show["ProductDescription"] ."</td>";
        echo "<td>₱" . $show["Price"] ."</td>";
        echo "<tr>";
    }
} catch (PDOException $e) {
    echo "Error: ". $e->getMessage();
}
?>