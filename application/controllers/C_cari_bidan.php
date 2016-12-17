<?php
/**
*
*/
class C_cari_bidan extends CI_Controller {
  public function __construct() //konstraktor untuk meload library, helper dan model
  {
    parent::__construct();
    $this->load->model('M_bidan');
  }

  public function index(){
        $this->load->library('googlemaps');
	    $config['center'] = "-7.9666204,112.6326321"; //center of maps
		$config['map_width'] = "100%";
		$config['map_height'] = "100%";
        $config['map_name'] = "map";
		$config['zoomControlPosition'] = "BOTTOM_LEFT"; //zoom control position
		$config['zoom'] = "13"; //zoom value
		$this->googlemaps->initialize($config);

        // create marker for each province
		$this->load->model('M_bidan');
		foreach ($this->M_bidan->get_semua_bidan() as $row)	{
			// Set the marker parameters as an empty array. Especially important if we are using multiple markers
			$marker = array();
			// Specify an address or lat/long for where the marker should appear.

			$marker['position'] = $row->lat.', '.$row->lng;
            $content = "<strong>".$row->nama." | ".$row->no_hp." | ".$row->email." </strong>";
			$marker['infowindow_content'] = $content;
			// Once all the marker parameters have been specified lets add the marker to our map
			$this->googlemaps->add_marker($marker);
		}
		$data['map'] = $this->googlemaps->create_map();
        $this->load->view('cari_bidan', $data);
  }

}
