#****************************************************************************
#Script to create fitness form database and add test data
#Name			Date			Desc.
#Jacob Carr		8/27/2021		Initial Deployment
#
#****************************************************************************
DROP DATABASE IF EXISTS fitness;
CREATE DATABASE fitness;
USE fitness;
# CREATE OBJECTS
CREATE TABLE IF NOT EXISTS employee 
(
	employeeID	INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name	VARCHAR(255) NOT NULL,
	last_name	VARCHAR(255) NOT NULL,
	email_address	VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS visit
(
	visit_id 	INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name	VARCHAR(255) NOT NULL,
	last_name	VARCHAR(255) NOT NULL,
	email_address	VARCHAR(255) NOT NULL,
	phone		VARCHAR(255) NOT NULL,
	additional	varchar(25)  NULL,
	find_us	varchar(25)  NULL,
	question	varchar(500) NULL,
	date_of	DATETIME     NOT NULL,
	employeeID	INT          NOT NULL,
	FOREIGN KEY (employeeID) REFERENCES employee(employeeID)
);

#insert statement for employee table
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Buster', 'Bronco','buster@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Joe', 'Vandal','joe@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Otter','otter@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Blue','blue@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Red','red@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Orange','orange@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Key', 'Blue','KBlue@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Sky', 'Blue','SBlue@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Blood', 'Orange','BOrange@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Crimson', 'Red','CRed@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Burnt', 'Sienna','BSienna@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'White','white@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Green','green@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Titanium', 'White','TWwhite@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('Forrest', 'Green','Fgreen@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Lime','lime@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Yellow','yellow@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Saffron','saffron@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Grey','grey@fitness.com');
INSERT INTO employee
(first_name, last_name, email_address)
VALUES
('CWI', 'Black','black@fitness.com');


#insert statement for visit table
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Amber','Amber@fitness.com','4733332211','Free Trial','Advertisement','Hello', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Amethyst','amethyst@fitness.com','4733334452','Nutrition','Friend','Yes', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('Brick', 'Red','BRed@fitness.com','47337503264','Free Trial','Google','Im', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Azure','Azure@fitness.com','4736492745','Free Trial','Advertisement','Using', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Carmine','Carmine@fitness.com','4737301264','Nutrition','Advertisement','Single', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Blush','Blush@fitness.com','4737492748','Personal Training','Google','Words', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Bronze','Bronze@fitness.com','4738354629','Free Trial','Google','To', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Cobalt','Cobalt@fitness.com','4737740372','Free Trial','Advertisement','Send', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Coffee','Coffee@fitness.com','4735559362','Personal Training','Google','A', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Copper','Copper@fitness.com','4732003444','Free Trial','Google','Message', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Coral','Coral@fitness.com','4739946344','Personal Training','Advertisement','Through', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Cyan','Cyan@fitness.com','4739463845','Nutrition','Google','This', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Emerald','Emerald@fitness.com','4738885362','Free Trial','Advertisement','Database.', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Erin','Erin@fitness.com','4732226374','Free Trial','Advertisement','Comment', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Gold','Gold@fitness.com','4734462873','Nutrition','Advertisement','IF', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Indigo','Indigo@fitness.com','4734444444','Free Trial','Google','You', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Ivory','Ivory@fitness.com','4735555584','Nutriion','Google','See', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Jade','Jade@fitness.com','47344993300','Free Trial','Advertisement','This', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Lemon','Lemon@fitness.com','4733313333','Free Trial','Advertisement','On', NOW(), 1);
INSERT INTO visit
(first_name, last_name, email_address, phone, additional, find_us, question, date_of, employeeID)
VALUES
('CWI', 'Maroon','Maroon@fitness.com','4734839204','Free Trial','Advertisement','BlackBoard.', NOW(), 1);








