<!DOCTYPE html>
<html lang="EN">
    <!-- WEB APPLICATION DEVELOPMENT 1 -->
    <!-- PRACTICAL EXAM -->
    <!-- UY - 20000472810 -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ECommerce Product Management</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./Javascript/Navigation.js"></script>
<link rel="stylesheet" href="./CSS/Styles.css" type="text/css">
</head>
<body>
<header>
<h1>PRODUCT MANAGEMENT</h1>
<nav>
    <ul>
        <li><a href="#Products" class="active">Products</a></li>
        <li><a href="#New-Product">Add New</a></li>
        <li><a href="#Edit-Product">Edit</a></li>
        <li><a href="#Del-Product">Delete</a></li>
    </ul>
</nav>
</header>
<main>
    <section id="Products" class="show">
    <table>
        <caption>Products</caption>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>   
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php include './PHP/Products.php'?>
    </table>
    </section>
    <section id="New-Product" class="hidden">
        <div class="container">
        <h1>CREATE NEW PRODUCT</h1>
        <form action="./PHP/NewProduct.php" method="POST">
            <label>Product Name:</label><input type="text" class="textinput" name="ProductName" id="ProductName">
            <label>Product Description:</label><textarea class="textinput" name="ProductDescription" id="ProductDescription" rows="3"></textarea>
            <label>Product Price</label><input type="number" class="numinput" name="ProductPrice" id="ProductPrice">
            <button type="submit">Add Product</button>
        </form>
        </div>
    </section>
    <section id="Edit-Product" class="hidden">
        <div class="container">
        <h1>EDIT PRODUCT</h1>
        <form action="./PHP/EditProduct.php" method="POST">
            <label>Product ID:</label><input type="number" class="numinput" name="ProductID" id="ProductID">
            <label>Product Name:</label><input type="text" class="textinput" name="ProductName" id="ProductName">
            <label>Product Description:</label><textarea class="textinput" name="ProductDescription" id="ProductDescription" rows="4"></textarea>
            <label>Product Price</label><input type="number" class="numinput" name="ProductPrice" id="ProductPrice">
            <button type="submit">Edit Product</button>
        </form>
        </div>
    </section>
    <section id="Del-Product" class="hidden">
        <div class="container">
        <h1>DELETE PRODUCT</h1>
        <form action="./PHP/Delete.php" method="POST">
            <p>Enter Product ID to Delete Specific Product</p>
            <label>Product ID:</label><input type="number" class="numinput" name="ProductID" id="ProductID">
            <button type="submit">Delete Product</button>
        </form>
        </div>
    </section>
</main>
</body>
</html>