<style media="screen">
.wrapper {
    width: 100%;
    text-align: center;
}
.hidden {
    display: none;
}
.map {
    margin-top: 20px;
}
#map { height: 100%; width: 100%; padding-top: 15px}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caribidan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap-theme.min.css')?>">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js');?>"></script>
    <?php echo $map['js']; ?>
</head>
<body>
    <div class="row">
        <div class="form-group">
            <center>
                <div class="col-xs-1">
                    <input class="form-control" type="hidden" name="lat" id="lat" placeholder="Latitude"/>
                </div>
                <div class="col-xs-12">
                    <input class="form-control" type="text" name="location" id="location" placeholder="Lokasi Anda Berada"/>
                </div>
                <div class="col-xs-1">
                    <input class="form-control" type="hidden" name="lng" id="lng" placeholder="Longitude"/>
                </div>
            </center>
        </div>
        <div>
            <?php echo $map['html']; ?>
        </div>
    </div>
</body>
<script type="text/javascript">
//get location from address
$('#location').keyup(function() {
    if ($('#map').hasClass('hidden')) {
        $('#map').removeClass('hidden').fadeIn().addClass('show');
        google.maps.event.trigger(map, 'resize');
    }
    var address = $(this).val();
    url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + address + '&sensor=false';
    $.get(url, function(data) {
        if (data.status == 'OK') {
            map.setCenter(data.results[0].geometry.location);
            console.log(data.results[0].geometry.location);
            $('#lat').val(data.results[0].geometry.location.lat);
            $('#lng').val(data.results[0].geometry.location.lng);
        }
    });
});
</script>
</html>
