<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Uuid\Fields;

use function base64_decode;
<<<<<<< HEAD
use function base64_encode;
=======
use function strlen;
>>>>>>> 26a57853ee839924b2db0120fcb2ed8c185674ed

/**
 * Provides common serialization functionality to fields
 *
 * @psalm-immutable
 */
trait SerializableFieldsTrait
{
    /**
     * @param string $bytes The bytes that comprise the fields
     */
    abstract public function __construct(string $bytes);

    /**
     * Returns the bytes that comprise the fields
     */
    abstract public function getBytes(): string;

    /**
     * Returns a string representation of object
     */
    public function serialize(): string
    {
<<<<<<< HEAD
        return base64_encode($this->getBytes());
=======
        return $this->getBytes();
>>>>>>> 26a57853ee839924b2db0120fcb2ed8c185674ed
    }

    /**
     * Constructs the object from a serialized string representation
     *
     * @param string $serialized The serialized string representation of the object
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    public function unserialize($serialized): void
    {
<<<<<<< HEAD
        $this->__construct(base64_decode($serialized));
=======
        if (strlen($serialized) === 16) {
            $this->__construct($serialized);
        } else {
            $this->__construct(base64_decode($serialized));
        }
>>>>>>> 26a57853ee839924b2db0120fcb2ed8c185674ed
    }
}
