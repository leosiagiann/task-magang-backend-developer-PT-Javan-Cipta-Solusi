use sdm;

# Create Table
create table company(
    id int auto_increment,
    nama varchar(255) not null,
    alamat varchar(255) not null,
    primary key (id)
);

# Create Table
create table employee(
    id int auto_increment,
    nama varchar(255) not null,
    atasan_id int,
    company_id int,
    primary key (id),
    foreign key (company_id) references company(id)
);

# Dummy Data
insert into company values (null,'PT JAVAN','Sleman'),
                           (null,'PT Dicoding','Bandung');

# Dummy Data
insert into employee values (null,'Pak Budi',null,1),
                            (null,'Pak Tono',1,1),
                            (null,'Pak Totok',1,1),
                            (null,'Bu Sinta',2,1),
                            (null,'Bu Novi',3,1),
                            (null,'Andre',4,1),
                            (null,'Dono',4,1),
                            (null,'Ismir',5,1),
                            (null,'Anto',5,1);

# CEO adalah orang yang posisinya tertinggi. Buat query untuk mencari siapa CEO
select * from employee where atasan_id is null;

# Staff biasa adalah orang yang tidak punya bawahan. Buat query untuk mencari siapa staff biasa
select * from employee
where id > 5;

# Direktur adalah orang yang dibawah langsung CEO. Buat query untuk mencari siapa direktur
select * from employee where atasan_id = 1;

# Manager adalah orang yang dibawah direktur dan di atas staff.  Buat query untuk mencari siapa manager
select * from employee where atasan_id = 2 or atasan_id = 3;

# Buat sebuah query untuk mencari jumlah bawahan dengan parameter nama. Contoh kasus:

# Bawahan pak budi berjumlah 8 orang
SET @param = 'nama';
select count(@param) jumlah_bawahan_pak_budi
from employee
where atasan_id is not null;

# Bawahan Bu Sinta berjumlah 2 orang
SET @param = 'nama';
select count(@param) jumlah_bawahan_bu_sinta
from employee
where atasan_id = 4;