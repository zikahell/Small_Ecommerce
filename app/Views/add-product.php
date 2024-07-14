<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).on("submit", ".needs-validation", function(e) {
            e.preventDefault();
            var $request;
            $request = $.ajax({
                type: "post",
                url: "store",
                data: $(this).serialize(),
                dataType: "text",
                success: function(response) {
                    if (response === "SKU is already exist !" || response ===
                        "Please, provide the data of indicated type" || response ===
                        "Please, submit required data") {
                        alert(response)

                    } else {
                        $request.abort()
                        window.location.href = "<?php $url = (string) url('product');
                                                $url = str_replace('test.local', '', $url);
                                                echo $url;
                                                ?>"
                    }
                }
            });
        });
    </script>
    <style>
        .hidden {
            display: none;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <hr>
        <h1 class="my-4">Add Product</h1>

        <?php
        // $errors = [];
        // $sku = $name = $price = $productType = $size = $weight = $height = $width = $length = "";

        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     // Basic validation
        //     if (empty($_POST["sku"])) {
        //         $errors[] = "SKU is required";
        //     } else {
        //         $sku = test_input($_POST["sku"]);
        //     }
        //     if (empty($_POST["name"])) {
        //         $errors[] = "Name is required";
        //     } else {
        //         $name = test_input($_POST["name"]);
        //     }
        //     if (empty($_POST["price"]) or is_numeric($_POST["price"]) == false or $_POST["price"] <= 0) {
        //         $errors[] = "Valid price is required";
        //     } else {
        //         $price = test_input($_POST["price"]);
        //     }
        //     if (empty($_POST["productType"])) {
        //         $errors[] = "Product type is required";
        //     } else {
        //         $productType = test_input($_POST["productType"]);
        //         if ($productType == "DVD") {
        //             if (empty($_POST["size"]) || !is_numeric($_POST["size"]) || $_POST["size"] <= 0) {
        //                 $errors[] = "Valid size is required";
        //             } else {
        //                 $size = test_input($_POST["size"]);
        //             }
        //         } elseif ($productType == "Book") {
        //             if (empty($_POST["weight"]) || !is_numeric($_POST["weight"]) || $_POST["weight"] <= 0) {
        //                 $errors[] = "Valid weight is required";
        //             } else {
        //                 $weight = test_input($_POST["weight"]);
        //             }
        //         } elseif ($productType == "Furniture") {
        //             if (
        //                 empty($_POST["height"]) || !is_numeric($_POST["height"]) || $_POST["height"] <= 0 ||
        //                 empty($_POST["width"]) || !is_numeric($_POST["width"]) || $_POST["width"] <= 0 ||
        //                 empty($_POST["length"]) || !is_numeric($_POST["length"]) || $_POST["length"] <= 0
        //             ) {
        //                 $errors[] = "Valid dimensions are required";
        //             } else {
        //                 $height = test_input($_POST["height"]);
        //                 $width = test_input($_POST["width"]);
        //                 $length = test_input($_POST["length"]);
        //             }
        //         }
        //     }

        //     // SKU uniqueness check (dummy check, replace with actual database or storage check)
        //     if ($sku == "existingSKU") {
        //         $errors[] = "SKU must be unique";
        //     }

        //     // If no errors, process the form (save to database or storage)
        //     if (empty($errors)) {
        //         // Save product to storage (for example, save to a database)
        //         // ...

        //         // Redirect to product list page
        //         header("Location: product-list.php");
        //         exit;
        //     }
        // }

        // function test_input($data)
        // {
        //     $data = trim($data);
        //     $data = stripslashes($data);
        //     $data = htmlspecialchars($data);
        //     return $data;
        // }
        ?>



        <form method="post" action="" class="needs-validation" novalidate>
            <hr>
            <div class="d-flex justify-content-end align-items-center mb-3">
                <button class="btn btn-info" type="submit" name="submit" style="margin-right: 10px;">Save</button>
                <a href="<?php url('product') ?>" class="btn btn-danger">Cancel</a>
            </div>
            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" class="form-control" id="#sku" name="sku" value="<?php echo $sku; ?>" required>
                <div class="invalid-feedback">SKU is required</div>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="#name" name="name" value="<?php echo $name; ?>" required>
                <div class="invalid-feedback">Name is required</div>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="#price" name="price" value="<?php echo $price; ?>" required>
                <div class="invalid-feedback">Valid price is required</div>
            </div>

            <div class="form-group">
                <label for="productType">Product Type:</label>
                <select class="form-control" id="#productType" name="productType" required>
                    <option value="" disabled selected>Select type</option>
                    <option id="#DVD" <?php if ($productType == "DVD") echo "selected"; ?> required>DVD</option>
                    <option id="#Book" <?php if ($productType == "Book") echo "selected"; ?>required>Book</option>
                    <option id="#Furniture" <?php if ($productType == "Furniture") echo "selected"; ?>required>
                        Furniture
                    </option>
                </select>
                <div class="invalid-feedback">Product type is required</div>
            </div>

            <div id="type-specific">
                <div id="size-section" class="form-group hidden">
                    <label for="size">Size (MB):</label>
                    <input type="text" class="form-control" id="#size" <?php if ($productType == "DVD") echo "required"; ?> name="size" value="<?php echo $size; ?>">
                    <div class="invalid-feedback">Valid size is required</div>
                    <small class="form-text text-muted">Please, provide size</small>
                </div>
                <div id="weight-section" class="form-group hidden">
                    <label for="weight">Weight (Kg):</label>
                    <input type="text" class="form-control" id="#weight" <?php if ($productType == "Book") echo "required"; ?> name="weight" value="<?php echo $weight; ?>">
                    <div class="invalid-feedback">Valid weight is required</div>
                    <small class="form-text text-muted">Please, provide weight</small>
                </div>
                <div id="dimensions-section" class="hidden">
                    <div class="form-group">
                        <label for="height">Height (cm):</label>
                        <input type="text" class="form-control" id="#height" <?php if ($productType == "Furniture") echo "required"; ?> name="height" value="<?php echo $height; ?>">
                        <div class="invalid-feedback">Valid height is required</div>
                    </div>
                    <div class="form-group">
                        <label for="width">Width (cm):</label>
                        <input type="text" class="form-control" id="#width" <?php if ($productType == "Furniture") echo "required"; ?> name="width" value="<?php echo $width; ?>">
                        <div class="invalid-feedback">Valid width is required</div>
                    </div>
                    <div class="form-group">
                        <label for="length">Length (cm):</label>
                        <input type="text" class="form-control" id="#length" <?php if ($productType == "Furniture") echo "required"; ?> name="length" value="<?php echo $length; ?>">
                        <div class="invalid-feedback">Valid length is required</div>
                    </div>
                    <small class="form-text text-muted">Please, provide dimensions</small>
                </div>
            </div><br>


        </form>
    </div>



    <script>
        const productType = document.getElementById('#productType');
        const sizeSection = document.getElementById('size-section');
        const weightSection = document.getElementById('weight-section');
        const dimensionsSection = document.getElementById('dimensions-section');

        function updateProductType() {
            sizeSection.classList.add('hidden');
            weightSection.classList.add('hidden');
            dimensionsSection.classList.add('hidden');

            if (productType.value === 'DVD') {
                sizeSection.classList.remove('hidden');
            } else if (productType.value === 'Book') {
                weightSection.classList.remove('hidden');
            } else if (productType.value === 'Furniture') {
                dimensionsSection.classList.remove('hidden');
            }
        }

        productType.addEventListener('change', updateProductType);

        // Initialize the form based on the current selection
        updateProductType();
        // (function() {
        //     'use strict';
        //     window.addEventListener('load', function() {
        //         var forms = document.getElementsByClassName('needs-validation');
        //         var validation = Array.prototype.filter.call(forms, function(form) {
        //             form.addEventListener('submit', function(event) {
        //                 if (form.checkValidity() === false) {
        //                     event.preventDefault();
        //                     event.stopPropagation();
        //                 }
        //                 form.classList.add('was-validated');
        //             }, false);
        //         });
        //     }, false);
        // })();
    </script>
</body>

</html>