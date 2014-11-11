DROP TABLE Components;

CREATE TABLE Components
( Recipe_id int not null,
  Product_id int not null,
  Amount int not null,
  Unit varchar(255) not null,
  CONSTRAINT component_pk
    PRIMARY KEY  (Recipe_id, Product_id),
  CONSTRAINT fk_recipe_comp 
    FOREIGN KEY (Recipe_id)
    REFERENCES Recipes(Recipe_id),
  CONSTRAINT fk_product_comp
    FOREIGN KEY (Product_id)
    REFERENCES Products(Product_id)
);

-- EXIT;