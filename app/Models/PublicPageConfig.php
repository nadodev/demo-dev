<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublicPageConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'key',
        'value',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public static function getConfig($section, $key, $default = null)
    {
        $config = static::where('section', $section)
                        ->where('key', $key)
                        ->first();

        if ($config) {
            return $config->data ?: $config->value;
        }

        return $default;
    }

    public static function setConfig($section, $key, $value)
    {
        return static::updateOrCreate(
            ['section' => $section, 'key' => $key],
            [
                'value' => is_string($value) || is_numeric($value) || is_bool($value) ? $value : null, 
                'data' => is_array($value) ? $value : null
            ]
        );
    }

    public static function getSectionConfigs($section)
    {
        $configs = static::where('section', $section)->get();
        $result = [];

        
        foreach ($configs as $config) {
            $value = $config->data ?: $config->value;
            
            // Convert numeric values to appropriate types
            if ($value === '1' || $value === 1) {
                $value = true;
            } elseif ($value === '0' || $value === 0) {
                $value = false;
            } elseif (is_numeric($value) && !is_bool($value)) {
                $value = (int) $value;
            }
            
            $result[$config->key] = $value;
        }
        
        return $result;
    }

    public static function setSectionConfigs($section, array $configs)
    {
        foreach ($configs as $key => $value) {
            static::setConfig($section, $key, $value);
        }
    }
}
