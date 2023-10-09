<?= $this->extend('components/auths'); ?>
<?= $this->section('content'); ?>
<section class="flex h-screen w-full">
    <div class="m-auto p-5 w-96 card glass">
        <h1 class="text-center font-bold text-4xl">LOGIN</h1>
        <div class="h-16 overflow-x-auto no-scrollbar">
            <?= $this->include('components/message'); ?>
        </div>
        <form action="<?= base_url('auth'); ?>" method="POST" class="grid">
            <?= csrf_field(); ?>
            <div>
                <label class="label">Email</label>
                <input type="email" name="email" placeholder="Email" class="input input-bordered w-full" />
            </div>
            <div>
                <label class="label">Password</label>
                <input type="password" name="password" placeholder="password" class="input input-bordered w-full" />
            </div>
            <button type="submit" class="btn btn-neutral mt-9">LOGIN</button>
            <a href="<?= base_url('register'); ?>" class="btn btn-accent btn-outline mt-2">REGISTER</a>
        </form>
    </div>
</section>
<?= $this->endSection(); ?>