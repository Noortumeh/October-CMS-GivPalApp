<?php

namespace Noor\Content;

use Backend;
use System\Classes\{PluginBase, SettingsManager};

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/4.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Content',
            'description' => 'No description provided yet...',
            'author' => 'Noor',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
         $this->app->register(\Noor\Content\Providers\ContentServiceProvider::class);
         $this->app['router']->aliasMiddleware(
        'setLocale',
        \Noor\Content\Middleware\SetLocale::class
    );
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Noor\Content\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'noor.content.some_permission' => [
                'tab' => 'Content',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'content' => [
                'label' => 'Content',
                'url' => Backend::url('noor/content/sections'),
                'icon' => 'icon-list',
                'permissions' => ['noor.content.*'],
                'order' => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'locales' => [
                'label'       => 'Locales',
                'description' => 'Manage available languages',
                'icon'        => 'icon-language',
                'url'         => Backend::url('rainlab/translate/locales'),
                'category'    => SettingsManager::CATEGORY_CMS,
                'order'       => 550,
                'permissions' => ['rainlab.translate.manage_locales'],
            ]
        ];
    }
}
