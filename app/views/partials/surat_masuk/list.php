<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>  
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Peminjaman</h4>
                </div>
                
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("surat_masuk/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New  
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('surat_masuk'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('surat_masuk'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('surat_masuk'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery dan jQuery UI CSS dan JS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- Filter Tanggal dengan Tombol Search -->
<div class="container-fluid">
    <div class="row mb-2 justify-content-center">
        <div class="col-md-2 col-sm-6 col-8">
            <!-- Tombol untuk memunculkan modal filter -->
            <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#filterModal">
                Filter by Date
            </button>
        </div>
    </div>
</div>

<!-- Modal Filter Tanggal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter by Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Filter Tanggal -->
                <div class="form-group">
                    <label for="start-date">Start Date</label>
                    <input type="text" id="start-date" class="form-control form-control-sm" placeholder="DD/MM/YYYY">
                </div>
                <div class="form-group">
                    <label for="end-date">End Date</label>
                    <input type="text" id="end-date" class="form-control form-control-sm" placeholder="DD/MM/YYYY">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" id="search-button" class="btn btn-primary btn-sm">Search</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('search-button').addEventListener('click', filterByDate);

function filterByDate() {
    const startDateInput = document.getElementById('start-date').value;
    const endDateInput = document.getElementById('end-date').value;

    // Validasi format tanggal input DD/MM/YYYY menggunakan RegEx
    const dateRegex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;

    if (!startDateInput.match(dateRegex) || !endDateInput.match(dateRegex)) {
        alert('Please enter valid dates in DD/MM/YYYY format');
        return;
    }

    // Konversi tanggal input menjadi objek Date
    const startDate = parseDateDDMMYYYY(startDateInput);
    const endDate = parseDateDDMMYYYY(endDateInput);

    // Set waktu ke awal hari dan akhir hari untuk filter
    startDate.setHours(0, 0, 0, 0);
    endDate.setHours(23, 59, 59, 999);

    const rows = document.querySelectorAll('.page-data tr');

    rows.forEach(row => {
        const tanggalSuratText = row.querySelector('.td-Tanggal_surat span').textContent;
        const tanggalSurat = parseDateDDMMYYYY(tanggalSuratText);

        // Set waktu tanggal surat ke tengah malam untuk filter
        tanggalSurat.setHours(0, 0, 0, 0);

        // Tampilkan atau sembunyikan baris berdasarkan tanggal
        if (tanggalSurat >= startDate && tanggalSurat <= endDate) {
            $(row).fadeIn();  // Smooth tampilkan baris
        } else {
            $(row).fadeOut(); // Smooth sembunyikan baris
        }
    });

    // Tutup modal setelah pencarian
    $('#filterModal').modal('hide');
}

// Fungsi untuk parsing tanggal dalam format DD/MM/YYYY ke objek Date
function parseDateDDMMYYYY(dateString) {
    const [day, month, year] = dateString.split('/');
    return new Date(`${year}-${month}-${day}`);  // Konversi jadi YYYY-MM-DD untuk objek Date
}


    // Ubah semua tanggal di tabel menjadi format DD/MM/YYYY saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        const rows = document.querySelectorAll('.page-data tr');
        rows.forEach(row => {
            const tanggalSuratElement = row.querySelector('.td-Tanggal_surat span');
            const originalDate = new Date(tanggalSuratElement.textContent);
            tanggalSuratElement.textContent = formatToDDMMYYYY(originalDate);
        });
    });
</script>
<script>
    $(function() {
        // Inisialisasi datepicker untuk input start-date dan end-date
        $("#start-date, #end-date").datepicker({
            dateFormat: 'dd/mm/yy',  // Format tanggal DD/MM/YYYY
            changeMonth: true,       // Menambahkan dropdown untuk bulan
            changeYear: true,        // Menambahkan dropdown untuk tahun
            yearRange: "1900:2100",  // Rentang tahun yang bisa dipilih
        });
    });

    document.getElementById('search-button').addEventListener('click', filterByDate);

    function filterByDate() {
        const startDateInput = document.getElementById('start-date').value;
        const endDateInput = document.getElementById('end-date').value;

        // Validasi format tanggal input DD/MM/YYYY menggunakan RegEx
        const dateRegex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;

        if (!startDateInput.match(dateRegex) || !endDateInput.match(dateRegex)) {
            alert('Please enter valid dates in DD/MM/YYYY format');
            return;
        }

        // Konversi tanggal input menjadi objek Date
        const startDate = parseDateDDMMYYYY(startDateInput);
        const endDate = parseDateDDMMYYYY(endDateInput);

        // Set waktu ke awal hari dan akhir hari untuk filter
        startDate.setHours(0, 0, 0, 0);
        endDate.setHours(23, 59, 59, 999);

        const rows = document.querySelectorAll('.page-data tr');

        rows.forEach(row => {
            const tanggalSuratText = row.querySelector('.td-Tanggal_surat span').textContent;
            const tanggalSurat = parseDateDDMMYYYY(tanggalSuratText);

            // Set waktu tanggal surat ke tengah malam untuk filter
            tanggalSurat.setHours(0, 0, 0, 0);

            // Tampilkan atau sembunyikan baris berdasarkan tanggal
            if (tanggalSurat >= startDate && tanggalSurat <= endDate) {
                $(row).fadeIn();  // Smooth tampilkan baris
            } else {
                $(row).fadeOut(); // Smooth sembunyikan baris
            }
        });

        // Tutup modal setelah pencarian
        $('#filterModal').modal('hide');
    }

    // Fungsi untuk parsing tanggal dalam format DD/MM/YYYY ke objek Date
    function parseDateDDMMYYYY(dateString) {
        const [day, month, year] = dateString.split('/');
        return new Date(`${year}-${month}-${day}`);  // Konversi jadi YYYY-MM-DD untuk objek Date
    }

    // Ubah semua tanggal di tabel menjadi format DD/MM/YYYY saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        const rows = document.querySelectorAll('.page-data tr');
        rows.forEach(row => {
            const tanggalSuratElement = row.querySelector('.td-Tanggal_surat span');
            const originalDate = new Date(tanggalSuratElement.textContent);
            tanggalSuratElement.textContent = formatToDDMMYYYY(originalDate);
        });
    });

