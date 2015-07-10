load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Products.csv'
 into table Products
 fields terminated by ';'
 ignore 1 lines
 (Product_id, ProductName, Calories);