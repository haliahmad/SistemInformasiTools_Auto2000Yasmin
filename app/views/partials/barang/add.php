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
    <?php if ($show_header == true) { ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="record-title">Add New Tools</h4>
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
                        <form id="barang-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("barang/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                               <!-- Part Number Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="id_type_barang">Part Number <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div>
                <select required="" id="ctrl-id_type_barang" name="id_type_barang" placeholder="Select a value..." class="custom-select select2">
                    <option value="">Select a value...</option>
                    <?php 
                    $id_type_barang_options = $comp_model->barang_id_type_barang_option_list();
                    if (!empty($id_type_barang_options)) {
                        $index = 1; // Mulai penomoran dari 1
                        foreach ($id_type_barang_options as $option) {
                            $value = (!empty($option['value']) ? $option['value'] : null);
                            $label = (!empty($option['label']) ? $option['label'] : $value);
                            $selected = $this->set_field_selected('id_type_barang', $value, "");
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                        <?php echo $index . " - " . $label; // Menampilkan nomor urut sebelum label ?>
                    </option>
                    <?php
                            $index++; // Increment untuk nomor urut
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>


                               <!-- Size Tools Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-4">
            <label class="control-label" for="merek_barang">Size Tools <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <div>
            <select id="ctrl-merek_barang" name="merek_barang" class="form-control select2" required="">


                    <option value="">Pilih Size Tools</option>
                    <option value="17x19mm">17x19mm</option>
                    <option value="14x17mm">14x17mm</option>
                    <option value="12x14mm">12x14mm</option>
                    <option value="10x12mm">10x12mm</option>
                    <option value="8x9mm">8x9mm</option>
                    <option value="22x24mm">22x24mm</option ption>
                    <option value="19x21mm">19x21mm</option>
                    <option value="12x14mm. S">12x14mm. S</option>
                    <option value="10x12mm. S">10x12mm. S</option>
                    <option value="8x10mm. S">8x10mm. S</option>
                    <option value="24mm">24mm</option>
                    <option value="23mm">23mm</option>
                    <option value="22mm">22mm</option>
                    <option value="21mm">21mm</option>
                    <option value="19mm">19mm</option>
                    <option value="17mm">17mm</option>
                    <option value="14mm">14mm</option>
                    <option value="12mm">12mm</option>
                    <option value="10mm">10mm</option>
                    <option value="300mm">300mm</option>
                    <option value="150mm. S">150mm. S</option>
                    <option value="150mm. B">150mm. B</option>
                    <option value="75mm">75mm</option>
                    <option value="380mm">380mm</option>
                    <option value="180mm">180mm</option>
                    <option value="200mm">200mm</option>
                    <option value="9,5mm">9,5mm</option>
                    <option value="12,7x9,5mm">12,7x9,5mm</option>
                    <option value="9,5x12,7mm">9,5x12,7mm</option>
                    <option value="320mm">320mm</option>
                    <option value="21mm">21mm</option>
                    <option value="150mm">150mm</option>
                    <option value="100mm">100mm</option>
                    <option value="75mm">75mm</option>
                    <option value="35mm">35mm</option>
                    <option value="50mm. S">50mm. S</option>
                    <option value="150/10mm">150/10mm</option>
                    <option value="150/8mm">150/8mm</option>
                    <option value="20mm">20mm</option>
                    <option value="160mm">160mm</option>
                    <option value="250mm">250mm</option>
                    <option value="180mm">180mm</option>
                    <option value="220mm">220mm</option>
                    <option value="20.8mm">20.8mm</option>
                    <option value="16mm">16mm</option>
                    <option value="0,8~1,1mm">0,8~1,1mm</option>
                    <option value="0,08~0,5mm">0,08~0,5mm</option>
                    <option value="0">0</option>
                </select>
            </div>
            <div style="margin-top:10px;">
                <input id="custom-size-tools" type="text" placeholder="Atau tambah sendiri" class="form-control" />
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
                <select id="ctrl-Spesifikasi" name="Spesifikasi" class="form-control select2" required>
                    <option value="">Pilih Tools</option>
                    <option value="KUNCI PAS">KUNCI PAS</option>
                    <option value="KUNCI RING">KUNCI RING</option>
                    <option value="KUNCI SOK">KUNCI SOK</option>
                    <option value="SAMBUNGAN">SAMBUNGAN</option>
                    <option value="STANG SOK">STANG SOK</option>
                    <option value="KUNCI KOTREK">KUNCI KOTREK</option>
                    <option value="STANG LUNCUR">STANG LUNCUR</option>
                    <option value="SAMBUNGAN FLEKSIBEL">SAMBUNGAN FLEKSIBEL</option>
                    <option value="SOK ADAPTOR 1">SOK ADAPTOR 1</option>
                    <option value="SOK ADAPTOR 2">SOK ADAPTOR 2</option>
                    <option value="PALU">PALU</option>
                    <option value="KUNCI RODA">KUNCI RODA</option>
                    <option value="OBENG (-)">OBENG (-)</option>
                    <option value="OBENG (+)">OBENG (+)</option>
                    <option value="OBENG MAGNIT">OBENG MAGNIT</option>
                    <option value="OBENG SOK">OBENG SOK</option>
                    <option value="TANG KOMBINASI">TANG KOMBINASI</option>
                    <option value="TANG LANCIP">TANG LANCIP</option>
                    <option value="KUNCI INGGRIS">KUNCI INGGRIS</option>
                    <option value="PEMBERSIH GASKET">PEMBERSIH GASKET</option>
                    <option value="BATANG KUNINGAN">BATANG KUNINGAN</option>
                    <option value="KUNCI BUSI">KUNCI BUSI</option>
                    <option value="FILLER BUSI">FILLER BUSI</option>
                    <option value="FILLER KLEP">FILLER KLEP</option>
                    <option value="SUMBAT VAKUM">SUMBAT VAKUM</option>
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
                <input id="ctrl-Sumber" name="Sumber" placeholder="Nama" class="form-control" type="text" required="">
            </div>
        </div>
    </div>
</div>



                                <!-- NRP Field -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Lokasi_barang">Caddy Tools <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div>
                                                <select required="" id="ctrl-Lokasi_barang" name="Lokasi_barang" placeholder="Select a value..." class="custom-select">
                                                    <option value="">Select a value...</option>
                                                    <?php 
                                                    $Lokasi_barang_options = $comp_model->barang_Lokasi_barang_option_list();
                                                    if (!empty($Lokasi_barang_options)) {
                                                        foreach ($Lokasi_barang_options as $option) {
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('Lokasi_barang', $value, "");
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
                                                    $Kondisi_barang_options = $comp_model->barang_Kondisi_barang_option_list();
                                                    if (!empty($Kondisi_barang_options)) {
                                                        foreach ($Kondisi_barang_options as $option) {
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('Kondisi_barang', $value, "");
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

                                <!-- Tanggal Input (Hidden) -->
                                <input id="ctrl-tanggal_input" value="<?php echo $this->set_field_value('tanggal_input', date_now()); ?>" type="hidden" name="tanggal_input" required="" class="form-control" />

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

<!-- Include Select2 CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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


<script>
    $(document).ready(function() {
        // Initialize Select2 on all select fields
        $('.select2').select2({
            width: '100%',
            placeholder: "Select a value...",
            allowClear: true
        });

        // The code that handles dynamic population goes here...
    });
</script>

