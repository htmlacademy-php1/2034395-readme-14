# Заполнение типов существующего контента
INSERT INTO `content_types` (`name`, `class_name`, `title`) VALUES ('photo', 'post-photo', 'Фото');
INSERT INTO `content_types` (`name`, `class_name`, `title`) VALUES ('video', 'post-video', 'Видео');
INSERT INTO `content_types` (`name`, `class_name`, `title`) VALUES ('text', 'post-text', 'Текст');
INSERT INTO `content_types` (`name`, `class_name`, `title`) VALUES ('quote', 'post-quote', 'Цитата');
INSERT INTO `content_types` (`name`, `class_name`, `title`) VALUES ('link', 'post-link', 'Ссылка');

# Заполнение тестовых пользователей
INSERT INTO `users` (`email`, `login`, `password`, `avatar_url`)
VALUES
('parismay.frontend@mail.ru', 'paris', 'hardPassword', 'userpic.jpg');
