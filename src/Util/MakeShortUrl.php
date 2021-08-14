<?php

namespace App\Util;

class MakeShortUrl {

        public function shorten($long_url) {
            return substr(md5(base64_encode($long_url)), 0, 7);
        }

}