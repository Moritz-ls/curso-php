<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
const API_URL = "https://www.whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la peticion y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result,true);
curl_close($ch);
?>

<head>
    <link rel="shortcut icon" href="/images/gaelUp.jpeg"/>
    <meta charset="UTF-8">
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>



<main>
    <section>
    <img src="/images/2025-08-16-19:28:50-screenshot.png" width="500px" height="350px" style="border-radius: 16px;">
    <h2>Mexico con "A" de Mujer</h2>
    <img src="<?= $data["poster_url"]; ?>" width="200px" alt="Poster de <?= $data["title"];?>"
    style="border-radius: 16px">
    </section>

    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"];?> dias</h3>
        <p>Fecha de estreno: <?= $data["release_date"];?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"];?></p>
    </hgroup>

</main>

<style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }
</style>