USE anjd16;

SET NAMES utf8;

-- --------------------------------------
-- Drop Tables
-- --------------------------------------

DROP TABLE IF EXISTS Cart;
DROP TABLE IF EXISTS `Order`;
DROP TABLE IF EXISTS StockoutLog;
DROP TABLE IF EXISTS Prod2Cat;
DROP TABLE IF EXISTS ProdCategory;
DROP TABLE IF EXISTS Product;

-- --------------------------------------
-- Create Tables
-- --------------------------------------

-- Product Tables

CREATE TABLE Product (
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    description VARCHAR(100),
    image VARCHAR(50),
    price INT,
    inventory INT(6)
);

--
CREATE TABLE ProdCategory (
	id INT AUTO_INCREMENT,
	category CHAR(20) UNIQUE,

	PRIMARY KEY (id)
);

CREATE TABLE Prod2Cat (
	id INT AUTO_INCREMENT,
	product_id INT,
	category_id INT,

	PRIMARY KEY (id),
    FOREIGN KEY (product_id) REFERENCES Product (id), 
    FOREIGN KEY (category_id) REFERENCES ProdCategory (id) 
);

-- Cart Table

CREATE TABLE Cart (
	id INT AUTO_INCREMENT,
	prod_id INT,
    quantity INT,
    customer INT,

	PRIMARY KEY (id),
    FOREIGN KEY (prod_id) REFERENCES Product (id)
);

-- StockoutLog Table

CREATE TABLE StockoutLog
(
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `when` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `product` INT,
    `name` VARCHAR(50),
    `inventory` INT,
    
    FOREIGN KEY (product) REFERENCES Product (id)
);

-- Order Table

CREATE TABLE `Order` (
	id INT AUTO_INCREMENT,
	order_number INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    customer INT,
	prod_id INT,
    quantity INT,

	PRIMARY KEY (id),
    FOREIGN KEY (prod_id) REFERENCES Product (id)
);

-- --------------------------------------
-- Drop Procedures
-- --------------------------------------

DROP PROCEDURE IF EXISTS addProduct;
DROP PROCEDURE IF EXISTS deleteProduct;
DROP PROCEDURE IF EXISTS updateProduct;
DROP PROCEDURE IF EXISTS addToCart;
DROP PROCEDURE IF EXISTS deleteFromCart;
DROP PROCEDURE IF EXISTS getCart;
DROP PROCEDURE IF EXISTS placeOrder;
DROP PROCEDURE IF EXISTS deleteOrder;
DROP PROCEDURE IF EXISTS getOrder;
DROP PROCEDURE IF EXISTS getStockoutLog;

-- --------------------------------------
-- Create Procedures
-- --------------------------------------

-- Procedure for adding product

DELIMITER //

CREATE PROCEDURE addProduct(
	title VARCHAR(50),
    description VARCHAR(100),
    image VARCHAR(50),
    price INT,
    inventory INT(6)
)
BEGIN
	INSERT INTO Product (title, description, image, price, inventory) VALUES (title, description, image, price, inventory);
END
//

DELIMITER ;

-- Procedure for deleting product

DELIMITER //

CREATE PROCEDURE deleteProduct(
    theId INT
)
BEGIN
	DELETE FROM Product WHERE id = theId;
END
//

DELIMITER ;

-- Procedure for updating product

DELIMITER //

CREATE PROCEDURE updateProduct(
	theId INT,
    title VARCHAR(50),
    description VARCHAR(100),
    image VARCHAR(50),
    price INT,
    inventory INT(6)
)
BEGIN
	UPDATE Product SET title=title, description=description, image=image, price=price, inventory=inventory WHERE id = theId;
END
//

DELIMITER ;

-- Procedure for adding product to cart

DELIMITER //

