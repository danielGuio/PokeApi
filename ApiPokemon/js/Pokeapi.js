var contenedorpoke = document.getElementById('Container-grupo-poke');
var cont_main = document.getElementById('cont_main');
var btnatras = document.getElementById('btnAtras');
var verPokemon = document.getElementById('cont_unPokemon');
var controlTarjeta = false;

const traerpokemones = async() => {
    const respuesta = await fetch('https://pokeapi.co/api/v2/pokemon/?limit=60&offset=0')
            .then(respuesta => {
                return respuesta.json();
            });
    const tamLista = respuesta.results.length;
    const listUrl = enviarUrl(respuesta.results, tamLista);
    let listaObjPoke = [];
    for (i = 0; i < tamLista; i++) {
        listaObjPoke.push(verpokemon(listUrl[i]));
    }
    return listaObjPoke;
};

function verpokemon(url) {
    fetch(url)
            .then((resp) => resp.json())
            .then((data) => listadoPokemon(data));
}
;

function enviarUrl(respuesta, arrayLength) {
    listaurl = [];
    for (i = 0; i < arrayLength; i++) {
        listaurl.push(respuesta[i].url);
    }
    return listaurl;
}

function listadoPokemon(pokemon, controlTarjeta) {
    var divNomPoke = document.createElement('div');
    divNomPoke.classList.add('divtextpoke');
    divNomPoke.setAttribute('id', pokemon.id);
    contenedorpoke.appendChild(divNomPoke);
    var anombrepoke = document.createElement("p");
    anombrepoke.classList.add('nombrePoke');
    anombrepoke.setAttribute('id', 'p' + pokemon.id);
    anombrepoke.innerHTML = pokemon.name;
    divNomPoke.appendChild(anombrepoke);


    verTarjetPokemon(divNomPoke, pokemon);
}

function verTarjetPokemon(divNomPoke, pokemon) {

    divNomPoke.addEventListener('click', (e) => {
        controlTarjeta = true;
        cont_main.appendChild(verPokemon);
        
        if (document.contains(document.getElementById("cont_img"))){
            document.getElementById("cont_img").remove();
        };
        if (document.contains(document.getElementById("cont-caracteristicas"))){
            document.getElementById("cont-caracteristicas").remove();
        };
        
        const cont_img = document.createElement('div');
        cont_img.classList.add('cont_img');
        cont_img.setAttribute('id','cont_img');
        verPokemon.appendChild(cont_img);
        
        const cont_caract = document.createElement('div');
        cont_caract.classList.add('cont-caracteristicas');
        cont_caract.setAttribute('id','cont-caracteristicas');
        verPokemon.appendChild(cont_caract);
        
        const nombrePoke = document.createElement('p');
        nombrePoke.classList.add('pHabilidades');
        nombrePoke.setAttribute('id','nombrePoke');
        nombrePoke.innerHTML = "Nombre: "+ pokemon.name;
        
        const habilidad1 = document.createElement('p');
        habilidad1.classList.add('pHabilidades');
        habilidad1.setAttribute('id','phabilidad1');
        habilidad1.innerHTML = "Habilidad 1: "+ pokemon.abilities[0].ability.name;
        
        const habilidad2 = document.createElement('p');
        habilidad2.classList.add('pHabilidades');
        habilidad2.setAttribute('id','phabilidad2');
        if (pokemon.abilities.length > 1){
        habilidad2.innerHTML = "Habilidad 2: "+ pokemon.abilities[1].ability.name;
    }
        
         cont_caract.appendChild(nombrePoke);
         cont_caract.appendChild(habilidad1);
         if (pokemon.abilities.length > 1){
         cont_caract.appendChild(habilidad2);
     }
         
        const imagen = document.createElement('img');
        imagen.classList.add('imagen_poke');
        imagen.src = pokemon.sprites.front_default;
        cont_img.appendChild(imagen);
        contenedorpoke.style.display = "none";
        verPokemon.style.display = "block";
    });

}

btnatras.addEventListener('click', (e) => {
    verPokemon.style.display = "none";
    contenedorpoke.style.display = "block";
});

var listap = traerpokemones();
