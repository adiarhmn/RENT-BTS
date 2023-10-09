<?= $this->extend('components/app'); ?>
<?php
if ($form == 'update') {
    $id = $jenis['id_jenis'];
    $nama_jenis = $jenis['nama_jenis'];
    $url = "jenis/" . $jenis['id_jenis'];
} else {
    $id = "";
    $url = "jenis/store";
    $nama_jenis = "";
}
?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Jenis Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('jenis'); ?>" class="text-slate-400">Jenis Busana</a></li>
        </ul>
    </div>
</div>
<section class="flex gap-4">
    <!-- Daftar User -->
    <div class="bg-white p-2 px-5 rounded-xl grow shadow-lg">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar Jenis Busana</h3>
            <!-- Open the modal using ID.showModal() method -->
            <!-- <a href="<?= base_url('jenis/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah User</a> -->
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Busana</th>
                        <th>Jumlah Busana</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_jenis as $item) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $item['nama_jenis']; ?></td>
                            <td>0</td>
                            <td>
                                <a href="<?= base_url('jenis/') . $item['id_jenis']; ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-xl w-1/4 p-5 shadow-lg">
        <?= $this->include('components/message'); ?>
        <form action="<?= base_url($url); ?>" class="w-full" method="POST">
            <?= csrf_field(); ?>
            <?php if ($form == 'update') : ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>
            <div class="form-control mb-2">
                <label class="label">Nama Jenis Busana</label>
                <input name="nama_jenis" value="<?= old('nama_jenis', $nama_jenis); ?>" type="text" placeholder="Nama Jenis Busana" class="input input-bordered" />
            </div>
            <div class="flex justify-end gap-5 mt-3">
                <a href="<?= base_url('jenis'); ?>" class="btn btn-warning shadow-md hover:bg-yellow-400">BATAL</a>
                <button type="button" class="<?= ($form == 'update') ? '' : 'hidden'; ?> btn btn-error shadow-md" onclick="my_modal_1.showModal()">hapus</button>
                <button class="btn btn-neutral shadow-md"><?= $form; ?></button>
            </div>
        </form>
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Peringatan !</h3>
                <p class="py-4">Anda Akan Menghapus Jenis Busana ini Secara Permanen
                    <br> Hal ini akan berdampak dengan Busana yang terkait</p>
                <div class="modal-action">
                    <form action="<?= base_url('/jenis/') . $id; ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-accent">Hapus</button>
                    </form>
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </div>
</section>
<?= $this->endSection(); ?>