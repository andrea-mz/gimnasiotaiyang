window.onload=init;

function init() {

    fetch("bd/gimnasio.json")

    .then(function(response) {

        return response.json();

    })

    .then(function(data) {

        console.log(data.actividades);

        for(let i=0;i<data.actividades.length;i++) {

            var card=document.createElement('div');
            card.className="card bg-dark text-white text-center";
            document.querySelector(".galeria").appendChild(card);

            var img=document.createElement('img');
            img.setAttribute('src', data.actividades[i].imagen);
            img.setAttribute('alt', 'Imagen '+data.actividades[i].nombre);
            card.appendChild(img);

            var h2=document.createElement('h2');
            h2.className="text-uppercase texto-imagen-centrado";
            h2.appendChild(document.createTextNode(data.actividades[i].nombre));
            card.appendChild(h2);

        }

    })

}
