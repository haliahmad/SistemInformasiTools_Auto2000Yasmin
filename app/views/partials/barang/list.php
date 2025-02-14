<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("barang/add");
$can_edit = ACL::is_allowed("barang/edit");
$can_view = ACL::is_allowed("barang/view");
$can_delete = ACL::is_allowed("barang/delete");
?>
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
                    <h4 class="record-title">Tools</h4>
                </div>
                <div class="container-fluid">
    <!-- Search Field -->
    <div class="row mb-2">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <!-- Search Form -->
            <form class="search mr-2 d-flex align-items-center" action="<?php print_link('barang'); ?>" method="get" style="flex: 0 0 100%;">
                <div class="input-group">
                    <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search" placeholder="Search" />
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tambah Data and Filter Section -->
    <div class="row mb-2">
        <div class="col-md-6 text-left">
            <!-- Tambah Data Button -->
            <?php if($can_add){ ?>
            <a class="btn btn-sm btn-primary" href="<?php print_link("barang/add") ?>">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
            <?php } ?>
        </div>
        
        <div class="col-md-6 text-right">
            <!-- Filter Form -->
            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form d-flex align-items-center justify-content-end">
                <select name="barang_Lokasi_barang" class="form-control select2 mr-2" style="max-width: 250px;">
                    <option value="">Select a value ...</option>
                    <?php 
                    $barang_Lokasi_barang_options = $comp_model->barang_barangLokasi_barang_option_list();
                    if(!empty($barang_Lokasi_barang_options)){
                        foreach($barang_Lokasi_barang_options as $option){
                            $value = (!empty($option['value']) ? $option['value'] : null);
                            $label = (!empty($option['label']) ? $option['label'] : $value);
                            $selected = $this->set_field_selected('barang_Lokasi_barang', $value);
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                        <?php echo $label; ?>
                    </option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <button class="btn btn-primary btn-sm">Filter</button>
            </form>
        </div>
    </div>

    <!-- Change Status and Perbaiki Buttons -->
    <div class="row mb-2 d-flex align-items-center">
        <div class="col-6 text-left">
            <button 
                data-toggle="modal" 
                data-target="#confirmChangeStatusModal" 
                class="btn btn-sm btn-success btn-change-status"
                data-url="<?php print_link('barang/change_status/{sel_ids}/?csrf_token=' . $csrf_token . '&redirect=' . $current_page); ?>"
                disabled>
                <i class="fa fa-check"></i> Change Status
            </button>
        </div>

        <div class="col-6 text-right">
            <button 
                data-toggle="modal" 
                data-target="#confirmRepairModal" 
                class="btn btn-sm btn-success btn-perbaiki-selected"
                id="repairButton"
                data-url="<?php print_link('barang/perbaiki/{sel_ids}/?csrf_token=' . $csrf_token . '&redirect=' . $current_page); ?>"
                disabled>
                <i class="fa fa-check"></i> Perbaiki
            </button>
        </div>
    </div>
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
                                        <a class="text-decoration-none" href="<?php print_link('barang'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('barang'); ?>">
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
           
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%' // Menjaga agar select2 responsif
        });
    });
</script>





<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%' // Menjaga agar select2 responsif
        });
    });
</script>




