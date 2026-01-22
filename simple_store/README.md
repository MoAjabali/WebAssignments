# Simple Store

A minimal PHP-based simple store application for managing customers, products and orders. Intended to run on a local XAMPP (Apache) setup or with the built-in PHP server for quick testing.

## Features

- Add and list customers
- Add and list products
- Create and list orders

## Prerequisites

- PHP 7.4+ (or compatible)
- XAMPP (recommended) or another Apache + PHP stack
- A web browser

## Installation

1. Place the project inside your web server document root. Example for XAMPP:

```powershell

# If your project folder is not already in htdocs, copy it:
Copy-Item -Path "C:\path\to\your\project\simple_store" -Destination "C:\xampp\htdocs\simple_store" -Recurse
```

2. Start Apache (and MySQL if needed) using the XAMPP Control Panel.

3. In your browser, open:

```
http://localhost/simple_store
```

Alternative (built-in PHP server for quick testing):

```powershell
# From the project root (where index.php is located):
php -S localhost:8000
# Then open http://localhost:8000 in your browser
```

## Project Structure

- `index.php` — Application entry page.
- `classes/` — Core PHP classes:
  - `Customer.php` — Customer model/logic
  - `Product.php` — Product model/logic
  - `Order.php` — Order model/logic
  - `StoreManager.php` — App helper / manager
- `views/` — HTML/PHP views:
  - `header.php`, `footer.php` — Layout
  - `customers.php`, `products.php`, `orders.php` — Listing pages
  - `add_customer.php`, `add_product.php`, `create_order.php` — Forms for adding data
- `css/style.css` — Stylesheet

Adjust paths or filenames if you rename or restructure the project.

## Usage

- Open the app in your browser and use the navigation links to add customers, add products, and create orders.
- The views are plain PHP; you can modify them to connect to a database or change UI behavior.

## Notes / Next Steps

- This project appears to be a simple learning/demo app. If you want persistent storage, add database connection logic (MySQL) and update the classes to perform CRUD operations.
- Consider adding a `config.php` for database credentials and central configuration.

## Contributing

- Send improvements or bug fixes as patches. Keep changes focused and consistent with the existing simple structure.

## License

Add a license file (e.g., `LICENSE`) if you plan to open-source this project.

---

If you'd like, I can:

- Add a `README` section describing database setup and sample SQL schema.
- Create a `config.php` template and wire it into the classes.
- Add a simple SQLite or MySQL example to persist customers/products/orders.

Tell me which of these you'd like next.
