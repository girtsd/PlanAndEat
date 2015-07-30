DROP TABLE IF EXISTS Weight;

CREATE TABLE IF NOT EXISTS `Weight` (
  `Product_id` MEDIUMINT UNSIGNED NOT NULL,
  `Unit_id` SMALLINT UNSIGNED NOT NULL,
  `Weight` SMALLINT NOT NULL,
  CONSTRAINT weight_pk
  PRIMARY KEY (`Product_id`,`Unit_id`),
  CONSTRAINT fk_weight_unit 
    FOREIGN KEY (Unit_id)
    REFERENCES Units(Unit_id)
    ON DELETE CASCADE,
  CONSTRAINT fk_weight_product 
    FOREIGN KEY (Product_id)
    REFERENCES Products(Product_id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;