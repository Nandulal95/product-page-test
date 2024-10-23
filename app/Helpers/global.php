<?php

function responseSuccess($message, $data = [], $statusCode = 200)
{
    response()->json(['status' => true, 'message' => $message, "data" => $data]);
}

function responseError($message, $data = [], $statusCode = 400)
{
    response()->json(['status' => false, 'message' => $message, "data" => $data]);
}
