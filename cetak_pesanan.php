<?php
include_once 'koneksi.php';
include_once 'models/Pemesanan.php';

// Capture the order ID from the URL
$id = $_GET['id'];

// Create an instance of the Pemesanan class
$model = new Pemesanan();

// Fetch the order details
$order = $model->getOrderById($id);

// Check if order exists
if (!$order) {
    die('Order not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .receipt {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            position: relative;
        }
        .receipt h2 {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .receipt img.logo {
            height: 50px;
            margin-right: 15px;
        }
        .receipt table {
            width: 100%;
            border-collapse: collapse;
        }
        .receipt table, .receipt th, .receipt td {
            border: 1px solid #ddd;
        }
        .receipt th, .receipt td {
            padding: 10px;
            text-align: left;
        }
        .receipt .total {
            font-weight: bold;
            text-align: right;
        }
        .receipt .footer {
            margin-top: 20px;
            text-align: center;
        }
        @media print {
            .receipt {
                border: none;
                box-shadow: none;
            }
            .receipt .footer {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>
            <img src="https://i.pinimg.com/736x/0b/38/46/0b384628dc5639a20ea1385b4f324e9a.jpg" alt="Logo" class="logo">
            Struk Pesanan
        </h2>
        <table>
            <tr>
                <th>ID</th>
                <td><?= $order['id'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $order['nama'] ?></td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td><?= $order['no_telp'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $order['alamat'] ?></td>
            </tr>
            <tr>
                <th>Wisata</th>
                <td><?= $order['wisata'] ?></td>
            </tr>
            <tr>
                <th>Paket Wisata</th>
                <td><?= $order['paket_wisata'] ?></td>
            </tr>
            <tr>
                <th>Jumlah Tiket</th>
                <td><?= $order['jumlah_tiket'] ?></td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td><?= $order['metode_pembayaran'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Booking</th>
                <td><?= $order['tanggal_boking'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Pemesanan</th>
                <td><?= $order['tanggal_pemesanan'] ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= $order['status'] ?></td>
            </tr>
            <tr>
                <th>Total Pembayaran</th>
                <td class="total"><?= number_format($order['total_pembayaran'], 2, ',', '.') ?></td>
            </tr>
        </table>
        <div class="footer">
            <p>Terima Kasih atas Pesanan Anda!</p>
            <p>Silakan simpan struk ini sebagai bukti pembelian.</p>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
