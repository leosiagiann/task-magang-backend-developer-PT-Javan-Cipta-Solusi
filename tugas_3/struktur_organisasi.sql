use sdm;

# Create Table
create table jabatan(
  id int auto_increment,
  posisi varchar(8),
  primary key (id)
);

# Dummy Data
insert into jabatan values (null,'Direktur'),
                           (null,'Manager'),
                           (null,'Staff');

# Add 2 Columns in karyawan table
alter table karyawan
    add jabatan int not null,
    add id_atasan_jabatan int;

# Updating Data karyawan
update karyawan set jabatan = 1, id_atasan_jabatan = null where nama = "Rizky Saputra";
update karyawan set jabatan = 2, id_atasan_jabatan = 1 where nama = "Farhan Reza" or nama = "Riyando Adi";
update karyawan set jabatan = 3, id_atasan_jabatan = 2 where departemen = 2 or departemen = 3;
update karyawan set jabatan = 3, id_atasan_jabatan = 3 where departemen = 4;

# Add Foreign Key Relationship
alter table karyawan
    add foreign key (jabatan) references jabatan(id);

# Show Data Staff
select k.nama, d.posisi
from karyawan k inner join jabatan d on k.jabatan = d.id
where k.id_atasan_jabatan = 2 or k.id_atasan_jabatan = 3;