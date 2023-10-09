<?= $this->extend('components/rents'); ?>
<?= $this->section('content'); ?>
<div class="flex min-h-screen">
    <div class="w-[300px] h-[100vh] pt-20">
        <div class="flex h-full bg-white">
            <!-- Sidebar -->
            <div id="Sidebar" class="hidden bg-white lg:block w-72 h-full overflow-auto no-scrollbar">
                <ul class="menu  menu-lg w-full rounded-box drop-shadow-2xl">
                    <li class="text-center text-bold text-red-400">Utama</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="h-screen p-5 w-full overflow-auto bg-slate-100">
        <div class="pt-20 mx-auto flex flex-wrap h-full max-w-full gap-10">
            <!-- Card 1 -->
            <?php foreach ($list_busana as $item) : ?>
                <div class="card card-compact w-80 bg-base-100 shadow-xl">
                    <?php $img = ($item['photo_busana'] == null) ? 'default_busana_2.jpeg' : $item['photo_busana'] ?>
                    <figure class="h-52 overflow-hidden"><img class="object-cover w-full h-full" src="<?= base_url('busanaImages/') . $img; ?>" alt="Busana" /></figure>
                    <div class="card-body">
                        <h2 class="card-title"><?= $item['nama_busana']; ?></h2>
                        <div>Harga Rp.<?= $item['harga_sewa']; ?></div>
                        <div class="flex justify-between">
                            <div class="badge badge-ghost"><?= $item['nama_jenis']; ?></div>
                            <div>Stok : <?= ($item['stok'] == null) ? 0 : $item['stok']; ?></div>
                        </div>
                        <div class="card-actions justify-end">
                            <?php if ($item['stok'] != null) : ?>
                                <a href="<?= base_url('/rentbusana'); ?>" class="btn btn-neutral">Sewa Sekarang</a>
                            <?php else : ?>
                                <a class="btn btn-ghost disabled">Kosong</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach ($list_busana as $item) : ?>
                <div class="card card-compact w-80 bg-base-100 shadow-xl">
                    <?php $img = ($item['photo_busana'] == null) ? 'default_busana_2.jpeg' : $item['photo_busana'] ?>
                    <figure class="h-52 overflow-hidden"><img class="object-cover w-full h-full" src="<?= base_url('busanaImages/') . $img; ?>" alt="Busana" /></figure>
                    <div class="card-body">
                        <h2 class="card-title"><?= $item['nama_busana']; ?></h2>
                        <div>Harga Rp.<?= $item['harga_sewa']; ?></div>
                        <div class="flex justify-between">
                            <div class="badge badge-ghost"><?= $item['nama_jenis']; ?></div>
                            <div>Stok : <?= ($item['stok'] == null) ? 0 : $item['stok']; ?></div>
                        </div>
                        <div class="card-actions justify-end">
                            <?php if ($item['stok'] != null) : ?>
                                <a href="<?= base_url('/rentbusana'); ?>" class="btn btn-neutral">Sewa Sekarang</a>
                            <?php else : ?>
                                <a class="btn btn-ghost disabled">Kosong</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php foreach ($list_busana as $item) : ?>
                <div class="card card-compact w-80 bg-base-100 shadow-xl">
                    <?php $img = ($item['photo_busana'] == null) ? 'default_busana_2.jpeg' : $item['photo_busana'] ?>
                    <figure class="h-52 overflow-hidden"><img class="object-cover w-full h-full" src="<?= base_url('busanaImages/') . $img; ?>" alt="Busana" /></figure>
                    <div class="card-body">
                        <h2 class="card-title"><?= $item['nama_busana']; ?></h2>
                        <div>Harga Rp.<?= $item['harga_sewa']; ?></div>
                        <div class="flex justify-between">
                            <div class="badge badge-ghost"><?= $item['nama_jenis']; ?></div>
                            <div>Stok : <?= ($item['stok'] == null) ? 0 : $item['stok']; ?></div>
                        </div>
                        <div class="card-actions justify-end">
                            <?php if ($item['stok'] != null) : ?>
                                <a href="<?= base_url('/rentbusana'); ?>" class="btn btn-neutral">Sewa Sekarang</a>
                            <?php else : ?>
                                <a class="btn btn-ghost disabled">Kosong</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>