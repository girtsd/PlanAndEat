DROP TABLE IF EXISTS Components;

CREATE TABLE Components
( Recipe_id MEDIUMINT UNSIGNED NOT NULL,
  Product_id MEDIUMINT UNSIGNED NOT NULL,
  Amount SMALLINT UNSIGNED NOT NULL,
  Unit_id SMALLINT UNSIGNED NOT NULL,
  CONSTRAINT component_pk
    PRIMARY KEY  (Recipe_id, Product_id),
  CONSTRAINT fk_recipe_comp 
    FOREIGN KEY (Recipe_id)
    REFERENCES Recipes(Recipe_id)
    ON DELETE CASCADE,
  CONSTRAINT fk_product_comp
    FOREIGN KEY (Product_id)
    REFERENCES Products(Product_id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- EXIT;