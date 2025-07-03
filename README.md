# 🛍️ PHP Product Catalog

A simple PHP + MySQL CRUD application to manage products. Built as a mini e-commerce backend project.

## 🚀 Features

- Add new products with name, price, and description
- View all products in a list
- Edit product details
- Delete products
- Clean, minimal interface
- Built with core PHP and PDO

## 🛠️ Tech Stack

- PHP
- MySQL
- HTML/CSS (basic)
- PDO (secure DB connection)

## 📷 Screenshot
![Screenshot](screenshot.png)

## 🔧 How to Run

1. Place folder in `htdocs` (XAMPP)
2. Start Apache & MySQL
3. Create a DB `product_catalog` in phpMyAdmin
4. Run this SQL to create the table:

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
