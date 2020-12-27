<?php

session_start();

if ($_POST) {
    
    $distancia = $_POST['distancia'];
    $autonomia = $_POST['autonomia'];
    $combustivel = $_POST['combustivel'];

    if (is_numeric($autonomia) && is_numeric($distancia) && ($distancia > 0) && ($autonomia > 0)) {
        $precoGasolina = 4.80;
        $precoAlcool = 3.30;
        $precoDisel = 2.85;

        switch ($combustivel) {
            case "gasolina":
                $resultado = ($distancia / $autonomia) * $precoGasolina;
                $resultado = number_format($resultado,2,',','.');
                $resultado = "<p>O seu gasto será de R$".$resultado." reais.</p>";
                break;
            case "alcool":
                $resultado = ($distancia / $autonomia) * $precoAlcool;
                $resultado = number_format($resultado,2,',','.');
                $resultado = "<p>O seu gasto será de R$".$resultado." reais.</p>";
                break;
            case "disel":
                $resultado = ($distancia / $autonomia) * $precoDisel;
                $resultado = number_format($resultado,2,',','.');
                $resultado = "<p>O seu gasto será de R$".$resultado." reais.</p>";
                break;
            case "flex":
                $resultado1 = ($distancia / $autonomia) * $precoGasolina;
                $resultado2 = ($distancia / $autonomia) * $precoAlcool;
                if ($resultado1 > $resultado2) {
                    $resultado = "<p>O Álcool esta compensando mais</p>";
                } else {
                    $resultado = "<p>A Gasolina esta compensando mais</p>";
                }
                $resultado1 = number_format($resultado1,2,',','.');
                $resultado1 = "<p>Com Gasolina, o seu gasto será de R$".$resultado1." reais.</p>";
        
                $resultado2 = number_format($resultado2,2,',','.');
                $resultado2 = "<p>Com Alcool, o seu gasto será de R$".$resultado2." reais.</p>";
                $resultado.= $resultado1.$resultado2;
                break;
        }   

        $_SESSION['resultado'] = $resultado;
        header('Location: formulario.php');
        

    } else {
        $_SESSION['msg'] = '<p class="warning">Valores informados inválidos, informe os valores.</p>';
        header('Location: formulario.php');
        exit;
    }
    
    
}else {
    $_SESSION['msg'] = '<p class="warning">Informe os valores para o calculo</p>';
    header('Location: formulario.php');
    exit;
}