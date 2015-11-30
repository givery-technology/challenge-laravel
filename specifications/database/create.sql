CREATE TABLE IF NOT EXISTS users (
  id integer AUTOINCREMENT NOT NULL PRIMARY KEY,
  name varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  birthday text NULL,
  company text NULL,
  location text NULL,
  created_at text NOT NULL,
  updated_at text NOT NULL,
  UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS followers (
  id integer AUTOINCREMENT NOT NULL PRIMARY KEY,
  user_id int NOT NULL REFERENCES users(id), -- User who is followed
  followed_by int NOT NULL REFERENCES users(id), -- User one who following  
  UNIQUE (user_id, follower_id)
);
