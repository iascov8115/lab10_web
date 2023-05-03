<?php
namespace Services;
class Request {
    public $parameters;

    public function __construct(array $get = [],array $post = [],array $server = []) {
        $this->parameters = array_merge($get, $post, $server);
    }
}
