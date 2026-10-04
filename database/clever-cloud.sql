-- Select the database assigned by Clever Cloud before importing this file.
-- This script intentionally does not create or select a database because the
-- Clever Cloud DEV user manages tables but cannot create databases.

CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

DELETE FROM tasks;
DELETE FROM users;
ALTER TABLE tasks AUTO_INCREMENT = 1;
ALTER TABLE users AUTO_INCREMENT = 1;
SET time_zone = '+08:00';

INSERT INTO tasks (title, status, task_date, created_at) VALUES
  ('Review yesterday''s project notes', 'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY), DATE_SUB(NOW(), INTERVAL 26 HOUR)),
  ('Send the weekly progress summary', 'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY), DATE_SUB(NOW(), INTERVAL 25 HOUR)),
  ('Plan the top priorities for today', 'completed', CURDATE(), DATE_SUB(NOW(), INTERVAL 4 HOUR)),
  ('Finish the dashboard wireframes', 'in-progress', CURDATE(), DATE_SUB(NOW(), INTERVAL 3 HOUR)),
  ('Meet with the product team', 'pending', CURDATE(), DATE_SUB(NOW(), INTERVAL 2 HOUR)),
  ('Prepare tomorrow''s handoff notes', 'pending', CURDATE(), DATE_SUB(NOW(), INTERVAL 1 HOUR)),
  ('Review customer feedback', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
  ('Outline the next sprint', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW());

INSERT INTO users (username, full_name, email, created_at) VALUES
  ('alex.morgan', 'Alex Morgan', 'alex.morgan@example.com', NOW());
