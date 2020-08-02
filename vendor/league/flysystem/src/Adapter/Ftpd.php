<?php

namespace League\Flysystem\Adapter;

class Ftpd extends Ftp
{
    /**
     * @inheritdoc
     */
    public function getMetadata($path)
    {
        if ($path === '') {
            return ['type' => 'dir', 'path' => ''];
        }
<<<<<<< HEAD
=======
        if (@ftp_chdir($this->getConnection(), $path) === true) {
            $this->setConnectionRoot();

            return ['type' => 'dir', 'path' => $path];
        }
>>>>>>> 26a57853ee839924b2db0120fcb2ed8c185674ed

        if ( ! ($object = ftp_raw($this->getConnection(), 'STAT ' . $path)) || count($object) < 3) {
            return false;
        }

        if (substr($object[1], 0, 5) === "ftpd:") {
            return false;
        }

        return $this->normalizeObject($object[1], '');
    }

    /**
     * @inheritdoc
     */
    protected function listDirectoryContents($directory, $recursive = true)
    {
        $listing = ftp_rawlist($this->getConnection(), $directory, $recursive);

        if ($listing === false || ( ! empty($listing) && substr($listing[0], 0, 5) === "ftpd:")) {
            return [];
        }

        return $this->normalizeListing($listing, $directory);
    }
}
