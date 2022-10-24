window.addEventListener('load', () => {

    let formulario = document.getElementById('form-registro');
    let errorLogin = document.getElementById('error-Usuario-regis');
    function data() {
        let datos = new FormData(formulario);
        fetch('/ApiPokemon/controlador/UsuarioController.php', {
            method: 'POST',
            body: datos
        })
                .then(respuesta => respuesta.json())
                .then(data => {
                    if (data == "Usuario existente") {
                        console.log("el usuario ya existe");
                        document.getElementById('error-Usuario-regis').classList.add('error-loginactive');
                    } else {
                        console.log("el usuario no existia, se creo");
                        alert("Usuario creado correctamente");
                        location.href = '/ApiPokemon/vista/Pokemon.php';
                    }
                });
    }

    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        data();
    });
});



