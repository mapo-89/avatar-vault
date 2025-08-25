<?php

return [
    App\Domains\Auth\Providers\AuthDomainServiceProvider::class,
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
    SocialiteProviders\Manager\ServiceProvider::class,
];