CREATE PROCEDURE addToCart(
	theID INT,
    customerID INT
)
BEGIN
	-- SELECT CountProduct(theID, customerID);
	IF CountProduct(theID, customerID) = 0 THEN
		INSERT INTO Cart (prod_id, quantity, customer) VALUES (theID, 1, customerID);
	ELSE
		UPDATE Cart SET quantity=Cart.quantity+1 WHERE prod_id = theID AND customer = customerID;
	END IF;
END
//

DELIMITER ;

-- Procedure for deleting product to cart

DELIMITER //

CREATE PROCEDURE deleteFromCart(
	theID INT,
    customerID INT
)
BEGIN
	IF CountQuantity(theID, customerID) = 1 THEN
		DELETE FROM Cart WHERE id = theID AND customer = customerID;
	ELSEIF CountQuantity(theID, customerID) > 1 THEN
		UPDATE Cart SET quantity=Cart.quantity-1 WHERE id = theID AND customer = customerID;
	END IF;
END
//

DELIMITER ;

-- Procedure for getting a cart

DELIMITER //

CREATE PROCEDURE getCart(
	customerID INT
)
BEGIN
    SELECT * FROM VCart WHERE customer = customerID;
END
//

DELIMITER ;

-- Procedure for placing an order

DELIMITER //

CREATE PROCEDURE placeOrder(
	customer INT
)
BEGIN
    START TRANSACTION;
    
	INSERT INTO `Order` (order_number, customer, prod_id, quantity) SELECT @order_number, customer, prod_id, quantity FROM VCart;
    
    UPDATE Product JOIN Cart ON Cart.prod_id = Product.id SET Product.inventory = Product.inventory - Cart.quantity;
    
    SET @order_number = @order_number + 1;
        
	COMMIT;
    
	DELETE FROM Cart;
END
//

DELIMITER ;

-- Procedure for deleting an order

DELIMITER //

CREATE PROCEDURE deleteOrder(
	number INT
)
BEGIN
    START TRANSACTION;
    
	DELETE FROM `Order` WHERE order_number = number;
        
	COMMIT;
END
//

DELIMITER ;

-- Procedure for getting an order

DELIMITER //

CREATE PROCEDURE getOrder(
	number INT
)
BEGIN
    SELECT * FROM VOrder WHERE order_number = number;
END
//

DELIMITER ;

-- Procedure for getting stockout log

DELIMITER //

CREATE PROCEDURE getStockoutLog()
BEGIN
    SELECT * FROM StockoutLog;
END
//

DELIMITER ;

-- --------------------------------------
-- Drop Functions
-- --------------------------------------

DROP FUNCTION IF EXISTS CountProduct;
DROP FUNCTION IF EXISTS CountQuantity;

-- --------------------------------------
-- Create Functions
-- --------------------------------------

DELIMITER //

CREATE FUNCTION CountProduct(
    theID INT,
    customerID INT
)
RETURNS INTEGER
DETERMINISTIC
BEGIN
    DECLARE count INT;
    SET count = 0;
    SELECT COUNT(prod_id) INTO count FROM Cart WHERE prod_id = theID AND customer = customerID;
    RETURN count;
END
//

DELIMITER ;

DELIMITER //

CREATE FUNCTION CountQuantity(
    theID INT,
    customerID INT
)
RETURNS INTEGER
DETERMINISTIC
BEGIN
    DECLARE count INT;
    SET count = 0;
    SELECT quantity INTO count FROM Cart WHERE id = theID AND customer = customerID;
    RETURN count;
END
//

DELIMITER ;

-- --------------------------------------
-- Drop Triggers
-- --------------------------------------

DROP TRIGGER IF EXISTS LogLowStock;

-- --------------------------------------
-- Create Triggers
-- --------------------------------------

DELIMITER //

CREATE TRIGGER LogLowStock
AFTER UPDATE
ON Product FOR EACH ROW BEGIN
	IF NEW.inventory < 5 THEN
		INSERT INTO StockoutLog (product, `name`, inventory) VALUES (NEW.id, NEW.title, NEW.inventory);
	END IF;
