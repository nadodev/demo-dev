<?php

/**
 * Helper functions for the application
 */

if (!function_exists('formatCurrency')) {
    /**
     * Format a number as currency
     *
     * @param float $amount
     * @param string $currency
     * @return string
     */
    function formatCurrency($amount, $currency = 'BRL')
    {
        return 'R$ ' . number_format($amount, 2, ',', '.');
    }
}

if (!function_exists('formatDate')) {
    /**
     * Format a date in Brazilian format
     *
     * @param string|DateTime $date
     * @param string $format
     * @return string
     */
    function formatDate($date, $format = 'd/m/Y')
    {
        if (is_string($date)) {
            $date = new DateTime($date);
        }
        
        return $date->format($format);
    }
}

if (!function_exists('formatDateTime')) {
    /**
     * Format a datetime in Brazilian format
     *
     * @param string|DateTime $datetime
     * @param string $format
     * @return string
     */
    function formatDateTime($datetime, $format = 'd/m/Y H:i')
    {
        if (is_string($datetime)) {
            $datetime = new DateTime($datetime);
        }
        
        return $datetime->format($format);
    }
}

if (!function_exists('slugify')) {
    /**
     * Convert a string to a URL-friendly slug
     *
     * @param string $text
     * @return string
     */
    function slugify($text)
    {
        // Remove accents
        $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        
        // Convert to lowercase
        $text = strtolower($text);
        
        // Replace spaces and special characters with hyphens
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        
        // Remove leading and trailing hyphens
        $text = trim($text, '-');
        
        return $text;
    }
}

if (!function_exists('truncateText')) {
    /**
     * Truncate text to a specified length
     *
     * @param string $text
     * @param int $length
     * @param string $suffix
     * @return string
     */
    function truncateText($text, $length = 100, $suffix = '...')
    {
        if (strlen($text) <= $length) {
            return $text;
        }
        
        return substr($text, 0, $length) . $suffix;
    }
}

if (!function_exists('generateRandomString')) {
    /**
     * Generate a random string
     *
     * @param int $length
     * @return string
     */
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomString;
    }
}

if (!function_exists('getStatusBadgeClass')) {
    /**
     * Get CSS class for status badge
     *
     * @param string $status
     * @return string
     */
    function getStatusBadgeClass($status)
    {
        switch ($status) {
            case 'active':
            case 'published':
                return 'bg-green-100 text-green-800';
            case 'inactive':
            case 'draft':
                return 'bg-gray-100 text-gray-800';
            case 'pending':
                return 'bg-yellow-100 text-yellow-800';
            case 'rejected':
                return 'bg-red-100 text-red-800';
            default:
                return 'bg-gray-100 text-gray-800';
        }
    }
}

if (!function_exists('getStatusText')) {
    /**
     * Get translated status text
     *
     * @param string $status
     * @return string
     */
    function getStatusText($status)
    {
        switch ($status) {
            case 'active':
                return 'Ativo';
            case 'inactive':
                return 'Inativo';
            case 'published':
                return 'Publicado';
            case 'draft':
                return 'Rascunho';
            case 'pending':
                return 'Pendente';
            case 'rejected':
                return 'Rejeitado';
            default:
                return ucfirst($status);
        }
    }
}
