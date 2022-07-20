<?php

namespace Inc;

class Config
{
    public static function get_services()
    {
        $services = array(
            \Inc\Api\Course::class,
            \Inc\Api\Speciality::class,
            \Inc\Api\Subject::class,
            \Inc\Functions::class,
            \Inc\Route\Speciality::class,
            \Inc\Route\Module::class,
            \Inc\Route\Semester::class,

        );
        return $services;
    }
    public function start()
    {
        foreach (self::get_services() as $service) {
            new $service();
        }
    }
}
