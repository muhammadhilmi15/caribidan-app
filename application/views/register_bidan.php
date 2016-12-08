<style media="screen">
.wrapper {
    width: 100%;
    text-align: center;
}
.hidden {
    display: none;
}
#map { height: 350px; width: 800px; margin: 10px; margin-top: 1px}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caribidan | Register</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap-theme.min.css')?>">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootply.css')?>">
    <script type="text/javascript">
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'),{
            center: new google.maps.LatLng(-7.9666204, 112.6326321),
            zoom: 12
        });
        marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            title: 'Drag to set position',
            draggable: true,
            flat: false
        });
        google.maps.event.addListener(marker, 'dragend', function() {
            latlng = marker.getPosition();
            url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+ latlng.lat() + ',' + latlng.lng() + '&sensor=false';
            $.get(url, function(data) {
                if (data.status == 'OK') {
                    map.setCenter(data.results[0].geometry.location);
                    $('#location').val(data.results[0].formatted_address);
                    $('#lat').val(data.results[0].geometry.location.lat);
                    $('#lng').val(data.results[0].geometry.location.lng);
                }
            });
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7bmkBwwLqhwEgg6CtCozJl3897QWyvEw&callback=initMap"async defer></script>
</head>
<body>
    <?php $this->load->view('layout/top_menu')?>
    <div class="container">
        <div class="row">
            <h3><span style="color:#1E90FF">FORM REGISTER</span> BIDAN</h3>
            <hr>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#datadiri" data-toggle="tab">Data Diri</a></li>
                <li><a href="#berkas" data-toggle="tab">Berkas</a></li>
            </ul>
            <div class="tab-content">
                <!-- Tab Datadiri -->
                <div class="tab-pane active" id="datadiri">
                    <br>
                    <?php if ($this->session->flashdata('pesan') <> '') { ?>
                        <center>
                            <?php echo $this->session->flashdata('pesan'); ?>
                        </center>
                    <?php } ?>
                    <div class="bs-example">
                        <?php
                        $formData = array(
                            'class' => 'form-horizontal'
                        );
                        echo form_open_multipart('C_bidan/tambah_bidan', $formData);?>
                            <div class="form-group">
                                <center>
                                    <label class="control-label col-xs-2"></label>
                                    <div class="col-xs-4">
                                        <input class="form-control" type="text" name="location" id="location" placeholder="Lokasi Anda Berada" readonly="TRUE"/>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" name="lat" id="lat" placeholder="Latitude" readonly="TRUE"/>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" name="lng" id="lng" placeholder="Longitude" readonly="TRUE"/>
                                </center>
                            </div>
                            <div class="form-group">
                                <center>
                                    <div id="map"></div>
                                </center>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">No. KTP</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="id_ktp" placeholder="Nomor KTP">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Foto</label>
                                <div class="col-xs-7">
                                    <input type="file" class="form-control" name="userfile" placeholder="Pilih foto anda">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Tempat</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="tempat" placeholder="Tempat tinggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="Alamat">Alamat</label>
                                <div class="col-xs-7">
                                    <textarea rows="3" class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Tanggal Lahir</label>
                                <div class="col-xs-2">
                                    <select name="tanggal" class="form-control">
                                        <option name="">Tanggal</option>
                                        <?php for($hari=1; $hari<=31; $hari++) { ?>
                                            <option name="tanggal" value="<?php echo $hari; ?>" >
                                                <?php echo $hari; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select name="bulan" class="form-control">
                                        <option value="">Bulan</option>
                                        <?php
                                            $namabulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                        ?>
                                        <?php for($bulan=1; $bulan<=12; $bulan++) { ?>
                                            <option name="bulan" value="<?php echo $bulan;?>">
                                                <?php echo $namabulan[$bulan-1];?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select name="tahun" class="form-control">
                                        <option value="">Tahun</option>
                                        <?php for($tahun=2000; $tahun>=1990; $tahun--) { ?>
                                            <option name="tahun" value="<?php echo $tahun; ?>">
                                                <?php echo $tahun;?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Agama</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="agama" placeholder="Agama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="Alamat">Nomor HP</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="nohp" placeholder="Nomor Telepon / Handphone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Jenis Kelamin</label>
                                <div class="col-xs-7">
                                    <select name="jk" class="form-control">
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Email</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Password</label>
                                <div class="col-xs-7">
                                    <input type="text" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-7">
                                    <input type="submit" class="btn btn-primary" value="Kirim">
                                    <input type="reset" class="btn btn-default" value="Reset">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="status" value="0">
                        </form>
                    </div>
                </div>
                <!-- Tab Berkas -->
                <div class="tab-pane" id="berkas">
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
//get location from address
// $('#location').keyup(function() {
//     // if ($('#map').hasClass('hidden')) {
//     //     $('#map').removeClass('hidden').fadeIn().addClass('show');
//     //     google.maps.event.trigger(map, 'resize');
//     // }
//     var address = $(this).val();
//     url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + address + '&sensor=false';
//     $.get(url, function(data) {
//         if (data.status == 'OK') {
//             map.setCenter(data.results[0].geometry.location);
//             console.log(data.results[0].geometry.location);
//             $('#lat').val(data.results[0].geometry.location.lat);
//             $('#lng').val(data.results[0].geometry.location.lng);
//         }
//     });
// });
</script>
</html>
