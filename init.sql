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

INSERT INTO topic VALUES(1, 'Education');
INSERT INTO topic VALUES(2, 'Education');
INSERT INTO topic VALUES(3, 'Trends');

INSERT INTO article VALUES(4, 'Education Article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nisl, consectetur posuere felis eu, laoreet volutpat leo. Sed gravida eu diam vitae facilisis. Maecenas efficitur dolor sed odio ullamcorper, vel egestas enim venenatis. Nulla finibus congue metus. Donec volutpat nisl ligula, sit amet tincidunt ante posuere eu. Integer scelerisque, mauris gravida scelerisque interdum, metus purus porttitor tortor, non condimentum libero massa sit amet erat. Pellentesque sollicitudin fringilla tortor nec ultricies. Nullam justo lorem, maximus a congue ac, ultrices eget ligula. Donec congue elementum vestibulum. Nunc volutpat tincidunt placerat. Nam sed orci non sem faucibus tempor. Sed a euismod nisi. Curabitur bibendum erat nec varius scelerisque. Suspendisse potenti. Fusce eleifend consectetur eros, non elementum elit commodo nec. Donec mollis neque in egestas egestas. Suspendisse lacinia eleifend nisl eget pulvinar. In iaculis justo ac mi ultricies malesuada. Mauris finibus nunc a molestie laoreet. Nam vel nisl in libero malesuada finibus volutpat porttitor lectus. Fusce rhoncus mauris vel ipsum mattis, vel bibendum tortor ultricies. Phasellus pharetra sapien sapien, a feugiat lorem pulvinar ac. Morbi pharetra lectus id eros viverra, lacinia sodales felis maximus. Etiam facilisis, leo pulvinar auctor ultrices, nisi ligula scelerisque magna, quis volutpat metus urna id nisl. Duis a augue at orci tempor aliquam vel placerat nisl. Nullam ut libero tincidunt, tempus nulla eu, cursus elit. Phasellus condimentum leo a vehicula scelerisque. Fusce fermentum risus eros, et pulvinar nisl viverra vitae. Morbi ac tincidunt magna. Cras eu euismod odio. Curabitur iaculis, metus sed porttitor lacinia, tellus purus maximus felis, in ornare lorem tellus tempor sapien. Nullam sapien nisl, consectetur ac neque sagittis, facilisis tristique est. Pellentesque condimentum libero at mattis venenatis. Etiam sed faucibus arcu, sit amet accumsan dui. Phasellus nec turpis et ex hendrerit facilisis. Duis facilisis consectetur ligula, vel cursus dolor elementum a.', null,'test', 1, 2, '2023-12-29');
INSERT INTO article VALUES(3, 'test3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nisl, consectetur posuere felis eu, laoreet volutpat leo. Sed gravida eu diam vitae facilisis. Maecenas efficitur dolor sed odio ullamcorper, vel egestas enim venenatis. Nulla finibus congue metus. Donec volutpat nisl ligula, sit amet tincidunt ante posuere eu. Integer scelerisque, mauris gravida scelerisque interdum, metus purus porttitor tortor, non condimentum libero massa sit amet erat. Pellentesque sollicitudin fringilla tortor nec ultricies. Nullam justo lorem, maximus a congue ac, ultrices eget ligula. Donec congue elementum vestibulum. Nunc volutpat tincidunt placerat. Nam sed orci non sem faucibus tempor. Sed a euismod nisi. Curabitur bibendum erat nec varius scelerisque. Suspendisse potenti. Fusce eleifend consectetur eros, non elementum elit commodo nec. Donec mollis neque in egestas egestas. Suspendisse lacinia eleifend nisl eget pulvinar. In iaculis justo ac mi ultricies malesuada. Mauris finibus nunc a molestie laoreet. Nam vel nisl in libero malesuada finibus volutpat porttitor lectus. Fusce rhoncus mauris vel ipsum mattis, vel bibendum tortor ultricies. Phasellus pharetra sapien sapien, a feugiat lorem pulvinar ac. Morbi pharetra lectus id eros viverra, lacinia sodales felis maximus. Etiam facilisis, leo pulvinar auctor ultrices, nisi ligula scelerisque magna, quis volutpat metus urna id nisl. Duis a augue at orci tempor aliquam vel placerat nisl. Nullam ut libero tincidunt, tempus nulla eu, cursus elit. Phasellus condimentum leo a vehicula scelerisque. Fusce fermentum risus eros, et pulvinar nisl viverra vitae. Morbi ac tincidunt magna. Cras eu euismod odio. Curabitur iaculis, metus sed porttitor lacinia, tellus purus maximus felis, in ornare lorem tellus tempor sapien. Nullam sapien nisl, consectetur ac neque sagittis, facilisis tristique est. Pellentesque condimentum libero at mattis venenatis. Etiam sed faucibus arcu, sit amet accumsan dui. Phasellus nec turpis et ex hendrerit facilisis. Duis facilisis consectetur ligula, vel cursus dolor elementum a.', '7a9355690f35454e83111f6b1266c5c3.jpg','test',1,1,'2023-12-29');
INSERT INTO article VALUES(2,'Test 2' ,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nisl, consectetur posuere felis eu, laoreet volutpat leo. Sed gravida eu diam vitae facilisis. Maecenas efficitur dolor sed odio ullamcorper, vel egestas enim venenatis. Nulla finibus congue metus. Donec volutpat nisl ligula, sit amet tincidunt ante posuere eu. Integer scelerisque, mauris gravida scelerisque interdum, metus purus porttitor tortor, non condimentum libero massa sit amet erat. Pellentesque sollicitudin fringilla tortor nec ultricies. Nullam justo lorem, maximus a congue ac, ultrices eget ligula. Donec congue elementum vestibulum. Nunc volutpat tincidunt placerat. Nam sed orci non sem faucibus tempor. Sed a euismod nisi. Curabitur bibendum erat nec varius scelerisque. Suspendisse potenti. Fusce eleifend consectetur eros, non elementum elit commodo nec. Donec mollis neque in egestas egestas. Suspendisse lacinia eleifend nisl eget pulvinar. In iaculis justo ac mi ultricies malesuada. Mauris finibus nunc a molestie laoreet. Nam vel nisl in libero malesuada finibus volutpat porttitor lectus. Fusce rhoncus mauris vel ipsum mattis, vel bibendum tortor ultricies. Phasellus pharetra sapien sapien, a feugiat lorem pulvinar ac. Morbi pharetra lectus id eros viverra, lacinia sodales felis maximus. Etiam facilisis, leo pulvinar auctor ultrices, nisi ligula scelerisque magna, quis volutpat metus urna id nisl. Duis a augue at orci tempor aliquam vel placerat nisl. Nullam ut libero tincidunt, tempus nulla eu, cursus elit. Phasellus condimentum leo a vehicula scelerisque. Fusce fermentum risus eros, et pulvinar nisl viverra vitae. Morbi ac tincidunt magna. Cras eu euismod odio. Curabitur iaculis, metus sed porttitor lacinia, tellus purus maximus felis, in ornare lorem tellus tempor sapien. Nullam sapien nisl, consectetur ac neque sagittis, facilisis tristique est. Pellentesque condimentum libero at mattis venenatis. Etiam sed faucibus arcu, sit amet accumsan dui. Phasellus nec turpis et ex hendrerit facilisis. Duis facilisis consectetur ligula, vel cursus dolor elementum a.', null,'test',1,1,'2023-12-28');
INSERT INTO article VALUES(1, 'Lets start it now','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nisl, consectetur posuere felis eu, laoreet volutpat leo. Sed gravida eu diam vitae facilisis. Maecenas efficitur dolor sed odio ullamcorper, vel egestas enim venenatis. Nulla finibus congue metus. Donec volutpat nisl ligula, sit amet tincidunt ante posuere eu. Integer scelerisque, mauris gravida scelerisque interdum, metus purus porttitor tortor, non condimentum libero massa sit amet erat. Pellentesque sollicitudin fringilla tortor nec ultricies. Nullam justo lorem, maximus a congue ac, ultrices eget ligula. Donec congue elementum vestibulum. Nunc volutpat tincidunt placerat. Nam sed orci non sem faucibus tempor. Sed a euismod nisi. Curabitur bibendum erat nec varius scelerisque. Suspendisse potenti. Fusce eleifend consectetur eros, non elementum elit commodo nec. Donec mollis neque in egestas egestas. Suspendisse lacinia eleifend nisl eget pulvinar. In iaculis justo ac mi ultricies malesuada. Mauris finibus nunc a molestie laoreet. Nam vel nisl in libero malesuada finibus volutpat porttitor lectus. Fusce rhoncus mauris vel ipsum mattis, vel bibendum tortor ultricies. Phasellus pharetra sapien sapien, a feugiat lorem pulvinar ac. Morbi pharetra lectus id eros viverra, lacinia sodales felis maximus. Etiam facilisis, leo pulvinar auctor ultrices, nisi ligula scelerisque magna, quis volutpat metus urna id nisl. Duis a augue at orci tempor aliquam vel placerat nisl. Nullam ut libero tincidunt, tempus nulla eu, cursus elit. Phasellus condimentum leo a vehicula scelerisque. Fusce fermentum risus eros, et pulvinar nisl viverra vitae. Morbi ac tincidunt magna. Cras eu euismod odio. Curabitur iaculis, metus sed porttitor lacinia, tellus purus maximus felis, in ornare lorem tellus tempor sapien. Nullam sapien nisl, consectetur ac neque sagittis, facilisis tristique est. Pellentesque condimentum libero at mattis venenatis. Etiam sed faucibus arcu, sit amet accumsan dui. Phasellus nec turpis et ex hendrerit facilisis. Duis facilisis consectetur ligula, vel cursus dolor elementum a.','820e14d04bd49f5fee757cc42478816f.jpg','test',1,1,'2023-12-27');

INSERT INTO comment VALUES(2,'fsdfsfs dfsdfsfsdfs sadddddd dddddw weqweq  ewqe  sad sa d sada s dasdasda adasdas fdsfsdfs zxczxz asdsadsa' ,'some guy',null,null,3,'2023-12-29');
INSERT INTO comment VALUES(3,'asdsa ssafas fasfas e w eqw ew e wq e qe qe wq ewq e q ewq e w ew e qw e wqe wq d a d as d as da d asdsad asdasdsad  d asdsadasd s dsadsad   etertr t re y r yr etretetret','Random Person',null,2,3, '2023-12-29');
INSERT INTO comment VALUES(4,'This my last test  my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my','admin',1,null,3,'2023-12-29');
INSERT INTO comment VALUES(7,'This my last test  my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my', 'Stranger2', null,4,3,'2023-12-29');
INSERT INTO comment VALUES(8,'This my last test  my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my last test my','admin',1,7,3,'2023-12-29');

SELECT * FROM blog_user;
commit;