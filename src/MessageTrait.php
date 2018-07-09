<?php

namespace Bilyiv\Http\Message;

use Psr\Http\Message\StreamInterface;

/**
 * Trait MessageTrait
 * @package Core\Http\Response
 */
trait MessageTrait
{
    /**
     * @var string
     */
    private $protocolVersion = '1.1';

    /**
     * @var array string[][]
     */
    private $headers;

    /**
     * @var StreamInterface
     */
    private $body;

    /**
     * @inheritdoc
     */
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    /**
     * @inheritdoc
     */
    public function withProtocolVersion($version)
    {
        $new = clone $this;
        $new->protocolVersion = $version;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @inheritdoc
     */
    public function hasHeader($name)
    {
        return isset($this->headers[$name]);
    }

    /**
     * @inheritdoc
     */
    public function getHeader($name)
    {
        return $this->headers[$name] ?? [];
    }

    /**
     * @inheritdoc
     */
    public function getHeaderLine($name)
    {
        return implode(',', $this->getHeader($name));
    }

    /**
     * @inheritdoc
     */
    public function withHeader($name, $value)
    {
        $new = clone $this;
        $new->headers[$name] = $value;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function withAddedHeader($name, $value)
    {
        $new = clone $this;
        $new->headers[$name][] = $value;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function withoutHeader($name)
    {
        $new = clone $this;
        unset($new->headers[$name]);

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @inheritdoc
     */
    public function withBody(StreamInterface $body)
    {
        $new = clone $this;
        $new->body = $body;

        return $new;
    }
}