<html lang="EN">
    <!-- WEB APPLICATION DEVELOPMENT 1 -->
    <!-- PRACTICAL EXAM -->
    <!-- UY - 20000472810 -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ECommerce Product Management</title>
<link rel="stylesheet" href="../CSS/Styles.css" type="text/css">
</head>
<body>
    <header class="Homebtn"><a href="../Index.php">🏠︎Home</a></header>
    <?php
    include '../Database/ManagementDB.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $P_ID = $_POST['ProductID'];

        try {
            // CONNECTING TO DATABASE
            $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $line = $db->prepare("SELECT * FROM products WHERE ProductID = :ProductID");
            $line->bindParam(':ProductID', $P_ID);
            $line->execute();
            $result = $line->fetch();

            // RESULT WHEN SPECIFIC ID IS FETCHED AND IS READY FOR MODIFICATION
            if ($result) {
                $PName = isset($_POST["ProductName"]) && $_POST["ProductName"] !== "" ? $_POST["ProductName"] : $result["ProductName"];
                $PDesc = isset($_POST["ProductDescription"]) && $_POST["ProductDescription"] !== "" ? $_POST["ProductDescription"] : $result["ProductDescription"];
                $Price = isset($_POST["ProductPrice"]) && $_POST["ProductPrice"] !== "" ? $_POST["ProductPrice"] : $result["ProductPrice"];

                $udline = $db->prepare("UPDATE products SET ProductName=:ProductName, ProductDescription=:ProductDescription, Price=:Price WHERE ProductID = :ProductID");
                $udline->execute(array(
                    ':ProductName' => $PName,
                    ':ProductDescription' => $PDesc,
                    ':Price' => $Price,
                    ':ProductID' => $P_ID
                ));
                echo 'Product Updated Successfully!';
            } else {
                echo 'Product does not exist. Please check the Product ID and try again.';
            }
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
        $db = null;
    }
    ?>
</body>
</html>