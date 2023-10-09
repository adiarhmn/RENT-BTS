<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Detail Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data Busana</a></li>
            <li>
                <p>Detail Busana</p>
            </li>
        </ul>
    </div>
</div>

<?= $this->include('components/message'); ?>
<section>
    <div class="bg-white p-5 rounded-box flex gap-5 shadow-lg">
        <div>
            <div class="carousel carousel-vertical rounded-box shadow-lg border" style="height: 300px;">
                <?php if (count($photoBusana) != 0) : ?>
                    <?php foreach ($photoBusana as $item) : ?>
                        <div class="carousel-item h-[300px] w-80 overflow-hidden">
                            <img class="object-cover w-full h-full" src="<?= base_url('busanaImages/') . $item['photo_busana']; ?>" />
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="carousel-item h-[300px] w-80 overflow-hidden">
                        <img class="object-cover w-full h-full" src="<?= base_url('busanaImages/default.jpg'); ?>" />
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-80 mt-3">
                <form action="<?= base_url('fotobusana/') . $dataBusana['id_busana']; ?>" method="POST" class="w-full grid" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_busana" value="<?= $dataBusana['id_busana']; ?>">
                    <div class="form-control mb-2">
                        <input type="file" name="photo_busana" class="file-input file-input-bordered w-full <?= (session()->has('errors.photo_busana')) ? 'file-input-error' : ''; ?>" />
                        <label class="label">
                            <?php if (session()->has('errors.photo_busana')) : ?>
                                <span class="label-text-alt text-error"><?= session('errors')['photo_busana'] ?></span>
                            <?php endif ?>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-neutral btn-outline">TAMBAH GAMBAR</button>
                </form>
                <div class="overflow-x-auto border mt-2 rounded-box h-52 no-scrollbar">
                    <table class="table table-xs">
                        <?php foreach ($photoBusana as $item) : ?>
                            <tr>
                                <td>
                                    <div class="flex items-center justify-center space-x-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="<?= base_url('busanaImages/') . $item['photo_busana']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="<?= base_url('fotobusana/') . $item['id_photoBusana']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="text-red-400"><i class="fa-solid fa-trash-can text-2xl"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>



        <!-- Form Busana -->
        <div class="p-1 grow">
            <h1 class="font-bold text-lg">Informasi Busana</h1>
            <form action="<?= base_url('busana/') . $dataBusana['id_busana']; ?>" method="POST" class="w-full">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-control mb-2">
                    <label class="label">Nama Busana</label>
                    <input name="nama_busana" value="<?= old('nama_busana', $dataBusana['nama_busana']); ?>" type="text" placeholder="Nama Busana" class="input input-bordered" />
                </div>
                <div class="form-control mb-2">
                    <label class="label">Deskripsi</label>
                    <textarea id="editor" name="deskripsi" class="deskripsi_busana" placeholder="Deskripsi"><?= $dataBusana['deskripsi']; ?></textarea>
                </div>
                <div class="flex w-full gap-5">
                    <div class="form-control mb-2 w-1/2">
                        <label class="label">Harga Sewa</label>
                        <input name="harga_sewa" value="<?= old('harga_sewa', $dataBusana['harga_sewa']); ?>" type="text" placeholder="Harga Sewa" class="input input-bordered" />
                    </div>

                    <div class="form-control w-1/2 mb-2">
                        <label for="jenis_busana" class="label">Jenis Busana</label>
                        <select name="id_jenis" id="jenis_busana" class="select select-bordered w-full">
                            <option value="<?= $dataBusana['id_jenis']; ?>"><?= $dataBusana['nama_jenis']; ?></option>
                            <?php foreach ($listJenis as $item) : ?>
                                <option value="<?= $item['id_jenis']; ?>"><?= $item['nama_jenis']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-neutral mt-2">SIMPAN INFORMASI</button>
                <button type="button" class="btn btn-accent" onclick="my_modal_1.showModal()">Hapus</button>
                <a type="submit" class="btn btn-error mt-2">BATAL</a>
            </form>

            <!-- Modal -->
            <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Peringatan !</h3>
                    <p class="py-4">Anda Akan Menghapus Busana ini Secara Permanen</p>
                    <div class="modal-action">
                        <form action="<?= base_url('busana/') . $dataBusana['id_busana']; ?>" method="POST">
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

            <!-- Ukuram -->
            <div class="mt-2">
                <h1 class="font-bold text-lg">Ukuran Busana</h1>
                <div class="flex gap-3">
                    <div class="overflow-x-auto border mt-2 rounded-box h-52 w-52 no-scrollbar">
                        <table class="table table-xs text-center">
                            <tr>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                            <?php foreach ($listUkuran as $item) : ?>
                                <tr>
                                    <td><?= $item['ukuran']; ?></td>
                                    <td><?= $item['stok']; ?></td>
                                    <td>
                                        <form action="<?= base_url('ukuran/') . $item['id_ukuran']; ?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="text-red-400"><i class="fa-solid fa-trash-can text-xl"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <form action="<?= base_url('ukuran/') . $dataBusana['id_busana']; ?>" method="POST" class="grow">
                        <?= csrf_field(); ?>
                        <div class="w-full flex gap-4">
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Ukuran</label>
                                <input name="ukuran" type="text" placeholder="Ukuran M/S/XL/L" class="input input-bordered" />
                            </div>
                            <div class="form-control mb-2 w-1/2">
                                <label class="label">Stok Ukuran</label>
                                <input name="stok" type="number" placeholder="0" min="0" class="input input-bordered" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-neutral">TAMBAH UKURAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>