-- 테이블 순서는 관계를 고려하여 한 번에 실행해도 에러가 발생하지 않게 정렬되었습니다.

-- Accounts Table Create SQL
CREATE TABLE Accounts
(
    `id`        VARCHAR(45)    NOT NULL, 
    `password`  VARCHAR(45)    NOT NULL, 
    `Email`     VARCHAR(45)    NOT NULL, 
    PRIMARY KEY (id)
);


-- Place_Continent Table Create SQL
CREATE TABLE Place_Continent
(
    `ContinentID`    INT            NOT NULL    AUTO_INCREMENT, 
    `ContinentName`  VARCHAR(45)    NULL, 
    PRIMARY KEY (ContinentID)
);


-- Place_Country Table Create SQL
CREATE TABLE Place_Country
(
    `CountryID`    INT            NOT NULL    AUTO_INCREMENT, 
    `ContinentID`  INT            NULL, 
    `CountryName`  VARCHAR(45)    NULL, 
    PRIMARY KEY (CountryID)
);

ALTER TABLE Place_Country
    ADD CONSTRAINT FK_Place_Country_ContinentID_Place_Continent_ContinentID FOREIGN KEY (ContinentID)
        REFERENCES Place_Continent (ContinentID) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- Post Table Create SQL
CREATE TABLE Post
(
    `PostID`   INT            NOT NULL    AUTO_INCREMENT, 
    `BoardID`  INT            NULL, 
    `title`    VARCHAR(45)    NULL, 
    `id`       VARCHAR(45)    NULL, 
    `content`  VARCHAR(45)    NULL, 
    `date`     TIMESTAMP      NULL, 
    PRIMARY KEY (PostID)
);

ALTER TABLE Post
    ADD CONSTRAINT FK_Post_id_Accounts_id FOREIGN KEY (id)
        REFERENCES Accounts (id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- Place_City Table Create SQL
CREATE TABLE Place_City
(
    `CityID`     INT            NOT NULL    AUTO_INCREMENT, 
    `CountryID`  INT            NULL, 
    `CityName`   VARCHAR(45)    NULL, 
    `Explain`    VARCHAR(45)    NULL, 
    PRIMARY KEY (CityID)
);

ALTER TABLE Place_City
    ADD CONSTRAINT FK_Place_City_CountryID_Place_Country_CountryID FOREIGN KEY (CountryID)
        REFERENCES Place_Country (CountryID) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- Admin Table Create SQL
CREATE TABLE Admin
(
    `id`    VARCHAR(45)    NOT NULL, 
    `Auth`  INT            NOT NULL, 
    PRIMARY KEY (id)
);

ALTER TABLE Admin
    ADD CONSTRAINT FK_Admin_id_Accounts_id FOREIGN KEY (id)
        REFERENCES Accounts (id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- Comment Table Create SQL
CREATE TABLE Comment
(
    `CommentID`  INT            NOT NULL    AUTO_INCREMENT, 
    `PostID`     INT            NULL, 
    `content`    VARCHAR(45)    NULL, 
    `id`         VARCHAR(45)    NULL, 
    `date`       TIMESTAMP      NULL, 
    PRIMARY KEY (CommentID)
);

ALTER TABLE Comment
    ADD CONSTRAINT FK_Comment_PostID_Post_PostID FOREIGN KEY (PostID)
        REFERENCES Post (PostID) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE Comment
    ADD CONSTRAINT FK_Comment_id_Accounts_id FOREIGN KEY (id)
        REFERENCES Accounts (id) ON DELETE RESTRICT ON UPDATE RESTRICT;


-- Notice Table Create SQL
CREATE TABLE Notice
(
    `NoticeID`  INT            NOT NULL    AUTO_INCREMENT, 
    `title`     VARCHAR(45)    NULL, 
    `content`   VARCHAR(45)    NULL, 
    `date`      TIMESTAMP      NULL, 
    PRIMARY KEY (NoticeID)
);


-- Place_Attraction Table Create SQL
CREATE TABLE Place_Attraction
(
    `AttractionID`    INT            NOT NULL    AUTO_INCREMENT, 
    `CityID`          INT            NULL, 
    `AttractionName`  VARCHAR(45)    NULL, 
    `Explain`         VARCHAR(45)    NULL, 
    PRIMARY KEY (AttractionID)
);

ALTER TABLE Place_Attraction
    ADD CONSTRAINT FK_Place_Attraction_CityID_Place_City_CityID FOREIGN KEY (CityID)
        REFERENCES Place_City (CityID) ON DELETE RESTRICT ON UPDATE RESTRICT;


