load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Units.csv'
 into table Units
 fields terminated by X'09'
 ( Unit_id, UnitName, Description );