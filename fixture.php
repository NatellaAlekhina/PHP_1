<?php
/*

CREATE TABLE `tasks` (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                         user_id INTEGER NOT NULL,
                         description TEXT NOT NULL ,
                         is_done INTEGER(1) NOT NULL, comment text,
                         FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE `users` (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                         name TEXT,
                         login TEXT NOT NULL ,
                         password TEXT NOT NULL
);