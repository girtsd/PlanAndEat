load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Categories_UTF8.csv'
 into table Categories
 fields terminated by X'09'
 ignore 1 lines
 (Category_id, CategoryName);