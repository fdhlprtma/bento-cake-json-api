<?php
require_once __DIR__ . '/../models/OrderModel.php';
require_once __DIR__ . '/../utils/Response.php';

class OrderController {
    private $model;
    private $hargaSatuan = 90000; 
    private $lokasi = ["Jakarta", "Bogor", "Depok", "Tangerang", "Bekasi"];

    public function __construct() {
        $this->model = new OrderModel();
        sort($this->lokasi);
    }

    // Fungsi untuk menghitung tagihan awal pembelian
    // Parameter: harga (int), jumlah (int)
    // Rumus: total_tagihan = harga x jumlah
    // Return: nilai tagihan awal (int)
    private function hitung_tagihan_awal($harga, $jumlah) {
        return $harga * $jumlah;
    }

    private function hitungOngkir($lokasi) {
        switch ($lokasi) {
            case "Tangerang": return 5000;
            case "Bogor": return 10000;
            case "Jakarta":
            case "Depok":
            case "Bekasi":
                return 0;
            default: return 0;
        }
    }

    public function getOrders() {
        $orders = $this->model->getAll();
        Response::success($orders);
    }

    public function getLokasi() {
        Response::success($this->lokasi);
    }

    public function createOrder($data) {
        if (!isset($data['nama'], $data['noHP'], $data['jumlahPesanan'], $data['lokasi'])) {
            Response::error("Data tidak lengkap");
        }

        // kami menggunakan fungsi hitung_tagihan_awal()
        $tagihanAwal = $this->hitung_tagihan_awal($this->hargaSatuan, $data['jumlahPesanan']);
        $ongkir = $this->hitungOngkir($data['lokasi']);
        $total = $tagihanAwal + $ongkir;

        $order = [
            "nama" => $data['nama'],
            "noHP" => $data['noHP'],
            "jumlahPesanan" => $data['jumlahPesanan'],
            "lokasi" => $data['lokasi'],
            "tagihanAwal" => $tagihanAwal,
            "ongkir" => $ongkir,
            "totalTagihan" => $total,
            "createdAt" => date("Y-m-d H:i:s")
        ];

        $saved = $this->model->save($order);
        Response::success($saved, "Pemesanan berhasil");
    }
}
?>
