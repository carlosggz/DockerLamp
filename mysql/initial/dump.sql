CREATE TABLE user
(
    id INT(11) PRIMARY KEY NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    dni VARCHAR(20) NOT NULL
);
CREATE UNIQUE INDEX dni ON user (dni);

INSERT INTO user (id, first_name, last_name, dni) VALUES (1, 'Peter', 'Parker', '1234');
INSERT INTO user (id, first_name, last_name, dni) VALUES (2, 'Clark', 'Kent', '5678');

