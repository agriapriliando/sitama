function cekJenisAkun() {
	var jenis_akun = document.getElementById("jenis_akun").value;
	if (jenis_akun == "mhs") {
		document.getElementById("nim_username").innerHTML = "NIM Mahasiswa";
		document.getElementById("isian_untuk_mhs").style.display = "";
	} else {
		document.getElementById("nim_username").innerHTML = "Username";
		document.getElementById("isian_untuk_mhs").style.display = "none";
	}
}

function cekDefaultPass() {
    var defaultPass = document.getElementById("defusername").value;
    console.log(defaultPass);
    var cekboxDefaultPass = document.getElementById("cekboxDefaultPass");
    if (cekboxDefaultPass.checked == true) {
        document.getElementById("defaultPassword").value = defaultPass;
    } else {
        document.getElementById("defaultPassword").value = "";
    }
}
$(document).ready(function() {
    $("#alert-alert").fadeTo(6000, 500).slideUp(500, function(){
        $("#alert-alert").slideUp(500);
    });
	$('#example').DataTable( {
		responsive: true,
		scrollX: true,
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	});
    $("#show_hide_password span").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "bi-eye-slash" );
            $('#show_hide_password i').removeClass( "bi-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "bi-eye-slash" );
            $('#show_hide_password i').addClass( "bi-eye" );
        }
    });
});