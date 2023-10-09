<?= $this->extend('components/app') ?>
<?= $this->section('content'); ?>
<div class="mb-3">
    <h1 class="text-3xl font-bold">Data User</h1>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user'); ?>" class="text-slate-400">Data User</a></li>
        </ul>
    </div>
</div>
<section class="flex gap-4">
    <!-- Daftar User -->
    <div class="bg-white p-2 rounded-xl grow">
        <div class="flex w-full justify-between items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar User</h3>
            <!-- Open the modal using ID.showModal() method -->
            <a href="<?= base_url('user/create'); ?>" class="py-1 px-5 bg-neutral rounded-lg text-white"><i class="fa-solid fa-plus"></i> Tambah User</a>
        </div>
        <div class="overflow-x-auto capitalize">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Profile</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>no telephone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($list_user as $item) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td>
                                <div class="flex items-center justify-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="<?= base_url("profile_images/") . $item['photo_profile']; ?>" alt="Avatar Tailwind CSS Component" />
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $item['nama_lengkap']; ?></td>
                            <td><?= $item['email']; ?></td>
                            <td><?= $item['alamat']; ?></td>
                            <td><?= $item['no_hp']; ?></td>
                            <td><?= $item['role']; ?></td>
                            <td>
                                <a href="<?= base_url('user/') . $item['id_user']; ?>" class="text-2xl hover:text-slate-400"><i class="fa-solid fa-pen-to-square hover:scale-110"></i></a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Daftar Role -->
    <div class="w-1/5 bg-white rounded-xl p-3">
        <div class="flex w-full justify-start items-center mb-2">
            <h3 class="font-bold text-md mb-3 text-slate-400">Daftar Role</h3>
        </div>
        <table class="table text-center capitalize">
            <!-- head -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($list_role as $item) : ?>
                    <tr>
                        <th><?= $i; ?></th>
                        <td><?= $item['role']; ?></td>
                    </tr>
                <?php $i++;
                endforeach; ?>
                <tr></tr>
            </tbody>
        </table>
        <i class="text-xs pt-5">Sensitive Case</i>
    </div>
</section>
<?= $this->endSection(); ?>