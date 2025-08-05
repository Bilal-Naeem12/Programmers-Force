SELECT * FROM appointments;
SELECT * FROM customers;
SELECT * FROM employees;
SELECT * FROM wash_services;
SELECT * FROM vehicles;


-- List employees who haven’t done any appointments yet.
SELECT e.full_name FROM employees e LEFT JOIN appointments a ON  a.employee_id = e.employee_id WHERE a.appointment_id IS NULL;



-- List all vehicles serviced by 'Usman Javed' after August 2nd, 2025.
SELECT (SELECT v.model FROM vehicles v  WHERE  v.vehicle_id = a.vehicle_id) AS VECHICLE ,employee_id  FROM appointments a  WHERE a.employee_id  =    (SELECT e.employee_id FROM employees e WHERE e.full_name LIKE 'Usman Javed' AND  a.appointment_date > '2025-8-2')



SELECT e.full_name, v.model  FROM appointments a JOIN employees e ON e.employee_id = a.employee_id
JOIN vehicles v ON v.vehicle_id = a.vehicle_id
WHERE e.full_name ILIKE 'Usman javed' AND  a.appointment_date > '2025-8-2';







SELECT service_id FROM wash_services WHERE (price/duration_minutes) = MAX((price/duration_minutes)) ;
