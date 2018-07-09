<?php

namespace Bilyiv\Http\Message;

use Psr\Http\Message\{RequestInterface, UriInterface};

/**
 * Class Request
 * @package Bilyiv\Http\Message
 */
class Request implements RequestInterface
{
    use MessageTrait;

    /**
     * @var string
     */
    protected $requestTarget;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var UriInterface
     */
    protected $uri;

    /**
     * @inheritdoc
     */
    public function getRequestTarget()
    {
        return $this->requestTarget;
    }

    /**
     * @inheritdoc
     */
    public function withRequestTarget($requestTarget)
    {
        $new = clone $this;
        $new->requestTarget = $requestTarget;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
       return $this->method;
    }

    /**
     * @inheritdoc
     */
    public function withMethod($method)
    {
        $new = clone $this;
        $new->method = $method;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @inheritdoc
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        $new = clone $this;
        $new->uri = $uri;

        if (!$preserveHost || !$this->hasHeader('Host')) {
            $new = $new->withHeader('Host', $this->uri->getHost());
        }

        return $new;
    }
}