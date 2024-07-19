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
    // SESSION WHEN MODIFYING ALREADY EXISTING DATA
    SESSION_START();
    include '../Database/ManagementDB.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["ProductID"]) && !empty($_POST["ProductID"])) {
            $P_ID = $_POST['ProductID'];

            try {
                // CONNECTING TO DATABASE
                $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // PREPARED STATEMENT
                $line = $db->prepare("DELETE FROM `products` WHERE ProductID = :ProductID");
                $line->bindParam(':ProductID', $P_ID);
                $line->execute();

                if ($line->rowCount() > 0) {
                    echo "Product with ID $P_ID has been deleted successfully.";
                    echo "<script>
                    alert('Order Deleted!');
                    </script>";
                } else {
                    echo "Product does not exist. Please check the Product ID and try again.";
                    echo "<script>
                        setTimeout(function() {
                        alert('No Product found. Please provide an existing ID!');
                        },100);
                    </script>";
                }
            } catch (PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
        } else {
            echo "Please provide the Product ID!";
        }
        $db = null;
    }
    ?>
</body>
</html>