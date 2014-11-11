DROP TABLE Menu;

CREATE TABLE Menu
( Menu_id int not null auto_increment,
  User_id int not null,
  Date date not null,
  Category_id int not null,
  Recipe_id int not null,
  CONSTRAINT Menu_pk
    PRIMARY KEY  (Menu_id),
  CONSTRAINT fk_recipe_menu
    FOREIGN KEY (recipe_id)
    REFERENCES Recipes(Recipe_id),
  CONSTRAINT fk_category 
    FOREIGN KEY (Category_id)
    REFERENCES Categories(Category_id)
);

-- EXIT;