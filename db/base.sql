CREATE TABLE Users (
    id_user int NOT NULL AUTO_INCREMENT,
    username varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    is_admin boolean DEFAULT 0,
    date date,
    PRIMARY KEY (id_user)
);
CREATE TABLE Passwords (
    id_passwd int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    passwd varchar(100),
    PRIMARY KEY (id_passwd),
    FOREIGN KEY (id_user) REFERENCES Users(id_user)
);
CREATE TABLE Posts (
    id_post int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    content varchar(250) NOT NULL,
    date datetime,
    category varchar(25),
    PRIMARY KEY (id_post),
    FOREIGN KEY (id_user) REFERENCES Users(id_user)
);
CREATE TABLE Comments (
    id_comment int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    id_post int NOT NULL,
    content text NOT NULL,
    date datetime,
    PRIMARY KEY (id_comment),
    FOREIGN KEY (id_user) REFERENCES Users(id_user),
    FOREIGN KEY (id_post) REFERENCES Posts(id_post)
)