set foreign_key_checks=0;
load data local
 infile '/var/www/html/receptes/Menu_UTF8.csv'
 into table Menu
 fields terminated by X'09'
 ignore 1 lines
 ( Menu_id, User_id, Date, Category_id, Recipe_id)