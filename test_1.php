<!DOCTYPE html>
<html>
<head>
	<title>Test pertama</title>
</head>
<body>
	<form method="post">
		<h1>PROGRAM TEST 1</h1>
		<input type="hidden" name="count" id="count" value="0">
		<input type="button" name="tambah_item" id="tambah_item" value="Tambah Item">
		<div id="parentDiv" style="padding: 30px">
			
		</div>

		<input type="button" name="submit" id="submit" value="Submit">
	</form>
		<div id="hasil"></div>
</body>
<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript">
	$("#tambah_item").click(function(){
		jumlah=$("#count").val();
		jumlah_akhir=parseInt(jumlah)+1;
		$("#parentDiv").append('<div id="item_'+jumlah_akhir+'"> <h3>ITEM '+jumlah_akhir+'</h3> <input type="hidden" name="item '+jumlah_akhir+'" id="item_name_'+jumlah_akhir+'" value="item_name_'+jumlah_akhir+'" readonly> <select name="jenis_item_'+jumlah_akhir+'" id="jenis_item_'+jumlah_akhir+'" onchange="ganti_jenis('+jumlah_akhir+')"><option value="">pilih jenis item</option><option value="S">Solid</option><option value="L">Liquid</option></select> <input type="text" name="item_width_'+jumlah_akhir+'" id="item_width_'+jumlah_akhir+'" placeholder="Masukkan Nilai Lebar" style="display: none;"> <input type="text" name="item_height_'+jumlah_akhir+'" id="item_height_'+jumlah_akhir+'" placeholder="Masukkan Nilai Tinggi" style="display: none;"> <input type="text" name="item_length_'+jumlah_akhir+'" id="item_length_'+jumlah_akhir+'" placeholder="Masukkan Nilai Panjang" style="display: none;"> <input type="text" name="item_weight_'+jumlah_akhir+'" id="item_weight_'+jumlah_akhir+'" placeholder="Masukkan Nilai Berat" style="display: none;"> <input type="text" name="item_temperatur_'+jumlah_akhir+'" id="item_temperatur_'+jumlah_akhir+'" placeholder="Masukkan Nilai Temperatur" style="display: none;"> </div>');		
		$('#count').val(jumlah_akhir);
	});
	function ganti_jenis(i) {
		if ($('#jenis_item_'+i).val()=="S") {
			$('#item_weight_'+i).show();
			$('#item_length_'+i).show();
			$('#item_height_'+i).show();
			$('#item_width_'+i).show();
			$('#item_temperatur_'+i).hide();
		}else{
			$('#item_weight_'+i).show();
			$('#item_length_'+i).hide();
			$('#item_height_'+i).hide();
			$('#item_width_'+i).hide();
			$('#item_temperatur_'+i).show();
		}
	}
	$("#submit").click(function(){
		var array=[];
		count=$('#count').val();
		for (i = 1; i <= parseInt(count); i++) {
			jenis_item=$('#jenis_item_'+i).val();
			item_name=$('#item_name_'+i).val();
			item_weight=$('#item_weight_'+i).val();
			item_length=$('#item_length_'+i).val();
			item_height=$('#item_height_'+i).val();
			item_width=$('#item_width_'+i).val();
			item_temperatur=$('#item_temperatur_'+i).val();
			
			if (jenis_item=="S") {
				if (item_width<=5) {
					if (item_height<=7) {
						storage_volume=item_width*item_height*item_length;
						if (storage_volume<=1000) {
							if (item_weight<=20) {
								array.push(item_name+" : PASS");
							}
							else{
								array.push(item_name+" : REJECT");
							}
						}else{
						array.push(item_name+" : REJECT");
						}
					}else{
						array.push(item_name+" : REJECT");
					}
					
				}else{
					array.push(item_name+" : REJECT");
				}
			}else{
				
				if (item_temperatur>20) {
					if (item_temperatur<30) {
						if (item_weight<20) {
							array.push(item_name+" : PASS");
						}else{
							array.push(item_name+" : REJECT");
						}	
					}else{
						array.push(item_name+" : REJECT");
					}
				}else{
					array.push(item_name+" : REJECT");
				}
			}
		}
		document.getElementById("hasil").innerHTML = array;
	});
</script>
</html>