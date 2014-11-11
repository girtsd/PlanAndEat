load data local
 infile '/var/www/html/receptes/Recipes_UTF8.csv'
 into table Recipes
 fields terminated by X'09'
 ignore 1 lines
 ( Recipe_id, RecipeName, Description );
