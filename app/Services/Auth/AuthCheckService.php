<?php


namespace App\Services\Auth;


class AuthCheckService
{

    /**
     * @param array $data
     * @return bool
     */
    public function check(array $data): bool
    {
        return \Auth::attempt($data);
    }
}
