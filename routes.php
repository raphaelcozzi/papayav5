<?php
$klein = new \Klein\Klein();



// Rota de exemplo
$klein->respond('GET', BASE_URL.'teste', function () {
    return 'Retorno da Rota...';
});


$klein->dispatch();


