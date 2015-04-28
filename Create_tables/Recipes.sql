DROP TABLE Recipes;

CREATE TABLE Recipes
( Recipe_id int not null primary key  auto_increment,
  RecipeName varchar(255) not null,
  Description varchar(255),
  RecipePicture longblob 
);

-- EXIT;