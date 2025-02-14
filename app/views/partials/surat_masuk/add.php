<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php if($show_header == true) { ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="record-title">Add New Peminjaman</h4>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form id="surat_masuk-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("surat_masuk/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <!-- Nama/Caddy Tools -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Nomor_Surat">Nama<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div>
                                                <input id="ctrl-Nomor_Surat" value="<?php echo $this->set_field_value('Nomor_Surat', ''); ?>" type="text" placeholder="Masukan Nama" required name="Nomor_Surat" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tanggal (Auto-filled) -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Tanggal_surat">Tanggal <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-Tanggal_surat" class="form-control" required value="<?php echo $this->set_field_value('Tanggal_surat', date('Y-m-d')); ?>" type="text" name="Tanggal_surat" style="background-color: #d3d3d3; color: black;" readonly />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Jam (Auto-filled) -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="tanggal_terima">Jam <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-tanggal_terima" class="form-control" required type="text" name="tanggal_terima" style="background-color: #d3d3d3; color: black;" readonly />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tools -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Asal_surat">Tools <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div>
                                                <input id="ctrl-Asal_surat" value="<?php echo $this->set_field_value('Asal_surat', ''); ?>" type="text" placeholder="Masukan Tools Yang ingin Di Pinjam" required name="Asal_surat" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Part Number -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="perihal">Part Number <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div>
                                            <input id="ctrl-perihal" type="number" placeholder="Part Number Dari Tools" required name="perihal" class="form-control" />

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                                
                        <!-- Photo Upload -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="control-label" for="file_surat">Upload Photo <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-sm-8">
                                    <div>
                                        <!-- Dropzone Wrapper -->
                                        <div 
                                            class="dropzone required" 
                                            id="dropzone-file_surat" 
                                            input="#ctrl-file_surat" 
                                            fieldname="file_surat" 
                                            data-multiple="false" 
                                            dropmsg="Choose photo or drag and drop to upload" 
                                            btntext="Browse" 
                                            extensions=".jpg,.jpeg,.png,.gif" 
                                            filesize="5" 
                                            maximum="1">
                                            
                                            <!-- Hidden Input -->
                                            <input 
                                                name="file_surat" 
                                                id="ctrl-file_surat" 
                                                required 
                                                class="dropzone-input form-control" 
                                                value="<?php echo htmlspecialchars($this->set_field_value('file_surat', '')); ?>" 
                                                type="text" 
                                            />
                                        </div>
                                        <!-- End Dropzone -->
                                    </div>
                                    <!-- Error Message (Optional) -->
                                    <small class="form-text text-muted">
                                        Supported file types: .jpg, .jpeg, .png, .gif. Maximum size: 5MB.
                                    </small>
                                </div>
                            </div>
                        </div>



                                <!-- Status Hidden Field (Automatically Set to "Belum Dikembalikan") -->
                                <input type="hidden" name="status" value="belum dikembalikan" />

                                <!-- Submit Button -->
                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                    <div class="form-ajax-status"></div>
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                        <i class="fa fa-send"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Auto-fill date and time on page load
document.addEventListener('DOMContentLoaded', function() {
    var now = new Date();
    var formattedDate = now.getFullYear() + '-' + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + ('0' + now.getDate()).slice(-2);
    document.getElementById('ctrl-Tanggal_surat').value = formattedDate;

    var formattedDateTime = formattedDate + ' ' + ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2);
    document.getElementById('ctrl-tanggal_terima').value = formattedDateTime;
});
</script>
