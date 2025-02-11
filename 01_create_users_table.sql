--Edwinah Lynn Ninsiima
--01_create_users_table.sql
--07/10/2024
--INFT2100

DROP TABLE IF EXISTS members cascade;
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq START 1;
CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE MEMBERS(
    user_id INT PRIMARY KEY DEFAULT nextval('users_id_seq'),
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    email VARCHAR (255) NOT NULL UNIQUE,
    phone_number VARCHAR(15),
    start_datee DATE,
    end_date DATE,
    police_check BOOLEAN,
    date_applied DATE,
    date_received DATE
);



