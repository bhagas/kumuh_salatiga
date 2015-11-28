<style>
	body {
    	padding: 0;
    	margin: 0;
	}
	html, body, #map {
    margin-top: 30px;
    	height: 100%;
	}

	table{
  		font-size: 14px !important;
	}
	
	.gmnoprint a, .gmnoprint span {
    	display:none;
	}
	
	.gmnoprint div {
    	background:none !important;
	}
	.inner-ul {
    width: 210px;
    height : 300px;
  overflow-y: auto;
}
	a[href^="http://maps.google.com/maps"]{display:none !important}
	
	.leaflet-control-command
	{
	    width: 200px;
	    display: block;
	    padding: 10px;
	    border-radius: 4px;
	    -webkit-border-radius: 4px;
	    -moz-border-radius: 4px;
	    box-shadow: 0 1px 7px rgba(0, 0, 0, 0.65);
	    cursor: auto;
	    text-align: left;
	    background-color: #FFFFFF;
	}

	.leaflet-control-command-interior:hover
	{
    	background-color: #F4F4F4;
	}

	.info-legend
	{
	    background-color: #FFFFFF;
	    padding: 10px;
	    display: block;
	    border-radius: 4px;
	    -webkit-border-radius: 4px;
	    -moz-border-radius: 4px;
	    line-height: 18px;
	    color: #555;
	}

	.map
	{
  		opacity:    0.3; 
  		background: #000000; 
  		width:      100%;
  		height:     400px; 
  		z-index:    10;
  		top:        0; 
  		left:       0; 
  		position:   fixed; 
	}

	.info-legend i 
	{
    	width: 18px;
    	height: 18px;
    	float: left;
    	margin-right: 8px;
    	opacity: 0.7;
	}

	.label
	{
	  position:  absolute;
	  background-color: transparent;
	  font-size: 14px;
	}

</style>

<!-- Main content -->
<section class="content">

	<div class="row">
   <div class="col-lg-2">
    <select name="kecamatan" class="form-control" id="kecamatan"><option value="">Pilih Kecamatan</option></select></br><select name="kelurahan" class="form-control" id="desa"><option value="">Pilih Kelurahan</option></select></br>
    <select name="kawasan" class="form-control" id="kawasan"><option value="">Pilih Kawasan</option></select>


    <ul id="search_result" class="inner-ul"></ul>
    </div>
     <div class="col-lg-10">
		<div class="col-md-12">
			<div class="box box-solid" style="height:80vh;">
				<div class="box-body" id="map">
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
    </div>
	</div>

</section><!-- /.content -->

