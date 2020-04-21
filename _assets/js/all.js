var persiapan = ['mobilisasi','gudang','air','keamanan'];
var pondasi = ['Bouwplank','Galian','Urugan','Pembesian_pondasi','Begesting_pondasi','Pengecoran_pondasi','Pembongkaran_pondasi'];
var sloof = ['Pembesian_sloof','Begesting_sloof','Pengecoran_sloof','Pembongkaran_sloof'];
var balok = ['Pembesian_balok', 'Begesting_balok', 'Pengecoran_balok', 'Pembongkaran_balok'];
var kolom = ['Pembesian_kolom', 'Begesting_kolom', 'Pengecoran_kolom', 'Pembongkaran_kolom'];
var batubata = ['BatuBata_dinding', 'BatuBata_sekat', 'BatuBata_kMandi'];
var plesteraci = ['PlesterAci_dinding', 'PlesterAci_sekat', 'PlesterAci_kMandi', 'PlesterAci_lantai', 'PlesterAci_teras'];
var atap = ['Rangka_atap', 'Penutup_atap', 'Lisplank'];
var plafon = ['Rangka_plafon', 'Penutup_plafon', 'Dempul', 'cet_plafon'];
var keramik = ['Keramik_kMandi', 'Keramik_lantai', 'Keramik_dinding', 'Keramik_closet', 'Keramik_teras'];
var plumbing = ['pipa_air', 'Septik_tank'];
var listrik = ['instal_listrik'];
var pengecetan = ['pek_pengecetan'];
var pintu = ['pem_Pintu', 'pem_Jendela'];
// var jml = ['jumlah1','jumlah2','jumlah3','jumlah4','jumlah5','jumlah6','jumlah7','jumlah8','jumlah9','jumlah10','jumlah11','jumlah12','jumlah13','jumlah14'];
var all = persiapan.concat(pondasi, sloof, balok, kolom, batubata, plesteraci, atap, plafon, keramik, plumbing, listrik, pengecetan, pintu);
persiapan.forEach((data) => {
	persiapan.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
	$('input[name="'+data+'"]').keyup(function(){ 
		let total = parseFloat($('input[name="mobilisasi"]').val()) +
        		 parseFloat($('input[name="gudang"]').val()) +
        		 parseFloat($('input[name="air"]').val()) +
        		 parseFloat($('input[name="keamanan"]').val());
        $('.jumlah1').html(total.toFixed(2));
        $('input[name="jumlah1"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
pondasi.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		pondasi.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Bouwplank"]').val()) +
	        		parseFloat($('input[name="Galian"]').val()) +
	        		parseFloat($('input[name="Urugan"]').val()) +
	        		parseFloat($('input[name="Pembesian_pondasi"]').val()) +
	        		parseFloat($('input[name="Begesting_pondasi"]').val()) +
	        		parseFloat($('input[name="Pengecoran_pondasi"]').val()) +
	        		parseFloat($('input[name="Pembongkaran_pondasi"]').val());
        $('.jumlah2').html(total.toFixed(2));
        $('input[name="jumlah2"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
sloof.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		sloof.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Pembesian_sloof"]').val()) +
	        		parseFloat($('input[name="Begesting_sloof"]').val()) +
	        		parseFloat($('input[name="Pengecoran_sloof"]').val()) +
	        		parseFloat($('input[name="Pembongkaran_sloof"]').val());
        $('.jumlah3').html(total.toFixed(2));
        $('input[name="jumlah3"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
balok.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		balok.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Pembesian_balok"]').val()) + 
			parseFloat($('input[name="Begesting_balok"]').val()) + 
			parseFloat($('input[name="Pengecoran_balok"]').val()) + 
			parseFloat($('input[name="Pembongkaran_balok"]').val());
        $('.jumlah4').html(total.toFixed(2));
        $('input[name="jumlah4"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
kolom.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		kolom.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Pembesian_kolom"]').val()) + 
					parseFloat($('input[name="Begesting_kolom"]').val()) + 
					parseFloat($('input[name="Pengecoran_kolom"]').val()) + 
					parseFloat($('input[name="Pembongkaran_kolom"]').val());
        $('.jumlah5').html(total.toFixed(2));
        $('input[name="jumlah5"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
batubata.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		batubata.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="BatuBata_dinding"]').val()) + 
				 	parseFloat($('input[name="BatuBata_sekat"]').val()) + 
				 	parseFloat($('input[name="BatuBata_kMandi"]').val()) ;
        $('.jumlah6').html(total.toFixed(2));
        $('input[name="jumlah6"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
plesteraci.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		plesteraci.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="PlesterAci_dinding"]').val()) + 
				 	parseFloat($('input[name="PlesterAci_sekat"]').val()) + 
				 	parseFloat($('input[name="PlesterAci_kMandi"]').val()) + 
				 	parseFloat($('input[name="PlesterAci_lantai"]').val()) + 
				 	parseFloat($('input[name="PlesterAci_teras"]').val()) ;
        $('.jumlah7').html(total.toFixed(2));
        $('input[name="jumlah7"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
atap.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		atap.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Rangka_atap"]').val()) + 
				 	parseFloat($('input[name="Penutup_atap"]').val()) + 
				 	parseFloat($('input[name="Lisplank"]').val()) ;
        $('.jumlah8').html(total.toFixed(2));
        $('input[name="jumlah8"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
plafon.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		plafon.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Rangka_plafon"]').val()) + 
				 	parseFloat($('input[name="Penutup_plafon"]').val()) + 
				 	parseFloat($('input[name="Dempul"]').val()) + 
				 	parseFloat($('input[name="cet_plafon"]').val()) ;
        $('.jumlah9').html(total.toFixed(2));
        $('input[name="jumlah9"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
keramik.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		keramik.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="Keramik_kMandi"]').val()) + 
				  	parseFloat($('input[name="Keramik_lantai"]').val()) + 
				  	parseFloat($('input[name="Keramik_dinding"]').val()) + 
				  	parseFloat($('input[name="Keramik_closet"]').val()) + 
				  	parseFloat($('input[name="Keramik_teras"]').val()) ;
        $('.jumlah10').html(total.toFixed(2));
        $('input[name="jumlah10"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
plumbing.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		plumbing.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="pipa_air"]').val()) + 
				  	parseFloat($('input[name="Septik_tank"]').val()) ;
        $('.jumlah11').html(total.toFixed(2));
        $('input[name="jumlah11"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
listrik.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		listrik.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="instal_listrik"]').val());
        $('.jumlah12').html(total.toFixed(2));
        $('input[name="jumlah12"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
pengecetan.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		pengecetan.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="pek_pengecetan"]').val());
        $('.jumlah13').html(total.toFixed(2));
        $('input[name="jumlah13"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
pintu.forEach((data) => {
	$('input[name="'+data+'"]').keyup(function(){ 
		pintu.forEach((data) => {
			if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="pem_Pintu"]').val()) + 
				  	parseFloat($('input[name="pem_Jendela"]').val()) ;
        $('.jumlah14').html(total.toFixed(2));
        $('input[name="jumlah14"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});

//untuk edit
persiapan.forEach((data)=>{
	$('input[name="edit'+data+'"]').keyup(function(){ 
		persiapan.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editmobilisasi"]').val()) +
        		 parseFloat($('input[name="editgudang"]').val()) +
        		 parseFloat($('input[name="editair"]').val()) +
        		 parseFloat($('input[name="editkeamanan"]').val());
        $('.jml_persiapan').html(total.toFixed(2));
        $('input[name="editjumlah1"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
pondasi.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		pondasi.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editBouwplank"]').val()) +
	        		parseFloat($('input[name="editGalian"]').val()) +
	        		parseFloat($('input[name="editUrugan"]').val()) +
	        		parseFloat($('input[name="editPembesian_pondasi"]').val()) +
	        		parseFloat($('input[name="editBegesting_pondasi"]').val()) +
	        		parseFloat($('input[name="editPengecoran_pondasi"]').val()) +
	        		parseFloat($('input[name="editPembongkaran_pondasi"]').val());
        $('.jml_pondasi').html(total.toFixed(2));
        $('input[name="editjumlah2"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
sloof.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		sloof.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editPembesian_sloof"]').val()) +
	        		parseFloat($('input[name="editBegesting_sloof"]').val()) +
	        		parseFloat($('input[name="editPengecoran_sloof"]').val()) +
	        		parseFloat($('input[name="editPembongkaran_sloof"]').val());
        $('.jml_sloof').html(total.toFixed(2));
        $('input[name="editjumlah3"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
balok.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		balok.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editPembesian_balok"]').val()) + 
			parseFloat($('input[name="editBegesting_balok"]').val()) + 
			parseFloat($('input[name="editPengecoran_balok"]').val()) + 
			parseFloat($('input[name="editPembongkaran_balok"]').val());
        $('.jml_balok').html(total.toFixed(2));
        $('input[name="editjumlah4"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
kolom.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		kolom.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editPembesian_kolom"]').val()) + 
					parseFloat($('input[name="editBegesting_kolom"]').val()) + 
					parseFloat($('input[name="editPengecoran_kolom"]').val()) + 
					parseFloat($('input[name="editPembongkaran_kolom"]').val());
        $('.jml_kolom').html(total.toFixed(2));
        $('input[name="editjumlah5"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
batubata.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		batubata.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editBatuBata_dinding"]').val()) + 
				 	parseFloat($('input[name="editBatuBata_sekat"]').val()) + 
				 	parseFloat($('input[name="editBatuBata_kMandi"]').val()) ;
        $('.jmlBata').html(total.toFixed(2));
        $('input[name="editjumlah6"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
plesteraci.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		plesteraci.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editPlesterAci_dinding"]').val()) + 
				 	parseFloat($('input[name="editPlesterAci_sekat"]').val()) + 
				 	parseFloat($('input[name="editPlesterAci_kMandi"]').val()) + 
				 	parseFloat($('input[name="editPlesterAci_lantai"]').val()) + 
				 	parseFloat($('input[name="editPlesterAci_teras"]').val()) ;
        $('.jmlAci').html(total.toFixed(2));
        $('input[name="editjumlah7"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
atap.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		atap.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editRangka_atap"]').val()) + 
				 	parseFloat($('input[name="editPenutup_atap"]').val()) + 
				 	parseFloat($('input[name="editLisplank"]').val()) ;
        $('.jmlAtap').html(total.toFixed(2));
        $('input[name="editjumlah8"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
plafon.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		plafon.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editRangka_plafon"]').val()) + 
				 	parseFloat($('input[name="editPenutup_plafon"]').val()) + 
				 	parseFloat($('input[name="editDempul"]').val()) + 
				 	parseFloat($('input[name="editcet_plafon"]').val()) ;
        $('.jmlPlafon').html(total.toFixed(2));
        $('input[name="editjumlah9"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
keramik.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		keramik.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editKeramik_kMandi"]').val()) + 
				  	parseFloat($('input[name="editKeramik_lantai"]').val()) + 
				  	parseFloat($('input[name="editKeramik_dinding"]').val()) + 
				  	parseFloat($('input[name="editKeramik_closet"]').val()) + 
				  	parseFloat($('input[name="editKeramik_teras"]').val()) ;
        $('.jmlKeramik').html(total.toFixed(2));
        $('input[name="editjumlah10"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
plumbing.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		plumbing.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editpipa_air"]').val()) + 
				  	parseFloat($('input[name="editSeptik_tank"]').val()) ;
        $('.jmlPlumbing').html(total.toFixed(2));
        $('input[name="editjumlah11"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
listrik.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		listrik.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editinstal_listrik"]').val());
        $('.jmlListrik').html(total.toFixed(2));
        $('input[name="editjumlah12"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
pengecetan.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		pengecetan.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editpek_pengecetan"]').val());
        $('.jmlCet').html(total.toFixed(2));
        $('input[name="editjumlah13"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});
pintu.forEach((data) => {
	$('input[name="edit'+data+'"]').keyup(function(){ 
		pintu.forEach((data) => {
			if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val(0)};
		});
		let total = parseFloat($('input[name="editpem_Pintu"]').val()) + 
				  	parseFloat($('input[name="editpem_Jendela"]').val()) ;
        $('.jmlpintu').html(total.toFixed(2));
        $('input[name="editjumlah14"]').val(total.toFixed(2));
        batasNomor();
        jumlahSemua();
	});
});




function batasNomor() { 
	all.forEach((data) => {
		if ($('input[name="'+data+'"]').val() == ""){$('input[name="'+data+'"]').val('0.')};
		if ($('input[name="'+data+'"]').val().substr(1,1) == ".") {
	  		if($('input[name="'+data+'"]').val().length > 4){
	    		$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 4));
	  		}else if ($('input[name="'+data+'"]').val().substr(2,1) == ".") {
	  			$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 2));
	  		}else if ($('input[name="'+data+'"]').val().substr(3,1) == ".") {
	  			$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 3));
	  		};
	  	}else if ($('input[name="'+data+'"]').val().substr(2,1) == "."){
	  		if($('input[name="'+data+'"]').val().length > 5){
	    		$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 5));
	  		}else if ($('input[name="'+data+'"]').val().substr(3,1) == ".") {
	  			$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 3));
	  		}else if ($('input[name="'+data+'"]').val().substr(4,1) == ".") {
	  			$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 4));
	  		};
	  	}else {
	  		$('input[name="'+data+'"]').val($('input[name="'+data+'"]').val().substring(0, 2));
	  	};
	  	if ($('input[name="edit'+data+'"]').val() == ""){$('input[name="edit'+data+'"]').val('0.')};
	  	if ($('input[name="edit'+data+'"]').val().substr(1,1) == ".") {
	  		if($('input[name="edit'+data+'"]').val().length > 4){
	    		$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 4));
	  		}else if ($('input[name="edit'+data+'"]').val().substr(2,1) == ".") {
	  			$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 2));
	  		}else if ($('input[name="edit'+data+'"]').val().substr(3,1) == ".") {
	  			$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 3));
	  		};
	  	}else if ($('input[name="edit'+data+'"]').val().substr(2,1) == "."){
	  		if($('input[name="edit'+data+'"]').val().length > 5){
	    		$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 5));
	  		}else if ($('input[name="edit'+data+'"]').val().substr(3,1) == ".") {
	  			$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 3));
	  		}else if ($('input[name="edit'+data+'"]').val().substr(4,1) == ".") {
	  			$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 4));
	  		};
	  	}else {
	  		$('input[name="edit'+data+'"]').val($('input[name="edit'+data+'"]').val().substring(0, 2));
	  	};
	  	$('input[name="'+data+'"]').val(function(index, value) {
			return value
			.replace(/[a-zA-z\!@#$%^&*()_+=;:'",~`/\><]/g, "")
		});
		$('input[name="edit'+data+'"]').val(function(index, value) {
			return value
			.replace(/[a-zA-z\!@#$%^&*()_+=;:'",~`/\><]/g, "")
		});
  	});
}
function jumlahSemua(){
	var jmlAll = ['total','jumlah1','jumlah2','jumlah3','jumlah4','jumlah5','jumlah6','jumlah7','jumlah8','jumlah9','jumlah10','jumlah11','jumlah12','jumlah13','jumlah14'];
	var jmlAllEdit = ["jml_persiapan", "jml_pondasi", "jml_sloof", "jml_balok", "jml_kolom", "jmlBata", "jmlAci", "jmlAtap", "jmlPlafon", "jmlKeramik", "jmlPlumbing", "jmlListrik", "jmlCet", "jmlpintu", "totalBobot"];
	//untuk tambah
	jmlAll.forEach((data) => {
		if ($('.'+data).text() == ""){$('.'+data).text(0)};
	});
    let all = parseFloat($('.jumlah1').text())+ parseFloat($('.jumlah2').text())+ parseFloat($('.jumlah3').text())+
    		  parseFloat($('.jumlah4').text())+ parseFloat($('.jumlah5').text())+ parseFloat($('.jumlah6').text())+
    		  parseFloat($('.jumlah7').text())+ parseFloat($('.jumlah8').text())+ parseFloat($('.jumlah9').text())+
    		  parseFloat($('.jumlah10').text())+ parseFloat($('.jumlah11').text())+ parseFloat($('.jumlah12').text())+
    		  parseFloat($('.jumlah13').text())+ parseFloat($('.jumlah14').text());
    $('.total').html(all.toFixed(2));
    if (all > 100.01) {
    	alert('Jumlah Keseluruhan Bobot = '+all.toFixed(2)+' Sudah Melebihi 100 %, Silahkan Cek Kembali !!!');
    	$('.save').attr('disabled', true);
    }else{
    	$('.save').attr('disabled', false);
    }
    // untuk edit
    jmlAllEdit.forEach((data) => {
		if ($('.'+data).text() == ""){$('.'+data).text(0)};
	});
    let allEdit = parseFloat($('.jml_persiapan').text())+ parseFloat($('.jml_pondasi').text())+ parseFloat($('.jml_sloof').text())+
    		  parseFloat($('.jml_balok').text())+ parseFloat($('.jml_kolom').text())+ parseFloat($('.jmlBata').text())+
    		  parseFloat($('.jmlAci').text())+ parseFloat($('.jmlAtap').text())+ parseFloat($('.jmlPlafon').text())+
    		  parseFloat($('.jmlKeramik').text())+ parseFloat($('.jmlPlumbing').text())+ parseFloat($('.jmlListrik').text())+
    		  parseFloat($('.jmlCet').text())+ parseFloat($('.jmlpintu').text());
    $('.totalBobot').html(allEdit.toFixed(2));
    if (allEdit > 100.01) {
    	alert('Jumlah Keseluruhan Bobot = '+allEdit.toFixed(2)+' Sudah Melebihi 100 %, Silahkan Cek Kembali !!!');
    	$('.saveEdit').attr('disabled', true);
    }else{
    	$('.saveEdit').attr('disabled', false);
    }
}

