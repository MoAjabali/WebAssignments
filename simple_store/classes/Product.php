<?php
class Product {
    public $id;
    public $name;
    public $price;
    public $stock;
    public $discount;

    public function __construct($id, $name, $price, $stock, $discount = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->discount = $discount;
    }

    public function getFinalPrice() {
        return $this->price - ($this->price * ($this->discount / 100));
    }
}
?>
