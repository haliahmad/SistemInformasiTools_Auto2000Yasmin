<?php $page_id = null; $comp_model = new SharedController; $current_page = $this->set_current_page_link(); ?>
<div>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 comp-grid">
                    <h4>Dashboard</h4>
                </div>
            </div>
        </div>
    </div>

    
    <div class="">
        <div class="container">
            <div class="row">
                <?php 
$user_role = $_SESSION['user_role'] ?? 1; // Pastikan variabel ini sesuai dengan sistem autentikasi Anda

// Role 1: Menampilkan Barang dan User, menyembunyikan Surat Masuk dan Surat Keluar
// Role 2: Menyembunyikan semua
// Role 3: Menampilkan Surat Masuk dan Surat Keluar, menyembunyikan Barang dan User
?>

<?php if ($user_role == 1 || $user_role == 3): ?>
<div class="col-sm-6 comp-grid">
    <?php $rec_count = $comp_model->getcount_barang(); ?>
    <a class="animated zoomIn record-count alert alert-primary" href="<?php print_link("barang/") ?>">
        <div class="row">
            <div class="col-2">
                <i class="fa fa-file"></i>
            </div>
            <div class="col-10">
                <div class="flex-column justify-content align-center">
                    <div class="title">Barang</div>
                </div>
            </div>
            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
        </div>
    </a>
</div>

<div class="col-sm-6 comp-grid">
    <?php $rec_count = $comp_model->getcount_user(); ?>
    <a class="animated zoomIn record-count alert alert-warning" href="<?php print_link("user/") ?>">
        <div class="row">
            <div class="col-2">
                <i class="fa fa-user"></i>
            </div>
            <div class="col-10">
                <div class="flex-column justify-content align-center">
                    <div class="title">User</div>
                </div>
            </div>
            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
        </div>
    </a>
</div>
<?php endif; ?>

<?php if ($user_role == 3 || $user_role == 1): ?>
<div class="col-sm-6 comp-grid">
    <?php $rec_count = $comp_model->getcount_surat_masuk(); ?>
    <a class="animated zoomIn record-count alert alert-primary" href="<?php print_link("surat_masuk/") ?>">
        <div class="row">
            <div class="col-2">
                <i class="fa fa-file"></i>
            </div>
            <div class="col-10">
                <div class="flex-column justify-content align-center">
                    <div class="title">Peminjaman</div>
                </div>
            </div>
            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
        </div>
    </a>
</div>

<div class="col-sm-6 comp-grid">
    <?php $rec_count = $comp_model->getcount_surat_keluar(); ?>
    <a class="animated zoomIn record-count alert alert-primary" href="<?php print_link("surat_keluar/") ?>">
        <div class="row">
            <div class="col-2">
                <i class="fa fa-file"></i>
            </div>
            <div class="col-10">
                <div class="flex-column justify-content align-center">
                    <div class="title">Pengembalian</div>
                </div>
            </div>
            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
        </div>
    </a>
</div>
<?php endif; ?>
            </div>
        </div>
    </div>


    
    <div class="">
        <div class="container">
            <div class="row">
                <?php 
$comp_model = new SharedController;
$chartdata = $comp_model->barchart_databarang();
?>

<div class="col-md-12 comp-grid">
    <div class="card card-body">
        <h4>Jumlah Barang</h4>
        <hr />
        <canvas id="barchart_databarang"></canvas>
        <script>
            $(function () {
                var chartData = <?php echo json_encode($chartdata); ?>;
                
                var ctx = document.getElementById('barchart_databarang').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartData.labels,
                        datasets: chartData.datasets
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: { display: true, text: "Nama Barang" }
                            },
                            y: {
                                beginAtZero: true,
                                title: { display: true, text: "Jumlah Barang" }
                            }
                        }
                    }
                });
            });
        </script>
    </div>
</div>

<?php 
$chartdata_status = $comp_model->chart_status_barang();
?>

<div class="col-md-6 comp-grid">
    <div class="card card-body">
        <h4>Distribusi Status Barang</h4>
        <canvas id="piechart_status_barang"></canvas>
    </div>
</div>

<div class="col-md-6 comp-grid">
    <div class="card card-body">
        <h4>Jumlah Barang Berdasarkan Status</h4>
        <canvas id="barchart_status_barang"></canvas>
    </div>
</div>

<script>
    $(function () {
        var statusChartData = <?php echo json_encode($chartdata_status); ?>;

        // Pie Chart (Persentase)
        var ctxPie = document.getElementById('piechart_status_barang').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: statusChartData.labels.map((label, i) => `${label} ${statusChartData.percentages[i]}%`),
                datasets: [{
                    data: statusChartData.data,
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                    borderColor: ['#218838', '#e0a800', '#c82333'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'right' }
                }
            }
        });

        // Bar Chart (Jumlah Barang)
        var ctxBar = document.getElementById('barchart_status_barang').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: statusChartData.labels,
                datasets: [{
                    label: "Jumlah Barang",
                    data: statusChartData.data,
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                    borderColor: ['#218838', '#e0a800', '#c82333'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: "Status" } },
                    y: { beginAtZero: true, title: { display: true, text: "Jumlah Barang" } }
                }
            }
        });
    });
</script>
