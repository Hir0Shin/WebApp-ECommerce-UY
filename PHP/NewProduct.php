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
        function newProduct() {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                echo '<div>';
                if (isset($_POST['ProductName']) && isset($_POST['ProductDescription']) && isset($_POST['ProductPrice'])) {
                    $ProductName = htmlspecialchars($_POST['ProductName']);
                    $ProductDescription = htmlspecialchars($_POST['ProductDescription']);
                    $Price = htmlspecialchars($_POST['ProductPrice']);
                    productToDB($ProductName, $ProductDescription, $Price);
                    displayProductDetails($ProductName, $ProductDescription, $Price);
                } else {
                    echo '<p>Missing product details. Please fill out all fields.</p>';
                }
                echo '</div>';
            }
        }
        function displayProductDetails($ProductName, $ProductDescription, $Price) {
            echo '<table>';
            echo '<tr><th>Product Name</th><td>' . htmlspecialchars($ProductName). '</td></tr>';
            echo '<tr><th>Product Description</th><td>' . htmlspecialchars($ProductDescription) . '</td></tr>';
            echo '<tr><th>Product Price</th><td>' . '₱' . htmlspecialchars($Price) . '</td></tr>';
            echo '</table>';
        }
        newProduct();
        function productToDB($ProductName, $ProductDescription, $Price) {
            SESSION_START();
            $db_host = 'localhost';
            $db_name = 'productmgmt';
            $db_username = 'root';
            $db_password = 'shinlocal';

            try {
                $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $line = $db->prepare("INSERT INTO products (ProductName, ProductDescription, Price) 
                    VALUES (:ProductName, :ProductDescription, :Price)");
                
                $line->bindParam(':ProductName', $ProductName);
                $line->bindParam(':ProductDescription', $ProductDescription);
                $line->bindParam(':Price', $Price);
                $line ->execute();

                echo '<br/>Product Created and Inserted to Database Successfully!';
            } catch (PDOException $e) {
                echo 'Error: '. $e->getMessage();
            }
        }
    $db = null;
    ?>
    <br>
</body>
</html>