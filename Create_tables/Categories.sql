DROP TABLE IF EXISTS Categories;

CREATE TABLE Categories
( Category_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  CategoryName VARCHAR(40) UNSIGNED NOT NULL,
  CONSTRAINT category_pk
    PRIMARY KEY  (Category_id),
    UNIQUE KEY ix_category (CategoryName)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- EXIT;