<!-- Modal Konfirmasi Perbaikan -->
<div class="modal fade" id="confirmRepairModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin memperbaiki barang yang dipilih?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmRepair">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    let selectedIds = [];

    // Status yang tidak diperbolehkan untuk perbaikan
    const invalidStatuses = ['Bagus', 'Rusak', 'Hilang'];

    // Ketika checkbox diubah
    $("input[type='checkbox']").change(function () {
        selectedIds = $("input[type='checkbox']:checked").map(function () {
            return $(this).val();
        }).get();

        // Cek apakah ada status yang tidak valid
        let hasInvalidStatus = selectedIds.some(id => {
            const currentStatus = $(`tr:has(input[value='${id}']) .td-status`).text().trim();
            return invalidStatuses.includes(currentStatus);
        });

        // Aktifkan atau nonaktifkan tombol berdasarkan kondisi
        let allSelectedArePO = selectedIds.every(id => {
            const currentStatus = $(`tr:has(input[value='${id}']) .td-status`).text().trim();
            return currentStatus === 'PO'; // Pastikan semua yang dipilih memiliki status 'PO'
        });

        // Jika ada item yang statusnya tidak 'PO', tombol Perbaiki dinonaktifkan
        if (selectedIds.length === 0 || !allSelectedArePO) {
            $("#repairButton").prop("disabled", true);
            if (!allSelectedArePO) {
                toastr.warning("Item yang dipilih harus memiliki status 'PO' untuk diperbaiki.");
            }
        } else {
            $("#repairButton").prop("disabled", false);
        }
    });

    // Ketika tombol Perbaiki diklik
    $("#repairButton").click(function () {
        if (selectedIds.length === 0) {
            toastr.warning("Pilih item yang akan diperbaiki.");
            return;
        }

        // Ambil URL dan ganti placeholder {sel_ids} dengan ID yang dipilih
        const urlTemplate = $(this).data("url");
        const finalUrl = urlTemplate.replace("{sel_ids}", selectedIds.join(','));

        // Update data-url untuk tombol konfirmasi
        $("#confirmRepair").data("url", finalUrl);
    });

    // Konfirmasi Perbaikan
    $("#confirmRepair").click(function () {
        const finalUrl = $(this).data("url");

        // Lakukan request AJAX ke endpoint controller
        $.ajax({
            url: finalUrl,
            type: "POST",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                    location.reload(); // Refresh halaman untuk menampilkan status terbaru
                } else {
                    toastr.error(response.message);
                }
            },
            error: function () {
                toastr.error("Terjadi kesalahan, silakan coba lagi.");
            }
        });
    });
});
</script>











<!-- Modal untuk konfirmasi perubahan status -->
<div class="modal fade" id="confirmChangeStatusModal" tabindex="-1" role="dialog" aria-labelledby="confirmChangeStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmChangeStatusModalLabel">Konfirmasi Perubahan Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengubah status menjadi <span id="newStatusLabel"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="confirmChangeStatus" class="btn btn-primary">Ya, Ubah Status</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk interaksi -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function () {
    let selectedIds = [];

    // Update selected IDs on checkbox change
    $("input[type='checkbox']").change(function () {
        selectedIds = $("input[type='checkbox']:checked").map(function () {
            return $(this).val();
        }).get();

        // Check if any selected item has a status of "PO" or "Normal"
        let hasInvalidStatus = selectedIds.some(id => {
            const currentStatus = $(`tr:has(input[value='${id}']) .td-status`).text().trim();
            return currentStatus === 'PO' || currentStatus === 'Normal';
        });

        // Enable or disable the Change Status button
        if (hasInvalidStatus) {
            $(".btn-change-status").prop("disabled", true);
            toastr.warning("Item dengan status 'PO' atau 'Normal' tidak dapat diubah.");
        } else {
            $(".btn-change-status").prop("disabled", selectedIds.length === 0);
        }
    });

    // Show modal and set status options based on current status
    $(".btn-change-status").click(function () {
        const selectedStatuses = new Set();
        selectedIds.forEach(id => {
            const currentStatus = $(`tr:has(input[value='${id}']) .td-status`).text().trim();
            selectedStatuses.add(currentStatus);
        });

        if (selectedStatuses.size > 1) {
            toastr.error("Harap pilih item dengan status yang sama.");
            return;
        }

        const currentStatus = Array.from(selectedStatuses)[0];

        // Set the new status based on the current status
        const statusMap = {
            'Danger': 'PO',
            'PO': null,   // No change allowed
            'Normal': null // No change allowed
        };

        const newStatus = statusMap[currentStatus];

        if (newStatus) {
            $("#newStatusLabel").text(newStatus); // Display the new status in the modal
            $('#confirmChangeStatusModal').modal('show');
        } else {
            toastr.error("Status ini tidak dapat diubah lebih lanjut.");
        }
    });

    $("#confirmChangeStatus").click(function () {
        const sel_ids = selectedIds.join(',');
        const url = $(".btn-change-status").data("url").replace('{sel_ids}', sel_ids);
        const newStatus = $('#newStatusLabel').text(); // Get the new status from the label in the modal

        if (!newStatus || sel_ids.length === 0) {
            toastr.error("Silakan pilih item yang valid.");
            return;
        }

        // Hide modal and display loading indicator
        $('#confirmChangeStatusModal').modal('hide');
        toastr.info('Memproses perubahan status...');

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: { new_status: newStatus },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);

                    // Update the status directly on the page
                    selectedIds.forEach(id => {
                        $(`tr:has(input[value='${id}']) .td-status`).text(response.new_status);
                    });

                    // Reset selected IDs and UI
                    selectedIds = [];
                    $(".btn-change-status").prop("disabled", true);
                    $("input[type='checkbox']").prop("checked", false);

                    // Optionally, refresh the index view or redirect after a delay
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error(response.message || 'Gagal memperbarui status.');
                }
            },
            error: function (xhr, status, error) {
                toastr.error('Terjadi kesalahan saat memperbarui status.');
            }
        });
    });
});


