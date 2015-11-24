<?php
require_once('../../../wp-load.php');
?>

<?php
$action = strval($_REQUEST['action']);
$item = intval($_REQUEST['psot_load']);
//echo $item;
$counter = intval($_REQUEST['counter_val']);
//echo $counter;
?>


<?php
$lookbook_args = array(
    'posts_per_page' => $item,
    'paged' => $item,
    'offset' => $item * $counter
    
);
$lookbook_array = get_posts($lookbook_args);
foreach ($lookbook_array as $lookbook_single) {
    ?>
<li>
<?php
//    echo "<pre>";
//    print_r($lookbook_single);
//    echo "</pre>";
    echo $lookbook_single->ID;
    ?>
</li>
<?php
}
?>


