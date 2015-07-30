load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Categories.csv'
 into table Categories
 fields terminated by ';'
 ignore 1 lines
 (Category_id, CategoryName);