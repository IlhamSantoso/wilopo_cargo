# wilopo_cargo
Test coding junior Fullstack Developer

LARAVEL : 8.X.X
XAMPP : 3.2.4
DB Name : wilopo_cargo

langkah instalasi 
1. jalankan 'php artisan serve'
2. jalankan 'php artisan migrate'
3. jalankan 'php artisan db:seed --class=UserSeed
4. login dengan 
	username : admin 
	password : superadmin
	
5. Managemen Karyawan
	Role dibgai menjadi 3 yaitu :
	1. admin
	2. HR
	3. karyawan

	Jika input user dilakukan oleh HR maka user harus di aktifkan dulu oleh admin di
	di menu managemen user -> edit -> ubah kolom status menjadi aktif

	admin bisa menginput semua data user
	HR hanya bisa input user karyawan

6. Data master cuti
	data master cuti diinputkan oleh admin dan HR dengan cara memilih user yang akan ditambahnkan data cuti
	nya lalu inoutkan jumlah hari cuti dalam satu tahun

7. Data Pengajuan
	data penganjuan diakses oleh admin dan HR menu ini hanya untuk menyetujui dan menolak cuti 
	ynag diajukan oleh karyawan
	
8. Pengajuan Cuti
	jika jumlah haru cuti melebihi sisa cuti makan pengajuan tidak akan bisa dilakukan
	pengajuan ada dalam 3 tahaap yaitu :
	1. pending -> belum dilihat oleh HR/Admn
	2. disetujui
	3. ditolak
	
	pengajuan dengan status pending dapat diedit dan dihapus oleh user
	sedangkan jika status sudah ditolak atau disetujui maka tidak dpat melakukan apapun
	
9. dashboard
	untuk melihat total hari cuti, cuti yang sudah diambil dan sisa hari cuti
	dan melihat progres dari pengjuan cuti user
