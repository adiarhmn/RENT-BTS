<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Data User</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data User</a></li>
        </ul>
    </div>
</div>
<section>
    <div class="bg-white p-2 px-5 rounded-xl grow shadow-lg">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar Paket</h3>
            <!-- Open the modal using ID.showModal() method -->
            <a href="<?= base_url('paket/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah Paket</a>
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar Paket</th>
                        <th>Nama Paket</th>
                        <th>Deskripsi Paket</th>
                        <th>Harga Paket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_paket as $item) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <div class="flex items-center justify-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <?php $img = ($item['photo_paket'] == null) ? 'default_busana_2.jpeg' : $item['photo_paket']; ?>
                                            <img src="<?= base_url("busanaImages/") . $img ?>" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $item['nama_paket']; ?></td>
                            <td><?= substr($item['deskripsi_paket'], 0, 40) . "..." ?></td>
                            <td><?= $item['harga_paket']; ?></td>
                            <td>
                                <a href="<?= base_url('jenis/') . $item['id_paket']; ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
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