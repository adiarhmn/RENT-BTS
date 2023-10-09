<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Form Tambah Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('busana'); ?>" class="text-slate-400">Data Busana</a></li>
            <li>
                <p>Detail Busana</p>
            </li>
        </ul>
    </div>
</div>
<div class="p-5 flex gap-2">
    <section class="w-1/2 bg-white rounded-box shadow-lg p-5">
        <form action="<?= base_url('busana/'); ?>" method="POST" class="w-full">
            <?= csrf_field(); ?>
            <div class="form-control mb-2">
                <label class="label">Nama Busana</label>
                <input name="nama_busana" value="<?= old('nama_busana'); ?>" type="text" placeholder="Nama Busana" class="input input-bordered" />
            </div>
            <div class="form-control mb-2">
                <label class="label">Deskripsi</label>
                <textarea id="editor" name="deskripsi" class="textarea textarea-bordered" placeholder="Deskripsi"><?= old('deskripsi'); ?></textarea>
            </div>
            <div class="flex w-full gap-5">
                <div class="form-control mb-2 w-1/2">
                    <label class="label">Harga Sewa</label>
                    <input name="harga_sewa" value="<?= old('harga_sewa'); ?>" type="text" placeholder="Harga Sewa" class="input input-bordered" />
                </div>

                <div class="form-control w-1/2 mb-2">
                    <label for="jenis_busana" class="label">Jenis Busana</label>
                    <select name="id_jenis" id="jenis_busana" class="select select-bordered w-full">
                        <option value="">Pilih Jenis Busana</option>
                        <?php foreach ($listJenis as $item) : ?>
                            <option value="<?= $item['id_jenis']; ?>"><?= $item['nama_jenis']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-neutral mt-2">SIMPAN</button>
            <a href="<?= base_url('busana'); ?>" class="btn btn-error mt-2">BATAL</a>
        </form>
    </section>
    <section class="w-1/2">
        <?= $this->include('components/message'); ?>
    </section>
</div>
<?= $this->endSection(); ?>