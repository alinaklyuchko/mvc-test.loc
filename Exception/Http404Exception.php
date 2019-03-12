<?php
namespace Exception;

use Throwable;

/**
 * Class Http404Exception
 * @package Exception
 */
class Http404Exception extends \Exception
{
    /**
     * Http404Exception constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "404 not found", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}