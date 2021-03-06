<?php declare(strict_types=1);

namespace PeeHaa\AsyncTwitter\Api\Request\DirectMessage;

use PeeHaa\AsyncTwitter\Api\Request\BaseRequest;

class Show extends BaseRequest
{
    const METHOD   = 'GET';

    const ENDPOINT = '/direct_messages/show.json';

    public function __construct(int $id)
    {
        parent::__construct(self::METHOD, self::ENDPOINT);

        $this->parameters['id'] = (string) $id;
    }
}
