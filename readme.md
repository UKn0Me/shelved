## Shelved.

A simple bookmark storage application.


### Usage

1. Clone the repo or download and extract the zip into a web directory.
2. Point your web server to the public directory
3. Enter database details into the .env file (please create the database)
4. In the base directory run `php artisan migrate --seed` (see below for alternate)
5. Visit the address you configured in your web server's virtual host
6. Enjoy.

### Setting up the database without migrations

It's imperative that they be run in order.

```sql
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
```

```sql
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(10) unsigned NOT NULL DEFAULT '2',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_group_id_foreign` (`group_id`),
  CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
```

```sql
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_id_unique` (`id`),
  KEY `tags_user_id_foreign` (`user_id`),
  CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
```

```sql
CREATE TABLE `bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookmarks_id_unique` (`id`),
  KEY `bookmarks_user_id_foreign` (`user_id`),
  KEY `bookmarks_tag_id_foreign` (`tag_id`),
  CONSTRAINT `bookmarks_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=801 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
```

### Contact

Feel free to [contact me](https://keybase.io/ukn0me) at me@aidhan.net or open a pull request in the case of a bug or security flaw (there's probably plenty)

### License

The Shelved. is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
