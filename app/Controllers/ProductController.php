<?php


class ProductController extends ValidatorController
{
    public function index()
    {
        $emp = new Book();
        $data['employees'] = $emp->getAllProducts();

        View::load('products', $data);
    }

    public function add()
    {
        View::load('add-product');
    }
    public function store()
    {

        $sku = $this->testInput($_POST['sku']);
        $name = $this->testInput($_POST['name']);
        $price = (int) $this->testInput($_POST['price']);
        $productType = $this->testInput($_POST['productType']);
        //validation
        if (empty($sku) || empty($name)  || empty($productType)) {
            echo "Please, submit required data\n";
        } elseif (!$this->validateString($sku) || !$this->validateString($name)  || !$this->validateString($productType)) {
            echo "Please, provide the data of indicated type\n";
        }
        if ($productType == 'Book') {
            $weight = empty((int) $this->testInput($_POST['weight'])) ? 'Please, submit required data\n' : (int) $this->testInput($_POST['weight']);
            if (!$this->validateNumber($weight) || !$this->validateNumber($price)) {
                echo "Please, provide the data of indicated type\n";
            }
            $book = new Book();
            $dataProduct = array("sku" => $sku, "name" => $name, "price" => $price, "product_type" => $productType);
            $dataBook = ["product_id" => $sku, "weight_kg" => $weight];
            // if ($book->store('products', $dataProduct && $book->storeBook('books', $dataBook))) {
            //     echo 'created';
            // }
        } elseif ($productType == 'DVD') {
        } else {
        }
    }
}