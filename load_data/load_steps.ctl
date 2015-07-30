set foreign_key_checks=0;
load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Steps.csv'
 into table Steps
 fields terminated by ';'
 ( Recipe_id, StepNo, Description, StepPic_id );