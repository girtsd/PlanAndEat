load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Units.csv'
 into table Units
 fields terminated by ';'
 ( Unit_id, UnitName, Description );