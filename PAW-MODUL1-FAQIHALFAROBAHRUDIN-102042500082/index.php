<?php
// ===== PENGATURAN (ubah di sini) =====
$persen_diskon = 10;
$batas_diskon  = 1000000;

// ===== DATA PRODUK (tambah/hapus baris sesuka hati) =====
$produk = [
    ["nama" => "Monitor 24 Inch",     "kategori" => "Monitor",   "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop Productivity", "kategori" => "Laptop",    "harga" => 8500000, "stok" => 3],
    ["nama" => "Mouse Wireless",      "kategori" => "Aksesoris", "harga" => 150000,  "stok" => 25],
    ["nama" => "Keyboard Mechanical", "kategori" => "Aksesoris", "harga" => 750000,  "stok" => 0],
    ["nama" => "Headset Gaming",      "kategori" => "Audio",     "harga" => 1000000, "stok" => 8],
    ["nama" => "Webcam Full HD",      "kategori" => "Kamera",    "harga" => 450000,  "stok" => 0],
];

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar">
    <h2>Cia Store</h2>
    <nav>
        <a href="#">Home</a>
        <a href="#produk">Products</a>
        <a href="#tentang">About</a>
    </nav>
</header>

<section class="hero">
    <h1>Simple Tech Store</h1>
    <p>Perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
</section>

<main id="produk">
    <div class="judul">
        <h2>Katalog Produk</h2>
        <span>Total Produk: <?= count($produk) ?></span>
    </div>

    <div class="grid">
        <?php foreach ($produk as $p): ?>
            <?php
                $ada   = $p["stok"] > 0;
                $promo = $p["harga"] >= $batas_diskon;
                $akhir = $p["harga"] - ($p["harga"] * $persen_diskon / 100);
            ?>
            <div class="card">
                <small><?= $p["kategori"] ?></small>
                <h3><?= $p["nama"] ?></h3>

                <?php if ($promo): ?>
                    <s><?= rupiah($p["harga"]) ?></s>
                    <b class="diskon">Diskon <?= $persen_diskon ?>%</b>
                    <p class="harga"><?= rupiah($akhir) ?></p>
                <?php else: ?>
                    <p class="harga"><?= rupiah($p["harga"]) ?></p>
                <?php endif; ?>

                <p>Stok: <?= $p["stok"] ?> -
                    <?php if ($ada): ?>
                        <span class="ok">Tersedia</span>
                    <?php else: ?>
                        <span class="habis">Stok Habis</span>
                    <?php endif; ?>
                </p>

                <button <?= $ada ? "" : "disabled" ?>>Beli Sekarang</button>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<footer id="tentang">
    <p>&copy; 2026 Cia Store</p>
</footer>

</body>
</html>