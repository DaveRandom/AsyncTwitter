<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Examples;

use Amp\Artax\Client;
use PeeHaa\AsyncTwitter\Api\Request\Status\HomeTimeline;
use PeeHaa\AsyncTwitter\Credentials\AccessToken;
use PeeHaa\AsyncTwitter\Credentials\Application;
use PeeHaa\AsyncTwitter\Http\Artax;
use PeeHaa\AsyncTwitter\Api\Client\Client as ApiClient;

require_once __DIR__ . '/../vendor/autoload.php';

$applicationCredentials = new Application(
    'consumerkey',
    'consumersecret'
);

$accessToken = new AccessToken(
    'accesstoken',
    'tokensecret'
);

$httpClient = new Artax(new Client());
$apiClient  = new ApiClient($httpClient, $applicationCredentials, $accessToken);

$request = (new HomeTimeline())
    ->amount(10)
    ->minimumId(12345)
    ->maximumId(780075575276863488)
    ->excludeReplies()
    ->includeContributorDetails()
    ->excludeEntities()
    ->trimUser()
;

\Amp\wait($result = $apiClient->request($request));
