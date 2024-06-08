<?php

if (!function_exists('generateBreadcrumbs')) {
    function generateBreadcrumbs()
    {
        $segments = request()->segments();
        $breadcrumbs = [];

        if (count($segments) === 0) {
            $breadcrumbs[] = [
                'name' => 'Dashboard',
                'url' => null,
                'active' => true
            ];
        } else {
            $breadcrumbs[] = [
                'name' => 'Dashboard',
                'url' => route('admin'),
                'active' => false
            ];

            $url = '';

            foreach ($segments as $key => $segment) {
                $url .= '/' . $segment;

                if ($key == count($segments) - 1) {
                    $breadcrumbs[] = [
                        'name' => ucwords(str_replace('-', ' ', $segment)),
                        'url' => null,
                        'active' => true
                    ];
                } else {
                    $breadcrumbs[] = [
                        'name' => ucwords(str_replace('-', ' ', $segment)),
                        'url' => url($url),
                        'active' => false
                    ];
                }
            }
        }

        return $breadcrumbs;
    }
}
