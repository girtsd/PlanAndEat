set foreign_key_checks=0;
load data local
 infile '/var/www/html/receptes/Steps_UTF8.csv'
 into table Steps
 fields terminated by X'09'
 ( Recipe_id, StepNo, Description )