</script>



<!-- Tambahkan link CSS Toastr di <head> Anda -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 comp-grid">
            <?php $this :: display_page_errors(); ?>
            <div class="filter-tags mb-2">
                <?php if (!empty(get_value('barang_Lokasi_barang'))) { ?>
                    <div class="filter-chip card bg-light">
                        <b>Barang Lokasi :</b>
                        <?php
                        echo get_value('barang_Lokasi_baranglabel') ? get_value('barang_Lokasi_baranglabel') : get_value('barang_Lokasi_barang');
                        $remove_link = unset_get_value('barang_Lokasi_barang', $this->route->page_url);
                        ?>
                        <a href="<?php print_link($remove_link); ?>" class="close-btn">&times;</a>
                    </div>
                <?php } ?>
            </div>
            <div class="animated fadeIn page-content">
                <div id="barang-list-records">
                    <div id="page-report-body" class="table-responsive">
                        <table class="table table-striped table-sm text-left">
                            <thead class="table-header bg-blue">
                                <tr>
                                    <?php if ($can_delete) { ?>
                                        <th class="td-checkbox">
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </th>
                                    <?php } ?>
                                    <th class="td-sno">#</th>
                                    <th class="td-id_type_barang">Part Number</th>
                                    <th class="td-merek_barang">Size Tools</th>
                                    <th class="td-Spesifikasi">Tools</th>
                                    <th class="td-Sumber">Nama</th>
                                    <th class="td-Lokasi_barang">Caddy Tools</th>
                                    <th class="td-Kondisi_barang">Kondisi Tools</th>
                                    <th class="td-tanggal_input">Tanggal Input</th>
                                    <th class="td-status">Status</th>
                                    <th class="td-btn"></th>
                                </tr>
                            </thead>
                            <?php if (!empty($records)) { ?>
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <?php
                                    $counter = 0;
                                    foreach ($records as $data) {
                                        $rec_id = (!empty($data['id_barang']) ? urlencode($data['id_barang']) : null);
                                        $counter++;
                                    ?>
                                        <tr>
                                            <?php if ($can_delete) { ?>
                                                <td class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_barang'] ?>" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                            <?php } ?>
                                            <td class="td-sno"><?php echo $counter; ?></td>
                                            
                        <td class="td-id_type_barang">
                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("type_barang/view/" . urlencode($data['id_type_barang'])) ?>">
                                <i class="fa fa-eye"></i> <?php echo $data['type_barang_nama_barang'] ?>
                            </a>
                        </td>
                        <td class="td-merek_barang">
                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['merek_barang']; ?>" 
                                data-pk="<?php echo $data['id_barang'] ?>" 
                                data-url="<?php print_link("barang/editfield/" . urlencode($data['id_barang'])); ?>" 
                                data-name="merek_barang" 
                                data-title="Enter Merek Barang" 
                                data-placement="left" 
                                data-toggle="click" 
                                data-type="text" 
                                data-mode="popover" 
                                data-showbuttons="left" 
                                class="is-editable" <?php } ?>>
                                <?php echo $data['merek_barang']; ?> 
                            </span>
                        </td>
                        <td class="td-Spesifikasi">
                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id_barang'] ?>" 
                                data-url="<?php print_link("barang/editfield/" . urlencode($data['id_barang'])); ?>" 
                                data-name="Spesifikasi" 
                                data-title="Enter Spesifikasi" 
                                data-placement="left" 
                                data-toggle="click" 
                                data-type="textarea" 
                                data-mode="popover" 
                                data-showbuttons="left" 
                                class="is-editable" <?php } ?>>
                                <?php echo $data['Spesifikasi']; ?> 
                            </span>
                        </td>
                        <td class="td-Sumber">
                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Sumber']; ?>" 
                                data-pk="<?php echo $data['id_barang'] ?>" 
                                data-url="<?php print_link("barang/editfield/" . urlencode($data['id_barang'])); ?>" 
                                data-name="Sumber" 
                                data-title="Enter Sumber" 
                                data-placement="left" 
                                data-toggle="click" 
                                data-type="text" 
                                data-mode="popover" 
                                data-showbuttons="left" 
                                class="is-editable" <?php } ?>>
                                <?php echo $data['Sumber']; ?> 
                            </span>
                        </td>
                        <td class="td-Lokasi_barang">
                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("lokasi_barang/view/" . urlencode($data['Lokasi_barang'])) ?>">
                                <i class="fa fa-eye"></i> <?php echo $data['lokasi_barang_Lokasi'] ?>
                            </a>
                        </td>
                        <td class="td-Kondisi_barang">
                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("kondisi_barang/view/" . urlencode($data['Kondisi_barang'])) ?>">
                                <i class="fa fa-eye"></i> <?php echo $data['kondisi_barang_Kondisi'] ?>
                            </a>
                        </td>
                        <td class="td-tanggal_input">
    <span <?php if($can_edit){ ?> 
        data-value="<?php echo date("d-m-Y", strtotime($data['tanggal_input'])); ?>" 
        data-pk="<?php echo $data['id_barang'] ?>" 
        data-url="<?php print_link("barang/editfield/" . urlencode($data['id_barang'])); ?>" 
        data-name="tanggal_input" 
        data-title="Enter Tanggal Input" 
        data-placement="left" 
        data-toggle="click" 
        data-type="text" 
        data-mode="popover" 
        data-showbuttons="left" 
        class="is-editable" 
        <?php } ?>>
        <?php echo date("d-m-Y", strtotime($data['tanggal_input'])); ?>
    </span>
