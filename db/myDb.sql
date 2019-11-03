 CREATE TABLE public.users
(
	user_id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL
);

 CREATE TABLE public.tempusers
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL
);

 CREATE TABLE public.filament_manufacturer
(
	id SERIAL NOT NULL PRIMARY KEY,
	company VARCHAR(100) NOT NULL UNIQUE,
	website VARCHAR(100) NOT NULL,
	empty_spool_weight INT NOT NULL
);

 CREATE TABLE public.printer
(
	printer_id SERIAL NOT NULL PRIMARY KEY,
	printer_name VARCHAR(100) NOT NULL,
	manufacturer VARCHAR(100) NOT NULL,
	model VARCHAR(100) NOT NULL
);

 CREATE TABLE public.filament_type
(
	id SERIAL NOT NULL PRIMARY KEY,
	type_of_plastic VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE public.filament_spool
(
	id SERIAL NOT NULL PRIMARY KEY,
	filament_left INT NOT NULL,
	filament_id INT NOT NULL REFERENCES public.filament_type(id),
	print_temp INT NOT NULL,
	bed_temp INT NOT NULL,
	cost DECIMAL NOT NULL,
	filament_amount_new INT NOT NULL,
	color VARCHAR(100) NOT NULL,
	empty BOOLEAN NOT NULL,
	notes TEXT,
	manufacturer_id INT NOT NULL REFERENCES public.filament_manufacturer(id),
	name VARCHAR(100) NOT NULL
);

 CREATE TABLE public.print_job
(
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	spool_id INT NOT NULL REFERENCES public.filament_spool(id),
	filament_used INT NOT NULL,
	printer_id INT NOT NULL REFERENCES public.printer(printer_id),
	date TIMESTAMP NOT NULL,
	user_id INT NOT NULL REFERENCES public.users(user_id),
	completed BOOLEAN NOT NULL,
	percent_at_failure INT,
	time_hours INT NOT NULL,
	time_minutes INT NOT NULL
);

