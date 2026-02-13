<?php

namespace Noor\Movies;

use Backend\Facades\Backend;
use Noor\Movies\Components\MovieDetails;
use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register() {}

    /**
     * boot method, called right before the request route.
     */
    public function boot() {}

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        // id , name , dec , date
        return [
            MovieDetails::class => 'movieDetails'
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings() {}

    // when you register new item to the blugin you can add it by this method or from plugin.yaml / CMS use plugin.yaml
    // public function registerNavigation()
    // {
    //     return [
    //         'movies' => [
    //             'label'       => 'Movies',
    //             'url'         => Backend::url('noor/movies/movies'),
    //             'icon'        => 'icon-film',
    //             'order'       => 500,

    //             'sideMenu' => [
    //                 'movies' => [
    //                     'label' => 'All Movies',
    //                     'icon'  => 'icon-film',
    //                     'url'   => Backend::url('noor/movies/movies'),
    //                 ],
    //                 'genres' => [
    //                     'label' => 'Genres',
    //                     'icon'  => 'icon-tags',
    //                     'url'   => Backend::url('noor/movies/genres'),
    //                 ],
    //             ]
    //         ]
    //     ];
    // }
}
