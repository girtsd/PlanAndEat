load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Products_UTF8.csv'
 into table Products
 fields terminated by X'09'
 ignore 1 lines
 (Product_id, ProductName, Calories);