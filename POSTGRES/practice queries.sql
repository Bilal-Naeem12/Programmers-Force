-- Drop tables if already exist
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS vehicles;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS employees;
DROP TABLE IF EXISTS wash_services;

-- Customers table
CREATE TABLE customers (
    customer_id SERIAL PRIMARY KEY,
    full_name VARCHAR(100),
    phone VARCHAR(15),
    email VARCHAR(100)
);

-- Vehicles table
CREATE TABLE vehicles (
    vehicle_id SERIAL PRIMARY KEY,
    customer_id INT REFERENCES customers(customer_id),
    license_plate VARCHAR(20) UNIQUE,
    model VARCHAR(50),
    make VARCHAR(50),
    year INT
);

-- Wash Services table
CREATE TABLE wash_services (
    service_id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    price DECIMAL(6,2),
    duration_minutes INT
);

-- Employees table
CREATE TABLE employees (
    employee_id SERIAL PRIMARY KEY,
    full_name VARCHAR(100),
    position VARCHAR(50),
    hire_date DATE
);

-- Appointments table
CREATE TABLE appointments (
    appointment_id SERIAL PRIMARY KEY,
    vehicle_id INT REFERENCES vehicles(vehicle_id),
    service_id INT REFERENCES wash_services(service_id),
    employee_id INT REFERENCES employees(employee_id),
    appointment_date TIMESTAMP,
    status VARCHAR(20)
);

-- Insert customers
INSERT INTO customers (full_name, phone, email) VALUES
('Ali Khan', '03121234567', 'ali@example.com'),
('Sara Ahmed', '03221234567', 'sara@example.com'),
('Bilal Tariq', '03331234567', 'bilal@example.com'),
('Zara Noor', '03441234567', 'zara@example.com');

-- Insert vehicles
INSERT INTO vehicles (customer_id, license_plate, model, make, year) VALUES
(1, 'ABC-123', 'Civic', 'Honda', 2018),
(1, 'XYZ-987', 'Corolla', 'Toyota', 2020),
(2, 'LMN-456', 'Swift', 'Suzuki', 2019),
(3, 'PQR-678', 'Sportage', 'Kia', 2021),
(4, 'DEF-111', 'Elantra', 'Hyundai', 2022);

-- Insert wash services
INSERT INTO wash_services (name, price, duration_minutes) VALUES
('Basic Wash', 500.00, 20),
('Premium Wash', 1000.00, 40),
('Interior Detailing', 1500.00, 60),
('Full Service', 2000.00, 90);

-- Insert employees
INSERT INTO employees (full_name, position, hire_date) VALUES
('Usman Javed', 'Technician', '2022-05-01'),
('Hamza Iqbal', 'Detailer', '2021-08-15'),
('Maria Zubair', 'Receptionist', '2023-01-10');

-- Insert appointments
INSERT INTO appointments (vehicle_id, service_id, employee_id, appointment_date, status) VALUES
(1, 1, 1, '2025-08-01 10:00:00', 'Completed'),
(2, 2, 2, '2025-08-01 11:00:00', 'Completed'),
(3, 3, 2, '2025-08-02 12:00:00', 'In Progress'),
(4, 4, 1, '2025-08-03 13:00:00', 'Scheduled'),
(5, 1, 1, '2025-08-03 14:30:00', 'Cancelled'),
(1, 2, 2, '2025-08-04 09:00:00', 'Completed'),
(3, 1, 1, '2025-08-04 10:30:00', 'Completed'),
(4, 3, 2, '2025-08-04 12:00:00', 'Scheduled');

-- Sample Queries to try:
-- SELECT * FROM appointments;
-- JOIN vehicles with customers
-- GET average price per service
-- GET appointments done by employee on a date
