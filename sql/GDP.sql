CREATE DATABASE GDP;
USE GDP;


-- Create Auteurs Table
CREATE TABLE Auteurs (
    AuteurID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE,
    Biographie TEXT
);

-- Create Packages Table
CREATE TABLE Packages (
    PackageID INT PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(255) NOT NULL,
    Description TEXT,
    DateCreation DATE DEFAULT CURRENT_DATE
);

-- Create Versions Table
CREATE TABLE Versions (
    VersionID INT PRIMARY KEY AUTO_INCREMENT,
    NumeroVersion VARCHAR(50) NOT NULL,
    DatePublication DATE NOT NULL,
    PackageID INT,
    FOREIGN KEY (PackageID) REFERENCES Packages(PackageID) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Create Collaborations Table
CREATE TABLE Collaborations (
    CollaborationID INT PRIMARY KEY AUTO_INCREMENT,
    AuteurID INT,
    PackageID INT,
    FOREIGN KEY (AuteurID) REFERENCES Auteurs(AuteurID) ON DELETE CASCADE,
    FOREIGN KEY (PackageID) REFERENCES Packages(PackageID) ON DELETE CASCADE
);

-----------------------------------------------------------------------------------------------

--author 

INSERT INTO Auteurs (Nom) VALUES
('The jQuery Foundation'),
('Matt Zabriskie'),
('John-David Dalton'),
('Iskren Ivov Chernev'),
('Facebook'),
('Evan You'),
('Google'),
('TJ Holowaychuk'),
('Tobias Koppers'),
('Microsoft');

-- Packages

INSERT INTO Packages (Nom, Description) VALUES
('jquery', 'A fast, small, and feature-rich JavaScript library.'),
('axios', 'Promise-based HTTP client for the browser and Node.js.'),
('lodash', 'A modern JavaScript utility library delivering modularity.'),
('moment', 'Parse, validate, manipulate, and display dates and times.'),
('react', 'A JavaScript library for building user interfaces.'),
('vue', 'The Progressive JavaScript Framework.'),
('angular', 'Superheroic JavaScript MVW Framework.'),
('express', 'Fast, unopinionated, minimalist web framework for Node.js.'),
('webpack', 'Module bundler for JavaScript applications.'),
('typescript', 'TypeScript is a superset of JavaScript that compiles to clean JavaScript.');


-- Version 

INSERT INTO Versions (NumeroVersion, DatePublication, PackageID) VALUES
('3.6.0', '2024-05-05', 1),
('0.24.0', '2024-01-25', 2),
('4.17.21', '2024-10-11', 3),
('2.29.1', '2024-10-16', 4),
('18.2.0', '2024-10-15', 5),
('3.2.45', '2024-12-09', 6),
('12.2.16', '2024-05-15', 7),
('4.18.2', '2024-01-05', 8),
('5.75.0', '2024-06-13', 9),
('5.1.6', '2024-05-04', 10);


-- COLLAB



INSERT INTO Collaborations (AuteurID, PackageID) VALUES
(1, 1), -- jQuery Foundation → jquery
(2, 2), -- Matt Zabriskie → axios
(3, 3), -- John-David Dalton → lodash
(4, 4), -- Iskren Ivov Chernev → moment
(5, 5), -- Facebook → react
(6, 6), -- Evan You → vue
(7, 7), -- Google → angular
(8, 8), -- TJ Holowaychuk → express
(9, 9), -- Tobias Koppers → webpack
(10, 10); -- Microsoft → typescript
