DROP TABLE Categories;

CREATE TABLE Categories
( Category_id int not null auto_increment,
  Category_name varchar(40),
  CONSTRAINT Category_pk
    PRIMARY KEY  (Category_id)
);

-- EXIT;