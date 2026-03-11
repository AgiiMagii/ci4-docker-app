<?php

if (!function_exists('upload')) {
    /**
     * Augšupielādē failu no POST un atgriež ceļu attiecībā uz public folder
     *
     * @param string $fieldName Name atribūts input laukam
     * @param string $uploadPath Path attiecībā uz public folder
     * @return string Ceļš uz failu vai false, ja neizdevās
     * @throws \RuntimeException ja mape nav rakstāma vai neizdevās izveidot
     */
    function upload(string $fieldName, string $uploadPath = 'images')
    {
        $file = \Config\Services::request()->getFile($fieldName);

        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return false; // nav fails vai nav derīgs
        }

        $newName = $file->getRandomName();

        // Absolūtais ceļš uz public folder
        $destinationPath = ROOTPATH . 'public/' . $uploadPath;

        // Ja mape neeksistē, izveidojam to
        if (!is_dir($destinationPath)) {
            if (!mkdir($destinationPath, 0755, true)) {
                throw new \RuntimeException("Neizdevās izveidot mapi: $destinationPath");
            }
        }

        // Pārbaudām, vai mape ir rakstāma
        if (!is_writable($destinationPath)) {
            throw new \RuntimeException("Mape nav rakstāma: $destinationPath. PHP process nevar saglabāt failus.");
        }

        // Pārvietojam failu uz public/images
        $file->move($destinationPath, $newName);

        // Atgriežam ceļu, ko var izmantot HTML
        return $uploadPath . '/' . $newName;
    }
}