</td>


                        <style>
    /* Print styles */
    @media print {
        .container-fluid {
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        .table thead {
            background-color: #007bff; /* Blue header background */
            color: #fff;
        }
        .table thead th {
            padding: 8px;
            border: none; /* Remove header borders */
        }
        .table tbody td {
            border: 1px solid #000; /* Borders on table body only */
            padding: 8px;
            text-align: left;
        }
        /* Hide checkboxes and buttons in print view */
        .td-checkbox, .td-btn {
            display: none;
        }
        /* Optional: Disable hover effects in print view */
        tr:hover {
            background-color: transparent !important;
        }
    }

    /* Screen styles */
    .table-header.bg-blue {
        background-color: #007bff; /* Blue header background for screen */
        color: #fff;
    }
    .table-header.bg-blue th {
        color: #fff;
    }
</style>
                        <td class="td-status">
                            <?php echo $data['status']; ?> <!-- New Status Cell -->
                        </td>
                        <th class="td-btn">
                            <?php if($can_view){ ?>
                            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("barang/view/$rec_id"); ?>">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <?php } ?>
                            <?php if($can_edit){ ?>
                            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("barang/edit/$rec_id"); ?>">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <?php } ?>
                            <?php if($can_delete){ ?>
                            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("barang/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                <i class="fa fa-times"></i>
                                Delete
                            </a>
                            <?php } ?>
                        </th>
                    </tr>
                    <?php 
                    }
                    ?>
                    <!--endrecord-->
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
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("barang/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
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
