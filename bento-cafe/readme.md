# Sistem Pemesanan Bento Cake

Proyek ini adalah sistem informasi sederhana untuk pemesanan **Bento Cake** menggunakan **PHP**.  
Aplikasi ini dibuat berdasarkan instruksi kerja pada soal ujian "Bento Cake".

---

## 📌 Fitur Utama

1. **Fungsi hitung_tagihan_awal**  
   - Menghitung tagihan awal berdasarkan `harga x jumlah`.  
   - Parameter: harga dan jumlah.  
   - Mengembalikan nilai total tagihan awal.

2. **Array Lokasi (1 Dimensi)**  
   - Daftar jangkauan daerah pesan antar:  
     `Jakarta, Bogor, Depok, Tangerang, Bekasi`.

3. **Sorting Lokasi**  
   - Array lokasi diurutkan secara ascending (A–Z).

4. **Harga Satuan Bento Cake**  
   - Disimpan dalam variabel `hargaSatuan`.  
   - Nilai: **Rp 90.000**.

5. **Frontend**  
   - Terhubung dengan file **CSS**.  
   - Menampilkan **logo restoran** di bawah judul.  
   - Menyediakan form input (nama, no HP, jumlah pesanan, lokasi).  
   - Dropdown lokasi diambil dari array dengan perulangan.

6. **JSON Storage**  
   - Data pemesanan disimpan dalam file `data/data.json`.  
   - Data dapat dibaca kembali dalam format JSON.

7. **Perhitungan Ongkos Kirim**  
   - Tangerang → Rp 5.000  
   - Bogor → Rp 10.000  
   - Jakarta, Depok, Bekasi → Gratis

8. **Total Tagihan**  
   - Total = Tagihan Awal + Ongkos Kirim.

9. **Struktur Folder**  
    Bento-Cake/
      index.html
      readme.md
      css/
        style.css
      assets/
        images/
            logo.png
      api-bento/
        config/
            cors.php
        controllers/
            OrderController.php
        models/
            OrderModel.php
        routes/
            order.php
        utils/
            Response.php
        .htaccess
        index.php

## 📌 Cara Menjalankan

1. Letakkan folder proyek di dalam `htdocs` (XAMPP) atau `www` (Laragon).  
2. Jalankan Apache dari control panel.  
3. End Point API : GET/POST Bento-Cake/api-bento/order dan GET /Bento-Cake/api-bento/lokasi

## 📌 Contoh Pengujian

### Input 1

- Nama Pelanggan: `Andi`
- Nomor HP: `08123456789`
- Jumlah Pesanan: `2`
- Lokasi: `Bogor`

### Output 1

- Tagihan Awal: Rp 180.000  
- Ongkos Kirim: Rp 10.000  
- **Total Tagihan: Rp 190.000**

### Input 2

- Nama Pelanggan: `Budi`
- Nomor HP: `08987654321`
- Jumlah Pesanan: `4`
- Lokasi: `Tangerang`

### Output 2

- Tagihan Awal: Rp 360.000  
- Ongkos Kirim: Rp 5.000  
- **Total Tagihan: Rp 365.000**
