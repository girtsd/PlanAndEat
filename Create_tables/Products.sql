DROP TABLE IF EXISTS Products;

CREATE TABLE Products
( Product_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  ProductName varchar(255) NOT NULL,
  Calories varchar(255) NOT NULL,
  CONSTRAINT product_pk
    PRIMARY KEY (Product_id),
  UNIQUE KEY ix_product (ProductName)  
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- EXIT;