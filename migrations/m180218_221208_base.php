<?php

use yii\db\Migration;

/**
 * Class m180218_221208_base
 */
class m180218_221208_base extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $baseQuery = 'CREATE TABLE `project` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	`team_id` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`usertype_id` INT,
	`username` varchar(255),
	`password` varchar(255),
	`password_hash` TEXT,
	`password_reset_token` TEXT,
	`email` varchar(255),
	`auth_key` TEXT,
	`status` INT NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
);

CREATE TABLE `usertype` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	PRIMARY KEY (`id`)
);

CREATE TABLE `version` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`project_id` INT,
	`name` varchar(255),
	`description` TEXT,
	`create_date` DATETIME,
	`finish_date` DATETIME,
	PRIMARY KEY (`id`)
);

CREATE TABLE `task` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	`description` TEXT,
	`create_date` DATETIME,
	`finish_date` DATETIME,
	`plan_date` DATETIME,
	`tasktype_id` INT,
	`taskpriority_id` INT,
	`taskstatus_id` INT,
	`sprint_id` INT,
	`version_id` INT,
	`resolved_version_id` INT,
	`detected_version_id` INT,
	`performer_id` INT NOT NULL UNIQUE,
	`owner_id` INT,
	`parenttask_id` INT,
	`relatedtask_id` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `tasktype` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	PRIMARY KEY (`id`)
);

CREATE TABLE `taskpriority` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	`level` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `taskstatus` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	`finally` INT(1) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `attachment` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`task_id` INT,
	`file` TEXT,
	`type` TEXT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `sprint` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255),
	`version_id` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `team` (
	`id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `teamusers` (
	`team_id` INT,
	`user_id` INT,
	`teamrole_id` INT
);

CREATE TABLE `teamrole` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`rolename` varchar(255),
	PRIMARY KEY (`id`)
);

CREATE TABLE `taskviewer` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`task_id` INT,
	`user_id` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `comment` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`task_id` INT,
	`text` TEXT,
	PRIMARY KEY (`id`)
);

ALTER TABLE `project` ADD CONSTRAINT `project_fk0` FOREIGN KEY (`team_id`) REFERENCES `team`(`id`);

ALTER TABLE `user` ADD CONSTRAINT `user_fk0` FOREIGN KEY (`usertype_id`) REFERENCES `usertype`(`id`);

ALTER TABLE `version` ADD CONSTRAINT `version_fk0` FOREIGN KEY (`project_id`) REFERENCES `project`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk0` FOREIGN KEY (`tasktype_id`) REFERENCES `tasktype`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk1` FOREIGN KEY (`taskpriority_id`) REFERENCES `taskpriority`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk2` FOREIGN KEY (`taskstatus_id`) REFERENCES `taskstatus`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk3` FOREIGN KEY (`sprint_id`) REFERENCES `sprint`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk4` FOREIGN KEY (`version_id`) REFERENCES `version`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk5` FOREIGN KEY (`resolved_version_id`) REFERENCES `version`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk6` FOREIGN KEY (`detected_version_id`) REFERENCES `version`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk7` FOREIGN KEY (`performer_id`) REFERENCES `user`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk8` FOREIGN KEY (`owner_id`) REFERENCES `user`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk9` FOREIGN KEY (`parenttask_id`) REFERENCES `task`(`id`);

ALTER TABLE `task` ADD CONSTRAINT `task_fk10` FOREIGN KEY (`relatedtask_id`) REFERENCES `task`(`id`);

ALTER TABLE `attachment` ADD CONSTRAINT `attachment_fk0` FOREIGN KEY (`task_id`) REFERENCES `task`(`id`);

ALTER TABLE `sprint` ADD CONSTRAINT `sprint_fk0` FOREIGN KEY (`version_id`) REFERENCES `version`(`id`);

ALTER TABLE `teamusers` ADD CONSTRAINT `teamusers_fk0` FOREIGN KEY (`team_id`) REFERENCES `team`(`id`);

ALTER TABLE `teamusers` ADD CONSTRAINT `teamusers_fk1` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`);

ALTER TABLE `teamusers` ADD CONSTRAINT `teamusers_fk2` FOREIGN KEY (`teamrole_id`) REFERENCES `teamrole`(`id`);

ALTER TABLE `taskviewer` ADD CONSTRAINT `taskviewer_fk0` FOREIGN KEY (`task_id`) REFERENCES `task`(`id`);

ALTER TABLE `taskviewer` ADD CONSTRAINT `taskviewer_fk1` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`);

ALTER TABLE `comment` ADD CONSTRAINT `comment_fk0` FOREIGN KEY (`task_id`) REFERENCES `task`(`id`);
';

        Yii::$app->db->createCommand($baseQuery)
            ->queryAll();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $baseQuery = 'ALTER TABLE `project` DROP FOREIGN KEY `project_fk0`;

ALTER TABLE `user` DROP FOREIGN KEY `user_fk0`;

ALTER TABLE `version` DROP FOREIGN KEY `version_fk0`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk0`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk1`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk2`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk3`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk4`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk5`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk6`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk7`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk8`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk9`;

ALTER TABLE `task` DROP FOREIGN KEY `task_fk10`;

ALTER TABLE `attachment` DROP FOREIGN KEY `attachment_fk0`;

ALTER TABLE `sprint` DROP FOREIGN KEY `sprint_fk0`;

ALTER TABLE `teamusers` DROP FOREIGN KEY `teamusers_fk0`;

ALTER TABLE `teamusers` DROP FOREIGN KEY `teamusers_fk1`;

ALTER TABLE `teamusers` DROP FOREIGN KEY `teamusers_fk2`;

ALTER TABLE `taskviewer` DROP FOREIGN KEY `taskviewer_fk0`;

ALTER TABLE `taskviewer` DROP FOREIGN KEY `taskviewer_fk1`;

ALTER TABLE `comment` DROP FOREIGN KEY `comment_fk0`;

DROP TABLE IF EXISTS `project`;

DROP TABLE IF EXISTS `user`;

DROP TABLE IF EXISTS `usertype`;

DROP TABLE IF EXISTS `version`;

DROP TABLE IF EXISTS `task`;

DROP TABLE IF EXISTS `tasktype`;

DROP TABLE IF EXISTS `taskpriority`;

DROP TABLE IF EXISTS `taskstatus`;

DROP TABLE IF EXISTS `attachment`;

DROP TABLE IF EXISTS `sprint`;

DROP TABLE IF EXISTS `team`;

DROP TABLE IF EXISTS `teamusers`;

DROP TABLE IF EXISTS `teamrole`;

DROP TABLE IF EXISTS `taskviewer`;

DROP TABLE IF EXISTS `comment`;
';

        Yii::$app->db->createCommand($baseQuery)
            ->queryAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180218_221208_base cannot be reverted.\n";

        return false;
    }
    */
}
