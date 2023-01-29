<?php

require 'vendor/autoload.php';

use TimeTreeWebApi\OauthApp\OauthClient;
use TimeTreeWebApi\OauthApp\Parameter\CreateEventParams;
use TimeTreeWebApi\OauthApp\Parameter\LabelsParams;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$instance = new OauthClient(
    $_ENV['ACCESS_TOKEN'],
);

if (isset($_POST['createEvent'])) {
    $event = $instance->createEvent(new CreateEventParams(
        $_ENV['Calendar_ID'],
        'test Event',
        'schedule',
        true,
        new LabelsParams(1),
        new DateTime("2023-01-30"),
        null,
        new DateTime("2023-01-30"),
    ));
}

?>

<html lang="ja">
    <body>
        <form action="index.php" method="post">
            <button type="submit" name="createEvent">
                予定作成
            </button>
        </form>
    </body>
</html>
