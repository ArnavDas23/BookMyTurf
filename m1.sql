DROP TABLE if exists turf;
DROP TABLE if exists city;

CREATE TABLE city (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(45) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO city(name) VALUES
    ('Ahmedabad'),
    ('Bangalore'),
    ('Chennai'),
    ('Delhi'),
    ('Hyderabad'),
    ('Kolkata'),
    ('Mumbai');

CREATE TABLE turf (
    id int NOT NULL AUTO_INCREMENT,
    city_id int NOT NULL,
    name varchar(45) NOT NULL,
    location varchar(45) NOT NULL,
    price varchar(45) NOT NULL,
    description varchar(45),
    PRIMARY KEY (id),
    FOREIGN KEY(city_id) REFERENCES city(id)
);

INSERT INTO turf(city_id, name, location, price) VALUES
    ('1', 'Warriors', 'Abc', '1000'),
    ('1', 'Eclipse', 'def', '1200'),
    ('2', 'Hattrick', 'ghi', '1500'),
    ('3', 'Raimons', 'jkl', '1300'),
    ('4', 'Spartans', 'mno', '1400'),
    ('4', 'Young Boys', 'pqr', '1600'),
    ('4', 'GUFC', 'stu', '1800'),
    ('5', 'Rockets', 'vwx', '1100');