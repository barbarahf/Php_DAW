DROP SCHEMA IF EXISTS Books;
CREATE DATABASE Books;
USER Books;
DROP TABLE IF EXISTS  books;
create table books
(
    book_id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title   VARCHAR(45),
    author  VARCHAR(45),
    year YEAR,
    price   DOUBLE
);
INSERT INTO books (title,author,year, price) VALUES
    ('Desarrollo web con php y mysql', 'Luke Welling Y laura Thomson', 2005, 59.99);
INSERT INTO books (title,author,year, price) VALUE ('Jane Eyre',
                                                    'Charlotte Bronte', 1947, 15.99);