END
//
    
DELIMITER ;

-- --------------------------------------
-- Drop Views
-- --------------------------------------

DROP VIEW IF EXISTS VCart;
DROP VIEW IF EXISTS VOrder;

-- --------------------------------------
-- Create Views
-- --------------------------------------

-- View for Cart

CREATE VIEW VCart AS
SELECT 
	C.id, 
	C.prod_id,
    C.quantity,
    C.customer,
	P.title, 
	P.description, 
	P.image, 
	P.price, 
	P.inventory 
FROM Cart AS C 
	INNER JOIN Product AS P 
		ON prod_id = P.id;
        
-- View for Order
        
CREATE VIEW VOrder AS
SELECT 
	O.id,
    O.order_number,
    O.order_date,
    O.customer,
	O.prod_id,
    O.quantity,
	P.title, 
	P.price
FROM `Order` AS O 
	INNER JOIN Product AS P 
		ON prod_id = P.id;


-- --------------------------------------
-- TESTING
-- --------------------------------------

CALL addProduct("ASUS GeForce GTX 1080", "PCI-Express 3.0, 8GB GDDR5X, 1670/1809MHz", "image/gpu.png", 5890, 99);
CALL addProduct("MSI GeForce GTX 1060", "PCI-Express 3.0, GDDR5, 'Dual Fan', 1544/1759MHz", "image/gpu.png", 2990, 22);
CALL addProduct("EVGA GeForce GTX 1070", "PCI-Express 3.0, 8GB GDDR5, 1594/1784MHz", "image/gpu.png", 4389, 74);
CALL addProduct("Intel Core i7-7700K", "Socket-LGA1151, Quad Core, 4.2GHz, 8MB cache", "image/cpu.png", 3590, 92);
CALL addProduct("Intel Core i5-7400", "Socket-LGA1151, Quad Core, 3.0GHz, 6MB cache", "image/cpu.png", 1949, 65);

INSERT INTO ProdCategory (category) VALUES ("GPU"), ("CPU");

INSERT INTO Prod2Cat (product_id, category_id) VALUES (1, 1), (2, 1), (3, 1), (4, 2), (5, 2);

CREATE OR REPLACE VIEW VProdCat AS
	SELECT
		P.id AS id,
		P.image AS image,
		P.description AS description,
		GROUP_CONCAT(PC.category) AS category,
		P.price AS price,
		P.inventory AS inventory
	FROM Product AS P
		LEFT JOIN Prod2Cat AS P2C
			ON P.id = P2C.product_id
		LEFT JOIN ProdCategory AS PC
			ON PC.id = P2C.category_id
	GROUP BY P.id
	ORDER BY P.id
;

SELECT * FROM VProdCat;

CALL updateProduct("2", "EVGA GeForce GTX 1070", "PCI-Express 3.0, 8GB GDDR5, 1594/1784MHz", "image/gpu.jpg", 4389, 5);
CALL updateProduct("3", "MSI GeForce GTX 1060", "PCI-Express 3.0, GDDR5, 'Dual Fan', 1544/1759MHz", "image/gpu.jpg", 2990, 22);

SELECT * FROM VProdCat;

CALL addToCart(2, 1);
CALL addToCart(2, 1);
CALL addToCart(3, 1);
CALL addToCart(4, 1);

SELECT * FROM VCart;

CALL deleteFromCart(1, 1);
CALL deleteFromCart(2, 1);

SELECT * FROM VCart;

CALL addToCart(4, 2);

CALL getCart(1);

CALL getCart(2);

SET @order_number = 1;

CALL placeOrder(1);

CALL addToCart(1, 2);
CALL addToCart(5, 2);

CALL placeOrder(2);

SELECT * FROM VOrder;

SELECT * FROM Product;

CALL getOrder(1);

CALL deleteOrder(1);

SELECT * FROM VOrder;

CALL getStockoutLog();