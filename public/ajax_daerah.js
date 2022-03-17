var ajaxku=buatajax();
function ajaxkec(id){
  var url="http://localhost/psg/sekolah/getKec/"+id+"/"+Math.random();
  ajaxku.onreadystatechange=stateChangedKec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkel(id){
  var url="http://localhost/psg/sekolah/getKel/"+id+"/"+Math.random();
  ajaxku.onreadystatechange=stateChangedKel;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}
function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}

function stateChangedKec(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kec").innerHTML = data
    }else{
      document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    }
    document.getElementById("kec_box").style.display='';
    document.getElementById("kel_box").style.display='';
  }
}

function stateChangedKel(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kel").innerHTML = data
    }else{
      document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
    document.getElementById("kel_box").style.display='';
  }
}