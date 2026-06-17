<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Umkm;

$data = Umkm::latest()->take(5)->get();
echo "Data from Eloquent:\n";
foreach($data as $item) {
    echo "ID: " . $item->id . " | Nama Usaha: '" . $item->nama_usaha . "' | Pemilik: '" . $item->nama_pemilik . "'\n";
}
