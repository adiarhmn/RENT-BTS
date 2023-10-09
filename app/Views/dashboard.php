<?= $this->extend('components/app'); ?>
<?= $this->section('content'); ?>
<div>
    <h1 class="font-bold text-4xl mb-4">Dashboard</h1>
</div>
<section>
    <div class="stats shadow w-full mb-5">
        <div class="stat">
            <div class="stat-figure text-secondary">
            </div>
            <div class="stat-title">Total Pengguna</div>
            <div class="stat-value"><?= $user; ?></div>
            <div class="stat-desc">Pengguna BTS RENT</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">

            </div>
            <div class="stat-title">New Users</div>
            <div class="stat-value">4,200</div>
            <div class="stat-desc">400 (22%)</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">

            </div>
            <div class="stat-title">New Registers</div>
            <div class="stat-value">1,200</div>
            <div class="stat-desc">90 (14%)</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-secondary">

            </div>
            <div class="stat-title">New Registers</div>
            <div class="stat-value">1,200</div>
            <div class="stat-desc">90 (14%)</div>
        </div>
    </div>

    <div class="w-full flex gap-3">
        <div class="w-2/3 p-5 bg-white rounded-xl shadow-lg">
            <div class="font-bold text-3xl">Grafik Penyewaan BTS</div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="grow p-4 bg-rose-200 rounded-xl shadow-lg h-[69vh] overflow-x-auto no-scrollbar">
            <h1 class="text-3xl font-bold mb-3">Top Rental</h1>

            <!-- Start Card -->
            <div class="card card-side bg-base-100 shadow-xl flex gap-3 items-center p-3 px-5 hover:scale-105 mb-3">
                <div class="overflow-hidden w-24 h-24 rounded-lg">
                    <img class="object-cover w-full h-full" src="https://source.unsplash.com/random" alt="Movie" />
                </div>
                <div class="card-body p-0 truncate w-4">
                    <h2 class="card-title">Paket Sewa A</h2>
                    <p><?= character_limiter('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, temporibus.', 30); ?></p>
                    <p><i class="fa-solid fa-star text-yellow-400"></i> 4</p>
                </div>
            </div>
            <!-- End Card -->
            <!-- Start Card -->
            <div class="card card-side bg-base-100 shadow-xl flex gap-3 items-center p-3 px-5 hover:scale-105 mb-3">
                <div class="overflow-hidden w-24 h-24 rounded-lg">
                    <img class="object-cover w-full h-full" src="https://source.unsplash.com/random" alt="Movie" />
                </div>
                <div class="card-body p-0 truncate w-4">
                    <h2 class="card-title">Paket Sewa A</h2>
                    <p><?= character_limiter('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, temporibus.', 30); ?></p>
                    <p><i class="fa-solid fa-star text-yellow-400"></i> 4</p>
                </div>
            </div>
            <!-- End Card -->
            <!-- Start Card -->
            <div class="card card-side bg-base-100 shadow-xl flex gap-3 items-center p-3 px-5 hover:scale-105 mb-3">
                <div class="overflow-hidden w-24 h-24 rounded-lg">
                    <img class="object-cover w-full h-full" src="https://source.unsplash.com/random" alt="Movie" />
                </div>
                <div class="card-body p-0 truncate w-4">
                    <h2 class="card-title">Paket Sewa A</h2>
                    <p><?= character_limiter('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, temporibus.', 30); ?></p>
                    <p><i class="fa-solid fa-star text-yellow-400"></i> 4</p>
                </div>
            </div>
            <!-- End Card -->
            <!-- Start Card -->
            <div class="card card-side bg-base-100 shadow-xl flex gap-3 items-center p-3 px-5 hover:scale-105 mb-3">
                <div class="overflow-hidden w-24 h-24 rounded-lg">
                    <img class="object-cover w-full h-full" src="https://source.unsplash.com/random" alt="Movie" />
                </div>
                <div class="card-body p-0 truncate w-4">
                    <h2 class="card-title">Paket Sewa A</h2>
                    <p><?= character_limiter('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, temporibus.', 30); ?></p>
                    <p><i class="fa-solid fa-star text-yellow-400"></i> 4</p>
                </div>
            </div>
            <!-- End Card -->
            <!-- Start Card -->
            <div class="card card-side bg-base-100 shadow-xl flex gap-3 items-center p-3 px-5 hover:scale-105 mb-3">
                <div class="overflow-hidden w-24 h-24 rounded-lg">
                    <img class="object-cover w-full h-full" src="https://source.unsplash.com/random" alt="Movie" />
                </div>
                <div class="card-body p-0 truncate w-4">
                    <h2 class="card-title">Paket Sewa A</h2>
                    <p><?= character_limiter('Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, temporibus.', 30); ?></p>
                    <p><i class="fa-solid fa-star text-yellow-400"></i> 4</p>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</section>
<?= $this->endSection(); ?>


<?= $this->section('script'); ?>
<script src="<?= base_url('assets/chart.js/dist/chart.umd.js'); ?>"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
            datasets: [{
                label: 'Pesanan Berhasil',
                data: [0, 12, 19, 3, 5, 2, 3],
                borderWidth: 2,
                tension: 0.2
            },{
                label: 'Pesanan Dibatalkan',
                data: [0, 9, 0, 10, 10, 2, 11],
                borderWidth: 2,
                tension: 0.2
            },]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>