<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Data Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data Busana</a></li>
        </ul>
    </div>
</div>
<section class="flex gap-4">
    <!-- Daftar User -->
    <div class="bg-white p-2 rounded-xl grow">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar User</h3>
            <!-- Open the modal using ID.showModal() method -->
            <a href="<?= base_url('busana/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah Busana</a>
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>deskripsi</th>
                        <th>Harga Sewa</th>
                        <th>Jenis</th>
                        <th>Stok</th>
                        <th>Banyak Ukuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_busana as $item) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td>
                                <div class="flex items-center justify-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <?php if ($item['photo_busana'] == null) : ?>
                                                <img src="<?= base_url("busanaImages/default_busana_2.jpeg"); ?>" alt="Avatar Tailwind CSS Component" />
                                            <?php else : ?>
                                                <img src="<?= base_url("busanaImages/") . $item['photo_busana']; ?>" alt="Avatar Tailwind CSS Component" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $item['nama_busana']; ?></td>
                            <td><?= substr($item['deskripsi'], 0, 40) . "..." ?></td>
                            <td><?= $item['harga_sewa']; ?></td>
                            <td><?= $item['nama_jenis']; ?></td>
                            <td><?= ($item['stok'] == null) ? '0' : $item['stok']; ?></td>
                            <td><?= ($item['jumlahUkuran'] == null) ? '0' : $item['jumlahUkuran']; ?></td>
                            <td>
                                <a href="<?= base_url('/busana/detail/') . $item['id_busana'] ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>