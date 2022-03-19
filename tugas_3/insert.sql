# Create Database
create database sdm;

use sdm;

# Create Table
create table departemen(
    id int auto_increment,
    nama varchar(255) not null,
    primary key (id)
);

# Create Table
create table karyawan(
  id int auto_increment,
  nama varchar(255) not null,
  jenis_kelamin char(1) not null,
  status varchar(8) not null,
  tangal_lahir date not null,
  tanggal_masuk date not null,
  departemen int not null,
  primary key (id),
  foreign key (departemen) references departemen(id)
);

# Dummy Data
insert into departemen values (null,'management'),
                              (null,'Pengembangan Bisnis'),
                              (null,'Teknisi'),
                              (null,'Analis');

# Dummy Data
insert into karyawan values (null,'Rizky Saputra','L','Menikah','1980-10-11','2011-1-1',1),
                            (null,'Farhan Reza','L','Belum','1989-11-1','2011-1-1',1),
                            (null,'Riyando Adi','L','Menikah','1977-1-25','2011-1-1',1),
                            (null,'Diego Manuel','L','Menikah','1983-2-22','2012-9-4',2),
                            (null,'Satya Laksana','L','Menikah','1981-1-12','2011-3-19',2),
                            (null,'Miguel Hernandez','L','Menikah','1994-10-16','2014-6-15',2),
                            (null,'Putri Persada','P','Menikah','1988-1-30','2013-4-14',2),
                            (null,'Alma Safira','P','Menikah','1991-5-18','2013-9-28',3),
                            (null,'Haqi Hafiz','L','Belum','1995-9-19','2015-3-9',3),
                            (null,'Abi Isyawara','L','Belum','1991-6-3','2012-1-22',3),
                            (null,'Maman Kresna','L','Belum','1993-8-21','2012-9-15',3),
                            (null,'Nadia Aulia','P','Belum','1989-10-7','2012-5-7',4),
                            (null,'Mutiara Rezki','P','Menikah','1988-3-23','2013-5-21',4),
                            (null,'Dani Setiawan','L','Belum','1986-2-11','2014-11-30',4),
                            (null,'Budi Putra','L','Belum','1995-10-23','2015-12-3',4);

# Show Table Data
select  * from karyawan;
select  * from departemen;