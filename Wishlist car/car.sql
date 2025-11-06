CREATE DATABASE IF NOT EXISTS user_car_system;
USE user_car_system;

-- TABLE 1: users

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    dob DATE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    nationality VARCHAR(50),
    phonenumber VARCHAR(20)
);

-- TABLE 2: cars

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    color VARCHAR(50),
    brand VARCHAR(50),
    price DECIMAL(12,2),
    year INT,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Sample data (optional)

INSERT INTO users (username, dob, password, email, nationality, phonenumber)
VALUES 
('admin', '1990-01-01', '123456', 'admin@example.com', 'Vietnam', '0123456789'),
('john', '1995-05-15', 'password123', 'john@gmail.com', 'USA', '0987654321');

INSERT INTO cars (name, color, brand, price, year, user_id)
VALUES
('Toyota Camry', 'White', 'Toyota', 750000.00, 2020, 1),
('Honda Civic', 'Black', 'Honda', 680000.00, 2019, 2);
