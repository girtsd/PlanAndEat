DROP TABLE steps;

CREATE TABLE Steps
( Recipe_id int not null,
  StepNo int not null,
  Description varchar(255) not null,
  StepPicture varchar(255),
  CONSTRAINT steps_pk
    PRIMARY KEY  (StepNo, Recipe_id),
  CONSTRAINT fk_recipe 
    FOREIGN KEY (Recipe_id)
    REFERENCES Recipes(Recipe_id)
);

-- EXIT;