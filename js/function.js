$(function() {
	$('#staticParent').on('keydown', '.number_only', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})


function number_currency(elem){
	var elem_id = '#'+elem.id;
	var elem_val		= $(elem_id).val();
	var elem_no_cur = elem_id.replace(/_currency/g,'');

	var str = elem_val.toString(), parts = false, output = [], i = 1, formatted = null;

	parts = str.split(".");
	var gabung = '';
	for (var i = 0; i < parts.length; i++) {
		var gabung = gabung+parts[i];
	}

	str = gabung.split("").reverse();
	var i = 1;
	for(var j = 0, len = gabung.length; j < len; j++) {
		if(str[j] != ".") {
			output.push(str[j]);
			if(i%3 == 0 && j < (len - 1)) {
				output.push(".");
			}
			i++;
		}
	}

	formatted = output.reverse().join("");
	$(elem_id).val(formatted);
	$(elem_no_cur).val(gabung);
}

function nilai_currency(elem){
	var elem_id = elem.id;
	var elem = '#'+elem.id;
	var elem_val_curr = $(elem).val();
	var elem_val_curr_no_rupiah = remove_rupiah(elem_val_curr);
	var elem_val_curr_no_currency = elem_val_curr_no_rupiah.toString().replace(/[^0-9\.]+/g, "");

	var elem_str = elem_id.toString();
	var elem_no_cur = elem_str.replace(/_currency/g,'');

	var elem_val_currency = format_rupiah(elem_val_curr);
	$(elem).val(elem_val_currency);
	$('#'+elem_no_cur).val(elem_val_curr_no_currency);
}

function pembulatan(num){
  var num_str = num.toString();
  var tiga_akhir = num_str.substr(num_str.length - 2);
  if (tiga_akhir !== '00') {
    var pembulatan = 100 - parseInt(tiga_akhir);
    num_str = parseInt(num_str) + parseInt(pembulatan);
  }
  return num_str;
}

function remove_currency(num){
  var str = num.toString().replace(/[^0-9\.]+/g, "");
  return str;
}

function remove_rupiah(num){
  var str = num.toString().replace("Rp. ", "");
  return str;
}


var format_rupiah = function(num){
    var str = num.toString().replace("Rp. ", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ",") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }

    formatted = output.reverse().join("");
      return("Rp. " + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};


function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += ',';
        }
    }
    return rev2.split('').reverse().join('');
}

function confirm_delete(id,control){
	var a = confirm("Anda yakin ingin menghapus record ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_delete_2(id,id2,control){
	var a = confirm("Anda yakin ingin menghapus record ini ?");
	if(a==true){
		window.location.href = control+id+'&branch_id='+id2;
	}
}

function confirm_delete_3(id,id2,control,control2){
	var a = confirm("Anda yakin ingin menghapus record ini ?");
	if(a==true){
		window.location.href = control+id+control2+id2;
	}
}

function confirm_payment(id,control){
	var a = confirm("Anda yakin ingin membayar pembelian ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_onprogress(id,control){
	var a = confirm("Anda yakin ingin memproses data ini?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_done(id,control){

	var a = confirm("Apakah sudah terkonfirmasi ?");
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_transaction(id,control,nopol){
	var a = confirm("Anda yakin ingin mengkonfirmasi kedatangan truck dengan nopol "+nopol);
	if(a==true){
		window.location.href = control+id;
	}
}
function confirm_act(id,control){
	var a = confirm("Anda yakin ingin mengaktifkan data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_approved(id,control){
	var a = confirm("Anda yakin ingin approve data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}

function confirm_not_approved(id,control){
	var a = confirm("Anda yakin ingin reject data ini ?");
	if(a==true){
		window.location.href = control+id;
	}
}


function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}
