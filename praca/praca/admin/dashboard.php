<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] !== true){
    die("Dostęp zabroniony!!!");
}
?>
<!doctype html>
<html lang="pl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Dashboard</title>
    <style>
    tr:hover{
        background-color:#fdf;
    }
        .client{
            cursor:pointer;
        }
    </style>
</head>

<body>
    <div class="col-12">
        <h1 class="text-center font-weight-bold p-5">Wypożyczenia</h1>
        <div class="text-center">
            <a href="../index.php" class="m-2 text-success">POWRÓT</a> | <a href="./authors.php" class="m-2">AUTORZY</a> | <a href="./books.php" class="m-2">KSIĄŻKI</a> | <a href="../logout.php" class="m-2 text-danger">WYLOGUJ</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">
                        </th>
                        <th scope="col">Książka</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Wypożyczył</th>
                        <th scope="col">Zwrot do</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <script>
                fetch('../controllers/getAllReservationsController.php')
                        .then(
                            function(response) {
                            if (response.status !== 200) {
                                console.log('Looks like there was a problem. Status Code: ' +
                                response.status);
                                return;
                            }

                            // Examine the text in the response
                            response.json().then(function(data) {
                                const current = currentDate();
                                data.forEach(el => {
                                    if(current > Date.parse(el.reserved_to)){
                                        var content = '<tr class="text-danger font-weight-bold">';
                                    } else {
                                        var content = '<tr class="font-weight-bold">';
                                    }
                                    content += `
                                    <td></td>
                                    <td>`+el.title+`</td>
                                    <td>`+el.name+' '+el.surname+`</td>
                                    <td><span  onclick="getUserPhone('`+el.phone_number+`',this)" class="client">`+el.client_name+' '+el.client_surname+`</span></td>
                                    <td>`+el.reserved_to.slice(0,-3)+`</td>
                                    <td> <button class="btn btn-info" value="`+el.id+`" id="`+el.id_book+`" onclick="unsetReservation(this)">ODDANE</button></td>
                                    </tr>
                                    `
                                document.querySelector('tbody').innerHTML += content;
                            });

                                })

                            }
                        )
                        .catch(function(err) {
                            console.log('Fetch Error :-S', err);
                        });
                        </script>
                </tbody>
            </table>


        </div>
    </div>
    <script>
        function unsetReservation(current){
            const formData = new FormData();
            formData.append('id_book', current.id);
            formData.append('id_reservation', current.value);
            try {
                const response = fetch('../controllers/unsetReservationController.php', {
                    method: 'POST',
                    body: formData
                });
               location.reload();
            } catch (error) {
                console.error('Error:', error);
            }
        }
        function currentDate(){
            var d = new Date();
            var currentDate = d.getFullYear()+'-'+(addZeroIfNeeded(d.getMonth()+1))+'-'+addZeroIfNeeded(+d.getDate())+' '+addZeroIfNeeded(d.getHours())+':'+addZeroIfNeeded(d.getMinutes());
            return Date.parse(currentDate);
        }
        function addZeroIfNeeded(param){
            if(param < 10){
                return '0'+param;
            }
            else return param;
        }
        function getUserPhone(phoneNumber,element){
            alert(element.innerHTML +"\nTel: "+phoneNumber);
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>