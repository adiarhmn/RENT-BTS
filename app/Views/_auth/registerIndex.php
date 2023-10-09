<?= $this->extend('components/auths'); ?>
<?= $this->section('content'); ?>
<section class="flex h-screen w-full">
    <div class="m-auto p-5 w-1/2 card glass">
        <h1 class="text-center font-bold text-4xl mb-5">REGISTER</h1>
        <div class="h-16 overflow-x-auto no-scrollbar">
            <?= $this->include('components/message'); ?>
        </div>
        <form action="<?= base_url('register/store'); ?>" method="POST" class="grid" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="flex gap-3">
                <div class="w-1/2">
                    <label class="label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap'); ?>" placeholder="Nama Lengkap" class="input input-bordered w-full" />
                </div>
                <div class="w-1/2">
                    <label class="label">No Telephone</label>
                    <input type="text" name="no_hp" placeholder="No Telephone" value="<?= old('no_hp'); ?>" class="input input-bordered w-full" />
                </div>
            </div>
            <div>
                <label class="label">Alamat</label>
                <textarea name="alamat" class="textarea textarea-bordered w-full" placeholder="Alamat"> <?= old('alamat'); ?></textarea>
            </div>
            <div>
                <label class="label">Email</label>
                <input type="email" name="email" value="<?= old('email'); ?>" placeholder="Email" class="input input-bordered w-full" />
            </div>
            <div class="flex gap-3">
                <div class="w-1/2">
                    <label class="label">Password</label>
                    <input type="password" name="password" placeholder="Password" class="input input-bordered w-full" />
                </div>
                <div class="w-1/2">
                    <label class="label">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" placeholder="Konfirmasi Password" class="input input-bordered w-full" />
                </div>
            </div>
            <div class="form-control mb-2">
                <label class="label">Photo Profile</label>
                <div class="flex gap-5 items-center">
                    <input type="file" name="photo_profile" onchange="previewImage(event)" class="file-input file-input-bordered w-full" />
                    <div class="avatar">
                        <div class="w-12 rounded-full">
                            <img id="imagePreview" src="<?= base_url('storageImage/') . 'default_images.jpeg'; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-neutral mt-9">REGISTER</button>
            <a href="<?= base_url('login'); ?>" class="btn btn-accent btn-outline mt-2">LOGIN</a>
        </form>
    </div>
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