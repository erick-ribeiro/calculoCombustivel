<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css\style.css'>
    <script src='main.js'></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="row center">
                <div class="col s12 m12 l8 offset-l2">
                    <h1>Calculadora de Combustível</h1>
                </div>        
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row center">
                <div class="col s12 m12 l8 offset-l2">
                    <form action="calculo.php" method="POST">

                        <div class="input-field col s12">
                            <input type="number" name="distancia" id="distancia" class="validate" />
                            <label for="distancia">Distância em quilômetros a ser percorrida</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="number" name="autonomia" id="autonomia" class="validate"/>
                            <label for="autonomia">Consumo de combustível do veículo (Km/l)</label>
                        </div>
                        
                        <div class="input-field col s12">
                            <select name="combustivel" id="combustivel">
                                <option value="" disabled selected>Selecione o combustível do seu carro:</option>
                                <option value="flex">Flex</option>
                                <option value="gasolina">Gasolina</option>
                                <option value="alcool">Álcool</option>
                                <option value="disel">Disel</option>
                            </select>
                        </div>
                        
                        <?php
                            if(isset($_SESSION['msg'])){
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            if(isset($_SESSION['resultado'])){
                                echo $_SESSION['resultado'];
                                unset($_SESSION['resultado']);
                            }
                        ?>

                        <button class="waves-effect waves-light btn-large col s12" type="submit">Calcular</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Compiled and minified JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>

