<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .card {
            background-color: #fff;
            border: 1px solid black;
            width: 200px;
            height: 200px;
            padding: 10px;
            position: relative;
            margin-left: 20px;
            /* Added for checkbox positioning */
        }

        .delete-checkbox {
            position: absolute;
            top: 5px;
            left: 5px;

        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            margin-left: 20px;
        }

        .card-text {
            font-size: 14px;
            margin-bottom: 0;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Product List</h2>
        <div class="d-flex justify-content-end align-items-center mb-3">
            <button type="button" class="btn btn-primary " style="margin-right: 10px;">ADD</button>
            <button type="button" class="btn btn-danger " style="margin-right: 10px;" id="delete-product-btn">MASS
                DELETE</button>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <input type="checkbox" class="delete-checkbox">
                    <h5 class="card-title">JVC200123</h5>
                    <p class="card-text">Acme DISC</p>
                    <p class="card-text">$1.00</p>
                    <p class="card-text">Size: 700 MB</p>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <input type="checkbox" class="delete-checkbox">
                    <h5 class="card-title">TR120555</h5>
                    <p class="card-text">Chair</p>
                    <p class="card-text">$40.00</p>
                    <p class="card-text">Dimension: 24x45x15</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>