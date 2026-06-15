<?php

if (! function_exists('format_price')) {
    /**
     * Format a price value to Vietnamese Dong style (e.g., 5.000.000đ).
     *
     * @param  mixed  $value
     * @return string
     */
    function format_price($value)
    {
        if (is_numeric($value)) {
            return number_format((float) $value, 0, ',', '.') . 'đ';
        }

        // If it's not strictly numeric (e.g. "Từ 3.500.000đ"), keep it as is.
        return $value;
    }
}
