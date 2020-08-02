<?php

namespace League\Flysystem;

use LogicException;

/**
 * Thrown when the MountManager cannot find a filesystem.
 */
<<<<<<< HEAD
class FilesystemNotFoundException extends LogicException
=======
class FilesystemNotFoundException extends LogicException implements FilesystemException
>>>>>>> 26a57853ee839924b2db0120fcb2ed8c185674ed
{
}
