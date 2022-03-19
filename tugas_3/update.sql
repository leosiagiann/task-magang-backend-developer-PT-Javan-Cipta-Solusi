use sdm;

# Update Data
update karyawan set status = "Menikah"
where nama = "Farhan Reza" or nama = "Nadia Aulia"
or nama = "Abi Isyawara" or nama = "Dani Setiawan";

# Show Data
select * from karyawan;