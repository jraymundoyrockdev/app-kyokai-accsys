<?php namespace KyokaiAccSys\Services;

class KyokaiErrorResponseValueSetter
{

    public function set($errors, $payload)
    {
        $result = [];

        foreach ($errors as $key => $value) {
            $result[$key . 'ErrorClass'] = ' error';
            $result[$key . 'Error'] = reset($value);
        }

        unset($payload['_token']);

        foreach ($payload as $key => $value) {
            $result[$key] = $payload[$key];
        }

        return $result;
    }
}