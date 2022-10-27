window.onload=init;

function init() {

    fetch("bd/gimnasio.json")

    .then(function(response) {

        return response.json();

    })

    .then(function(data) {

        for(let i=0;i<data.reservas.length;i++) {

            var tr=document.createElement('tr');
            document.querySelector(".tabla").appendChild(tr);
    
            var id=document.createElement('td');
            id.className="border border-3 border-white p-3";
            id.appendChild(document.createTextNode(data.reservas[i].id));
            tr.appendChild(id);

            var act=document.createElement('td');
            act.className="border border-3 border-white p-3";
            act.appendChild(document.createTextNode(data.reservas[i].id_act));
            tr.appendChild(act);

            var user=document.createElement('td');
            user.className="border border-3 border-white p-3";
            user.appendChild(document.createTextNode(data.reservas[i].usuario));
            tr.appendChild(user);

            var date=document.createElement('td');
            date.className="border border-3 border-white p-3";
            date.appendChild(document.createTextNode(data.reservas[i].fecha));
            tr.appendChild(date);
    
            var editar=document.createElement('td');
            editar.className="border border-3 border-white p-3";
            var botonEditar=document.createElement('button');
            editar.appendChild(botonEditar);
            botonEditar.className="button mx-auto";
            botonEditar.setAttribute("type", "submit");
            botonEditar.appendChild(document.createTextNode("Editar"));
            tr.appendChild(editar);

        }      

    })

}