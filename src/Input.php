<?php

namespace MirakmalSulton\DynamicInput;

use InvalidArgumentException;

class Input
{
    public static function render($params)
    {
        if (!isset($params['structure']) || !is_array($params['structure'])) {
            throw new InvalidArgumentException('Structure not found');
        }

        if (!isset($params['structure']['name']) || empty($params['structure']['name'])) {
            throw new InvalidArgumentException('Structure name not found');
        }

        if (!isset($params['structure']['cols']) || !is_array($params['structure']['cols'])) {
            throw new InvalidArgumentException('Structure cols not found');
        }

        $structure = $params['structure'];
        $name = $structure['name'];

        $data = $params['data'] ?? [];
        $start = count($data);

        ob_start();

        include 'view.php';

        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
