CREATE TABLE t_catalog (id INTEGER PRIMARY KEY AUTOINCREMENT, category varchar(100), model varchar(100), manufacturer varchar(100), power REAL, release_date DATE, properties varchar(100), description TEXT);

INSERT INTO t_catalog(category, model, manufacturer, power, release_date, properties, description) VALUES ('TV', 'Sony KD-100ZD9', 'Sony', 792, '2016', '99 in', 'big TV');
INSERT INTO t_catalog(category, model, manufacturer, power, release_date, properties, description) VALUES ('TV', 'Philips 43PUS6401', 'Philips', 67, '2016', '43 in', 'medium TV');
INSERT INTO t_catalog(category, model, manufacturer, power, release_date, properties, description) VALUES ('Fridge', 'Samsung RS57K4000SA/UA', 'Samsung', 54, '2013', '178 cm', 'fridge');
INSERT INTO t_catalog(category, model, manufacturer, power, release_date, properties, description) VALUES ('washer', 'Ariston RSPGX 623 K UA', 'Ariston', 827, '2016', '6 kg', '6 kg, 1200 turnaround per minute');