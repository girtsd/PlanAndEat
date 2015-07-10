load data local
 infile '/var/www/PandE/PlanAndEat/Tabulas/Recipes.csv'
 into table Recipes
 fields terminated by X'09'
 ignore 1 lines
 ( Recipe_id, RecipeName, Description, RecipePic_id );
