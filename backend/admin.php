<?php include "./backend/adminController.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add Product</title>
</head>
<body>
    <header class="bg-dark text-white text-center py-3">
        <h1>Add a New Product</h1>
    </header>
    
    <section class="container mt-4">
        <form method="post">
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="title" class="form-control" id="productName" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" id="productPrice" placeholder="Enter product price" required>
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image URL</label>
                <input type="url" class="form-control" name="img" id="productImage" placeholder="Enter product image URL" required>
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </section>
</body>
</html>