</script>


<!-- Animasi CSS untuk modal -->
<style>
    /* CSS untuk animasi modal */
    .modal.fade .modal-dialog {
        transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        transform: translateY(-100px);
        opacity: 0;
    }
    .modal.show .modal-dialog {
        transform: translateY(0);
        opacity: 1;
    }
</style>





        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="surat_masuk-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">#</th>
                                                <th  class="td-No_Agenda"> No</th>
                                                <th  class="td-Nomor_Surat"> Nama/Caddy</th>
                                                <th  class="td-Tanggal_surat"> Tanggal</th>
                                                <th  class="td-tanggal_terima"> Jam</th>
                                                <th  class="td-Asal_surat"> Tools</th>
                                                <th  class="td-perihal"> Part Number</th>
                                                <th  class="td-file_surat"> File</th>
                                                <th  class="td-penerima"> Pengawas</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                        <?php
$counter = 0;
foreach ($records as $data) {
    $rec_id = !empty($data['No_Agenda']) ? urlencode($data['No_Agenda']) : null;
    $counter++;
?>
<tr>
    <th class="td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input 
                class="optioncheck custom-control-input" 
                name="optioncheck[]" 
                value="<?php echo htmlspecialchars($data['No_Agenda']); ?>" 
                type="checkbox" 
            />
            <span class="custom-control-label"></span>
        </label>
    </th>
    <th class="td-sno"><?php echo $counter; ?></th>
    <td class="td-No_Agenda">
        <a href="<?php echo htmlspecialchars(print_link("surat_masuk/view/$data[No_Agenda]")); ?>">
            <?php echo htmlspecialchars($data['No_Agenda']); ?>
        </a>
    </td>
    <td class="td-Nomor_Surat">
        <span 
            data-value="<?php echo htmlspecialchars($data['Nomor_Surat']); ?>" 
            data-pk="<?php echo $rec_id; ?>" 
            data-url="<?php echo htmlspecialchars(print_link("surat_masuk/editfield/" . $rec_id)); ?>" 
            data-name="Nomor_Surat" 
            data-title="Enter Nomor Surat" 
            data-placement="left" 
            data-toggle="click" 
            data-type="text" 
            data-mode="popover" 
            data-showbuttons="left" 
            class="is-editable">
            <?php echo htmlspecialchars($data['Nomor_Surat']); ?>
        </span>
    </td>
    <td class="td-Tanggal_surat">
        <span 
            data-flatpickr='{ "enableTime": false }' 
            data-value="<?php echo htmlspecialchars($data['Tanggal_surat']); ?>" 
            data-pk="<?php echo $rec_id; ?>" 
            data-url="<?php echo htmlspecialchars(print_link("surat_masuk/editfield/" . $rec_id)); ?>" 
            data-name="Tanggal_surat" 
            data-title="Enter Tanggal Surat" 
            data-placement="left" 
            data-toggle="click" 
            data-type="flatdatetimepicker" 
            data-mode="popover" 
            data-showbuttons="left" 
            class="is-editable">
            <?php echo htmlspecialchars($data['Tanggal_surat']); ?>
        </span>
    </td>
    <td class="td-tanggal_terima">
        <span 
            data-flatpickr='{ "enableTime": true, "noCalendar": true, "dateFormat": "H:i", "time_24hr": true }' 
            data-value="<?php echo htmlspecialchars(date('H:i', strtotime($data['tanggal_terima']))); ?>" 
            data-pk="<?php echo $rec_id; ?>" 
            data-url="<?php echo htmlspecialchars(print_link("surat_masuk/editfield/" . $rec_id)); ?>" 
            data-name="tanggal_terima" 
            data-title="Enter Jam" 
            data-placement="left" 
            data-toggle="click" 
            data-type="flatdatetimepicker" 
            data-mode="popover" 
            data-showbuttons="left" 
            class="is-editable">
            <?php echo htmlspecialchars(date('H:i', strtotime($data['tanggal_terima']))); ?>
        </span>
    </td>
    <td class="td-Asal_surat">
        <span 
            data-value="<?php echo htmlspecialchars($data['Asal_surat']); ?>" 
            data-pk="<?php echo $rec_id; ?>" 
            data-url="<?php echo htmlspecialchars(print_link("surat_masuk/editfield/" . $rec_id)); ?>" 
            data-name="Asal_surat" 
            data-title="Enter Asal Surat" 
            data-placement="left" 
            data-toggle="click" 
            data-type="text" 
            data-mode="popover" 
            data-showbuttons="left" 
            class="is-editable">
            <?php echo htmlspecialchars($data['Asal_surat']); ?>
        </span>
    </td>
    <td class="td-perihal">
        <span 
            data-pk="<?php echo $rec_id; ?>" 
            data-url="<?php echo htmlspecialchars(print_link("surat_masuk/editfield/" . $rec_id)); ?>" 
            data-name="perihal" 
            data-title="Enter Perihal" 
            data-placement="left" 
            data-toggle="click" 
            data-type="textarea" 
            data-mode="popover" 
            data-showbuttons="left" 
            class="is-editable">
            <?php echo htmlspecialchars($data['perihal']); ?>
        </span>
    </td>
    <td class="td-file_surat">
        <?php Html::page_link_file($data['file_surat']); ?>
    </td>
    <td class="td-penerima">
        <span 
            data-value="<?php echo htmlspecialchars($data['penerima']); ?>" 
            data-pk="<?php echo $rec_id; ?>" 
            data-url="<?php echo htmlspecialchars(print_link("surat_masuk/editfield/" . $rec_id)); ?>" 
            data-name="penerima" 
            data-title="Enter Penerima" 
            data-placement="left" 
            data-toggle="click" 
            data-type="text" 
            data-mode="popover" 
            data-showbuttons="left" 
            class="is-editable">
            <?php echo htmlspecialchars($data['penerima']); ?>
        </span>
    </td>
    <th class="td-btn">
        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php echo htmlspecialchars(print_link("surat_masuk/view/$rec_id")); ?>">
            <i class="fa fa-eye"></i> View
        </a>
        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php echo htmlspecialchars(print_link("surat_masuk/edit/$rec_id")); ?>">
            <i class="fa fa-edit"></i> Edit
        </a>
        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php echo htmlspecialchars(print_link("surat_masuk/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page")); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
            <i class="fa fa-times"></i> Delete
        </a>
    </th>
</tr>
<?php
}
?>

                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("surat_masuk/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
