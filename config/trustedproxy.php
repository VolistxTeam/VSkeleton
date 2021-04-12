<?php

return [
    'proxies' => [
        // Local Proxy
        '127.0.0.1',

        // StackPath Proxies
        '69.16.133.0/24',
        '69.16.176.0/20',
        '74.209.134.0/24',
        '81.171.60.0/24',
        '81.171.61.0/24',
        '81.171.68.64/26',
        '81.171.105.0/24',
        '81.171.106.64/26',
        '81.171.112.0/24',
        '94.46.144.0/20',
        '103.66.28.0/22',
        '103.228.104.0/24',
        '146.88.130.128/25',
        '151.139.0.0/17',
        '173.245.194.0/24',
        '173.245.208.64/26',
        '173.245.210.64/26',
        '173.245.216.64/26',
        '173.245.218.64/26',
        '205.185.216.0/22',
        '209.197.7.0/24',
        '209.197.8.0/21',
        '209.197.21.0/24',
        '209.197.24.0/21',
        '209.234.242.0/25',
        '184.179.88.128/25',
        '184.179.90.128/25',

        // CloudFlare Proxies
        '103.21.244.0/22',
        '103.22.200.0/22',
        '103.31.4.0/22',
        '104.16.0.0/12',
        '108.162.192.0/18',
        '131.0.72.0/22',
        '141.101.64.0/18',
        '162.158.0.0/15',
        '172.64.0.0/13',
        '173.245.48.0/20',
        '188.114.96.0/20',
        '190.93.240.0/20',
        '197.234.240.0/22',
        '198.41.128.0/17'
    ],

    'headers' => Illuminate\Http\Request::HEADER_X_FORWARDED_FOR | Illuminate\Http\Request::HEADER_X_FORWARDED_HOST | Illuminate\Http\Request::HEADER_X_FORWARDED_PORT | Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO,
];
