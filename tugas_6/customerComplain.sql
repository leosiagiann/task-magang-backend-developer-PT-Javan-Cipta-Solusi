create database tugas_6;

use tugas_6;

select * from consumercomplaints;

/* Jumlah komplain setiap bulan */
select month(`Date Received`) bulan, count(`Complaint ID`) jumlah_complain
from consumercomplaints
group by bulan
order by bulan;


/* Komplain yang memiliki tags ‘Older American’ */
select *
from consumercomplaints
where Tags = 'Older American';


/*
Buat sebuah view yang menampilkan data nama perusahaan,
jumlah company response to consumer seperti tabel di bawah
*/
create view vconsumercomplaints as
select c.Company,
       count(case when `Company Response to Consumer` = 'Closed' then 1 end) Closed,
       count(case when `Company Response to Consumer` = 'Closed with explanation' then 1 end) 'Closed with explanation',
       count(case when `Company Response to Consumer` = 'Closed with non-monetary relief' then 1 end) 'Closed with non-monetary relief'
from consumercomplaints c
group by c.Company;

select *
from vconsumercomplaints;