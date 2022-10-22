INSERT INTO users
SELECT customerNumber, contactLastName, customerName
FROM customers

INSERT INTO users
SELECT customerNumber, contactLastName, customerName
FROM customers

ALTER TABLE users
ADD isAdmin Boolean DEFAULT false;

ALTER TABLE users
ADD isAdmin Boolean DEFAULT false;