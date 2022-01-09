<?php

class TokenGenerator
{
    public function generate()
    {
        return strtoupper(bin2hex(openssl_random_pseudo_bytes(32)));
    }
}
