CREATE TABLE cars (
    id INT PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(255) NOT NULL,
    license_plate VARCHAR(255) NOT NULL UNIQUE,
    price_per_day DECIMAL(10, 2) NOT NULL,
    is_available BOOLEAN DEFAULT TRUE,
    image VARCHAR(255)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(255) NOT NULL,
    address TEXT,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin') DEFAULT 'customer'
);

CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT NOT NULL,
    car_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending',
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id),
    FOREIGN KEY (car_id) REFERENCES cars(id)
);

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `color`, `license_plate`, `price_per_day`, `is_available`, `image`) VALUES
(1, 'Toyota', 'Camry', 2022, 'Silver', 'B 1234 ABC', 50.00, 1, 'https://img.carmudi.co.id/2018/01/24/316x208/toyota-camry-2-5-v-at-285641.jpg'),
(2, 'Honda', 'Civic', 2023, 'Black', 'B 5678 DEF', 60.00, 1, 'https://img.carmudi.co.id/2023/10/24/316x208/honda-civic-rs-at-3277021.jpg'),
(3, 'Suzuki', 'Ertiga', 2021, 'White', 'B 9101 GHI', 45.00, 0, 'https://img.carmudi.co.id/2018/06/15/316x208/suzuki-ertiga-gx-at-576483.jpg');

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `role`) VALUES
(1, 'Admin', 'User', 'admin@example.com', '123456789', 'password', 'admin');
