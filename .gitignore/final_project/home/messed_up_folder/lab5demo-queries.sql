
--
-- Using EXISTS
--
SELECT * FROM part AS p
WHERE EXISTS (SELECT 1
              FROM purchase_order_item AS poi
              WHERE poi.pid = p.pid
             );

--
-- Using NOT EXISTS
--
SELECT * FROM part AS p
WHERE NOT EXISTS (SELECT 1
                  FROM purchase_order_item AS poi
                  WHERE poi.pid = p.pid
                 );

--
-- Using IN.  Notice the distinction between this and EXISTS.  EXISTS simply checks to see if a result was returned.   This actually compares pid to the set that's returned from the inner query.  
--
SELECT * FROM part AS p
WHERE pid IN (SELECT poi.pid
  FROM purchase_order_item AS poi
);

--
-- Using NOT IN
--
SELECT * FROM part AS p
WHERE pid NOT IN (SELECT poi.pid
  FROM purchase_order_item AS poi
);

--
-- Table expressions.  Try running the inner query by itself.
--
SELECT *
FROM part AS p,
(
  SELECT *
  FROM purchase_order_item
  WHERE oid = 1
) AS some_order
WHERE p.pid = some_order.pid;