<script>
	var map = L.map('map', {
      	center: [-7.3341230513588, 110.48739960840001], 
      	zoom: 12,
      	zoomControl : false
  	});
  	var google_roadmap = new L.Google('ROADMAP');
  	var google_hybrid = new L.Google('HYBRID');
  	var google_satelit = new L.Google('SATELLITE');
  	var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {});
  	osm.addTo(map);	
  	
  	//ambil kabupaten list
  	function list_kecamatan(){
    	$.getJSON( root+"index.php/backoffice_kecamatan/json/", function( json ) {
          	$('#kecamatan').empty()
          	$('#kecamatan').append('<option value="">Pilih Kecamatan</option>')
			$.each(json, function( i, item ) {
				$('#kecamatan').append('<option value="'+item.id_kecamatan+'">'+item.nama_kecamatan+'</option>')
			})
		});
  	}

  	// function list_kelurahan(id_kec){
   //  	$.getJSON( root+"index.php/maps/desa/"+id_kec, function( json ) {
   //    		if (id_kec != '') {
   //      		$('#desa').empty()
   //      		$('#desa').append('<option value="">Pilih Kelurahan</option>')
        
   //      		$.each(json, function( i, item ) {
   //        			$('#desa').append('<option value="'+item.id_kelurahan+'">'+item.nama_kelurahan+'</option>')
   //  			})
   //    		} else{
   //      		$('#desa').empty()
   //      		$('#desa').append('<option value="">Pilih Kelurahan</option>')
   //    		};
   //  	});
  	// }
   
   	function list_kawasan(){
    	$.getJSON( root+"index.php/kawasan/kawasans/", function( json ) {
        	$('#kawasan').empty()
        	$('#kawasan').append('<option value="">Pilih Kawasan</option>')
        
        	$.each(json.kawasan, function( i, item ) {
          		$('#kawasan').append('<option value="'+item.id+'">'+item.nama_kawasan+'</option>')
        	})
    	});
  	}
  	
  	list_kawasan();
  	
  	

  	function get_color_skoring (color) {
    	var colors = ['#ffffff' , '#fef0d9', '#fdcc8a', '#fc8d59', '#e34a33', '#b30000'];
    	return colors[color];
  	}

  	list_kecamatan();
  	//ambil kabupaten geo
	var style_kabupaten = {
	    color : "black", 
	    weight : 1, 
	    opacity : 1, 
	    fillOpacity  : 0,
	    dashArray : 3
	};
	var style_kecamatan = {
      	"color": "blue",
      	"weight": 2,
      	"opacity": 0.5,
      	"fillOpacity": 0
    };
	var sembunyi = {
      	"weight": 2,
      	"opacity": 0,
      	"fillOpacity": 0
    };
    var style_kawasan = {
       	"weight": 2,
       	"opacity": 0.5,
       	"fillOpacity": 0
    };
    
    var labelKecamatan;
    var kabupaten_layer;
	
	$.ajax({
		'type'		: "GET",
		'async'		: false,
		'global'	: false,
		'url'		: root+"index.php/backoffice_kecamatan/geo",
		'dataType'	: 'json',
		success		: function (data) {
			kabupaten_layer = L.geoJson(data, {
				style: style_kabupaten,
				onEachFeature: function (feature, layer) {
  					// layer.bindPopup(feature.properties.kecamatan);
  					// Get bounds of polygon
  					var bounds = layer.getBounds();
  					// Get center of bounds
  					var center = bounds.getCenter();

  					// Use center to put marker on map
                	labelKecamatan = L.marker(center, {
                   		icon: L.divIcon({
                       		className: 'text-labels',   // Set class for CSS styling
                       		html: feature.properties.nama_kecamatan
                   		}),
                   		draggable: true,       // Allow label dragging...?
                   		zIndexOffset: 1000     // Make appear above other map features
               		});
				}
			});
			kabupaten_layer.addTo(map);
		}
	});
				
  	var kecamatan_layer
  	var labelDesa
  	$.ajax({
    	'type': "GET",
    	'async': false,
    	'global': false,
    	'url': root+"index.php/backoffice_kelurahan/geo",
    	'dataType': 'json',
    	'success': function (data) {
      		kecamatan_layer = L.geoJson(data, {
        		style: sembunyi,
        		onEachFeature: function (feature, layerr) {
             		var bounds_desa = layerr.getBounds();
					// Get center of bounds
                    var center_desa = bounds_desa.getCenter();

					labelDesa = L.marker(center_desa, {
                   		icon: L.divIcon({
                       		className: 'text-labels',   // Set class for CSS styling
                       		html: feature.properties.nama_kelurahan
                   		}),
                   		draggable: true,       // Allow label dragging...?
                   		zIndexOffset: 1000     // Make appear above other map features
               		});
					labelDesa.setOpacity(0);
        		}
      		});
      		kecamatan_layer.addTo(map);
    	}
  	});

  	var lokasi_layer = null;
  	var source = null;

    ganti_option();
    
  	function ganti_option(){
      if(lokasi_layer != null){
      map.removeLayer(lokasi_layer);
    }
      var id_kawasan = $("#kawasan").val();
      
      //root+"index.php/kawasan/kawasans/"+$('#kecamatan').val()+"/"+$("#desa").val()
      // $.getJSON( root+"index.php/kawasan/kawasans/"+id_kawasan, function( json ) {
      //     $('#kawasan').empty()
      //     $('#kawasan').append('<option value="">Pilih Kawasan</option>')
        
      //     $.each(json.kawasan, function( i, item ) {
      //         $('#kawasan').append('<option value="'+item.id+'">'+item.nama_kawasan+'</option>')
      //     })
      // });


    	$.ajax({
        	'type': "GET",
        	'async': false,
        	'global': false,
        	'url': root+"index.php/kawasan/geo/"+id_kawasan,
        	'dataType': 'json',
        	success: function (data) {
             $('#search_result').empty();
          		source = data;
          		//balikin kawasannya
          		lokasi_layer = L.geoJson(data, {
            		onEachFeature: function (feature, layer) {
                             var bounds = layer.getBounds();
                        // Get center of bounds
                        var center = bounds.getCenter();
                      
                     // console.log(center);
	                	// layer.bindPopup(feature.properties.id_lokasi);
                   
                   $('#search_result').append('<li><a href="javascript:void(0)" onclick="tambah_titik(' + center.lat + ', ' + center.lng + ')">' + feature.properties.nama_kawasan + '</a></li>');
           
	                     layer.on('click', function(e){

                     // console.log(root+"index.php/master/get_nilai_kawasan/" + feature.properties.id)
                      $.getJSON(root+"index.php/master/get_nilai_kawasan/" + feature.properties.id, function (data) {
                        $.each(data, function (a, item) {
                         // console.log(item)
                         $('#nama_kawasan').html(feature.properties.nama_kawasan);
                         $('#sk_penetapan').html(data.sk_penetapan);
                         $('#tingkat_kekumuhan').html(data.tingkat);
                         $('#pertimbangan').html(data.sk_penetapan);
                         $('#prioritas').html(data.sk_penetapan);
                         $('#legal').html(data.legal);
                         $('#penanganan').html(data.penanganan);
                       })
                          });
                      //   $('#foto').html("<img src='"+root+"img/foto/"+feature.properties.foto+".JPG' style='width:100px;'>");
                     //    $('#foto2').html("<img src='"+root+"img/foto/"+feature.properties.foto2+".JPG' style='width:100px;'>");
                     //    $('#foto3').html("<img src='"+root+"img/foto/"+feature.properties.foto3+".JPG' style='width:100px;'>");
                        
                        $('#body_table').empty();
                        //table kegiatan
                        $.getJSON(root+"index.php/rt/get_rt_by_kawasan/" + feature.properties.id, function (data) {
                            
                           $.each(data.rt, function (a, item) {
                            //console.log(item.nilai_rt.data[0]);
                              $('#kegiatan tbody').append('<tr><td>'+item.nilai_rt.data[0].rt+'</td><td>'+item.nilai_rt.data[0].rw+'</td><td>'+item.nilai_rt.data[0].tingkat_kekumuhan+'</td><td >'+item.nilai_rt.data[0].prioritas+'</td><td>'+item.nilai_rt.data[0].legal+'</td><td>'+item.nilai_rt.data[0].penanganan+'</td></tr>');
                           
                           })
                       });
                        $('#modal').modal('show');
                        // console.log( root+"index.php/maps/cetak_lokasi/" + feature.properties.id_lokasi +"/"+usul );
                    })
            		}
          		});
          		lokasi_layer.addTo(map);  
        	}
    	});
	}

  	//custom contro
  	L.Control.Kabupaten = L.Control.extend({
    	options: {
        	position: 'topleft',
    	},
    	onAdd: function (map) {
        	var controlDiv = L.DomUtil.create('div', 'leaflet-control-command');
        	var controlUI = L.DomUtil.create('div', 'leaflet-control-command-interior', controlDiv);
        	controlUI.title = 'Perintah';
        	return controlDiv;
    	}
  	});
  	L.control.command = function (options) {
      	return new L.Control.Kabupaten(options);
  	};

	//legend
	var legend = L.control({position: 'bottomright'});

	legend.onAdd = function (map) {
    	var div = L.DomUtil.create('div', 'info-legend'),
        	warna_total = ['#ffffff' , '#fef0d9', '#fdcc8a', '#fc8d59', '#e34a33', '#b30000'];
        	warna_total = ['#fee8c8' , '#fdbb84', '#e34a33'];
        	labels = ['-', '-', '-'];

    	// loop through our density intervals and generate a label with a colored square for each interval
    	for (var i = 0; i < warna_total.length; i++) {
        	div.innerHTML +=
            	'<i style="background:' + warna_total[i] + '"></i> ' +
            	labels[i] + '<br>';
    	}

    	return div;
	};

	legend.addTo(map);

  	//L.control.command().addTo(map);
  	L.control.scale().addTo(map);
  	L.control.zoom({
    	position : 'topright'
  	}).addTo(map);
	// $('.leaflet-control-command').html('<select name="tahun" class="form-control" id="tahun"><option value="">Pilih Tahun</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option></select>(*)');
 //   	$('.leaflet-control-command').append('<select name="usul" class="form-control" id="usul"><option value="">Pilih Usulan</option></select>(*)');
 //  	$('.leaflet-control-command').append('<select name="kecamatan" class="form-control" id="kabupaten"><option value="">Pilih Kecamatan</option></select></br><select name="kelurahan" class="form-control" id="kelurahan"><option value="">Pilih Kelurahan</option></select></br>');
 //   	$('.leaflet-control-command').append('<select name="usul" class="form-control" id="jenis"><option value="">Pilih Jenis</option></select><br>');
 //   	$('.leaflet-control-command').append('<select name="skpd" class="form-control" id="skpd"><option value="">Pilih SKPD</option></select>');


 //    $('.leaflet-control-command').append('<ul id="search_result" class="inner-ul"></ul>');

  	//layer control
  	var baseLayers = {
    	"Google ROADMAP": google_roadmap,
    	"Google HYBRID": google_hybrid,
    	"Google SATELLITE": google_satelit,
    	"OpenStreetMap": osm
  	};

  	var overlays = {
    	"Kecamatan": kabupaten_layer,
    	"Desa": kecamatan_layer
  	};

  	L.control.layers(baseLayers, overlays).addTo(map); 
  	//print
	// L.easyPrint().addTo(map)
  	//ganti kabupaten

	$('#kecamatan').change(function(){
		ganti_option();
		//ambil desa list
		//list_kelurahan($('#kecamatan').val());
		labelKecamatan.setOpacity(0);
		//lokasi_layer.setOpacity(0); 
		kabupaten_layer.eachLayer(function (layer) {
			// Get bounds of polygon
			var bounds = layer.getBounds();
			// Get center of bounds
			var center = bounds.getCenter();
			if( layer.feature.properties.id_kecamatan == $('#kecamatan').val() ){
				kecamatan_layer.eachLayer(function (layerc) {
					if(layerc.feature.properties.id_kecamatan!=$('#kecamatan').val()){
                        //hilangkan desa
                        layerc.setStyle(sembunyi);
					}else{  
						labelDesa.setOpacity(1);
                        layerc.setStyle(style_kabupaten);
					}
				})
				map.panTo(center);
				layer.setStyle(style_kabupaten);
			}else{
				layer.setStyle(sembunyi);                                 
			}
			
			if( $('#kecamatan').val()=="" ){
				labelDesa.setOpacity(0);
				list_kecamatan();
				labelKecamatan.setOpacity(1);
				layer.setStyle(style_kabupaten);
				//balikin desanya
				kecamatan_layer.eachLayer(function (layerc) {
					//balikin kawasannya
					layerc.setStyle(sembunyi);
				})
			}
		});
	})

	//ganti kelurahan
	$('#desa').change(function(){
        ganti_option();
        //ambil desa list
        labelKecamatan.setOpacity(0);
        labelDesa.setOpacity(0);
        //lokasi_layer.setOpacity(0); 
        kabupaten_layer.setStyle(sembunyi);
        kecamatan_layer.eachLayer(function (layer) {
          	// Get bounds of polygon
          	var bounds = layer.getBounds();
          	// Get center of bounds
          	var center = bounds.getCenter();
            //console.log(layer.feature.properties.id_ds +","+$('#desa').val())
          	if( layer.feature.properties.id_ds == $('#desa').val() ){
        		  map.panTo(center);
            	layer.setStyle(style_kabupaten);       
          	}else{
				layer.setStyle(sembunyi);                                 
          	}
          	
          	if( $('#desa').val()=="" ){

           		kabupaten_layer.eachLayer(function (layer_kab) {
              		if( layer_kab.feature.properties.id_kc == $('#kecamatan').val() ){
                		layer_kab.setStyle(style_kabupaten)
              		}
            	})
            	
            	kecamatan_layer.eachLayer(function (layer_kec) {
              		if( layer_kec.feature.properties.id_kc == $('#kecamatan').val() ){
                		layer_kec.setStyle(style_kabupaten)
              		}
           		})
            	
            	//list_kelurahan($('#kecamatan').val());
            	
            	if( layer.feature.properties.id_kc == $('#kecamatan').val() ){
              		layer.setStyle(style_kabupaten);
            	}
            }
        });
	})

	
	//hilangkan option default

    
 

    //skpd
	$('#kawasan').change(function () {
      	ganti_option();
  
	})





	
	$('#kecamatan').change(function () {
  		ganti_option();
      
	})

