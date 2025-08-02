CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `img` TEXT,
  `name` VARCHAR(200) NOT NULL,
  `email` VARCHAR(200) NOT NULL UNIQUE,
  `password` VARCHAR(200) NOT NULL,
  `contact` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

select *from users;

CREATE TABLE job_openings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    company VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    logo VARCHAR(255) DEFAULT 'imgs/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO job_openings (title, company, location, logo) VALUES
('Frontend Developer', 'Google', 'Bangalore, India', 'imgs/GOOGLE.jpg'),
('Data Analyst', 'Amazon', 'Hyderabad, India', 'imgs/AMAZON.jpg'),
('Data Scientist', 'Microsoft', 'Bangalore, Karnataka', 'imgs/MICROSOFT.png'),
('System Analyst', 'Apple', 'Chennai, Tamil Nadu', 'imgs/APPLE.png'),
('Social Media Strategist', 'Meta', 'Bangalore, Karnataka', 'imgs/META.jpg'),
('Data Analyst Intern', 'Cognizant India','Ahmedabad,Gujarat','imgs/COGNIZANT.jpg'),
('UX Designer','Meesho','Maharashtra,Mumbai','imgs/MEESHO.png'),
('UI Designer','Meesho','Maharashtra,Mumbai','imgs/MEESHO.png'),
('Chartered Accountant','PayTm','Ahmedabad,Gujarat','imgs/PAYTM.png');

select *from job_openings;

CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    job_id INT,
    job_description VARCHAR(100),
    company VARCHAR(100),
    fullname VARCHAR(255),
    email VARCHAR(255),
    linkedin_url TEXT,
    status ENUM('Applied', 'Interviewing', 'Rejected', 'Hired') DEFAULT 'Applied',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (job_id) REFERENCES job_openings(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

select *from applications;

SET SQL_SAFE_UPDATES = 1;
SET SQL_SAFE_UPDATES = 0;

