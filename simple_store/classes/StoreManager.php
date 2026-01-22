<?php
require_once 'Product.php';
require_once 'Customer.php';
require_once 'Order.php';

class StoreManager {
    private $products = [];
    private $customers = [];
    private $orders = [];

    public function __construct() {
        $this->products = [
            new Product(1, "هاتف ذكي", 1200, 10, 10),
            new Product(2, "سماعات لاسلكية", 150, 25, 5),
            new Product(3, "ساعة ذكية", 300, 15, 0),
            new Product(4, "شاحن سريع", 50, 50, 0)
        ];

        $this->customers = [
            new Customer(1, "أحمد علي", "ahmed@example.com", "2023-01-15"),
            new Customer(2, "سارة محمد", "sara@example.com", "2024-05-20")
        ];

        $order1 = new Order(101, "2024-01-20", "مكتمل");
        $order1->addItem($this->products[0], 1);
        $order1->addItem($this->products[1], 2);
        $this->orders[] = $order1;
    }

    public function getProducts() {
        return $this->products;
    }

    public function getCustomers() {
        return $this->customers;
    }

    public function getOrders() {
        return $this->orders;
    }

    public function createOrder($customerId, $productIdsWithQty) {
        $orderId = count($this->orders) + 101;
        $newOrder = new Order($orderId, date("Y-m-d"), "قيد المعالجة");
        
        foreach ($productIdsWithQty as $pId => $qty) {
            foreach ($this->products as $product) {
                if ($product->id == $pId) {
                    $newOrder->addItem($product, $qty);
                }
            }
        }
        $this->orders[] = $newOrder;
        return $newOrder;
    }

    public function addProduct($name, $price, $stock, $discount = 0) {
        $id = count($this->products) + 1;
        $newProduct = new Product($id, $name, $price, $stock, $discount);
        $this->products[] = $newProduct;
        return $newProduct;
    }

    public function addCustomer($name, $email, $joinDate = null) {
        $id = count($this->customers) + 1;
        if ($joinDate === null) {
            $joinDate = date("Y-m-d");
        }
        $newCustomer = new Customer($id, $name, $email, $joinDate);
        $this->customers[] = $newCustomer;
        return $newCustomer;
    }
}
?>
