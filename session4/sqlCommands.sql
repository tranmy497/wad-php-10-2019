insert into users(name, phone, email, birthday, created, updated)
	values
        ('name1', 'phone1', 'email1@gmail.com', '2000-01-01', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
        ('name2', 'phone2', 'email2@gmail.com', '2000-01-05', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
        ('name3', 'phone3', 'email3@gmail.com', '2000-01-04', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
        ('name4', 'phone4', 'email4@gmail.com', '2000-01-03', '2019-10-09 18:00:00', '2019-10-09 18:00:00'),
        ('name5', 'phone5', 'email5@gmail.com', '2000-01-02', '2019-10-09 18:00:00', '2019-10-09 18:00:00');


select * from users where name like '%a%';

update users set email = 'test@gmail.com' where name like '%n%' or phone like '%5%';

delete from users where email like '%@gmail.com' and year(birthday) = 1997 and phone like '%8%';