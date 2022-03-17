    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_2 = document.getElementById('rupiah-2');
    rupiah_2.addEventListener('keyup', function(e){
      rupiah_2.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_3 = document.getElementById('rupiah-3');
    rupiah_3.addEventListener('keyup', function(e){
      rupiah_3.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_4 = document.getElementById('rupiah-4');
    rupiah_4.addEventListener('keyup', function(e){
      rupiah_4.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_5 = document.getElementById('rupiah-5');
    rupiah_5.addEventListener('keyup', function(e){
      rupiah_5.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_6 = document.getElementById('rupiah-6');
    rupiah_6.addEventListener('keyup', function(e){
      rupiah_6.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_7 = document.getElementById('rupiah-7');
    rupiah_7.addEventListener('keyup', function(e){
      rupiah_7.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_8 = document.getElementById('rupiah-8');
    rupiah_8.addEventListener('keyup', function(e){
      rupiah_8.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_9 = document.getElementById('rupiah-9');
    rupiah_9.addEventListener('keyup', function(e){
      rupiah_9.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_10 = document.getElementById('rupiah-10');
    rupiah_10.addEventListener('keyup', function(e){
      rupiah_10.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_11 = document.getElementById('rupiah-11');
    rupiah_11.addEventListener('keyup', function(e){
      rupiah_11.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_12 = document.getElementById('rupiah-12');
    rupiah_12.addEventListener('keyup', function(e){
      rupiah_12.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_13 = document.getElementById('rupiah-13');
    rupiah_13.addEventListener('keyup', function(e){
      rupiah_13.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_14 = document.getElementById('rupiah-14');
    rupiah_14.addEventListener('keyup', function(e){
      rupiah_14.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_15 = document.getElementById('rupiah-15');
    rupiah_15.addEventListener('keyup', function(e){
      rupiah_15.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_16 = document.getElementById('rupiah-16');
    rupiah_16.addEventListener('keyup', function(e){
      rupiah_16.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_17 = document.getElementById('rupiah-17');
    rupiah_17.addEventListener('keyup', function(e){
      rupiah_17.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_18 = document.getElementById('rupiah-18');
    rupiah_18.addEventListener('keyup', function(e){
      rupiah_18.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_19 = document.getElementById('rupiah-19');
    rupiah_19.addEventListener('keyup', function(e){
      rupiah_19.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_20 = document.getElementById('rupiah-20');
    rupiah_20.addEventListener('keyup', function(e){
      rupiah_20.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_21 = document.getElementById('rupiah-21');
    rupiah_21.addEventListener('keyup', function(e){
      rupiah_21.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_22 = document.getElementById('rupiah-22');
    rupiah_22.addEventListener('keyup', function(e){
      rupiah_22.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_23 = document.getElementById('rupiah-23');
    rupiah_23.addEventListener('keyup', function(e){
      rupiah_23.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_24 = document.getElementById('rupiah-24');
    rupiah_24.addEventListener('keyup', function(e){
      rupiah_24.value = formatRupiah(this.value, 'Rp. ');
    });

    var rupiah_25 = document.getElementById('rupiah-25');
    rupiah_25.addEventListener('keyup', function(e){
      rupiah_25.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }