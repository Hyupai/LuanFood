console.log("main.js loaded");

function CancelarEntrega(entrega_id) {

        axios.post(

            "requests.php", {
            request: "CancelarEntrega",
                informations: entrega_id,
        },
            this.config
        )

        .then(function (response) {

           

            console.log(response.data);

            if (response.data[0] == "Success") {
                ExibirModal('#CancelarEntrega_modal');
            } else {
                alert(response.data[1]);
            }

        })
        .catch(function (error) {
            alert(error);

        });

}


function AtribuirEntregador(entrega_id) {

    var entregador_id = document.getElementById('AtribuirEntregador_select').value;
        axios.post(

            "requests.php", {
            request: "AtribuirEntregador_submit",
            informations: [entrega_id, entregador_id],
        },
            this.config
        )

        .then(function (response) {



            console.log(response.data);

            if (response.data[0] == "Success") {
                ExibirModal('#EntregadorAtribuido_modal');
            } else {
                alert(response.data[1]);
            }

        })
        .catch(function (error) {
            alert(error);

        });

}

function AbrirAtribuirEntregador(entrega_id) {

    FecharModal('#OutrasAcoes_modal');

    axios.post(

        "requests.php", {
        request: "AtribuirEntregador_get",
        informations: entrega_id,
    },
        this.config
    )

        .then(function (response) {



            console.log(response.data);

            if (response.data[0] == "Success") {
                document.getElementById('AtribuirEntregador_body').innerHTML = response.data[1];
                ExibirModal('#AtribuirEntregador_modal');
            } else {
                alert(response.data[1]);
            }

        })
        .catch(function (error) {
            alert(error);

        });

}


function AbrirOutrasAcoes(entrega_id) {

    var modal_body = ' <div class="row" style="display: flex; justify - content: center; flex - direction: column; "><br> <button style="margin-bottom: 6px; width:200px; margin: auto;" class="btn-warning" onclick="AbrirAtribuirEntregador(\''+entrega_id+'\');">Atribuir Entregador</button><br><br><button style="margin-bottom: 6px; width:200px; margin: auto;" class="btn-success" onclick="EditarEntrega(\''+entrega_id+'\');">Editar Entrega</button></div>';
    document.getElementById('OutrasAcoes_body').innerHTML = modal_body;
    ExibirModal('#OutrasAcoes_modal');
}

function EditarEntrega(entrega_id) {

    window.location.href = 'editar_entrega.php?id=' + entrega_id;

}

