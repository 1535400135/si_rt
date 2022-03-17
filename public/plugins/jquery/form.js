$(document).ready(function(){

	var total=1;

	function tambahForm() {
		var n = total+1;
		if (n<=25) {
		var isi = '<div class="col-md-12" id="tambahform'+total+'">';
		isi += '<div class="col-md-12"><div class="row"><div class="col-7"><label>Penggunaan Dana Ke-'+n+'</label></div><div class="col-5"><label>Jumlah Dana Ke-'+n+'</label></div></div></div><div class="col-md-12"><div class="form-group"><div class="row"><div class="col-7">                        <input class="form-control" name="form'+n+'" placeholder="Judul Penggunaan Dana Ke-'+n+' --  Ex.(Kegiatan Penerimaan Siswa Baru)" required>                        </div>                       <div class="col-5">                          <input class="form-control" id="rupiah'+n+'" name="dana'+n+'" value="Rp. " required>                        </div>                        </div>                      </div>                    </div>';
		isi += '</div>'

		$('a.tambahform').before(isi);
		$('#tambahform'+total).slideDown('medium');
		}

		total++;
	}

	function hapusForm() {
		total--;
		if (total<=1) {
			total=1;
		}
		$('#tambahform'+total).slideUp('medium', function(){
			$(this).remove();
		});
	}

	$('a.tambahform').click(function(){
		tambahForm();
	});

	$('a.hapusform').click(function(){
		hapusForm();
	});
});