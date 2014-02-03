<?php
abstract class IO {
    public static function _GET($key, $default = null) {
        return self::httpArgCheckFallback($_GET, $key, $default);
    }

    public static function _POST($key, $default = null) {
        return self::httpArgCheckFallback($_POST, $key, $default);
    }

    public static function _REQ($key, $default = null) {
        return self::httpArgCheckFallback($_REQUEST, $key, $default);
    }

    private static function httpArgCheckFallback(&$scope, $key, $default = null) {
        if(isset($scope[$key]) || !empty($scope[$key])) {
            return $scope[$key];
        }
        return $default;
    }
}
