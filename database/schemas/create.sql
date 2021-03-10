create table users (
	user_id int not null auto_increment unique,
	name varchar(100) not null,
	email varchar(100) not null,
	mobile_number varchar(100),
	joining_date DATE,
	designation varchar(100),
	salary float,
	primary key(user_id)
);

create table user_status (
  user_id int not null auto_increment unique,
	status varchar(100),
	foreign key(user_id)
		references users(user_id)
	on delete cascade
);


create table policies (
	policy_id int not null auto_increment unique,
	name varchar(100) not null unique
);

create table leaves (
	leave_id int not null auto_increment unique,
	name varchar(100) not null,
	days int not null default 0,
	type varchar(100) not null default 'unpaid',
	policy_id int not null,
	primary key(leave_id),
	foreign key(policy_id)
		references policies(policy_id)
	on delete cascade
);


create table remainings (
  user_id int not null,
	leave_id int not null,
	days int not null,
	foreign key(user_id)
		references users(user_id)
	on delete cascade,
	foreign key(leave_id)
		references leaves(leave_id)
	on delete cascade
);


create table user_policy (
  user_id int not null  unique,
	policy_id int not null unique,
	foreign key(user_id)
		references users(user_id)
	on delete cascade,
	foreign key(policy_id)
		references policies(policy_id)
	on delete cascade
);


create table reasons (
	reason_id int not null auto_increment unique,
	name varchar(100) not null
);

create table attendances (
	id int not null auto_increment unique,
	user_id int not null,
	day date,
	status varchar(100),
	start_time time,
	end_time time,
	reason_id int,
	foreign key(user_id)
		references users(user_id),
	foreign key(reason_id)
		references reasons(reason_id)
);

create table messages(
	id int not null auto_increment unique,
	from_user_id int not null,
	to_user_id int not null,
	message varchar(260),
  sent_time timestamp
);

create table leave_requests(
	id int not null auto_increment unique,
	leave_id int not null,
	user_id int not null,
	start_date time,
	end_date time,
	approve_status int,
	foreign key(user_id)
		references users(user_id)
		on delete cascade
		on update cascade,
	foreign key(leave_id)
		references remainings(leave_id)
		on delete cascade
		on update cascade
);
