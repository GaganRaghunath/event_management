CREATE TABLE IF NOT EXISTS `student_table`(
  `srn` varchar(255) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `department_id` int NOT NULL,
  `semester` int NOT NULL,
  `section` varchar(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `dob` DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `professor`(
  `teacher_id` varchar(255) NOT NULL PRIMARY KEY,
  `teacher_name` varchar(255) NOT NULL,
  `department_id` int NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `teacher_mobno` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `teacher_dob` DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB;

INSERT INTO `admin`(`admin_name`,`admin_password`) VALUES('admin','admin');

CREATE TABLE IF  NOT EXISTS `events_table`(
  `event_id` varchar(255) PRIMARY KEY NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `department_id` int NOT NULL,
  `semester` int NOT NULL,
  `event_rules` TEXT,
  `event_desc` TEXT NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `amount` bigint,
  `location` varchar(255)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `subscribers`(
  `subscriber_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `subscriber_email` varchar(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `bookings`(
  `id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `srn` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `department_id` int NOT NULL
) ENGINE=InnoDB;

ALTER TABLE `student_table`
ADD KEY `department_id`(`department_id`);

ALTER TABLE `student_table`
ADD CONSTRAINT `department_fk` FOREIGN KEY(`department_id`) REFERENCES `department`(`department_id`);

ALTER TABLE `professor`
ADD KEY `department_id`(`department_id`);

ALTER TABLE `professor`
ADD CONSTRAINT `department_fk_1` FOREIGN KEY(`department_id`) REFERENCES `department`(`department_id`);

ALTER TABLE `bookings`
ADD KEY `srn`(`srn`),
ADD KEY `event_id`(`event_id`),
ADD KEY `department_id`(`department_id`);

ALTER TABLE `bookings`
ADD CONSTRAINT `srn_fk` FOREIGN KEY(`srn`) REFERENCES `student_table`(`srn`),
ADD CONSTRAINT `event_id_fk` FOREIGN KEY(`event_id`) REFERENCES `events_table`(`event_id`),
ADD CONSTRAINT `department_fk_2` FOREIGN KEY(`department_id`) REFERENCES `department`(`department_id`);
