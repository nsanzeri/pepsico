<<<<<<< HEAD
DROP DATABASE IF EXISTS globalproducts;CREATE DATABASE IF NOT EXISTS globalproducts;USE globalproducts;CREATE TABLE region (  region_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(region_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;  CREATE TABLE format (  format_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(format_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;    CREATE TABLE brand (  brand_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(brand_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci; CREATE TABLE size (  size_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(size_id),  name VARCHAR(255),  description VARCHAR(255),  lower_range INT NOT NULL,  upper_range INT NOT NULL,  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;   CREATE TABLE finish (  finish_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(finish_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;   CREATE TABLE products (  prod_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(prod_id),  name VARCHAR(255),  code_name VARCHAR(355),  dimension VARCHAR(255),  size INT NOT NULL,  status VARCHAR(255),  description VARCHAR(255),  image_path VARCHAR(355),  image_name VARCHAR(255),  region_id INT NOT NULL,  format_id INT NOT NULL,  brand_id INT NOT NULL,  finish_id INT NOT NULL,  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;    INSERT INTO region (region_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Africa","Africa", 1),  (NULL, "Asia","Asia", 1),  (NULL, "Australia","Australia", 1),  (NULL, "Europe","Europe", 1),  (NULL, "North America","North America", 1),  (NULL, "South America","South America", 1);INSERT INTO format (format_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Bottle","Bottle", 1),  (NULL, "Pouch","Pouch", 1),  (NULL, "Tetra Cup","Tetra Cup", 1),  (NULL, "Cask","Cask", 1);INSERT INTO brand (brand_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Tropicana","Tropicana", 1),  (NULL, "Fiji","Fiji", 1),  (NULL, "Pepsi","Pepsi", 1),  (NULL, "Amazon","Amazon", 1),  (NULL, "Gatorade","Gatorade", 1); INSERT INTO size (size_id, name, description, lower_range, upper_range, is_active) VALUES  (NULL, "N/A","N/A", -1,-1,1),  (NULL, "0-12 oz","0-12 oz", 0, 12, 1),  (NULL, "13-20 oz","13-20 oz", 13, 20, 1),  (NULL, "21-48 oz","21-48 oz", 21, 48, 1),  (NULL, "49-64 oz","49-64 oz", 49, 64, 1),  (NULL, "65-89 oz","65-89 oz", 65, 89, 1),  (NULL, "90+ oz oz","90-999 oz", 90, 99999, 1);INSERT INTO finish (finish_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),	(NULL, "28","28", 1),	(NULL, "33-38","33-38", 1),	(NULL, "43","43", 1),	(NULL, "Custom","Custom", 1);INSERT INTO products (prod_id, name, code_name, dimension, size, status, description, image_path, image_name, region_id, format_id, brand_id, finish_id, is_active) VALUES  (NULL, "Product 1", "code name", "24 X 20 x 13", "12", "status info", "Product desc", "assets/images/products", "1.jpeg",  "1", "2", "1", "1", 1),  (NULL, "Product 2", "code name", "25 X 30 x 14", "15", "status info", "Product desc", "assets/images/products", "2.jpeg",  "2", "3", "2", "2", 1),  (NULL, "Product 3", "code name", "26 X 40 x 15", "21", "status info", "Product desc", "assets/images/products", "3.jpeg",  "3", "4", "3", "3", 1),  (NULL, "Product 4", "code name", "27 X 50 x 16", "48", "status info", "Product desc", "assets/images/products", "4.jpeg",  "4", "2", "3", "4", 1),  (NULL, "Product 5", "code name", "28 X 60 x 17", "49", "status info", "Product desc", "assets/images/products", "5.jpeg",  "5", "3", "1", "1", 1),  (NULL, "Product 6", "code name", "29 X 70 x 18", "64", "status info", "Product desc", "assets/images/products", "6.jpeg",  "6", "4", "3", "2", 1),  (NULL, "Product 7", "code name", "20 X 80 x 19", "90", "status info", "Product desc", "assets/images/products", "7.jpeg",  "1", "1", "1", "3", 1),  (NULL, "Product 8", "code name", "21 X 90 x 20", "1000", "status info", "Product desc", "assets/images/products", "8.jpeg", "2", "2", "1", "4", 1),  (NULL, "Product 9", "code name", "22 X 100 x 21", "0", "status info", "Product desc", "assets/images/products", "9.jpeg", "3", "1", "3", "1", 1),  (NULL, "Product 10", "code name", "23 X 110 x 22", "9", "status info", "Product desc", "assets/images/products", "10.jpeg", "2", "1", "4", "2", 1),  (NULL, "Product 11", "code name", "30 X 120 x 23", "13", "status info", "Product desc", "assets/images/products", "11.jpeg", "4", "1", "1", "1", 1),  (NULL, "Product 12", "code name", "31 X 130 x 24", "20", "status info", "Product desc", "assets/images/products", "12.jpeg", "2", "1", "2", "4", 1);
=======
DROP DATABASE IF EXISTS globalproducts;CREATE DATABASE IF NOT EXISTS globalproducts;USE globalproducts;CREATE TABLE region (  region_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(region_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;  CREATE TABLE format (  format_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(format_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;    CREATE TABLE brand (  brand_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(brand_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci; CREATE TABLE size (  size_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(size_id),  name VARCHAR(255),  description VARCHAR(255),  lower_range INT NOT NULL,  upper_range INT NOT NULL,  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;   CREATE TABLE finish (  finish_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(finish_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;   CREATE TABLE products (  prod_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(prod_id),  name VARCHAR(255),  code_name VARCHAR(355),  dimension VARCHAR(255),  size INT NOT NULL,  status VARCHAR(255),  description VARCHAR(255),  image_path VARCHAR(355),  image_name VARCHAR(255),  region_id INT NOT NULL,  format_id INT NOT NULL,  brand_id INT NOT NULL,  finish_id INT NOT NULL,  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;    INSERT INTO region (region_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Africa","Africa", 1),  (NULL, "Asia","Asia", 1),  (NULL, "Australia","Australia", 1),  (NULL, "Europe","Europe", 1),  (NULL, "North America","North America", 1),  (NULL, "South America","South America", 1);INSERT INTO format (format_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Bottle","Bottle", 1),  (NULL, "Pouch","Pouch", 1),  (NULL, "Tetra Cup","Tetra Cup", 1),  (NULL, "Cask","Cask", 1);INSERT INTO brand (brand_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Tropicana","Tropicana", 1),  (NULL, "Fiji","Fiji", 1),  (NULL, "Pepsi","Pepsi", 1),  (NULL, "Amazon","Amazon", 1),  (NULL, "Gatorade","Gatorade", 1);INSERT INTO size (size_id, name, description, lower_range, upper_range, is_active) VALUES  (NULL, "N/A","N/A", -1, -1, 1),  (NULL, "0-12 oz","0-12 oz", 0, 12, 1),  (NULL, "13-20 oz","13-24 oz", 13, 20, 1),  (NULL, "21-48 oz","21-48 oz", 21, 48, 1),  (NULL, "49-64 oz","49-64 oz", 49, 64, 1),  (NULL, "65-89 oz","65-89 oz", 65, 89, 1),  (NULL, "90+ oz oz","90-999 oz", 90, 99999, 1);INSERT INTO finish (finish_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),	(NULL, "28","28", 1),	(NULL, "33-38","33-38", 1),	(NULL, "43","43", 1),	(NULL, "Custom","Custom", 1);INSERT INTO products (prod_id, name, code_name, dimension, size, status, description, image_path, image_name, region_id, format_id, brand_id, finish_id, is_active) VALUES  (NULL, "Product 1", "code name", "24 X 20 x 13", "12", "status info", "Product desc", "assets/images/products", "1.jpeg",  "1", "2", "1", "1", 1),  (NULL, "Product 2", "code name", "25 X 30 x 14", "15", "status info", "Product desc", "assets/images/products", "2.jpeg",  "2", "3", "2", "2", 1),  (NULL, "Product 3", "code name", "26 X 40 x 15", "21", "status info", "Product desc", "assets/images/products", "3.jpeg",  "3", "4", "3", "3", 1),  (NULL, "Product 4", "code name", "27 X 50 x 16", "48", "status info", "Product desc", "assets/images/products", "4.jpeg",  "4", "2", "3", "4", 1),  (NULL, "Product 5", "code name", "28 X 60 x 17", "49", "status info", "Product desc", "assets/images/products", "5.jpeg",  "5", "3", "1", "1", 1),  (NULL, "Product 6", "code name", "29 X 70 x 18", "64", "status info", "Product desc", "assets/images/products", "6.jpeg",  "6", "4", "3", "2", 1),  (NULL, "Product 7", "code name", "20 X 80 x 19", "90", "status info", "Product desc", "assets/images/products", "7.jpeg",  "1", "1", "1", "3", 1),  (NULL, "Product 8", "code name", "21 X 90 x 20", "1000", "status info", "Product desc", "assets/images/products", "8.jpeg", "2", "2", "1", "4", 1),  (NULL, "Product 9", "code name", "22 X 100 x 21", "0", "status info", "Product desc", "assets/images/products", "9.jpeg", "3", "1", "3", "1", 1),  (NULL, "Product 10", "code name", "23 X 110 x 22", "9", "status info", "Product desc", "assets/images/products", "10.jpeg", "2", "1", "4", "2", 1),  (NULL, "Product 11", "code name", "30 X 120 x 23", "13", "status info", "Product desc", "assets/images/products", "11.jpeg", "4", "1", "1", "1", 1),  (NULL, "Product 12", "code name", "31 X 130 x 24", "20", "status info", "Product desc", "assets/images/products", "12.jpeg", "2", "1", "2", "4", 1);
>>>>>>> branch 'master' of https://github.com/nsanzeri/pepsico
