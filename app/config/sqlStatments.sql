
-- example of inserting a user
-- though we are useing prepared statments
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`)
  VALUES (NULL, 'Person', 'p@gmail.com', 'password', current_timestamp());