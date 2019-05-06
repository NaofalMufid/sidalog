create table santri(
id_santri VARCHAR(50) PRIMARY KEY NOT NULL,
nama VARCHAR(100) NOT NULL,
sandi VARCHAR(50) NOT NULL,
tgl_lahir DATE NOT NULL,
tmp_lahir VARCHAR(10) NOT NULL,
jenis_kelamin VARCHAR(10) NOT NULL,
alamat TEXT NOT NULL,
kontak VARCHAR(15) NOT NULL
);