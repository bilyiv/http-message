<?php

namespace Bilyiv\Http\Message;

use Psr\Http\Message\{ResponseInterface, StreamInterface};

/**
 * Class Response
 * @package Bilyiv\Http\Message
 */
class Response implements ResponseInterface
{
    use MessageTrait;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $reasonPhrase;

    public function __construct(StreamInterface $body, int $statusCode, array $headers = [])
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * @inheritdoc
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @inheritdoc
     */
    public function withStatus($code, $reasonPhrase = '')
    {
        $new = clone $this;
        $new->statusCode = $code;
        $new->reasonPhrase = $reasonPhrase;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
}