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