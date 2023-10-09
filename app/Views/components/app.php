<!DOCTYPE html>
<html lang="en" data-theme="emerald">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/output.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/maincss/stylemain.css'); ?>">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <!--start navigation bar -->
        <div class="navbar sticky top-0 bg-rose-500 shadow-lg max-h-16">
            <div class="container mx-auto">
                <div class="w-full flex justify-between items-start">
                    <div class="block lg:hidden">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="flex justify-between items-stretch">
                        <svg width="55" height="55" viewBox="0 0 247 247" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M133.674 205.371H195.229V164.335H154.192V143.816H195.229V61.7433H174.71V113.039L133.674 96.6243V205.371ZM113.155 205.371V96.6243L72.1189 113.039V61.7433H51.6007V205.371H113.155ZM72.1189 41.225V30.9659H174.71V41.225H205.488C208.209 41.225 210.818 42.3059 212.742 44.2299C214.666 46.1538 215.747 48.7633 215.747 51.4842V215.63C215.747 218.351 214.666 220.961 212.742 222.885C210.818 224.809 208.209 225.889 205.488 225.889H41.3415C38.6206 225.889 36.0112 224.809 34.0872 222.885C32.1633 220.961 31.0824 218.351 31.0824 215.63V51.4842C31.0824 48.7633 32.1633 46.1538 34.0872 44.2299C36.0112 42.3059 38.6206 41.225 41.3415 41.225H72.1189ZM123.415 82.2616L159.322 51.4842H87.5076L123.415 82.2616Z" fill="white" />
                        </svg>

                        <div class="hidden lg:block text-white">
                            <a class=" font-bold text-4xl tracking-widest text-neutral">BTS RENT</a>
                            <p class="-mt-2 tracking-[0.5rem]"><span class="font-bold"></span> Clothes</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-1">
                        <h5 class="font-semibold hidden lg:block text-white"><?= session('nama_lengkap'); ?></h5>
                        <div class="divider lg:divider-horizontal"></div>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- end navigation bar -->


        <div class="w-full h-[93.3vh]">
            <div class="flex h-full bg-white">
                <!-- Sidebar -->
                <div id="Sidebar" class="hidden bg-white lg:block w-72 h-full overflow-auto no-scrollbar">
                    <ul class="menu  menu-lg w-full rounded-box drop-shadow-2xl">
                        <li class="text-center text-bold text-red-400">Utama</li>
                        <li><a href="/" class="text-start <?= ($page == 'dashboard') ? 'active' : ''; ?>"><i class="fa-solid fa-home w-10 text-center text-xl"></i>Dashboard</a></li>
                        <li><a href="<?= base_url('rent'); ?>" class="text-start"><i class="fa-solid fa-store w-10 text-center text-xl"></i>Rental</a></li>
                        <li></li>
                        <li class="text-center text-bold text-red-400">Busana</li>
                        <li><a href="<?= base_url('busana'); ?>" class="text-start <?= ($page == 'busana') ? 'active' : ''; ?>"><i class="fa-solid fa-shirt w-10 text-center text-xl"></i>Data Busana</a></li>
                        <li><a href="<?= base_url('jenis'); ?>" class="text-start <?= ($page == 'jenis') ? 'active' : ''; ?>"><i class="fa-solid fa-vector-square w-10 text-center text-xl"></i>Jenis Busana</a></li>
                        <li><a href="<?= base_url('paket'); ?>" class="text-start <?= ($page == 'paket') ? 'active' : ''; ?>"><i class="fa-solid fa-box-open w-10 text-center text-xl"></i>Paket Busana</a></li>
                        <li><a href="/" class="text-start"><i class="fa-solid fa-retweet w-10 text-center text-xl"></i>Dapur Busana</a></li>
                        <li></li>
                        <li class="text-center text-bold text-red-400">Promo</li>
                        <li><a href="/" class="text-start"><i class="fa-solid fa-ticket w-10 text-center text-xl"></i>Data Voucher </a></li>
                        <li></li>
                        <li class="text-center text-bold text-red-400">Costumer</li>
                        <li><a href="/" class="text-start"><i class="fa-solid fa-user-lock w-10 text-center text-xl"></i>Data Pesanan</a></li>
                        <li><a href="/" class="text-start"><i class="fa-solid fa-comments w-10 text-center text-xl"></i>Data Review </a></li>
                        <li></li>
                        <li class="text-center text-bold text-red-400">Pengguna</li>
                        <li><a href="/user" class="text-start <?= ($page == 'user') ? 'active' : ''; ?>"><i class="fa-solid fa-users-gear w-10 text-center text-xl"></i>Data Users</a></li>
                    </ul>
                </div>
                <!-- Sidebar Selesai -->

                <div id="Content" class="p-5 w-full overflow-auto bg-slate-100">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </section>

    <?= $this->renderSection('script'); ?>
    <script>
    ClassicEditor.defaultConfig = {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                '|',
                'bulletedList',
                'numberedList',
                '|',
                'undo',
                'redo'
            ]
        },
        image: {
            toolbar: [
                'imageStyle:full',
                'imageStyle:side',
                '|',
                'imageTextAlternative'
            ]
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        language: 'en'
    };
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
</body>

</html>