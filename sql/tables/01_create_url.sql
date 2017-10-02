CREATE TABLE url (
  url_id CHAR(36) NOT NULL,
  original_url VARCHAR(1024) NOT NULL,
  short_url VARCHAR(128) NOT NULL,
  number_of_usage INT,
  PRIMARY KEY (url_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

