
$(document).on('keyup','input',function(){
    $('input').each(function(){
        if ($(this).val() == "")$(this).val(0);

        let t1 = parseFloat($('input[name="Mobilisasi"]').val()) + 
        		 parseFloat($('input[name="gudang"]').val()) + 
        		 parseFloat($('input[name="air"]').val()) + 
        		 parseFloat($('input[name="keamanan"]').val());
        let t2 = parseFloat($('input[name="Bouwplank"]').val()) + 
		         parseFloat($('input[name="Galian"]').val()) + 
		         parseFloat($('input[name="Urugan"]').val()) + 
		         parseFloat($('input[name="Pembesian-Pondasi"]').val()) + 
		         parseFloat($('input[name="Begesting-Pondasi"]').val()) + 
		         parseFloat($('input[name="Pengecoran-Pondasi"]').val()) + 
		         parseFloat($('input[name="Pembongkaran-Pondasi"]').val());
        let t3 = parseFloat($('input[name="Pembesian_sloof"]').val()) + 
        		 parseFloat($('input[name="Begesting_sloof"]').val()) + 
        		 parseFloat($('input[name="Pengecoran_sloof"]').val()) + 
        		 parseFloat($('input[name="Pembongkaran_sloof"]').val());
        let t4 = parseFloat($('input[name="Pembesian_balok"]').val()) + 
        		 parseFloat($('input[name="Begesting_balok"]').val()) + 
        		 parseFloat($('input[name="Pengecoran_balok"]').val()) + 
        		 parseFloat($('input[name="Pembongkaran_balok"]').val());
        let t5 = parseFloat($('input[name="Pembesian_kolom"]').val()) + 
        		 parseFloat($('input[name="Begesting_kolom"]').val()) + 
        		 parseFloat($('input[name="Pengecoran_kolom"]').val()) + 
        		 parseFloat($('input[name="Pembongkaran_kolom"]').val());
        let t6 = parseFloat($('input[name="BatuBata_dinding"]').val()) + 
        		 parseFloat($('input[name="BatuBata_sekat"]').val()) + 
        		 parseFloat($('input[name="BatuBata_kMandi"]').val()) ;
        let t7 = parseFloat($('input[name="PlesterAci_dinding"]').val()) + 
        		 parseFloat($('input[name="PlesterAci_sekat"]').val()) + 
        		 parseFloat($('input[name="PlesterAci_kMandi"]').val()) + 
        		 parseFloat($('input[name="PlesterAci_lantai"]').val()) + 
        		 parseFloat($('input[name="PlesterAci_teras"]').val()) ;
        let t8 = parseFloat($('input[name="Rangka_atap"]').val()) + 
        		 parseFloat($('input[name="Penutup_atap"]').val()) + 
        		 parseFloat($('input[name="Lisplank"]').val()) ;
        let t9 = parseFloat($('input[name="Rangka_plafon"]').val()) + 
        		 parseFloat($('input[name="Penutup_plafon"]').val()) + 
        		 parseFloat($('input[name="Dempul"]').val()) + 
        		 parseFloat($('input[name="cet_plafon"]').val()) ;	
        let t10 = parseFloat($('input[name="Keramik_kMandi"]').val()) + 
        		  parseFloat($('input[name="Keramik_lantai"]').val()) + 
        		  parseFloat($('input[name="Keramik_dinding"]').val()) + 
        		  parseFloat($('input[name="Keramik_closet"]').val()) + 
        		  parseFloat($('input[name="Keramik_teras"]').val()) ;	
        let t11 = parseFloat($('input[name="pipa_air"]').val()) + 
        		  parseFloat($('input[name="Septik_tank"]').val()) ;	
        let t12 = parseFloat($('input[name="instal_listrik"]').val());	
        let t13 = parseFloat($('input[name="pek_pengecetan"]').val());
        let t14 = parseFloat($('input[name="pem_Pintu"]').val()) + 
        		  parseFloat($('input[name="pem_Jendela"]').val()) ;
        $('input[name="jumlah_persiapan"]').val(t1.toFixed(2));
        $('input[name="jumlah-Pondasi"]').val(t2.toFixed(2));
        $('input[name="jml_sloof"]').val(t3.toFixed(2));
        $('input[name="jml_balok"]').val(t4.toFixed(2));
        $('input[name="jml_kolom"]').val(t5.toFixed(2));
        $('input[name="jml_batuBata"]').val(t6.toFixed(2));
        $('input[name="jml_plesterAci"]').val(t7.toFixed(2));
        $('input[name="jml_atap"]').val(t8.toFixed(2));
        $('input[name="jml_plafon"]').val(t9.toFixed(2));
        $('input[name="jml_keramik"]').val(t10.toFixed(2));
        $('input[name="jml_plumbing"]').val(t11.toFixed(2));
        $('input[name="jml_listrik"]').val(t12.toFixed(2));
        $('input[name="jml_pengecetan"]').val(t13.toFixed(2));
        $('input[name="jml_pintu"]').val(t14.toFixed(2));
        
    });
});    
