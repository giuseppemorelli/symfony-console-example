<?php
namespace GM\Console\System;

use Symfony\Component\Filesystem\Filesystem;

class Helper
{
    /**
     * Controlla se un file o cartella esiste
     *
     * @param string $_absolute_path
     *
     * @return bool
     */
    static public function checkFileExists($_absolute_path)
    {
        $fs = new Filesystem();
        if($fs->exists($_absolute_path)) {
            return true;
        }

        return false;
    }

    /**
     * Controlla se una cartella esiste, altrimenti la crea
     *
     * @param $_absolute_path
     *
     * @return bool
     */
    static public function checkFolderExists($_absolute_path)
    {
        $fs = new Filesystem();
        if($fs->exists($_absolute_path)) {
            return true;
        } else {
            $fs->mkdir($_absolute_path);
        }
    }
}