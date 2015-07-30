DROP TABLE  IF EXISTS Recipes;

CREATE TABLE Recipes
( Recipe_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  RecipeName varchar(255) NOT NULL,
  Description varchar(255),
  RecipePic_id MEDIUMINT UNSIGNED NOT NULL,
  CONSTRAINT recipe_pk
    PRIMARY KEY  (Recipe_id),
  UNIQUE KEY ix_recipe (RecipeName)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- EXIT;