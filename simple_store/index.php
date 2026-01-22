<?php
require_once 'classes/StoreManager.php';

// بدء الجلسة لتخزين البيانات مؤقتاً (محاكاة لقاعدة البيانات)
session_start();

if (!isset($_SESSION['store'])) {
    $_SESSION['store'] = new StoreManager();
}

$store = $_SESSION['store'];
$page = isset($_GET['page']) ? $_GET['page'] : 'products';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// معالجة الإجراءات (Actions)
if ($action == 'save_order' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerId = $_POST['customer_id'];
    $selectedProducts = isset($_POST['products']) ? $_POST['products'] : [];
    $quantities = $_POST['qty'];
    
    $orderData = [];
    foreach ($selectedProducts as $pId => $val) {
        $orderData[$pId] = $quantities[$pId];
    }
    
    if (!empty($orderData)) {
        $store->createOrder($customerId, $orderData);
        header("Location: index.php?page=orders");
        exit();
    }
} elseif ($action == 'store_product' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
    
    $store->addProduct($name, $price, $stock, $discount);
    header("Location: index.php?page=products");
    exit();
} elseif ($action == 'store_customer' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $store->addCustomer($name, $email);
    header("Location: index.php?page=customers");
    exit();
}

// جلب البيانات للعرض
$products = $store->getProducts();
$customers = $store->getCustomers();
$orders = $store->getOrders();

// عرض الواجهات
include 'views/header.php';

switch ($page) {
    case 'products':
        include 'views/products.php';
        break;
    case 'orders':
        include 'views/orders.php';
        break;
    case 'customers':
        include 'views/customers.php';
        break;
    case 'create_order':
        include 'views/create_order.php';
        break;
    case 'add_product':
        include 'views/add_product.php';
        break;
    case 'add_customer':
        include 'views/add_customer.php';
        break;
    default:
        include 'views/products.php';
        break;
}

include 'views/footer.php';
?>
