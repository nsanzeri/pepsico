DROP DATABASE IF EXISTS globalproducts;CREATE DATABASE IF NOT EXISTS globalproducts;USE globalproducts;CREATE TABLE region (  region_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(region_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;  CREATE TABLE format (  format_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(format_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;    CREATE TABLE brand (  brand_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(brand_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci; CREATE TABLE size (  size_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(size_id),  name VARCHAR(255),  name_metric VARCHAR(255),  description VARCHAR(255),  lower_range INT NOT NULL,  upper_range INT NOT NULL,  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;   CREATE TABLE finish (  finish_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(finish_id),  name VARCHAR(255),  description VARCHAR(255),  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;   CREATE TABLE products (  prod_id INT(11) NOT NULL AUTO_INCREMENT,  PRIMARY KEY(prod_id),  name VARCHAR(255),  code_name VARCHAR(355),  dimension VARCHAR(255),  size INT NOT NULL,  status VARCHAR(255),  description VARCHAR(255),  image_path VARCHAR(355),  image_name VARCHAR(255),  region_id INT NOT NULL,  format_id INT NOT NULL,  brand_id INT NOT NULL,  finish_id INT NOT NULL,  is_active BOOL ) ENGINE=InnoDB  COLLATE utf8_general_ci;    INSERT INTO region (region_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Africa","Africa", 1),  (NULL, "Asia","Asia", 1),  (NULL, "Australia","Australia", 1),  (NULL, "Europe","Europe", 1),  (NULL, "North America","North America", 1),  (NULL, "South America","South America", 1);INSERT INTO format (format_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Bottle","Bottle", 1),  (NULL, "Pouch","Pouch", 1),  (NULL, "Tetra","Tetra", 1),  (NULL, "Cup","Cup", 1);INSERT INTO brand (brand_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),  (NULL, "Tropicana","Tropicana", 1),  (NULL, "Pomi","Pomi", 1),  (NULL, "Alvalle","Alvalle", 1),  (NULL, "Naked","Naked", 1); INSERT INTO size (size_id, name, name_metric, description, lower_range, upper_range, is_active) VALUES  (NULL, "N/A","N/A", "N/A", -1,-1,1),  (NULL, "0-12 oz", "0-355ml", "0-12 oz", 0, 12, 1),  (NULL, "13-20 oz", "385-592ml", "13-20 oz", 13, 20, 1),  (NULL, "21-48 oz", "621-1420ml", "21-48 oz", 21, 48, 1),  (NULL, "49-64 oz", "1449-1892ml", "49-64 oz", 49, 64, 1),  (NULL, "65-89 oz", "1922-2632ml", "65-89 oz", 65, 89, 1),  (NULL, "90+ oz", "2661ml +", "90-999 oz", 90, 99999, 1);INSERT INTO finish (finish_id, name, description, is_active) VALUES  (NULL, "N/A","N/A", 1),	(NULL, "28","28", 1),	(NULL, "33-38","33-38", 1),	(NULL, "43","43", 1),	(NULL, "Custom","Custom", 1);INSERT INTO products (prod_id, name, code_name, dimension, size, status, description, image_path, image_name, region_id, format_id, brand_id, finish_id, is_active) VALUES  (NULL, "Alvalle 250ml", "N/A", "5.47in x 2.02in x 2.02in<br>5.47mm x 2.02mm x 2.02mm", "250ml", "Active", "Product desc", "assets/images/products", "1.jpg",  "5", "2", "4", "2", 1),  (NULL, "Naked 10oz", "N/A", "5.16in X 2.35in x 2.42in", "10oz, 296ml", "Active", "Product desc", "assets/images/products", "2.jpg",  "2", "2", "5", "2", 1),  (NULL, "Naked 15.2oz", "N/A", "7.03in X 2.29in x 2.29in", "15.2oz, 450ml", "Active", "Product desc", "assets/images/products", "3.jpg",  "6", "2", "5", "4", 1),  (NULL, "Trop PP 32oz", "N/A", "9.08in X 3.05in x 3.05in", "32oz, .946ml", "Active", "Product desc", "assets/images/products", "4.jpg",  "7", "2", "2", "1", 1),  (NULL, "Naked 64oz", "N/A", "10.4in X 4.05in x 4.05in", "64oz, 1.89L", "Active", "Product desc", "assets/images/products", "5.jpg",  "5", "2", "2", "2", 1),  (NULL, "Pomi 17.64oz", "N/A", "5.856in X 2.89in x 2.42in", "17.64oz, 500ml", "Active", "Product desc", "assets/images/products", "6.jpg",  "6", "4", "3", "5", 1),  (NULL, "Trop 10oz", "N/A", "6.9in X 2.25in x 2.25in", "10oz", "Active", "Product desc", "assets/images/products", "7.jpg",  "2", "2", "2", "3", 1),  (NULL, "Trop 15oz", "N/A", "7.53in X 2.57in x 2.57in", "15oz", "Active", "Product desc", "assets/images/products", "8.jpg", "3", "2", "2", "4", 1),  (NULL, "Trop 32oz", "N/A", "9.34in X 3.36in x 3.36in", "32oz", "Active", "Product desc", "assets/images/products", "9.jpg", "6", "2", "2", "2", 1),  (NULL, "Trop 64oz", "N/A", "10.5in X 4.4in x 3.5in", "64oz", "Active", "Product desc", "assets/images/products", "10.jpg", "7", "2", "2", "3", 1),  (NULL, "Trop 96oz", "N/A", "11.6in X 5.4in x 5.4in", "96oz", "Active", "Product desc", "assets/images/products", "11.jpg", "6", "2", "2", "5", 1),  (NULL, "Trop Farm 46oz", "N/A", "9.95in X 4.156in x 3.23in", "46oz", "Active", "Product desc", "assets/images/products", "12.jpg", "4", "2", "2", "2", 1),  (NULL, "Trop PP 8oz", "N/A", "4.28in X 2.38in x 2.33in", "8oz", "Active", "Product desc", "assets/images/products", "13.jpg", "3", "4", "2", "4", 1),  (NULL, "Trop PP 12oz", "N/A", "7.29in X 2.34in x 2.34in", "12oz", "Active", "Product desc", "assets/images/products", "14.jpg", "6", "2", "2", "3", 1),  (NULL, "Trop PP 59oz", "N/A", "10in X 4.5in x 4.26in", "59oz", "Active", "Product desc", "assets/images/products", "14.jpg", "6", "2", "2", "3", 1),  (NULL, "Trop PP 89oz", "N/A", "10.35in X 6.44in x 4.183in", "89oz", "Active", "Product desc", "assets/images/products", "16.jpg", "5", "2", "2", "2", 1),  (NULL, "Trop PP 118oz", "N/A", "10.3in X 6.7in x 5.46in", "118oz", "Active", "Product desc", "assets/images/products", "17.jpg", "5", "2", "2", "4", 1),  (NULL, "Trop PP 128oz", "N/A", "9.95in X 6.7in x 5.56in", "128oz", "Active", "Product desc", "assets/images/products", "18.jpg", "5", "2", "2", "3", 1),  (NULL, "Trop PP 150ml", "N/A", "3.9in X 2in x 2in", "150ml", "Active", "Product desc", "assets/images/products", "19.jpg", "5", "5", "2", "2", 1),  (NULL, "Trop PP 850ml", "N/A", "9.2in X 2.7in x 2.7in", "850ml", "Active", "Product desc", "assets/images/products", "20.jpg", "6", "4", "2", "2", 1),  (NULL, "Trop Twister 20oz", "N/A", "8.23in X 2.75in x 2.75in", "20oz", "Active", "Product desc", "assets/images/products", "21.jpg", "5", "2", "2", "4", 1),  (NULL, "Trop Twister 59oz", "N/A", "9.31in X 4.38in x 4.38in", "59oz", "Active", "Product desc", "assets/images/products", "22.jpg", "3", "4", "2", "3", 1);
