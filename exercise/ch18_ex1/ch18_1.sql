-- select_products.sql --

SELECT productName, description, listPrice 
FROM products 
WHERE description LIKE '%electric%'
ORDER BY listPrice

-- insert_customer.sql --

INSERT INTO customers 
	(customerID, emailAddress, password, firstName, lastName, shipAddressID, billingAddressID) 
VALUES 
	(4, 'johnsmith@example.com', 'sesame', 'John', 'Smith', 7, 8)

-- update_customer.sql --

UPDATE customers
SET password = '5e5ame!'
WHERE emailAddress = 'johnsmith@example.com'

-- delete_customer.sql --

DELETE from customers
WHERE emailAddress='johnsmith@example.com'
