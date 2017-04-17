USE anjd16;

DROP TABLE IF EXISTS Users;

CREATE TABLE Temp (
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
name CHAR(255) NOT NULL UNIQUE,
password CHAR(255) NOT NULL,
role CHAR(20) NOT NULL
);

-- Rename because of 'table doesn't exist' error when creating table (bug???)

RENAME TABLE Temp TO Users;

-- DELETE FROM Users;

SELECT * FROM Users;
