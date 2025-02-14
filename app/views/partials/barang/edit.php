<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php if ($show_header == true) { ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="record-title">Edit Tools</h4>
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
                        <form id="barang-edit-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("barang/edit/$page_id/?csrf_token=$csrf_token") ?>" method="post">
                            <div>

<!-- Part Number Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="id_type_barang">Part Number <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div>
                <select required id="ctrl-id_type_barang" name="id_type_barang" placeholder="Select a value..." class="custom-select select2">
                    <option value="">Select a value...</option>
                    <?php 
                    // Get options list
                    $id_type_barang_options = $comp_model->barang_id_type_barang_option_list();
                    
                    // Get previously saved value for 'id_type_barang' (assuming this is fetched correctly from the database)
                    $selected_value = isset($data['id_type_barang']) ? $data['id_type_barang'] : '';  // Modify $data based on your variable

                    if (!empty($id_type_barang_options)) {
                        $index = 1; // Start numbering from 1
                        foreach ($id_type_barang_options as $option) {
                            $value = !empty($option['value']) ? $option['value'] : null;
                            $label = !empty($option['label']) ? $option['label'] : $value;

                            // Check if this option is the selected one
                            $selected = $value == $selected_value ? "selected" : "";
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo htmlspecialchars($value); ?>">
                        <?php echo $index . " - " . htmlspecialchars($label); // Display numbering before the label ?>
                    </option>
                    <?php
                            $index++; // Increment numbering
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>

                <!-- Size Tools Field -->
                               <!-- Size Tools Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="merek_barang">Size Tools <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div>
                <?php 
                    $selected_merek_barang = $data['merek_barang']; // Nilai yang sudah dipilih sebelumnya
                ?>
                <select id="ctrl-merek_barang" name="merek_barang" class="form-control select2" required="">
                    <option value="">Pilih Size Tools</option>
                    <option value="17x19mm" <?php echo ($selected_merek_barang == "17x19mm") ? "selected" : ""; ?>>17x19mm</option>
                    <option value="14x17mm" <?php echo ($selected_merek_barang == "14x17mm") ? "selected" : ""; ?>>14x17mm</option>
                    <option value="12x14mm" <?php echo ($selected_merek_barang == "12x14mm") ? "selected" : ""; ?>>12x14mm</option>
                    <option value="10x12mm" <?php echo ($selected_merek_barang == "10x12mm") ? "selected" : ""; ?>>10x12mm</option>
                    <option value="8x9mm" <?php echo ($selected_merek_barang == "8x9mm") ? "selected" : ""; ?>>8x9mm</option>
                    <option value="22x24mm" <?php echo ($selected_merek_barang == "22x24mm") ? "selected" : ""; ?>>22x24mm</option>
                    <option value="19x21mm" <?php echo ($selected_merek_barang == "19x21mm") ? "selected" : ""; ?>>19x21mm</option>
                    <option value="12x14mm. S" <?php echo ($selected_merek_barang == "12x14mm. S") ? "selected" : ""; ?>>12x14mm. S</option>
                    <option value="10x12mm. S" <?php echo ($selected_merek_barang == "10x12mm. S") ? "selected" : ""; ?>>10x12mm. S</option>
                    <option value="8x10mm. S" <?php echo ($selected_merek_barang == "8x10mm. S") ? "selected" : ""; ?>>8x10mm. S</option>
                    <option value="24mm" <?php echo ($selected_merek_barang == "24mm") ? "selected" : ""; ?>>24mm</option>
                    <option value="23mm" <?php echo ($selected_merek_barang == "23mm") ? "selected" : ""; ?>>23mm</option>
                    <option value="22mm" <?php echo ($selected_merek_barang == "22mm") ? "selected" : ""; ?>>22mm</option>
                    <option value="21mm" <?php echo ($selected_merek_barang == "21mm") ? "selected" : ""; ?>>21mm</option>
                    <!-- Continue with other options -->
                    <option value="19mm" <?php echo ($selected_merek_barang == "19mm") ? "selected" : ""; ?>>19mm</option>
                    <option value="17mm" <?php echo ($selected_merek_barang == "17mm") ? "selected" : ""; ?>>17mm</option>
                    <option value="14mm" <?php echo ($selected_merek_barang == "14mm") ? "selected" : ""; ?>>14mm</option>
                    <option value="12mm" <?php echo ($selected_merek_barang == "12mm") ? "selected" : ""; ?>>12mm</option>
                    <option value="10mm" <?php echo ($selected_merek_barang == "10mm") ? "selected" : ""; ?>>10mm</option>
                    <option value="300mm" <?php echo ($selected_merek_barang == "300mm") ? "selected" : ""; ?>>300mm</option>
                    <option value="150mm. S" <?php echo ($selected_merek_barang == "150mm. S") ? "selected" : ""; ?>>150mm. S</option>
                    <option value="150mm. B" <?php echo ($selected_merek_barang == "150mm. B") ? "selected" : ""; ?>>150mm. B</option>
                    <option value="75mm" <?php echo ($selected_merek_barang == "75mm") ? "selected" : ""; ?>>75mm</option>
                    <option value="380mm" <?php echo ($selected_merek_barang == "380mm") ? "selected" : ""; ?>>380mm</option>
                    <option value="180mm" <?php echo ($selected_merek_barang == "180mm") ? "selected" : ""; ?>>180mm</option>
                    <option value="200mm" <?php echo ($selected_merek_barang == "200mm") ? "selected" : ""; ?>>200mm</option>
                    <option value="9,5mm" <?php echo ($selected_merek_barang == "9,5mm") ? "selected" : ""; ?>>9,5mm</option>
                    <option value="12,7x9,5mm" <?php echo ($selected_merek_barang == "12,7x9,5mm") ? "selected" : ""; ?>>12,7x9,5mm</option>
                    <option value="9,5x12,7mm" <?php echo ($selected_merek_barang == "9,5x12,7mm") ? "selected" : ""; ?>>9,5x12,7mm</option>
                    <option value="320mm" <?php echo ($selected_merek_barang == "320mm") ? "selected" : ""; ?>>320mm</option>
                    <option value="21mm" <?php echo ($selected_merek_barang == "21mm") ? "selected" : ""; ?>>21mm</option>
                    <option value="150mm" <?php echo ($selected_merek_barang == "150mm") ? "selected" : ""; ?>>150mm</option>
                    <option value="100mm" <?php echo ($selected_merek_barang == "100mm") ? "selected" : ""; ?>>100mm</option>
                    <option value="75mm" <?php echo ($selected_merek_barang == "75mm") ? "selected" : ""; ?>>75mm</option>
                    <option value="35mm" <?php echo ($selected_merek_barang == "35mm") ? "selected" : ""; ?>>35mm</option>
                    <option value="50mm. S" <?php echo ($selected_merek_barang == "50mm. S") ? "selected" : ""; ?>>50mm. S</option>
                    <option value="150/10mm" <?php echo ($selected_merek_barang == "150/10mm") ? "selected" : ""; ?>>150/10mm</option>
                    <option value="150/8mm" <?php echo ($selected_merek_barang == "150/8mm") ? "selected" : ""; ?>>150/8mm</option>
                    <option value="20mm" <?php echo ($selected_merek_barang == "20mm") ? "selected" : ""; ?>>20mm</option>
                    <option value="160mm" <?php echo ($selected_merek_barang == "160mm") ? "selected" : ""; ?>>160mm</option>
                    <option value="250mm" <?php echo ($selected_merek_barang == "250mm") ? "selected" : ""; ?>>250mm</option>
                    <option value="180mm" <?php echo ($selected_merek_barang == "180mm") ? "selected" : ""; ?>>180mm</option>
                    <option value="220mm" <?php echo ($selected_merek_barang == "220mm") ? "selected" : ""; ?>>220mm</option>
                    <option value="20.8mm" <?php echo ($selected_merek_barang == "20.8mm") ? "selected" : ""; ?>>20.8mm</option>
                    <option value="16mm" <?php echo ($selected_merek_barang == "16mm") ? "selected" : ""; ?>>16mm</option>
                    <option value="0,8~1,1mm" <?php echo ($selected_merek_barang == "0,8~1,1mm") ? "selected" : ""; ?>>0,8~1,1mm</option>
                    <option value="0,08~0,5mm" <?php echo ($selected_merek_barang == "0,08~0,5mm") ? "selected" : ""; ?>>0,08~0,5mm</option>
                    <option value="0" <?php echo ($selected_merek_barang == "0") ? "selected" : ""; ?>>0</option>

                                    </select>
            </div>
            <div style="margin-top:10px;">
                <input id="custom-size-tools" type="text" placeholder="Atau tambah sendiri" class="form-control" 
                    value="<?php echo (!in_array($selected_merek_barang, ['17x19mm', '14x17mm', '12x14mm', '10x12mm', '8x9mm', '22x24mm', '19x21mm'])) ? $selected_merek_barang : ''; ?>" />
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener untuk menambah opsi custom ke dalam dropdown
    document.getElementById('custom-size-tools').addEventListener('input', function() {
        var customValue = this.value;
        var select = document.getElementById('ctrl-merek_barang');
        
        // Cek apakah custom value sudah ada di dropdown
        var exists = Array.from(select.options).some(function(option) {
            return option.value === customValue;
        });

        // Jika belum ada, tambahkan opsi baru ke dropdown
        if (customValue && !exists) {
            var newOption = new Option(customValue, customValue, true, true);
            select.add(newOption);
            select.value = customValue; // Set the selected value to the custom one
        }
    });
</script>



<!-- Form Tools -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="Spesifikasi">Tools <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div>
            <select id="ctrl-Spesifikasi" name="Spesifikasi" class="form-control select2" style="width:100%;" required>
                    <option value="">Pilih Tools</option>
                    <?php
                    $rec = $data['Spesifikasi']; // Ambil nilai yang sudah ada dari database
                    $tools_options = [
                        "KUNCI PAS", "KUNCI RING", "KUNCI SOK", "SAMBUNGAN", "STANG SOK", "KUNCI KOTREK", 
                        "STANG LUNCUR", "SAMBUNGAN FLEKSIBEL", "SOK ADAPTER 1", "SOK ADAPTER 2", "PALU", 
                        "KUNCI RODA", "OBENG (-)", "OBENG (+)", "OBENG MAGNIT", "OBENG SOK", "TANG KOMBINASI", 
                        "TANG LANCIP", "KUNCI INGGRIS", "PEMBERSIH GASKET", "BATANG KUNINGAN", "KUNCI BUSI", 
                        "FILLER BUSI", "FILLER KLEP", "SUMBAT VAKUM"
                    ];

                    // Loop melalui opsi dan tandai yang sesuai
                    foreach ($tools_options as $option) {
                        $selected = ($option == $rec) ? 'selected' : ''; // Jika nilai sama dengan data yang ada, tambahkan atribut "selected"
                        echo "<option value=\"$option\" $selected>$option</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>


<!-- Tambahkan Select2 CSS dan JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Inisialisasi Select2 -->
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 pada elemen dengan class .select2
        $('.select2').select2({
            placeholder: "Pilih Tools",
            allowClear: true
        });
    });
</script>


                               <!-- LOKASI Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="Sumber">Nama <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div>
               <input id="ctrl-Sumber" name="Sumber" placeholder="Nama" class="form-control" type="text" required="" value="<?php echo $data['Sumber']; ?>">

            </div>
        </div>
    </div>
</div>



                                                              <!-- Caddy Tools Field -->
                                                              <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Lokasi_barang">Caddy Tools <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div>
                                            <?php 
                                            $selected_lokasi = $data['Lokasi_barang']; // Nilai yang sudah ada
                                            ?>
                                            <select required="" id="ctrl-Lokasi_barang" name="Lokasi_barang" placeholder="Select a value..." class="custom-select">
                                                    <option value="">Select a value...</option>
                                                    <?php 
                                                    $Lokasi_barang_options = $comp_model->barang_Lokasi_barang_option_list();
                                                    if (!empty($Lokasi_barang_options)) {
                                                        foreach ($Lokasi_barang_options as $option) {
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('Lokasi_barang', $value, "");
                                                            $selected = ($value == $selected_lokasi ? 'selected' : null); // Menampilkan yang sudah dipilih
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                        <?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kondisi Tools Field -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Kondisi_barang">Kondisi Tools <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div>
                                                <select required="" id="ctrl-Kondisi_barang" name="Kondisi_barang" placeholder="Select a value..." class="custom-select">
                                                    <option value="">Select a value...</option>
                                                    <?php
                                                    $rec = $data['Kondisi_barang'];
                                                    $Kondisi_barang_options = $comp_model->barang_Kondisi_barang_option_list();
                                                    if (!empty($Kondisi_barang_options)) {
                                                        foreach ($Kondisi_barang_options as $option) {
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = ($value == $rec ? 'selected' : null);
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tanggal Input (Hidden) -->
                                <input id="ctrl-tanggal_input" value="<?php echo $data['tanggal_input']; ?>" type="hidden" name="tanggal_input" required="" class="form-control" />

                              <!-- Submit Button -->
<div class="form-group form-submit-btn-holder text-center mt-3">
    <input id="ctrl-status" name="status" type="hidden" value="<?php echo $data['status']; ?>" />
    <div class="form-ajax-status"></div>
    <button class="btn btn-primary" type="submit">
        Update
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

<!-- Include Select2 CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
// Initialize Select2 elements
$('.select2').select2({
            width: '100%', // Ensure Select2 is responsive
            placeholder: "Select a value...",
            allowClear: true
        });
    // Custom input for Size Tools
    $('#custom-size-tools').on('change', function() {
        var customValue = $(this).val();
        if (customValue) {
            var newOption = new Option(customValue, customValue, true, true);
            $('#ctrl-merek_barang').append(newOption).trigger('change');
        }
    });
});
</script>

<script>
    // Map Part Number IDs to corresponding tools and size tools options
    var partNumberMapping = {
        "1": { // 09032-1C160
            tools: "KUNCI PAS",
            sizeTools: "17x19mm"
        },
        "2": { // Example for another Part Number ID (09032-1C150)
            tools: "KUNCI PAS",
            sizeTools: "14x17mm"
        },
        "3": {
            tools: "KUNCI PAS",
            sizeTools: "12x14mm"
        },
        "4": {
            tools: "KUNCI PAS",
            sizeTools: "10x12mm"
        },
        "5": {
            tools: "KUNCI PAS",
            sizeTools: "8x9mm"
        },
        "6": {
            tools: "KUNCI RING",
            sizeTools: "22x24mm"
        },
        "7": {
            tools: "KUNCI RING",
            sizeTools: "19x21mm"
        },
        "8": {
            tools: "KUNCI RING",
            sizeTools: "14x17mm"
        },
        "9": {
            tools: "KUNCI RING",
            sizeTools: "12x14mm"
        },
        "10": {
            tools: "KUNCI RING",
            sizeTools: "10x12mm"
        },
        "11": {
            tools: "KUNCI RING",
            sizeTools: "12x14mm. S" 
        },
        "12": {
            tools: "KUNCI RING",
            sizeTools: "10x12mm. S" 
        },
        "13": {
            tools: "KUNCI RING",
            sizeTools: "8x10mm. S" 
        },
        "14": {
            tools: "KUNCI SOK",
            sizeTools: "24mm" 
        },
        "15": {
            tools: "KUNCI SOK",
            sizeTools: "23mm" 
        },
        "16": {
            tools: "KUNCI SOK",
            sizeTools: "22mm" 
        },
        "17": {
            tools: "KUNCI SOK",
            sizeTools: "21mm" 
        },
        "18": {
            tools: "KUNCI SOK",
            sizeTools: "19mm" 
        },
        "19": {
            tools: "KUNCI SOK",
            sizeTools: "17mm" 
        },       
        "20": {
            tools: "KUNCI SOK",
            sizeTools: "14mm" 
        },
        "21": {
            tools: "KUNCI SOK",
            sizeTools: "12mm" 
        },
        "22": {
            tools: "KUNCI SOK",
            sizeTools: "10mm" 
        },
        "23": {
            tools: "SAMBUNGAN",
            sizeTools: "300mm" 
        },
        "24": {
            tools: "SAMBUNGAN",
            sizeTools: "150mm. S" 
        },
        "25": {
            tools: "SAMBUNGAN",
            sizeTools: "150mm. B" 
        },
        "26": {
            tools: "SAMBUNGAN",
            sizeTools: "75mm" 
        },
        "27": {
            tools: "STANG SOK",
            sizeTools: "380mm" 
        },
        "28": {
            tools: "KUNCI KOTREK",
            sizeTools: "180mm" 
        },
        "29": {
            tools: "STANG LUNCUR",
            sizeTools: "200mm" 
        },
        "30": {
            tools: "SAMBUNGAN FLEKSIBEL",
            sizeTools: "9,5mm" 
        },
        "31": {
            tools: "SOK ADAPTOR 1",
            sizeTools: "12,7x9,5mm" 
        },
        "32": {
            tools: "SOK ADAPTOR 2",
            sizeTools: "9,5x12,7mm" 
        },
        "33": {
            tools: "PALU",
            sizeTools: "320mm" 
        },
        "34": {
            tools: "KUNCI RODA",
            sizeTools: "21mm" 
        },
        "35": {
            tools: "OBENG (-)",
            sizeTools: "150mm" 
        },
        "36": {
            tools: "OBENG (-)",
            sizeTools: "100mm" 
        },
        "37": {
            tools: "OBENG (-)",
            sizeTools: "75mm" 
        },
        "38": {
            tools: "OBENG (-)",
            sizeTools: "35mm" 
        },
        "39": {
            tools: "OBENG (-)",
            sizeTools: "50mm. S" 
        },
        "40": {
            tools: "OBENG (+)",
            sizeTools: "150mm" 
        },
        "41": {
            tools: "OBENG (+)",
            sizeTools: "100mm" 
        },
        "42": {
            tools: "OBENG (+)",
            sizeTools: "75mm" 
        },
        "43": {
            tools: "OBENG (+)",
            sizeTools: "35mm" 
        },
        "44": {
            tools: "OBENG MAGNIT",
            sizeTools: "200mm" 
        },
        "45": {
            tools: "OBENG SOK",
            sizeTools: "150/10mm" 
        },
        "46": {
            tools: "OBENG SOK",
            sizeTools: "150/8mm" 
        },
        "47": {
            tools: "TANG KOMBINASI",
            sizeTools: "20mm" 
        },
        "48": {
            tools: "TANG LANCIP",
            sizeTools: "160mm" 
        },
        "49": {
            tools: "KUNCI INGGRIS",
            sizeTools: "250mm" 
        },
        "50": {
            tools: "PEMBERSIH GASKET",
            sizeTools: "180mm" 
        },
        "51": {
            tools: "BATANG KUNINGAN",
            sizeTools: "220mm" 
        },
        "52": {
            tools: "KUNCI BUSI",
            sizeTools: "20.8mm" 
        },
        "53": {
            tools: "KUNCI BUSI",
            sizeTools: "16mm" 
        },
        "54": {
            tools: "FILLER BUSI",
            sizeTools: "0,8~1,1mm" 
        },
        "55": {
            tools: "FILLER KLEP",
            sizeTools: "0,08~0,5mm" 
        },
        "56": {
            tools: "SUMBAT VAKUM",
            sizeTools: "0" 
        },
        

        // Add other part number mappings here...
    };

    // Event listener for Part Number selection change
    $('#ctrl-id_type_barang').on('change', function() {
        var selectedPartNumberId = $(this).val(); // Get the selected Part Number ID
        var toolsSelect = $('#ctrl-Spesifikasi'); // The Tools dropdown
        var sizeToolsSelect = $('#ctrl-merek_barang'); // The Size Tools dropdown

        // Reset the select fields
        toolsSelect.val('').trigger('change');
        sizeToolsSelect.val('').trigger('change');

        // Check if the selected Part Number has predefined values
        if (partNumberMapping[selectedPartNumberId]) {
            // Pre-fill Tools
            toolsSelect.val(partNumberMapping[selectedPartNumberId].tools).trigger('change');

            // Pre-fill Size Tools
            sizeToolsSelect.val(partNumberMapping[selectedPartNumberId].sizeTools).trigger('change');
        }
    });
</script>
