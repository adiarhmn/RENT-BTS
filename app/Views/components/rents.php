<!DOCTYPE html>
<html lang="en" data-theme="emerald">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTS RENT</title>
    <link rel="stylesheet" href="<?= base_url('assets/output.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/maincss/stylemain.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="no-scrollbar bg-base-100">
    <div class="navbar fixed top-0 bg-rose-500 shadow-lg max-h-16 z-50">
        <div class="container mx-auto">
            <!-- navigation -->
            <div class="w-full flex justify-between items-start">
                <div class="block lg:hidden">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="flex justify-start items-stretch w-96">
                    <svg width="55" height="55" viewBox="0 0 247 247" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M133.674 205.371H195.229V164.335H154.192V143.816H195.229V61.7433H174.71V113.039L133.674 96.6243V205.371ZM113.155 205.371V96.6243L72.1189 113.039V61.7433H51.6007V205.371H113.155ZM72.1189 41.225V30.9659H174.71V41.225H205.488C208.209 41.225 210.818 42.3059 212.742 44.2299C214.666 46.1538 215.747 48.7633 215.747 51.4842V215.63C215.747 218.351 214.666 220.961 212.742 222.885C210.818 224.809 208.209 225.889 205.488 225.889H41.3415C38.6206 225.889 36.0112 224.809 34.0872 222.885C32.1633 220.961 31.0824 218.351 31.0824 215.63V51.4842C31.0824 48.7633 32.1633 46.1538 34.0872 44.2299C36.0112 42.3059 38.6206 41.225 41.3415 41.225H72.1189ZM123.415 82.2616L159.322 51.4842H87.5076L123.415 82.2616Z" fill="white" />
                    </svg>

                    <div class="hidden lg:block text-white">
                        <a class=" font-bold text-4xl tracking-widest text-neutral">BTS RENT</a>
                        <p class="-mt-2 tracking-[0.5rem]"><span class="font-bold"></span> Clothes</p>
                    </div>
                </div>
                <div class="grow flex justify-center">
                    <ul class="menu menu-vertical lg:menu-horizontal rounded-box text-white font-semibold">
                        <li class="inline-block"><a href="<?= base_url('/rent'); ?>">Home</a></li>
                        <li class="inline-block"><a href="<?= base_url('/rentbusana'); ?>">Busana</a></li>
                        <li class="inline-block"><a>About</a></li>
                        <?php if (session('role') == 'admin') : ?>
                            <li class="inline-block"><a href="<?= base_url('/'); ?>">Kelola</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="flex justify-between items-center mt-1 w-96">
                    <div class="divider lg:divider-horizontal"></div>
                    <?php if (session('nama_lengkap') != null) : ?>
                        <div class="dropdown dropdown-end">
                            <label tabindex="0">
                                <div class="w-10 h-10 rounded-full overflow-hidden">
                                    <img class="object-fill w-full h-full" src="<?= base_url('profile_images/') . session('photo_profile'); ?>" />
                                </div>
                            </label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a>Profile</a></li>
                                <li><a href="<?= base_url('logout'); ?>">Logout</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="<?= base_url('login'); ?>" class="bg-neutral rounded-lg px-5 py-2 text-white font-semibold">LOGIN</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?= $this->renderSection('content'); ?>


    <!-- Untuk Javascript -->
    <?= $this->renderSection('script'); ?>

</body>

</html>