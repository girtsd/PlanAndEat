set foreign_key_checks=0;
load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Components_UTF8.csv'
 into table Components
 fields terminated by X'09'
 ignore 1 lines
 ( Recipe_id, Product_id, Amount, Unit);
