set foreign_key_checks=0;
load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Menu.csv'
 into table Menu
 fields terminated by ';'
 ignore 1 lines
 ( Menu_id, User_id, Date, Category_id, Recipe_id);