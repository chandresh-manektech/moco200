-- MySQL dump 10.13  Distrib 5.5.43, for Linux (x86_64)
--
-- Host: web19.extendcp.co.uk    Database: cl47-moco
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `moco_commentmeta`
--

DROP TABLE IF EXISTS `moco_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_commentmeta`
--

LOCK TABLES `moco_commentmeta` WRITE;
/*!40000 ALTER TABLE `moco_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `moco_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_comments`
--

DROP TABLE IF EXISTS `moco_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_comments`
--

LOCK TABLES `moco_comments` WRITE;
/*!40000 ALTER TABLE `moco_comments` DISABLE KEYS */;
INSERT INTO `moco_comments` VALUES (1,1,'Mr WordPress','','https://wordpress.org/','','2015-11-23 06:02:33','2015-11-23 06:02:33','Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.',0,'1','','',0,0);
/*!40000 ALTER TABLE `moco_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_links`
--

DROP TABLE IF EXISTS `moco_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_links`
--

LOCK TABLES `moco_links` WRITE;
/*!40000 ALTER TABLE `moco_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `moco_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_options`
--

DROP TABLE IF EXISTS `moco_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_options`
--

LOCK TABLES `moco_options` WRITE;
/*!40000 ALTER TABLE `moco_options` DISABLE KEYS */;
INSERT INTO `moco_options` VALUES (1,'siteurl','http://project-demo-server.info/moco','yes'),(2,'home','http://project-demo-server.info/moco','yes'),(3,'blogname','Monreo County Bicentennial','yes'),(4,'blogdescription','Just another WordPress site','yes'),(5,'users_can_register','0','yes'),(6,'admin_email','testineed@project-demo-server.info','yes'),(7,'start_of_week','1','yes'),(8,'use_balanceTags','0','yes'),(9,'use_smilies','1','yes'),(10,'require_name_email','1','yes'),(11,'comments_notify','1','yes'),(12,'posts_per_rss','10','yes'),(13,'rss_use_excerpt','0','yes'),(14,'mailserver_url','mail.example.com','yes'),(15,'mailserver_login','login@example.com','yes'),(16,'mailserver_pass','password','yes'),(17,'mailserver_port','110','yes'),(18,'default_category','1','yes'),(19,'default_comment_status','open','yes'),(20,'default_ping_status','open','yes'),(21,'default_pingback_flag','1','yes'),(22,'posts_per_page','10','yes'),(23,'date_format','F j, Y','yes'),(24,'time_format','g:i a','yes'),(25,'links_updated_date_format','F j, Y g:i a','yes'),(26,'comment_moderation','0','yes'),(27,'moderation_notify','1','yes'),(28,'permalink_structure','/%year%/%monthnum%/%day%/%postname%/','yes'),(29,'gzipcompression','0','yes'),(30,'hack_file','0','yes'),(31,'blog_charset','UTF-8','yes'),(32,'moderation_keys','','no'),(33,'active_plugins','a:2:{i:0;s:37:\"post-types-order/post-types-order.php\";i:1;s:47:\"regenerate-thumbnails/regenerate-thumbnails.php\";}','yes'),(34,'category_base','','yes'),(35,'ping_sites','http://rpc.pingomatic.com/','yes'),(36,'advanced_edit','0','yes'),(37,'comment_max_links','2','yes'),(38,'gmt_offset','0','yes'),(39,'default_email_category','1','yes'),(40,'recently_edited','a:3:{i:0;s:95:\"/home/sites/project-demo-server.info/public_html/moco/wp-content/themes/moco/tp_events_page.php\";i:2;s:86:\"/home/sites/project-demo-server.info/public_html/moco/wp-content/themes/moco/style.css\";i:3;s:0:\"\";}','no'),(41,'template','moco','yes'),(42,'stylesheet','moco','yes'),(43,'comment_whitelist','1','yes'),(44,'blacklist_keys','','no'),(45,'comment_registration','0','yes'),(46,'html_type','text/html','yes'),(47,'use_trackback','0','yes'),(48,'default_role','subscriber','yes'),(49,'db_version','33056','yes'),(50,'uploads_use_yearmonth_folders','1','yes'),(51,'upload_path','','yes'),(52,'blog_public','1','yes'),(53,'default_link_category','2','yes'),(54,'show_on_front','page','yes'),(55,'tag_base','','yes'),(56,'show_avatars','1','yes'),(57,'avatar_rating','G','yes'),(58,'upload_url_path','','yes'),(59,'thumbnail_size_w','150','yes'),(60,'thumbnail_size_h','150','yes'),(61,'thumbnail_crop','1','yes'),(62,'medium_size_w','300','yes'),(63,'medium_size_h','300','yes'),(64,'avatar_default','mystery','yes'),(65,'large_size_w','1024','yes'),(66,'large_size_h','1024','yes'),(67,'image_default_link_type','file','yes'),(68,'image_default_size','','yes'),(69,'image_default_align','','yes'),(70,'close_comments_for_old_posts','0','yes'),(71,'close_comments_days_old','14','yes'),(72,'thread_comments','1','yes'),(73,'thread_comments_depth','5','yes'),(74,'page_comments','0','yes'),(75,'comments_per_page','50','yes'),(76,'default_comments_page','newest','yes'),(77,'comment_order','asc','yes'),(78,'sticky_posts','a:0:{}','yes'),(79,'widget_categories','a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}','yes'),(80,'widget_text','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(81,'widget_rss','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(82,'uninstall_plugins','a:0:{}','no'),(83,'timezone_string','','yes'),(84,'page_for_posts','0','yes'),(85,'page_on_front','5','yes'),(86,'default_post_format','0','yes'),(87,'link_manager_enabled','0','yes'),(88,'finished_splitting_shared_terms','1','yes'),(89,'initial_db_version','33056','yes'),(90,'moco_user_roles','a:6:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:9:\"add_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:6:\"client\";a:2:{s:4:\"name\";s:6:\"Client\";s:12:\"capabilities\";a:54:{s:4:\"read\";b:1;s:10:\"edit_posts\";b:1;s:12:\"delete_posts\";b:0;s:13:\"switch_themes\";b:0;s:11:\"edit_themes\";b:0;s:18:\"edit_theme_options\";b:1;s:16:\"activate_plugins\";b:0;s:12:\"edit_plugins\";b:0;s:15:\"install_plugins\";b:0;s:10:\"edit_users\";b:0;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:13:\"publish_pages\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:12:\"delete_pages\";b:0;s:19:\"delete_others_pages\";b:0;s:22:\"delete_published_pages\";b:0;s:19:\"delete_others_posts\";b:0;s:22:\"delete_published_posts\";b:0;s:20:\"delete_private_posts\";b:0;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:0;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:0;s:12:\"create_users\";b:0;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:0;s:14:\"delete_plugins\";b:0;s:13:\"update_themes\";b:0;s:11:\"update_core\";b:0;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:0;s:9:\"add_users\";b:0;s:13:\"promote_users\";b:1;s:13:\"delete_themes\";b:0;s:6:\"export\";b:0;s:12:\"edit_comment\";b:1;s:14:\"manage_network\";b:0;s:12:\"manage_sites\";b:0;s:20:\"manage_network_users\";b:0;s:21:\"manage_network_themes\";b:0;s:22:\"manage_network_options\";b:0;s:13:\"administrator\";b:1;}}}','yes'),(91,'widget_search','a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes'),(92,'widget_recent-posts','a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}','yes'),(93,'widget_recent-comments','a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}','yes'),(94,'widget_archives','a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}','yes'),(95,'widget_meta','a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes'),(96,'sidebars_widgets','a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:6:\"search\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:7:\"sidebar\";N;s:13:\"array_version\";i:3;}','yes'),(98,'cron','a:5:{i:1448388154;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1448391600;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1448431368;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1448434237;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}','yes'),(100,'rewrite_rules','a:58:{s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(/[0-9]+)?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:20:\"(.?.+?)(/[0-9]+)?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}','yes'),(102,'_site_transient_update_core','O:8:\"stdClass\":3:{s:7:\"updates\";a:0:{}s:15:\"version_checked\";s:5:\"4.3.1\";s:12:\"last_checked\";i:1448350857;}','yes'),(107,'_transient_random_seed','f1e25b86ebd154b0357ded30fee157e8','yes'),(109,'_transient_timeout_plugin_slugs','1448437260','no'),(110,'_transient_plugin_slugs','a:4:{i:0;s:19:\"akismet/akismet.php\";i:1;s:9:\"hello.php\";i:2;s:37:\"post-types-order/post-types-order.php\";i:3;s:47:\"regenerate-thumbnails/regenerate-thumbnails.php\";}','no'),(113,'can_compress_scripts','1','yes'),(114,'_site_transient_timeout_wporg_theme_feature_list','1448269619','yes'),(115,'_site_transient_wporg_theme_feature_list','a:0:{}','yes'),(116,'widget_calendar','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(117,'widget_mychildwidget','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(118,'widget_nav_menu','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(119,'widget_myimagewidget','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(120,'widget_pages','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(122,'widget_tag_cloud','a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(125,'current_theme','Monroe County Bicentennial','yes'),(126,'theme_mods_mytheme','a:2:{i:0;b:0;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1448259438;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:6:\"search\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:7:\"sidebar\";a:0:{}}}}','yes'),(127,'theme_switched','','yes'),(128,'theme_switched_via_customizer','','yes'),(129,'_site_transient_update_themes','O:8:\"stdClass\":1:{s:12:\"last_checked\";i:1448350858;}','yes'),(130,'theme_mods_twentyfifteen','a:1:{s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1448259442;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}','yes'),(131,'theme_mods_moco','a:2:{i:0;b:0;s:18:\"nav_menu_locations\";a:4:{s:11:\"header_menu\";i:2;s:11:\"footer_menu\";i:3;s:13:\"user_reg_menu\";i:4;s:17:\"user_profile_menu\";i:5;}}','yes'),(133,'reg_page_val','6','yes'),(134,'log_page_val','7','yes'),(135,'profile_page_val','8','yes'),(136,'logout_page_val','9','yes'),(137,'forgotpass_page_val','10','yes'),(138,'menu_check','1','yes'),(141,'logo_image','','yes'),(142,'my_favicon_icon','','yes'),(143,'header_banner_image','http://project-demo-server.info/moco/wp-content/uploads/2015/11/header-graphic.png','yes'),(144,'google_analytics_val','','yes'),(148,'nav_menu_options','a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}','yes'),(149,'developermode','','yes'),(150,'facebook_val','https://www.facebook.com/MonroeCountyIllinois200','yes'),(153,'footer_designby_text','Website Hosting &amp; Design by: <a href=\"http://www.visionwebsoft.com\" target=\"_blank\">VisionWebSoft</a>','yes'),(157,'recently_activated','a:1:{s:33:\"wp-copyprotect/wp-copyprotect.php\";i:1448341692;}','yes'),(166,'_transient_timeout_dash_88ae138922fe95674369b1cb3d215a2b','1448384737','no'),(167,'_transient_dash_88ae138922fe95674369b1cb3d215a2b','<div class=\"rss-widget\"><p><strong>RSS Error</strong>: WP HTTP Error: Could not resolve host: wordpress.org</p></div><div class=\"rss-widget\"><p><strong>RSS Error</strong>: WP HTTP Error: Could not resolve host: planet.wordpress.org</p></div><div class=\"rss-widget\"><ul></ul></div>','no'),(171,'CopyProtect_nrc','1','yes'),(172,'CopyProtect_nts','CopyProtect_nts','yes'),(173,'CopyProtect_nrc_text','','yes'),(174,'CopyProtect_credit','CopyProtect_credit','yes'),(175,'CopyProtect_user_setting','0','yes'),(188,'_site_transient_update_plugins','O:8:\"stdClass\":1:{s:12:\"last_checked\";i:1448350860;}','yes'),(189,'cpto_options','a:3:{s:8:\"autosort\";s:1:\"1\";s:9:\"adminsort\";s:1:\"1\";s:10:\"capability\";s:13:\"switch_themes\";}','yes'),(190,'CPT_configured','TRUE','yes'),(192,'_site_transient_timeout_browser_f6a8ca8cd0cdd833acd96a7745095f81','1448976003','yes'),(193,'_site_transient_browser_f6a8ca8cd0cdd833acd96a7745095f81','a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:7:\"Firefox\";s:7:\"version\";s:4:\"42.0\";s:10:\"update_url\";s:23:\"http://www.firefox.com/\";s:7:\"img_src\";s:50:\"http://s.wordpress.org/images/browsers/firefox.png\";s:11:\"img_src_ssl\";s:49:\"https://wordpress.org/images/browsers/firefox.png\";s:15:\"current_version\";s:2:\"16\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}','yes'),(194,'_site_transient_timeout_theme_roots','1448373024','yes'),(195,'_site_transient_theme_roots','a:4:{s:4:\"moco\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:14:\"twentyfourteen\";s:7:\"/themes\";s:14:\"twentythirteen\";s:7:\"/themes\";}','yes');
/*!40000 ALTER TABLE `moco_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_postmeta`
--

DROP TABLE IF EXISTS `moco_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_postmeta`
--

LOCK TABLES `moco_postmeta` WRITE;
/*!40000 ALTER TABLE `moco_postmeta` DISABLE KEYS */;
INSERT INTO `moco_postmeta` VALUES (4,5,'_wp_page_template','tpl_home_page.php'),(11,17,'_menu_item_type','post_type'),(12,17,'_menu_item_menu_item_parent','0'),(13,17,'_menu_item_object_id','5'),(14,17,'_menu_item_object','page'),(15,17,'_menu_item_target',''),(16,17,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(17,17,'_menu_item_xfn',''),(18,17,'_menu_item_url',''),(43,21,'_menu_item_type','post_type'),(44,21,'_menu_item_menu_item_parent','0'),(45,21,'_menu_item_object_id','5'),(46,21,'_menu_item_object','page'),(47,21,'_menu_item_target',''),(48,21,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(49,21,'_menu_item_xfn',''),(50,21,'_menu_item_url',''),(115,30,'_wp_attached_file','2015/11/header-graphic.png'),(116,30,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:1170;s:6:\"height\";i:243;s:4:\"file\";s:26:\"2015/11/header-graphic.png\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:26:\"header-graphic-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:25:\"header-graphic-300x62.png\";s:5:\"width\";i:300;s:6:\"height\";i:62;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:27:\"header-graphic-1024x213.png\";s:5:\"width\";i:1024;s:6:\"height\";i:213;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:26:\"header-graphic-390x243.png\";s:5:\"width\";i:390;s:6:\"height\";i:243;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(117,5,'_edit_lock','1448270191:1'),(118,32,'_edit_last','1'),(119,32,'_edit_lock','1448276841:1'),(120,32,'_wp_page_template','tpl_sponsorship_page.php'),(121,33,'_edit_last','1'),(122,33,'_wp_page_template','tp_events_page.php'),(123,33,'_edit_lock','1448276839:1'),(124,36,'_menu_item_type','post_type'),(125,36,'_menu_item_menu_item_parent','0'),(126,36,'_menu_item_object_id','33'),(127,36,'_menu_item_object','page'),(128,36,'_menu_item_target',''),(129,36,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(130,36,'_menu_item_xfn',''),(131,36,'_menu_item_url',''),(133,37,'_menu_item_type','post_type'),(134,37,'_menu_item_menu_item_parent','0'),(135,37,'_menu_item_object_id','32'),(136,37,'_menu_item_object','page'),(137,37,'_menu_item_target',''),(138,37,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(139,37,'_menu_item_xfn',''),(140,37,'_menu_item_url',''),(142,38,'_menu_item_type','post_type'),(143,38,'_menu_item_menu_item_parent','0'),(144,38,'_menu_item_object_id','33'),(145,38,'_menu_item_object','page'),(146,38,'_menu_item_target',''),(147,38,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(148,38,'_menu_item_xfn',''),(149,38,'_menu_item_url',''),(151,39,'_menu_item_type','post_type'),(152,39,'_menu_item_menu_item_parent','0'),(153,39,'_menu_item_object_id','32'),(154,39,'_menu_item_object','page'),(155,39,'_menu_item_target',''),(156,39,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(157,39,'_menu_item_xfn',''),(158,39,'_menu_item_url',''),(160,5,'_edit_last','1'),(161,41,'_edit_last','1'),(162,41,'_edit_lock','1448270206:1'),(163,41,'_wp_page_template','tpl_gallery_page.php'),(164,43,'_menu_item_type','post_type'),(165,43,'_menu_item_menu_item_parent','0'),(166,43,'_menu_item_object_id','41'),(167,43,'_menu_item_object','page'),(168,43,'_menu_item_target',''),(169,43,'_menu_item_classes','a:1:{i:0;s:0:\"\";}'),(170,43,'_menu_item_xfn',''),(171,43,'_menu_item_url',''),(173,44,'_edit_last','1'),(174,44,'_edit_lock','1448271703:1'),(175,45,'_wp_attached_file','2015/11/11822532_879672558778253_5810373613059957528_n.jpg'),(176,45,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:500;s:6:\"height\";i:333;s:4:\"file\";s:58:\"2015/11/11822532_879672558778253_5810373613059957528_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"11822532_879672558778253_5810373613059957528_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"11822532_879672558778253_5810373613059957528_n-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"11822532_879672558778253_5810373613059957528_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(177,44,'_thumbnail_id','45'),(178,46,'_edit_last','1'),(179,46,'_edit_lock','1448273485:1'),(180,47,'_edit_last','1'),(181,47,'_edit_lock','1448271842:1'),(182,48,'_wp_attached_file','2015/11/10570449_775600189185491_4797955458527477795_n.jpg'),(183,48,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:757;s:4:\"file\";s:58:\"2015/11/10570449_775600189185491_4797955458527477795_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"10570449_775600189185491_4797955458527477795_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"10570449_775600189185491_4797955458527477795_n-300x237.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:237;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"10570449_775600189185491_4797955458527477795_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(184,46,'_thumbnail_id','48'),(185,49,'_wp_attached_file','2015/11/12274628_928970467181795_9080715863370183568_n.jpg'),(186,49,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:726;s:4:\"file\";s:58:\"2015/11/12274628_928970467181795_9080715863370183568_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12274628_928970467181795_9080715863370183568_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12274628_928970467181795_9080715863370183568_n-300x227.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:227;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12274628_928970467181795_9080715863370183568_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(187,47,'_thumbnail_id','49'),(190,51,'_edit_last','1'),(191,51,'_edit_lock','1448273947:1'),(192,52,'_edit_last','1'),(193,52,'_edit_lock','1448273948:1'),(194,53,'_edit_last','1'),(195,53,'_edit_lock','1448273949:1'),(196,54,'_wp_attached_file','2015/11/12193587_920037951408380_2558636545936521190_n.jpg'),(197,54,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:639;s:4:\"file\";s:58:\"2015/11/12193587_920037951408380_2558636545936521190_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12193587_920037951408380_2558636545936521190_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12193587_920037951408380_2558636545936521190_n-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12193587_920037951408380_2558636545936521190_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:11:\"Alan Dooley\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:13:\"A.Dooley-2015\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(198,51,'_thumbnail_id','54'),(199,55,'_wp_attached_file','2015/11/12188969_920037924741716_8891150694133971174_n.jpg'),(200,55,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:640;s:4:\"file\";s:58:\"2015/11/12188969_920037924741716_8891150694133971174_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12188969_920037924741716_8891150694133971174_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12188969_920037924741716_8891150694133971174_n-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12188969_920037924741716_8891150694133971174_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:11:\"Alan Dooley\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:13:\"A.Dooley-2015\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(201,52,'_thumbnail_id','55'),(202,56,'_wp_attached_file','2015/11/12108268_916982171713958_2397807667096811273_n.jpg'),(203,56,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:720;s:4:\"file\";s:58:\"2015/11/12108268_916982171713958_2397807667096811273_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12108268_916982171713958_2397807667096811273_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12108268_916982171713958_2397807667096811273_n-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12108268_916982171713958_2397807667096811273_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(204,53,'_thumbnail_id','56'),(205,58,'_edit_last','1'),(206,58,'_edit_lock','1448274250:1'),(207,59,'_wp_attached_file','2015/11/12063637_907541592658016_1573945419468984550_n.jpg'),(208,59,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:697;s:4:\"file\";s:58:\"2015/11/12063637_907541592658016_1573945419468984550_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12063637_907541592658016_1573945419468984550_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12063637_907541592658016_1573945419468984550_n-300x218.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:218;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12063637_907541592658016_1573945419468984550_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(209,58,'_thumbnail_id','59'),(210,60,'_edit_last','1'),(211,60,'_edit_lock','1448274250:1'),(212,63,'_wp_attached_file','2015/11/12038068_907542269324615_4326794164742574840_n.jpg'),(213,63,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:920;s:6:\"height\";i:960;s:4:\"file\";s:58:\"2015/11/12038068_907542269324615_4326794164742574840_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12038068_907542269324615_4326794164742574840_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12038068_907542269324615_4326794164742574840_n-288x300.jpg\";s:5:\"width\";i:288;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12038068_907542269324615_4326794164742574840_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(214,60,'_thumbnail_id','63'),(215,61,'_edit_last','1'),(216,61,'_edit_lock','1448274251:1'),(217,64,'_wp_attached_file','2015/11/12006126_901892346556274_7378039352262163829_n.jpg'),(218,64,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:638;s:4:\"file\";s:58:\"2015/11/12006126_901892346556274_7378039352262163829_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"12006126_901892346556274_7378039352262163829_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"12006126_901892346556274_7378039352262163829_n-300x199.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:199;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"12006126_901892346556274_7378039352262163829_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:1:\"V\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:1:\"V\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(219,61,'_thumbnail_id','64'),(220,62,'_edit_last','1'),(221,62,'_edit_lock','1448274252:1'),(222,65,'_wp_attached_file','2015/11/11665502_860675970677912_8354440393550746879_n.jpg'),(223,65,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:960;s:6:\"height\";i:720;s:4:\"file\";s:58:\"2015/11/11665502_860675970677912_8354440393550746879_n.jpg\";s:5:\"sizes\";a:3:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:58:\"11665502_860675970677912_8354440393550746879_n-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:58:\"11665502_860675970677912_8354440393550746879_n-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:58:\"11665502_860675970677912_8354440393550746879_n-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(224,62,'_thumbnail_id','65'),(249,78,'_wp_attached_file','2015/11/flatmoco200.pdf'),(250,79,'_wp_attached_file','2015/11/scav.pdf'),(251,80,'_wp_attached_file','2015/11/scav.jpg'),(252,80,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:213;s:6:\"height\";i:240;s:4:\"file\";s:16:\"2015/11/scav.jpg\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:16:\"scav-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}'),(253,81,'_wp_attached_file','2015/11/chicken-dinner.jpg'),(254,81,'_wp_attachment_metadata','a:5:{s:5:\"width\";i:1586;s:6:\"height\";i:2048;s:4:\"file\";s:26:\"2015/11/chicken-dinner.jpg\";s:5:\"sizes\";a:4:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:26:\"chicken-dinner-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:26:\"chicken-dinner-232x300.jpg\";s:5:\"width\";i:232;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:27:\"chicken-dinner-793x1024.jpg\";s:5:\"width\";i:793;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"gal-thumb\";a:4:{s:4:\"file\";s:26:\"chicken-dinner-390x244.jpg\";s:5:\"width\";i:390;s:6:\"height\";i:244;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:11:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";s:11:\"orientation\";i:0;}}');
/*!40000 ALTER TABLE `moco_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_posts`
--

DROP TABLE IF EXISTS `moco_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_posts`
--

LOCK TABLES `moco_posts` WRITE;
/*!40000 ALTER TABLE `moco_posts` DISABLE KEYS */;
INSERT INTO `moco_posts` VALUES (1,1,'2015-11-23 06:02:33','2015-11-23 06:02:33','Welcome to WordPress. This is your first post. Edit or delete it, then start writing!','Hello world!','','publish','open','open','','hello-world','','','2015-11-23 06:02:33','2015-11-23 06:02:33','',0,'http://project-demo-server.info/moco/?p=1',0,'post','',1),(3,1,'2015-11-23 06:02:49','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2015-11-23 06:02:49','0000-00-00 00:00:00','',0,'http://project-demo-server.info/moco/?p=3',0,'post','',0),(5,1,'2015-11-23 06:17:22','2015-11-23 06:17:22','','Home Page','','publish','closed','closed','','home-page','','','2015-11-23 09:18:19','2015-11-23 09:18:19','',0,'http://project-demo-server.info/moco/home-page/',0,'page','',0),(17,1,'2015-11-23 06:17:23','2015-11-23 06:17:23','','Home','','publish','closed','closed','','17','','','2015-11-23 09:19:19','2015-11-23 09:19:19','',0,'http://project-demo-server.info/moco/2015/11/23/17/',1,'nav_menu_item','',0),(21,1,'2015-11-23 06:17:24','2015-11-23 06:17:24','','Home','','publish','closed','closed','','21','','','2015-11-23 06:54:33','2015-11-23 06:54:33','',0,'http://project-demo-server.info/moco/2015/11/23/21/',1,'nav_menu_item','',0),(30,1,'2015-11-23 06:45:39','2015-11-23 06:45:39','','header-graphic','','inherit','open','closed','','header-graphic','','','2015-11-23 06:45:39','2015-11-23 06:45:39','',0,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/header-graphic.png',0,'attachment','image/png',0),(31,1,'2015-11-23 06:50:37','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2015-11-23 06:50:37','0000-00-00 00:00:00','',0,'http://project-demo-server.info/moco/?p=31',0,'post','',0),(32,1,'2015-11-23 06:53:07','2015-11-23 06:53:07','','Sponsorships','','publish','closed','closed','','sponsorships','','','2015-11-23 10:54:42','2015-11-23 10:54:42','',0,'http://project-demo-server.info/moco/?page_id=32',0,'page','',0),(33,1,'2015-11-23 06:53:18','2015-11-23 06:53:18','','Events','','publish','closed','closed','','events','','','2015-11-23 10:54:48','2015-11-23 10:54:48','',0,'http://project-demo-server.info/moco/?page_id=33',0,'page','',0),(34,1,'2015-11-23 06:53:07','2015-11-23 06:53:07','','Sponsorships','','inherit','closed','closed','','32-revision-v1','','','2015-11-23 06:53:07','2015-11-23 06:53:07','',32,'http://project-demo-server.info/moco/2015/11/23/32-revision-v1/',0,'revision','',0),(35,1,'2015-11-23 06:53:18','2015-11-23 06:53:18','','Events','','inherit','closed','closed','','33-revision-v1','','','2015-11-23 06:53:18','2015-11-23 06:53:18','',33,'http://project-demo-server.info/moco/2015/11/23/33-revision-v1/',0,'revision','',0),(36,1,'2015-11-23 06:54:33','2015-11-23 06:54:33',' ','','','publish','closed','closed','','36','','','2015-11-23 06:54:33','2015-11-23 06:54:33','',0,'http://project-demo-server.info/moco/?p=36',3,'nav_menu_item','',0),(37,1,'2015-11-23 06:54:33','2015-11-23 06:54:33',' ','','','publish','closed','closed','','37','','','2015-11-23 06:54:33','2015-11-23 06:54:33','',0,'http://project-demo-server.info/moco/?p=37',2,'nav_menu_item','',0),(38,1,'2015-11-23 06:54:58','2015-11-23 06:54:58',' ','','','publish','closed','closed','','38','','','2015-11-23 09:19:19','2015-11-23 09:19:19','',0,'http://project-demo-server.info/moco/?p=38',3,'nav_menu_item','',0),(39,1,'2015-11-23 06:54:58','2015-11-23 06:54:58',' ','','','publish','closed','closed','','39','','','2015-11-23 09:19:19','2015-11-23 09:19:19','',0,'http://project-demo-server.info/moco/?p=39',2,'nav_menu_item','',0),(40,1,'2015-11-23 09:18:19','2015-11-23 09:18:19','','Home Page','','inherit','closed','closed','','5-revision-v1','','','2015-11-23 09:18:19','2015-11-23 09:18:19','',5,'http://project-demo-server.info/moco/2015/11/23/5-revision-v1/',0,'revision','',0),(41,1,'2015-11-23 09:19:05','2015-11-23 09:19:05','','Gallery','','publish','closed','closed','','gallery','','','2015-11-23 09:19:05','2015-11-23 09:19:05','',0,'http://project-demo-server.info/moco/?page_id=41',0,'page','',0),(42,1,'2015-11-23 09:19:05','2015-11-23 09:19:05','','Gallery','','inherit','closed','closed','','41-revision-v1','','','2015-11-23 09:19:05','2015-11-23 09:19:05','',41,'http://project-demo-server.info/moco/2015/11/23/41-revision-v1/',0,'revision','',0),(43,1,'2015-11-23 09:19:19','2015-11-23 09:19:19',' ','','','publish','closed','closed','','43','','','2015-11-23 09:19:19','2015-11-23 09:19:19','',0,'http://project-demo-server.info/moco/?p=43',4,'nav_menu_item','',0),(44,1,'2015-11-23 09:39:28','2015-11-23 09:39:28','','Gallery-1','','publish','closed','closed','','gallery-1','','','2015-11-23 09:39:28','2015-11-23 09:39:28','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=44',0,'galleries','',0),(45,1,'2015-11-23 09:39:23','2015-11-23 09:39:23','','11822532_879672558778253_5810373613059957528_n','','inherit','open','closed','','11822532_879672558778253_5810373613059957528_n','','','2015-11-23 09:39:23','2015-11-23 09:39:23','',44,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/11822532_879672558778253_5810373613059957528_n.jpg',0,'attachment','image/jpeg',0),(46,1,'2015-11-23 09:44:42','2015-11-23 09:44:42','','Gallery-2','','publish','closed','closed','','gallery-2','','','2015-11-23 09:44:42','2015-11-23 09:44:42','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=46',1,'galleries','',0),(47,1,'2015-11-23 09:45:05','2015-11-23 09:45:05','','Gallery-3','','publish','closed','closed','','gallery-3','','','2015-11-23 09:45:05','2015-11-23 09:45:05','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=47',2,'galleries','',0),(48,1,'2015-11-23 09:44:36','2015-11-23 09:44:36','','10570449_775600189185491_4797955458527477795_n','','inherit','open','closed','','10570449_775600189185491_4797955458527477795_n','','','2015-11-23 09:44:36','2015-11-23 09:44:36','',46,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/10570449_775600189185491_4797955458527477795_n.jpg',0,'attachment','image/jpeg',0),(49,1,'2015-11-23 09:45:01','2015-11-23 09:45:01','','12274628_928970467181795_9080715863370183568_n','','inherit','open','closed','','12274628_928970467181795_9080715863370183568_n','','','2015-11-23 09:45:01','2015-11-23 09:45:01','',47,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12274628_928970467181795_9080715863370183568_n.jpg',0,'attachment','image/jpeg',0),(51,1,'2015-11-23 10:20:37','2015-11-23 10:20:37','','Gallery-4','','publish','closed','closed','','gallery-4','','','2015-11-23 10:20:37','2015-11-23 10:20:37','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=51',3,'galleries','',0),(52,1,'2015-11-23 10:20:40','2015-11-23 10:20:40','','Gallery-5','','publish','closed','closed','','gallery-5','','','2015-11-23 10:20:40','2015-11-23 10:20:40','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=52',4,'galleries','',0),(53,1,'2015-11-23 10:20:42','2015-11-23 10:20:42','','Gallery-6','','publish','closed','closed','','gallery-6','','','2015-11-23 10:20:42','2015-11-23 10:20:42','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=53',5,'galleries','',0),(54,1,'2015-11-23 10:20:00','2015-11-23 10:20:00','','12193587_920037951408380_2558636545936521190_n','','inherit','open','closed','','12193587_920037951408380_2558636545936521190_n','','','2015-11-23 10:20:00','2015-11-23 10:20:00','',51,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12193587_920037951408380_2558636545936521190_n.jpg',0,'attachment','image/jpeg',0),(55,1,'2015-11-23 10:20:15','2015-11-23 10:20:15','','12188969_920037924741716_8891150694133971174_n','','inherit','open','closed','','12188969_920037924741716_8891150694133971174_n','','','2015-11-23 10:20:15','2015-11-23 10:20:15','',52,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12188969_920037924741716_8891150694133971174_n.jpg',0,'attachment','image/jpeg',0),(56,1,'2015-11-23 10:20:33','2015-11-23 10:20:33','','12108268_916982171713958_2397807667096811273_n','','inherit','open','closed','','12108268_916982171713958_2397807667096811273_n','','','2015-11-23 10:20:33','2015-11-23 10:20:33','',53,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12108268_916982171713958_2397807667096811273_n.jpg',0,'attachment','image/jpeg',0),(57,1,'2015-11-23 10:21:34','0000-00-00 00:00:00','','Auto Draft','','auto-draft','closed','closed','','','','','2015-11-23 10:21:34','0000-00-00 00:00:00','',0,'http://project-demo-server.info/moco/?post_type=galleries&p=57',0,'galleries','',0),(58,1,'2015-11-23 10:22:04','2015-11-23 10:22:04','','Gallery-7','','publish','closed','closed','','gallery-7','','','2015-11-23 10:22:04','2015-11-23 10:22:04','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=58',6,'galleries','',0),(59,1,'2015-11-23 10:22:00','2015-11-23 10:22:00','','12063637_907541592658016_1573945419468984550_n','','inherit','open','closed','','12063637_907541592658016_1573945419468984550_n','','','2015-11-23 10:22:00','2015-11-23 10:22:00','',58,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12063637_907541592658016_1573945419468984550_n.jpg',0,'attachment','image/jpeg',0),(60,1,'2015-11-23 10:23:10','2015-11-23 10:23:10','','Gallery-8','','publish','closed','closed','','gallery-8','','','2015-11-23 10:23:10','2015-11-23 10:23:10','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=60',7,'galleries','',0),(61,1,'2015-11-23 10:23:12','2015-11-23 10:23:12','','Gallery-9','','publish','closed','closed','','gallery-9','','','2015-11-23 10:23:12','2015-11-23 10:23:12','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=61',8,'galleries','',0),(62,1,'2015-11-23 10:23:03','2015-11-23 10:23:03','','Gallery-10','','publish','closed','closed','','gallery-10','','','2015-11-23 10:23:14','2015-11-23 10:23:14','',0,'http://project-demo-server.info/moco/?post_type=galleries&#038;p=62',9,'galleries','',0),(63,1,'2015-11-23 10:22:26','2015-11-23 10:22:26','','12038068_907542269324615_4326794164742574840_n','','inherit','open','closed','','12038068_907542269324615_4326794164742574840_n','','','2015-11-23 10:22:26','2015-11-23 10:22:26','',60,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12038068_907542269324615_4326794164742574840_n.jpg',0,'attachment','image/jpeg',0),(64,1,'2015-11-23 10:22:44','2015-11-23 10:22:44','','12006126_901892346556274_7378039352262163829_n','','inherit','open','closed','','12006126_901892346556274_7378039352262163829_n','','','2015-11-23 10:22:44','2015-11-23 10:22:44','',61,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/12006126_901892346556274_7378039352262163829_n.jpg',0,'attachment','image/jpeg',0),(65,1,'2015-11-23 10:23:00','2015-11-23 10:23:00','','11665502_860675970677912_8354440393550746879_n','','inherit','open','closed','','11665502_860675970677912_8354440393550746879_n','','','2015-11-23 10:23:00','2015-11-23 10:23:00','',62,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/11665502_860675970677912_8354440393550746879_n.jpg',0,'attachment','image/jpeg',0),(78,1,'2015-11-23 11:14:09','2015-11-23 11:14:09','','flatmoco200','','inherit','open','closed','','flatmoco200','','','2015-11-23 11:14:09','2015-11-23 11:14:09','',0,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/flatmoco200.pdf',0,'attachment','application/pdf',0),(79,1,'2015-11-23 11:14:09','2015-11-23 11:14:09','','scav','','inherit','open','closed','','scav','','','2015-11-23 11:14:09','2015-11-23 11:14:09','',0,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/scav.pdf',0,'attachment','application/pdf',0),(80,1,'2015-11-23 11:24:33','2015-11-23 11:24:33','','scav','','inherit','open','closed','','scav-2','','','2015-11-23 11:24:33','2015-11-23 11:24:33','',0,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/scav.jpg',0,'attachment','image/jpeg',0),(81,1,'2015-11-23 13:14:09','2015-11-23 13:14:09','','chicken-dinner','','inherit','open','closed','','chicken-dinner','','','2015-11-23 13:14:09','2015-11-23 13:14:09','',0,'http://project-demo-server.info/moco/wp-content/uploads/2015/11/chicken-dinner.jpg',0,'attachment','image/jpeg',0);
/*!40000 ALTER TABLE `moco_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_term_relationships`
--

DROP TABLE IF EXISTS `moco_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_term_relationships`
--

LOCK TABLES `moco_term_relationships` WRITE;
/*!40000 ALTER TABLE `moco_term_relationships` DISABLE KEYS */;
INSERT INTO `moco_term_relationships` VALUES (1,1,0),(17,2,0),(21,3,0),(36,3,0),(37,3,0),(38,2,0),(39,2,0),(43,2,0);
/*!40000 ALTER TABLE `moco_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_term_taxonomy`
--

DROP TABLE IF EXISTS `moco_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_term_taxonomy`
--

LOCK TABLES `moco_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `moco_term_taxonomy` DISABLE KEYS */;
INSERT INTO `moco_term_taxonomy` VALUES (1,1,'category','',0,1),(2,2,'nav_menu','',0,4),(3,3,'nav_menu','',0,3),(4,4,'nav_menu','',0,0),(5,5,'nav_menu','',0,0);
/*!40000 ALTER TABLE `moco_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_terms`
--

DROP TABLE IF EXISTS `moco_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_terms`
--

LOCK TABLES `moco_terms` WRITE;
/*!40000 ALTER TABLE `moco_terms` DISABLE KEYS */;
INSERT INTO `moco_terms` VALUES (1,'Uncategorized','uncategorized',0),(2,'Header Menu','header-menu',0),(3,'Footer Menu','footer-menu',0),(4,'Register Menu','register-menu',0),(5,'Profile Menu','profile-menu',0);
/*!40000 ALTER TABLE `moco_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_usermeta`
--

DROP TABLE IF EXISTS `moco_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_usermeta`
--

LOCK TABLES `moco_usermeta` WRITE;
/*!40000 ALTER TABLE `moco_usermeta` DISABLE KEYS */;
INSERT INTO `moco_usermeta` VALUES (1,1,'nickname','moco@2015'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'moco_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(11,1,'moco_user_level','10'),(12,1,'dismissed_wp_pointers',''),(13,1,'show_welcome_panel','1'),(14,1,'session_tokens','a:3:{s:64:\"ea86e0d56a081a2e850833ae3281751afbe3be9ba5e0bfac3f4df7e3b8eebb47\";a:4:{s:10:\"expiration\";i:1448431368;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:72:\"Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0\";s:5:\"login\";i:1448258568;}s:64:\"0b44ee1b6907b2038071b8652404641a103d4e59280b93a3b5f52399e8ce2844\";a:4:{s:10:\"expiration\";i:1448514335;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:72:\"Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0\";s:5:\"login\";i:1448341535;}s:64:\"1a51def81552cdd333aeaa885c2f029ca21cab8b5fadac3b454e363c9cd47ef3\";a:4:{s:10:\"expiration\";i:1448544001;s:2:\"ip\";s:14:\"43.252.197.222\";s:2:\"ua\";s:72:\"Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0\";s:5:\"login\";i:1448371201;}}'),(15,1,'moco_dashboard_quick_press_last_post_id','3'),(16,1,'moco_user-settings','imgsize=full&editor=tinymce&libraryContent=browse'),(17,1,'moco_user-settings-time','1448271563'),(18,1,'nav_menu_recently_edited','2'),(19,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(20,1,'metaboxhidden_nav-menus','a:5:{i:0;s:10:\"add-slider\";i:1;s:11:\"add-clients\";i:2;s:16:\"add-testimonials\";i:3;s:12:\"add-post_tag\";i:4;s:19:\"add-payment_gateway\";}');
/*!40000 ALTER TABLE `moco_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moco_users`
--

DROP TABLE IF EXISTS `moco_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moco_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moco_users`
--

LOCK TABLES `moco_users` WRITE;
/*!40000 ALTER TABLE `moco_users` DISABLE KEYS */;
INSERT INTO `moco_users` VALUES (1,'moco@2015','$P$BqSKT90KncRs2g32/I7d.yKGzdrm/Y1','moco2015','testineed@project-demo-server.info','','2015-11-23 06:02:32','',0,'moco@2015');
/*!40000 ALTER TABLE `moco_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cl47-moco'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-24 13:27:59
