<?php if (session()->has('message')) : ?>
    <div class="alert alert-success text-white text-lg font-semibold mb-3">
        <i class="fa-regular fa-circle-check text-xl"></i> <?= session('message') ?>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-error">
        <?= session('error') ?>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <?php foreach (session('errors') as $error) : ?>
        <div class="alert alert-error mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?= $error; ?></span>
        </div>
    <?php endforeach ?>
<?php endif ?>