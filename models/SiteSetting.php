<?php

Class SiteSetting extends Model {

    protected $table = 'site_settings';


    public static function getSiteSettingsLatest(){
        $instance = new self;
        $site_settings = $instance->setQuery("
            SELECT *  FROM `site_settings` 
            ORDER BY `created_at` DESC;
        ")->getFirst();
    
        return $site_settings;
    }
    

}