<?php
    function time_ago($timestamp) {
        $current_time = time();
        
        // Tính khoảng thời gian từ timestamp đến hiện tại
        $time_diff = $current_time - strtotime($timestamp);
        
        // Chuyển đổi thời gian thành int (giây)
        $time_diff_in_seconds = intval($time_diff);
        
        $time_ago_str = '';
        if ($time_diff_in_seconds < 60) {
            $time_ago_str = "1 minute ago";
        } elseif ($time_diff_in_seconds < 3600) {
            $minutes_ago = round($time_diff_in_seconds / 60);
            $time_ago_str = $minutes_ago . " minutes ago";
        } elseif ($time_diff_in_seconds < 86400) {
            $hours_ago = round($time_diff_in_seconds / 3600);
            $time_ago_str = $hours_ago . " hours ago";
        } else {
            $days_ago = round($time_diff_in_seconds / 86400);
            $time_ago_str = $days_ago . " days ago";
        }

        return $time_ago_str;
    }
?>