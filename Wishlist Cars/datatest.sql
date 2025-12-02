CREATE TABLE customer (
  customer_id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  phone VARCHAR(50),
  email VARCHAR(200),
  address TEXT,
  dob DATE
);

CREATE TABLE manufacturer (
  manufacturer_id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  country VARCHAR(100)
);

CREATE TABLE vehicle_model (
  model_id SERIAL PRIMARY KEY,
  name VARCHAR(200),
  trim VARCHAR(100),
  body_type VARCHAR(50),
  manufacturer_id INT REFERENCES manufacturer(manufacturer_id),
  year INT,
  base_price NUMERIC(12,2)
);

CREATE TABLE dealer (
  dealer_id SERIAL PRIMARY KEY,
  name VARCHAR(200),
  location TEXT,
  contact VARCHAR(100)
);

CREATE TABLE vehicle (
  vehicle_id SERIAL PRIMARY KEY,
  vin VARCHAR(50) UNIQUE NOT NULL,
  model_id INT REFERENCES vehicle_model(model_id),
  color VARCHAR(50),
  status VARCHAR(20),
  sale_price NUMERIC(12,2),
  arrival_date DATE,
  dealer_id INT REFERENCES dealer(dealer_id)
);

CREATE TABLE salesperson (
  salesperson_id SERIAL PRIMARY KEY,
  name VARCHAR(200),
  phone VARCHAR(50),
  commission_rate NUMERIC(5,2)
);

CREATE TABLE tradein (
  tradein_id SERIAL PRIMARY KEY,
  customer_id INT REFERENCES customer(customer_id),
  vin_old VARCHAR(50),
  model_old VARCHAR(200),
  appraised_value NUMERIC(12,2),
  received_date DATE
);

CREATE TABLE sale (
  sale_id SERIAL PRIMARY KEY,
  vehicle_id INT REFERENCES vehicle(vehicle_id),
  customer_id INT REFERENCES customer(customer_id),
  salesperson_id INT REFERENCES salesperson(salesperson_id),
  sale_date DATE,
  total_amount NUMERIC(12,2),
  sale_type VARCHAR(20),
  tradein_id INT REFERENCES tradein(tradein_id)
);

CREATE TABLE payment (
  payment_id SERIAL PRIMARY KEY,
  sale_id INT REFERENCES sale(sale_id),
  payment_date DATE,
  amount NUMERIC(12,2),
  method VARCHAR(50),
  note TEXT
);
