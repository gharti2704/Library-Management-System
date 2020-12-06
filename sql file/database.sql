USE library;

CREATE TABLE librarians(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
userName VARCHAR(50) UNIQUE,
password VARCHAR(50)
);

INSERT INTO librarians(name, userName, password) 
VALUES ('Marie', 'Marie123', '123'),
		('Raju', 'Raju123', '123');
        
-----------------------------------------------        
CREATE TABLE members(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(50),
lname VARCHAR(50),
email VARCHAR(50),
password VARCHAR(50)
);
-- --------------------------------------------------------

CREATE TABLE books(
		book_id INT NOT NULL AUTO_INCREMENT,
        isbn INT,
		title VARCHAR(100),
		author_fname VARCHAR(100),
		author_lname VARCHAR(100),
		released_year INT,
		stock_quantity INT,
		PRIMARY KEY(book_id)
	);
    
    
INSERT INTO books (title, author_fname, author_lname, released_year, stock_quantity, isbn)
VALUES
('10% Happier', 'Dan', 'Harris', 2014, 29, 256), 
('fake_book', 'Freida', 'Harris', 2001, 287, 428),
('Lincoln In The Bardo', 'George', 'Saunders', 2017, 50, 367),
('The Namesake', 'Jhumpa', 'Lahiri', 2003, 32, 291),
('Norse Mythology', 'Neil', 'Gaiman',2016, 43, 304),
('American Gods', 'Neil', 'Gaiman', 2001, 12, 465),
('Interpreter of Maladies', 'Jhumpa', 'Lahiri', 1996, 97, 198),
('A Hologram for the King: A Novel', 'Dave', 'Eggers', 2012, 154, 352),
('The Circle', 'Dave', 'Eggers', 2013, 26, 504),
('The Amazing Adventures of Kavalier & Clay', 'Michael', 'Chabon', 2000, 68, 634),
('Just Kids', 'Patti', 'Smith', 2010, 55, 304),
('A Heartbreaking Work of Staggering Genius', 'Dave', 'Eggers', 2001, 104, 437),
('Coraline', 'Neil', 'Gaiman', 2003, 100, 208),
('What We Talk About When We Talk About Love: Stories', 'Raymond', 'Carver', 1981, 23, 176),
("Where I'm Calling From: Selected Stories", 'Raymond', 'Carver', 1989, 12, 526),
('White Noise', 'Don', 'DeLillo', 1985, 49, 320),
('Cannery Row', 'John', 'Steinbeck', 1945, 95, 181),
('Oblivion: Stories', 'David', 'Foster Wallace', 2004, 172, 329),
('Consider the Lobster', 'David', 'Foster Wallace', 2005, 92, 343);


-- --------------------------------------------------------
CREATE TABLE borrowedBooks(
		book_id INT, 
        title VARCHAR(100),
        member_id INT,
        member_name VARCHAR(100),
        issued_date DATE
	);
    
    --------------------------------------------------
    CREATE TABLE selectedBooks(
    cnt INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    book_id INT(15),
    title VARCHAR(100),
    member_id INT(15),
    member_name VARCHAR(100)
    );
    