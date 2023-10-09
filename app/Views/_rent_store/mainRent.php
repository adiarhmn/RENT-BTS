<?= $this->extend('components/rents'); ?>
<?= $this->section('content'); ?>
<div class="mx-auto h-[100vh] flex" id="bg-primary">
    <div class="container m-auto">
        <div class="flex justify-between items-center glass rounded-lg p-10 px-20">
            <div class="w-1/2 p-5">
                <h1 class="text-5xl font-bold">BTS RENT</h1>
                <p class="font-semibold text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, aliquam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex vero necessitatibus repudiandae, esse amet obcaecati rerum at voluptate adipisci nulla.</h1>
                <a href="<?= base_url('login') ?>" class="btn btn-neutral mt-10">MULAI RENTAL</a>
            </div>
            <div class="grow flex justify-end">
                <div class="w-[400px] h-[500px] overflow-hidden rounded-lg shadow-lg">
                    <img class="object-cover w-full h-full" src="https://source.unsplash.com/random" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page #1 -->
<div class="mx-auto h-[93.25vh] flex bg-white ">
    <div class="container m-auto">
        <h1 class="text-2xl font-semibold text-center mb-10">BEST PRODUCT</h1>

    </div>
</div>

<!-- Page #2 -->
<div class="mx-auto h-[93.25vh] flex bg-white ">
    <div class="container m-auto">
        <h1 class="text-2xl font-semibold text-center mb-10">MENYEWA UNTUK</h1>
        <div class="flex justify-between w-1/2 mx-auto">
            <div class="grid w-20 ">
                <i class="fa-solid fa-list-check text-6xl text-center"></i>
                <p class="text-center mt-3">Cek Busana</p>
            </div>
            <div class="grid w-20 ">
                <i class="fa-solid fa-calendar-check text-6xl text-center"></i>
                <p class="text-center mt-3">Atur Tanggal</p>
            </div>
            <div class="grid w-20 ">
                <i class="fa-solid fa-store text-6xl text-center"></i>
                <p class="text-center mt-3">Kunjungi Toko</p>
            </div>
            <div class="grid w-20 ">
                <i class="fa-solid fa-handshake text-6xl text-center"></i>
                <p class="text-center mt-3">Pembayaran</p>
            </div>
            <div class="grid w-20 ">
                <i class="fa-solid fa-arrows-rotate text-6xl text-center"></i>
                <p class="text-center mt-3">Ulang</p>
            </div>
        </div>
        <p class="w-1/3 text-center mx-auto mt-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum labore nisi libero adipisci possimus vero quam ratione maiores voluptatum. Pariatur dolore voluptatum optio quasi perspiciatis magni similique esse ex. Minus!</p>
        <div class="mt-20">
            <h1 class="text-2xl font-semibold text-center mb-5">CERA KERJA</h1>
            <div class="flex justify-between w-1/3 mx-auto">
                <div class="grid w-20 ">
                    <i class="fa-solid fa-arrows-rotate text-6xl text-center"></i>
                    <p class="text-center mt-3">Process</p>
                </div>
                <div class="grid w-20 ">
                    <i class="fa-solid fa-arrows-rotate text-6xl text-center"></i>
                    <p class="text-center mt-3">Process</p>
                </div>
                <div class="grid w-20 ">
                    <i class="fa-solid fa-arrows-rotate text-6xl text-center"></i>
                    <p class="text-center mt-3">Process</p>
                </div>
                <div class="grid w-20 ">
                    <i class="fa-solid fa-arrows-rotate text-6xl text-center"></i>
                    <p class="text-center mt-3">Process</p>
                </div>
            </div>
            <p class="w-1/3 text-center mx-auto mt-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum labore nisi libero adipisci possimus vero quam ratione maiores voluptatum. Pariatur dolore voluptatum optio quasi perspiciatis magni similique esse ex. Minus!</p>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer p-10 text-base-content container mx-auto">
    <aside class="text-white">
        <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current">
            <path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path>
        </svg>
        <p>ACME Industries Ltd.<br />Providing reliable tech since 1992</p>
    </aside>
    <nav class="text-white">
        <header class="footer-title">Services</header>
        <a class="link link-hover">Branding</a>
        <a class="link link-hover">Design</a>
        <a class="link link-hover">Marketing</a>
        <a class="link link-hover">Advertisement</a>
    </nav>
    <nav class="text-white">
        <header class="footer-title">Company</header>
        <a class="link link-hover">About us</a>
        <a class="link link-hover">Contact</a>
        <a class="link link-hover">Jobs</a>
        <a class="link link-hover">Press kit</a>
    </nav>
    <nav class="text-white">
        <header class="footer-title">Legal</header>
        <a class="link link-hover">Terms of use</a>
        <a class="link link-hover">Privacy policy</a>
        <a class="link link-hover">Cookie policy</a>
    </nav>
</footer>
<?= $this->endSection(); ?>