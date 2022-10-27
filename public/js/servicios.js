window.onload=init;

function init() {

    fetch("bd/gimnasio.json")

    .then(function(response) {

        return response.json();

    })

    .then(function(data) {

        console.log(data.servicios);

        for(let i=0;i<data.servicios.length;i++) {

            var card=document.createElement('div');
            card.className="card bg-dark text-white";
            document.querySelector(".mini_galeria").appendChild(card);
    
            var img=document.createElement('img');
            img.setAttribute('src', data.servicios[i].imagen);            
            img.setAttribute('alt', 'Imagen '+data.servicios[i].nombre);
            card.appendChild(img);
    
            var h1=document.createElement('h1');
            h1.className="text-uppercase texto-imagen-centrado text-center texto-servicios";
            h1.appendChild(document.createTextNode(data.servicios[i].nombre));
            card.appendChild(h1);
    
        }      

    })

}