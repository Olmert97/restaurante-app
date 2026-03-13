
function login() {
    let u = $("#correo").val();
    let c = $("#clave").val();
    
    if (u != "" && c != "") {
        $.ajax({
            url: "./funciones/login.php",
            type: "POST",
            data: {correo: u, clave: c},
            success: function(resp) {
                console.log("Respuesta del servidor:", resp); 
                console.log("Tipo de respuesta:", typeof resp); 
                if (resp == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido',
                        text: 'Usuario válido',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "./frm/frm_menu_principal.php";
                    });
                } else if (resp == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario o contraseña incorrectos'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al ingresar al sistema, por favor verifique'
                    });
                }
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Necesitas rellenar todos los campos para proceder'
        });
    }
    return false;
}






