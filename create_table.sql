DROP TABLE calculations;
CREATE TABLE IF NOT EXISTS calculations (
    id INT,
    calc VARCHAR(255)
);
SET @@SESSION.auto_increment_increment = 1;