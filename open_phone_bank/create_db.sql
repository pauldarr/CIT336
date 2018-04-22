/*****************************************
* Create the open_phone_bank database
*****************************************/

-- TEE create_db.txt

DROP DATABASE IF EXISTS open_phone_bank;
CREATE DATABASE open_phone_bank;
USE open_phone_bank;  -- MySQL command

-- create the tables
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE voters (
  voterID          INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  firstName        VARCHAR(255)   NOT NULL,
  lastName         VARCHAR(255)   NOT NULL,
  phone            VARCHAR(12)    NOT NULL,
  city             VARCHAR(45)    NOT NULL,
  party            VARCHAR(45)    NOT NULL,
  PRIMARY KEY (voterID),
  INDEX categoryID (categoryID)
);

CREATE TABLE script (
  scriptID         INT(11)        NOT NULL   AUTO_INCREMENT,
  message          VARCHAR(500)   NOT NULL,
  PRIMARY KEY (scriptID)
);

CREATE TABLE administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);

CREATE TABLE volunteers (
  volunteerID       INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (volunteerID)
);

-- insert data into the database
INSERT INTO categories (categoryID, categoryName) VALUES
(1, 'Call'),
(2, 'Contacted'),
(3, 'Remove');

INSERT INTO voters (voterID, categoryID, firstName, lastName, phone, city, party) VALUES
(1, 1, 'Oliver', 'Queen', '202-555-0196', 'Star City', 'Green'),
(2, 1, 'Dinah', 'Drake', '202-555-0142', 'Star City', 'Republican'),
(3, 1, 'Barry', 'Allen', '202-555-0137', 'Central City', 'Democratic'),
(4, 1, 'Rene', 'Ramirez', '202-555-0106', 'Star City', 'Libertarian');

INSERT INTO script (scriptID, message) VALUES
(1, 'Please remember to vote this next Tuesday.');

INSERT INTO administrators (adminID, emailAddress, password, firstName, lastName) VALUES
(1, 'admin@gmail.com', '5a6ZuPWnumNVtWz6e3WU', 'Admin', 'User'),
(2, 'pauldarr@gmail.com', 'H3Gp2EsydKEhND4XAacJ', 'Paul', 'Darr');

INSERT INTO volunteers (volunteerID, emailAddress, password, firstName, lastName) VALUES
(1, 'admin@gmail.com', '5a6ZuPWnumNVtWz6e3WU', 'Admin', 'User'),
(2, 'pauldarr@gmail.com', 'H3Gp2EsydKEhND4XAacJ', 'Paul', 'Darr');

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON open_phone_bank.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

-- NOTEE
