/*
    Tomar una fotografía y guardarla en un archivo v3
    @date 2018-10-22
    @author parzibyte
    @web parzibyte.me/blog
*/
const tieneSoporteUserMedia = () =>
    !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
const _getUserMedia = (...arguments) =>
    (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

const $foto = document.querySelector("#foto"),
    $nombre = document.querySelector("#fotografia"),
    $nom = document.querySelector("#fotoExistente").value;

function EmpezarFoto(){
    $foto.innerHTML = '<div id="canvaCompleto"><div id="elemento"> <select name="listaDeDispositivos" id="listaDeDispositivos"></select> <button id="boton">Tomar foto</button> <p id="estado"></p></div><br><video muted="muted" id="video"></video><canvas id="canvas" style="display: none;"></canvas><input id="cancelar" type="button" value="Cancelar" onclick="Cancelar()"></div>';
    $("#cambia").remove();
    $("#cambiarFoto").remove();
    $("#quitarFoto").remove();
    $("#fotoActual").remove();
    $("#otraFoto").remove();
        // Declaramos elementos del DOM
const $video = document.querySelector("#video"),
    $canvas = document.querySelector("#canvas"),
    $estado = document.querySelector("#estado"),
    $boton = document.querySelector("#boton"),
    $elemento = document.querySelector("#elemento"),
    $listaDeDispositivos = document.querySelector("#listaDeDispositivos");

const limpiarSelect = () => {
    for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
        $listaDeDispositivos.remove(x);
};
const obtenerDispositivos = () => navigator
    .mediaDevices
    .enumerateDevices();

// La función que es llamada después de que ya se dieron los permisos
// Lo que hace es llenar el select con los dispositivos obtenidos
const llenarSelectConDispositivosDisponibles = () => {

    limpiarSelect();
    obtenerDispositivos()
        .then(dispositivos => {
            const dispositivosDeVideo = [];
            dispositivos.forEach(dispositivo => {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            if (dispositivosDeVideo.length > 0) {
                // Llenar el select
                dispositivosDeVideo.forEach(dispositivo => {
                    const option = document.createElement('option');
                    option.value = dispositivo.deviceId;
                    option.text = dispositivo.label;
                    $listaDeDispositivos.appendChild(option);
                });
            }
        });
}

(function() {
    // Comenzamos viendo si tiene soporte, si no, nos detenemos
    if (!tieneSoporteUserMedia()) {
        alert("Lo siento. Tu navegador no soporta esta característica");
        $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
        return;
    }
    //Aquí guardaremos el stream globalmente
    let stream;


    // Comenzamos pidiendo los dispositivos
    obtenerDispositivos()
        .then(dispositivos => {
            // Vamos a filtrarlos y guardar aquí los de vídeo
            const dispositivosDeVideo = [];

            // Recorrer y filtrar
            dispositivos.forEach(function(dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            // y le pasamos el id de dispositivo
            if (dispositivosDeVideo.length > 0) {
                // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                mostrarStream(dispositivosDeVideo[0].deviceId);
            }
        });



    const mostrarStream = idDeDispositivo => {
        _getUserMedia({
                video: {
                    // Justo aquí indicamos cuál dispositivo usar
                    deviceId: idDeDispositivo,
                }
            },
            (streamObtenido) => {
                // Aquí ya tenemos permisos, ahora sí llenamos el select,
                // pues si no, no nos daría el nombre de los dispositivos
                llenarSelectConDispositivosDisponibles();

                // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                $listaDeDispositivos.onchange = () => {
                    // Detener el stream
                    if (stream) {
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    }
                    // Mostrar el nuevo stream con el dispositivo seleccionado
                    mostrarStream($listaDeDispositivos.value);
                }

                // Simple asignación
                stream = streamObtenido;

                // Mandamos el stream de la cámara al elemento de vídeo
                $video.srcObject = stream;
                $video.play();

                //Escuchar el click del botón para tomar la foto
                //Escuchar el click del botón para tomar la foto
                $boton.addEventListener("click", function() {

                    $('#cancelar').remove();
                    document.querySelector("#miCanva").innerHTML = `<input type="button" id="cambiarFoto" value="Cambiar foto" onclick="EmpezarFoto()">
                    <input type="button" id="quitarFoto" value="Quitar foto" onclick="QuitarFoto()">`;
                    //Pausar reproducción
                    $video.pause();

                    //Obtener contexto del canvas y dibujar sobre él
                    let contexto = $canvas.getContext("2d");
                    $canvas.width = $video.videoWidth;
                    $canvas.height = $video.videoHeight;
                    contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                    let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                    $estado.innerHTML = "Enviando foto. Por favor, espera...";
                    fetch("../JS/guardar_foto.php", {
                            method: "POST",
                            body: encodeURIComponent(foto),
                            headers: {
                                "Content-type": "application/x-www-form-urlencoded",
                            }
                        })
                        .then(resultado => {
                            // A los datos los decodificamos como texto plano
                            return resultado.text()
                        })
                        .then(nombreFoto => {
                            // idFoto trae el id de la foto
                            console.log("La foto fue enviada correctamente");
                            $estado.innerHTML = `Foto guardada con éxito.`;
                            $nombre.innerHTML = `<input type="hidden" id="Fotografia" name="Foto" type="text" value="">`;
                            document.getElementById("Fotografia").value = nombreFoto;
                        })

                    //Reanudar reproducción

                });
            }, (error) => {
                console.log("Permiso denegado o error: ", error);
                $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
            });
    }
})();
}
function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL();
    return dataURL;
  }
  
function QuitarFoto(){
    var base64 = getBase64Image(document.querySelector("#img"));
    $("#fotoExistente").remove();
    $("#fotoActual").remove();
    $('#canvaCompleto').remove();
    $('#cambia').remove();
    fetch("../JS/guardar_foto.php", {
        method: "POST",
        body: encodeURIComponent(base64),
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        }
    })
    .then(resultado => {
        return resultado.text()
    })
    .then(nombreFoto => {
        $nombre.innerHTML = `<input type="hidden" id="Fotografia" name="Foto" type="text" value="">`;
        document.getElementById("Fotografia").value = nombreFoto;
        console.log(nombreFoto);
    })
}
function Cancelar(){
    console.log("Cancelar");
    $('#canvaCompleto').remove();
    document.querySelector("#miCanva").innerHTML = `<input type="button" id="cambiarFoto" value="Agregar foto" onclick="EmpezarFoto()">
    <input type="button" id="quitarFoto" value="Quitar foto" onclick="QuitarFoto()">`;
    $nombre.innerHTML = `<input type="hidden" id="Fotografia" name="Foto" type="text" value="">`;
    document.getElementById("Fotografia").value = $nom;
    console.log($nom);
}

