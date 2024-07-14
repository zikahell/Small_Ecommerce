<?php


class ProductController extends ValidatorController
{
    public function index()
    {
        $book = new Book();
        $dvd = new DVD();
        $furniture = new Furniture();
        $data['products'] = $book->getAllProducts();
        $data['books'] = $book->getBooks();
        $data['dvds'] = $dvd->getDvds();
        $data['furnitures'] = $furniture->getFurniture();
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
            echo "Please, submit required data";
            die();
        } elseif (!$this->validateString($sku) || !$this->validateString($name)  || !$this->validateString($productType)) {
            echo "Please, provide the data of indicated type";
            die();
        }
        //store
        if ($productType == 'Book') {
            if (empty($this->testInput($_POST['weight']))) {
                echo "Please, submit required data";
                die();
            }
            $weight = (int) $this->testInput($_POST['weight']);
            if (!$this->validateNumber($weight) || !$this->validateNumber($price)) {
                echo "Please, provide the data of indicated type";
                die();
            }
            $book = new Book();
            $dataProduct = array("sku" => $sku, "name" => $name, "price" => $price, "product_type" => $productType);
            $dataBook = array("product_id" => $sku, "weight_kg" => $weight);
            if (!$book->store($dataProduct)) {
                echo "SKU is already exist !";
                die();
            }
            $book->storeBook('books', $dataBook);
        } elseif ($productType == 'DVD') {
            if (empty($this->testInput($_POST['size']))) {
                echo "Please, submit required data";
                die();
            }
            $size = (int) $this->testInput($_POST['size']);
            if (!$this->validateNumber($size) || !$this->validateNumber($price)) {
                echo "Please, provide the data of indicated type";
                die();
            }
            $dvd = new DVD();
            $dataProduct = array("sku" => $sku, "name" => $name, "price" => $price, "product_type" => $productType);
            $dataDvd = array("product_id" => $sku, "size_mb" => $size);
            if (!$dvd->store($dataProduct)) {
                echo "SKU is already exist !";
                die();
            }
            $dvd->storeDvd('dvds', $dataDvd);
        } else {
            if (empty($this->testInput($_POST['length'])) || empty($this->testInput($_POST['width'])) || empty($this->testInput($_POST['height']))) {
                echo "Please, submit required data";
                die();
            }
            $length = (int) $this->testInput($_POST['length']);
            $width = (int) $this->testInput($_POST['width']);
            $height = (int) $this->testInput($_POST['height']);
            if (!$this->validateNumber($length) || !$this->validateNumber($width) || !$this->validateNumber($height) || !$this->validateNumber($price)) {
                echo "Please, provide the data of indicated type";
                die();
            }
            $furniture = new Furniture();
            $dataProduct = array("sku" => $sku, "name" => $name, "price" => $price, "product_type" => $productType);
            $dataFurniture = array("product_id" => $sku, "length_cm" => $length, "width_cm" => $width, "height_cm" => $height);
            if (!$furniture->store($dataProduct)) {
                echo "SKU is already exist !";
                die();
            }
            $furniture->storeFurniture('furniture', $dataFurniture);
        }
    }
    public function delete()
    {
        if (isset($_POST['submit'])) {
            $book = new Book();
            $selected = $_POST['selected'];
            for ($i = 0; $i < count($_POST['selected']); $i++) {
                $book->deleteProduct(trim($selected[$i]));
            }

            header('Location:' . BURL);
        }
    }
}