function tambah_titik(x, y){

    map.panTo(new L.LatLng(x, y));
    map.setZoom(16);

    // iht_layer.eachLayer(function (layer) {
    //   if ( layer.feature.properties.id_perusahaan == id_perusahaan ) {
    //     console.log(layer.feature.properties)
    //     layer.openPopup();
    //   };
    // });
  }
</script>
<div class="modal fade bs-example-modal-lg" id="modal">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title">Data Kawasan</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
          			<div class="col-xs-12">
            			<div class="row">
			            	<div class="col-xs-2"><strong>Nama Kawasan</strong></div>
			            	<div class="col-xs-1"> : </div>
			            	<div class="col-xs-6" id="nama_kawasan"></div>
            			</div>
          			</div>
           			<div class="col-xs-12">
           				<div class="row">
           					<div class="col-xs-2"><strong>SK Penetapan</strong></div>
           					<div class="col-xs-1"> : </div>
           					<div class="col-xs-6" id="sk_penetapan"></div>
           				</div>
          			</div>
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2"><strong>Tingkat Kekumuhan</strong></div>
                    <div class="col-xs-1"> : </div>
                    <div class="col-xs-6" id="tingkat_kekumuhan"></div>
                  </div>
                </div>
                 <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2"><strong>Pertimbangan</strong></div>
                    <div class="col-xs-1"> : </div>
                    <div class="col-xs-6" id="pertimbangan"></div>
                  </div>
                </div>
                 <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2"><strong>Prioritas</strong></div>
                    <div class="col-xs-1"> : </div>
                    <div class="col-xs-6" id="prioritas"></div>
                  </div>
                </div>
                 <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2"><strong>Legalitas</strong></div>
                    <div class="col-xs-1"> : </div>
                    <div class="col-xs-6" id="legal"></div>
                  </div>
                </div>
                 <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-2"><strong>Penanganan</strong></div>
                    <div class="col-xs-1"> : </div>
                    <div class="col-xs-6" id="penanganan"></div>
                  </div>
                </div>
               
        		</div>
        		<div class="row">
          			<div class="col-xs-12">
            			<div id="data_kawasan"></div>
            			<table id="kegiatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
		                           <th>RT</th>
		                           <th>RW</th>
		                           <th>Tingkat</th>
		                           <th>Prioritas</th>
		                           <th>Legalitas</th>
                               <th>Penanganan</th>
                               
		                            <th>Aksi</th>
		                          
		                        </tr>
		                    </thead>
                    		<tbody id="body_table"></tbody>
                		</table>
          			</div>
        		</div>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->