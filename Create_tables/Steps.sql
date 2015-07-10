DROP TABLE  IF EXISTS steps;

CREATE TABLE Steps
( Recipe_id int not null,
  StepNo int not null,
  Description varchar(255) not null,
  StepPic_id int not null,
  CONSTRAINT steps_pk
    PRIMARY KEY  (StepNo, Recipe_id),
  CONSTRAINT fk_step_recipe 
    FOREIGN KEY (Recipe_id)
    REFERENCES Recipes(Recipe_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- EXIT;