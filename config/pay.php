<?php

return [
    'alipay' => [
        'app_id'         => '2016092300579048',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAz3GApHENyN5OpprphKGBV77GCz/CZjhvqu2qUCB76IbX1rDXl6EHYo3M9gk9/VFOl/1tlfgJui+ZVH5nfGoP/S7fblMH7pXm0RYM1tABiorHkcURLpkwZ9dl4FyUTfXApfzmFxT9Gq5kTzyeCtoi2S4JR0z9LDYcAC8SanbwJJC/lJzWqWtKoQhvyMoTgSbC2tCkcpHvpCMY0ULMvN8UgsrxWEfGRHQkSAhcDaWQTpQj3DQiNquRuL+SP94m/aE/YMUrWCXIL3xnGIPaJ+QGeGs0ncCtA93IpoIGtOXtilRqcYIGivOKp/na9ZS0c7JgX2n9Ed1o8H1q28PTZqFwXwIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEA29FkEe+39GQCccvi/mnYjE4LEGmPjRy1kBm/IOYwcd1SYPBroV3ZhTSpqpcnnj+PkvZCsb6uiZ5WwloYfsprL7RgkysH+SzdNWNyRrRUqao4/r8yGh4oYFHYtZRXA1dVl4z20RMMuQPRKhsCZ5Ie+wR74gRt5+8yyO0RdzjPLuj5mxSV5V4zpTXOhlF2dScb50Klf8ZSz7r7Gznfx/O0y9+mRPSmgTU05rYjN9B5+rO6ePAXey2ek/xNI1V65OGnVwRPczJvYy7mY6DMarh+eoq8P6Ivzz9vn64C+E5vqrLx74OBiXvNv9nTkJSRhfrm2T6FlKnxkuu3NGl63aD+HQIDAQABAoIBAGN0teY3o+97YG/EZAvgMA4rMW5XlI+wMaXlQEjOXZTnImKh5NC5+bT/QtTgVxiOgZNowHxTXfz+GxsMUJDtXNnUru1nRtBCsEN7nzTGWpf5YJhCQZT3mCUcYwSk/UmRtjQ/n1yxVcxQIc7/MXNS9Zl1SefVQTTzUPL/8CsVFQiPodMEkrgTLkldxtQOITG7v5bE+meAa97rhlDzDlBw42Gl7akbUyzfRVPy92VExscUI7GgzO4EtUy6AxlBhf/Q/gqVfcnHfT5TWCa1dLwfyK0RI7aozMP5AZxRLyXRKsIE3ajCsEN3nUmq8aR9Z+sN4hbID42YN2IEvUVBYAZkQYECgYEA78qchgJ2dg5avj6Yc30eyOXNe30zs++MTPgCN7XDcug1EOvPTOnJ7V2mCT6Jr7QisT4uF5oOIyl2fwVoPt3mTqJHZfsyrjG1P4CJQlwmYxR+uPJ4+t3gjM08VfE/ierSS8qmY/fYbf+ra8wdYRt49sujRCIKdZL5EMVeaxdu67kCgYEA6q0nlUAzEr7GwYbpWSqvhq5mEAlRJlLOQDZErqMH2q4XyR93OjukLB9IbpRvm90BdF9/ZWKB6OBS51U+oyslxc1mMa976Z3oGsPk2SkWm1bnx7KVKjI1xug+z+GEYH1418FVfe855qEQb5O2PpsDHoezKuH/NDgQfltwi7fuP4UCgYA1wKJzu+uYLUGUMe30vZCAEluMmhVT+ZfmzRWaLWmhwYHbyDCRGjtEtWB55AXzWBsKxliIu+T9ZtcERE8JAK8W43PD3ZqPx97MXGDoekW0oiyCAwCxo7kpdvxWe5z1qqj3inbgI/flOJHRuVDAqurjz+RKaqMTlh2077lpojggKQKBgQDgaetTV4w/nb4VbP0SrrYhlf610SMQAdmIIB0332FwZlEKnJN4VXZeVx/91uaP5x0v+u6ptjTCzFmbLLJ0eJtrd0sFsmlNcxp1FeVvIVKkA8wr9IOeUVuJtafzRRZA61u2/wPRJQZ6nIVKHbgGUFgARwY3uNxCRGbJXonWonIrvQKBgF/hE+Yexb0s+Ff/La6b29ADCYjMSK759LifCTx9nLI8FsldfgMqxdiyOH01wkE+X+/QAiDolTEgKkc1a+sYu56VqtIks8xuVirALCHdMeTGZKjDwYopEE5WkOrJjre3u3ivEK/r2Dzef4x46Z/DNnz0u+QoMLMJmjM3o/cuItd2',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];