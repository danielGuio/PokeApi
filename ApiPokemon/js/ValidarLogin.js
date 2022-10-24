window.addEventListener('load', () => {

    let formulario = document.getElementById('form-login');
    let errorLogin = document.getElementById('error-login');
    let btnregistro = document.getElementById('btn-registrarse');
    function data() {
        let datos = new FormData(formulario);
        fetch('/ApiPokemon/controlador/LoginController.php', {
            method: 'POST',
            body: datos
        })
                .then(respuesta => respuesta.json())
                .then(data => {
                    if (data == "Objeto nulo") {
                        console.log("el objeto se valida y es nulo");
                        document.getElementById('error-login').classList.add('error-loginactive');
                    } else {
                        console.log("El objeto trae: " + data);
                        location.href = '/ApiPokemon/vista/Pokemon.php';
                    }
                });
    }

    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        data();
        console.log("btn ingreso");
    });  
       btnregistro.addEventListener('click', (e) => {
        e.preventDefault();
        location.href = '/ApiPokemon/vista/registrarUsuario.php';
        console.log("btn registro");
    });
});

