<?php
class Order {
    public $orderId;
    public $orderDate;
    public $status;
    public $items = []; // Array of products with quantity

    public function __construct($orderId, $orderDate, $status) {
        $this->orderId = $orderId;
        $this->orderDate = $orderDate;
        $this->status = $status;
    }

    public function addItem($product, $quantity) {
        $this->items[] = ['product' => $product, 'quantity' => $quantity];
    }

    public function getTotalAmount() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getFinalPrice() * $item['quantity'];
        }
        return $total;
    }
}
?>
