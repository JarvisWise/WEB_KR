---------------------KR PHP
DROP TABLE blog_user CASCADE;
DROP TABLE article CASCADE;
DROP TABLE comment CASCADE;
DROP TABLE topic CASCADE;

--blog_user
CREATE TABLE blog_user (
    id INTEGER PRIMARY KEY ,
    username TEXT,
    email TEXT,
    password TEXT,
    image TEXT
);

--article
CREATE TABLE article (
    id INTEGER PRIMARY KEY ,
    title TEXT,
    description TEXT,
    image_path TEXT,
    markers TEXT,
    user_id INTEGER,
    topic_id INTEGER,
    date TEXT
);

--comments
CREATE TABLE comment (
    id INTEGER PRIMARY KEY ,
    text TEXT,
    username TEXT,
    user_id INTEGER,
    parent_id INTEGER,
    article_id INTEGER,
    date TEXT
);

--topic
CREATE TABLE topic (
    id INTEGER PRIMARY KEY ,
    name TEXT
);

INSERT INTO blog_user VALUES(1, 'admin', 'admin1@gmail.com', 'admin','base.jpg');
INSERT INTO blog_user VALUES(2, 'admin Demo', 'demo1@gmail.com', 'demo','base.jpg');
SELECT * FROM blog_user;
commit;