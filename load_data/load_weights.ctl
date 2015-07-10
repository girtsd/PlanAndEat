set foreign_key_checks=0;
load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Weight.csv'
 into table Weight
 fields terminated by X'09'
 ( Product_id, Unit_id, Weight );