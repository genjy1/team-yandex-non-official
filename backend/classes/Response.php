<?php

namespace Classes;

class Response
{

    public static function json($data, $status = 200)
    {
        echo json_encode(['data' => $data, 'status' => $status], JSON_PRETTY_PRINT);
    }

}