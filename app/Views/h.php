<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }

    header {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        background: #333;
        color: #fff;
    }

    header h1 {
        margin: 0;
    }

    header .btn {
        background: #fff;
        color: #333;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    form {
        background: #fff;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form input[type="text"],
    form input[type="number"],
    form select {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    .description {
        margin-bottom: 10px;
    }

    .special-attribute {
        margin-top: 20px;
        padding: 10px;
        background: #f9f9f9;
        border: 1px solid #ddd;
    }

    .btn-group {
        display: flex;
        justify-content: flex-end;
    }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Product Add</h1>
            <div>
                <button class="btn">Save</button>
                <button class="btn">Cancel</button>
            </div>
        </header>

        <form id="product_form" method="POST" action="">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" required>

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="price">Price ($)</label>
            <input type="number" id="price" name="price" required>

            <label for="productType">Type Switcher</label>
            <select id="productType" name="productType" onchange="this.form.submit()">
                <option value="" disabled selected>Select type</option>
                <option value="DVD"
                    <?= (isset($_POST['productType']) && $_POST['productType'] == 'DVD') ? 'selected' : '' ?>>DVD
                </option>
                <option value="Furniture"
                    <?= (isset($_POST['productType']) && $_POST['productType'] == 'Furniture') ? 'selected' : '' ?>>
                    Furniture</option>
                <option value="Book" <?= 'selected'  ?>>Book
                </option>
            </select>

            <div id="dynamic-form" class="special-attribute">
                <?php
                if (isset($_POST['productType'])) {
                    switch ($_POST['productType']) {
                        case 'DVD':
                            echo '
                                    <label for="size">Size (MB)</label>
                                    <input type="number" id="size" name="size" required>
                                    <p class="description">"Product description"</p>
                                ';
                            break;
                        case 'Furniture':
                            echo '
                                    <label for="height">Height (CM)</label>
                                    <input type="number" id="height" name="height" required>
                                    
                                    <label for="width">Width (CM)</label>
                                    <input type="number" id="width" name="width" required>
                                    
                                    <label for="length">Length (CM)</label>
                                    <input type="number" id="length" name="length" required>
                                    <p class="description">"Product description"</p>
                                ';
                            break;
                        case 'Book':
                            echo '
                                    <label for="weight">Weight (KG)</label>
                                    <input type="number" id="weight" name="weight" required>
                                    <p class="description">"Product description"</p>
                                ';
                            break;
                    }
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>