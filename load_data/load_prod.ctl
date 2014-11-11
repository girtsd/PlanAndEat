load data local
 infile 'products.csv'
 into table Products
 fields terminated by X'09'
 ( Product_id, ProductName, Calories )
  IGNORE 1 LINES