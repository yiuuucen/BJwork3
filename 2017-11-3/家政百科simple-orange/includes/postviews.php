<?php
/*
    统计文章浏览次数
*/
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='' || !$count)
    {
        // delete_post_meta($postID, $count_key);
        // add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='' || !$count)
    {
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
    }
    else
    {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function count_view()
{
    global $wpdb;
    $count=0;
    $views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='post_views_count'");  //所有阅读次数
    foreach($views as $key=>$value)
    {
        $meta_value=$value->meta_value;
        if($meta_value!='')
        {
            $count+=(int)$meta_value;
        }
    }
    return $count;
}
?>