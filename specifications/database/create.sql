CREATE TABLE IF NOT EXISTS users (
  id integer PRIMARY KEY AUTOINCREMENT,
  name varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  birthday date NULL,
  company text NULL,
  location text NULL,
  UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS followers (
  id integer PRIMARY KEY AUTOINCREMENT,
  user_id integer NOT NULL REFERENCES users(id), -- User who is followed
  followed_by integer NOT NULL REFERENCES users(id), -- User one who following  
  UNIQUE (user_id, followed_by)
);
