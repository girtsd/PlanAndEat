set foreign_key_checks=0;
load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Components.csv'
 into table Components
 fields terminated by ';'
 ignore 1 lines
 ( Recipe_id, Product_id, Amount, Unit_id);
