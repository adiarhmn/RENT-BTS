<?= $this->extend('components/app'); ?>



<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold capitalize">Form <?= $form; ?> Jenis Busana</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('jenis'); ?>" class="text-slate-400">Jenis Busana</a></li>
            <li><aclass="text-slate-400">Tambah Jenis Busana</aclass=></li>
        </ul>
    </div>
</div>

<section class="flex gap-3 ">
        <!-- Card -->
        <div class="bg-white rounded-xl w-1/2 p-5 shadow-lg">
            <form action="<?= base_url('/user'); ?>" class="w-full" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-control mb-2">
                    <label class="label">Nama Jenis</label>
                    <input name="nama_jenis" value="<?= old('nama_jenis'); ?>" type="text" placeholder="Nama Lengkap" class="input input-bordered" />
                </div>
                <div class="flex justify-end gap-5 mt-3">
                    <a href="<?= base_url('jenis'); ?>" class="btn btn-warning shadow-md hover:bg-yellow-400">BATAL</a>
                    <button class="btn btn-neutral shadow-md"><?= $form; ?></button>
                </div>
            </form>
        </div>

        <!-- Error Message -->
        <div class="w-1/2 px-4">
            <?= $this->include('components/message'); ?>
        </div>
    </section>
<?= $this->endSection(); ?>