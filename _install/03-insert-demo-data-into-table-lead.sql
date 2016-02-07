INSERT INTO `lead` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `status_id`, `semester_id`, `is_active`, `is_student`, `managed_by`, `created_at`, `updated_at`) VALUES
(1, 'Bishal', 'Bhandari', 'ww@hgjsdf.com', '98989898', 'Kathmandu', 1, 1, 1, 0, 2, '2016-01-28', '2016-01-29'),
(2, 'Bishesh', 'Bhandari', 'insomniackid_bishal@yahoo.com', '98989898', 'hgfjgh', 1, 1, 1, 0, 2, '2016-01-28', '2016-01-30'),
(3, 'Srijan', 'Karki', 'jjjh@ymail.com', '98989898', 'Kathmandu', 4, 1, 1, 0, 11, '2016-01-28', '0000-00-00');
INSERT INTO `follow_up` (`folup_id`, `user_id`, `lead_id`, `folup_date`, `feedback`) VALUES
(1, 11, 3, '2016-01-28', 'ikolkndsjncslj'),
(2, 2, 1, '2016-01-28', 'hvhvjvvj'),
(3, 2, 1, '2016-01-28', 'jvjvmnbmvnbcv');
INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Active'),
(2, 'Expired'),
(3, 'Dismissed'),
(4, 'Postponed'),
(5, 'Student');
INSERT INTO `user` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `phone_no`, `address`, `role`, `status`, `created`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Srijan', 'Karki', 'srijankarki@outlook.com', '9841939716', '________TOP _______ Secret  ________1100011_______0011_ERROR', 'admin', 1, '1451749591', '1451891151'),
(2, 'c1', 'a9f7e97965d6cf799a529102a973b8b9', 'James', 'Bond', 'bond@james.com', '12345678', 'test', 'counselor', 1, '1451797596', ''),
(11, 'bishalb', '1adb27fabdfee91e29a94e3fb02e08bc', 'James', 'Donald', 'bishal.bhandari.c6@gmail.com', '9849711272', 'Kathmandu', 'counselor', 1, '1453998060', '');
INSERT INTO `semester` (`id`, `year`, `name`) VALUES
(1, '2015', 'Autum'),
(2, '2016', 'Spring');
