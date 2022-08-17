USE rmit_store_db;

CREATE TABLE stores (
  id mediumint(8) unsigned NOT NULL auto_increment, 
  Name varchar(255) default NULL, 
  Price varchar(255) default NULL, 
  ImageUrl varchar(255) default NULL, 
  PRIMARY KEY (id)
) AUTO_INCREMENT = 1;

INSERT INTO stores (Name, Price, ImageUrl) 
VALUES 
  ("Fairtrade Pocket Hoodie", "64.95", "p-1.jpg"),
  ("Fairtrade Zip Hoodie", "59.95", "p-2.jpg"), 
  ("Rudby Jergy", "69.95", "p-3.jpg"), 
  ("Topaz Premium Zip Jacket", "34.95", "p-4.jpg"), 
  ("Rmit Fairtrade Polo", "21.95", "p-5.jpg"), 
  ("Portable Charger", "10", "p-6.jpg"), 
  ("Face Mask", "8.5", "p-7.jpg"), 
  ("Hoddie Koala", "30", "p-8.jpg"), 
  ("Graduation Redbacks Pack", "59.95", "p-9.jpg"), 
  ("Vinyl Pixel Keyring", "7.95", "p-10.jpg"), 
  ("Applied Science Course Kit", "79.95", "p-11.jpg"), 
  ("Graduation Tie", "79.99", "p-12.jpg");
