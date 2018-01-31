
--
-- Create some tables
--
DROP TABLE IF EXISTS part;
CREATE TABLE part (
  `pid` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `description` varchar(50) NOT NULL,
  `price` numeric(8,2) NOT NULL
);

DROP TABLE IF EXISTS purchase_order;
CREATE TABLE purchase_order (
  `oid` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `customer_name` varchar(100) NOT NULL,
  `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);

DROP TABLE IF EXISTS purchase_order_item;
CREATE TABLE purchase_order_item (
  `oid` integer,
  `pid` integer,
  `quantity` integer DEFAULT 100,
  PRIMARY KEY (`oid`, `pid`),
  FOREIGN KEY (`oid`) REFERENCES purchase_order (`oid`),
  FOREIGN KEY (`pid`) REFERENCES part (`pid`)
);

--
-- Load some data
--
INSERT INTO part VALUES 
  (DEFAULT, 'stapler', 4.50),
  (DEFAULT, 'pen', 0.75),
  (DEFAULT, 'box', 7.00),
  (DEFAULT, 'tape', 2.50),
  (DEFAULT, 'pencil', 0.45);

INSERT INTO purchase_order VALUES 
  (DEFAULT, 'Mike Smith', '2014-09-13'),
  (DEFAULT, 'Lisa Wilson', '2014-09-29');

INSERT INTO purchase_order_item VALUES 
  (1, 2, 100),
  (1, 5, 250),
  (2, 3, 10);



