<?= $this->extend('components/app'); ?>

<?php
// Pengkondisian Form
if ($form == 'tambah') {
    $id = "";
    $nama_lengkap = "";
    $alamat = "";
    $no_hp = "";
    $email = "";
    $photo = "default_images.jpeg";
    $role = " Pilih Hak Akses ";
    $id_role = "";
    $url = "user";
} else {
    $id = $user['id_user'];
    $nama_lengkap = $user['nama_lengkap'];
    $alamat = $user['alamat'];
    $no_hp = $user['no_hp'];
    $email = $user['email'];
    $photo = $user['photo_profile'];
    $role = $user['role'];
    $id_role = $user['id_role'];
    $url = "user/" . $user['id_user'];
}
?>

<?= $this->section('content'); ?>
<section>
    <!-- Header Form User -->
    <h1 class="text-3xl font-bold capitalize">Form <?= $form; ?> User</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data User</a></li>
            <li>Tambah User</li>
        </ul>
    </div>
    <!-- End Header -->

    <!-- From Input User -->
    <section class="flex gap-3 ">
        <!-- Card -->
        <div class="bg-white rounded-xl w-1/2 p-5 shadow-lg">
            <form action="<?= base_url($url); ?>" class="w-full" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?php if ($form == 'update') : ?>
                    <input type="hidden" name="_method" value="PUT">
                <?php endif; ?>

                <div class="form-control mb-2">
                    <label class="label">Nama Lengkap</label>
                    <input name="nama_lengkap" value="<?= old('nama_lengkap', $nama_lengkap); ?>" type="text" placeholder="Nama Lengkap" class="input input-bordered" />
                </div>
                <div class="form-control mb-2">
                    <label class="label">Alamat</label>
                    <textarea name="alamat" class="textarea textarea-bordered" placeholder="Alamat"><?= old('alamat', $alamat); ?></textarea>
                </div>
                <div class="form-control mb-2">
                    <label class="label">Email</label>
                    <input type="text" value="<?= old('email', $email); ?>" name="email" placeholder="Email" class="input input-bordered" />
                </div>
                <div class="form-control mb-2">
                    <label class="label">Nomor Telephone</label>
                    <input type="text" name="no_hp" value="<?= old('no_hp', $no_hp); ?>" placeholder="Nomor Telephone" class="input input-bordered" />
                </div>
                <div class="form-control mb-2">
                    <label class="label">Photo</label>
                    <div class="flex gap-5 items-center">
                        <input type="file" onchange="previewImage(event)" name="photo_profile" class="file-input file-input-bordered w-full" />
                        <div class="avatar">
                            <div class="w-12 rounded-full">
                                <img id="imagePreview" src="<?= base_url('profile_images/') . $photo; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full gap-3">
                    <div class="form-control mb-2 grow">
                        <label class="label">Password</label>
                        <input type="text" <?= old('password'); ?> name="password" placeholder="Password" class="input input-bordered" />
                    </div>
                    <div class="form-control mb-2 w-1/3">
                        <label class="label">Role</label>
                        <select name="id_role" class="select select-bordered w-full capitalize">
                            <option value="<?= $id_role; ?>"><?= $role; ?></option>
                            <?php foreach ($list_role as $item) : ?>
                                <option value="<?= $item['id_role']; ?>"><?= $item['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-5 mt-3">
                    <a href="<?= base_url('user'); ?>" class="btn btn-warning shadow-md hover:bg-yellow-400">BATAL</a>
                    <button type="button" class="btn btn-accent" onclick="my_modal_1.showModal()">Hapus</button>
                    <button type="submit" class="btn btn-neutral shadow-md"><?= $form; ?></button>
                </div>
            </form>

            <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Peringatan !</h3>
                    <p class="py-4">Anda Akan Menghapus Akun ini Secara Permanen</p>
                    <div class="modal-action">
                        <form action="<?= base_url('user/').$id; ?>" method="POST">
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

        <!-- Error Message -->
        <div class="w-1/2 px-4">
            <?= $this->include('components/message'); ?>
        </div>
    </section>
    <!-- End Header -->

</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    function previewImage(event) {
        // Mendapatkan elemen input file dan elemen gambar
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        // Mengecek apakah pengguna memilih gambar
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            // Mengatur callback ketika file berhasil dibaca
            reader.onload = function(e) {
                // Memperbarui atribut src pada elemen gambar
                preview.src = e.target.result;
            };

            // Membaca file sebagai URL data
            reader.readAsDataURL(input.files[0]);
        } else {
            // Jika pengguna membatalkan pemilihan gambar
            preview.src = '#';
        }
    }
</script>
<?= $this->endSection(); ?>