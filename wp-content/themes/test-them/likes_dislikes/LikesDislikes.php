<?php
function add_like_js() {
wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'like_post', get_template_directory_uri() . '/assets/js/post-like.js', array( 'jquery' ), '1.0', true );
wp_localize_script( 'like_post', 'ajax_var', array(
'url'   => admin_url( 'admin-ajax.php' ),
'nonce' => wp_create_nonce( 'ajax-nonce' )
) );
}
add_action( 'wp_enqueue_scripts', 'add_like_js' );

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');
function post_like(){
$nonce = $_POST['nonce'];
if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
die ( 'Busted!');
if(isset($_POST['post_like'])){
$ip = $_SERVER['REMOTE_ADDR'];
$post_id = $_POST['post_id'];
$meta_IP = get_post_meta($post_id, "voted_IP");
$voted_IP = $meta_IP[0] ?? 0;
if(!is_array($voted_IP))
$voted_IP = array();
$meta_count_like = get_post_meta($post_id, "like", true);
if(!hasAlreadyVoted($post_id)){
$voted_IP[$ip] = time();
update_post_meta($post_id, "voted_IP", $voted_IP);
update_post_meta($post_id, "like", ++$meta_count_like);
echo $meta_count_like;}
else
echo "already";}
if(isset($_POST['post_dislike'])){
$ip = $_SERVER['REMOTE_ADDR'];
$post_id = $_POST['post_id'];
$meta_IP = get_post_meta($post_id, "voted_IP");
$voted_IP = $meta_IP[0];
if(!is_array($voted_IP))
$voted_IP = array();
$meta_count_dislike = get_post_meta($post_id, "dislike", true);
if(!hasAlreadyVoted($post_id)){
$voted_IP[$ip] = time();
update_post_meta($post_id, "voted_IP", $voted_IP);
update_post_meta($post_id, "dislike", ++$meta_count_dislike);
echo $meta_count_dislike;}
else
echo "already";}
exit;}

function hasAlreadyVoted($post_id){
global $timebeforeevote;
$timebeforerevote = 1; //like/dislike blocking time
$meta_IP = get_post_meta($post_id, "voted_IP");
$voted_IP = $meta_IP[0];
if(!is_array($voted_IP))
$voted_IP = array();
$ip = $_SERVER['REMOTE_ADDR'];
if(in_array($ip, array_keys($voted_IP))){
$time = $voted_IP[$ip];
$now = time();
if(round(($now - $time) / 60) > $timebeforerevote)
return false;
return true;}
return false;}

function getPostLikeLink($post_id){
$meta_count_like = get_post_meta($post_id, "like", true);
$meta_count_dislike = get_post_meta($post_id, "dislike", true);
$output = '';
if(hasAlreadyVoted($post_id)){
$output .= '<div class="svg_bottom_ico like"><div class="like_ico is-active-like">Like </div></div>';
$output .= '<span class="likecount"> '.$meta_count_like.'</span>';
$output .= '<div class="svg_bottom_ico dislike"><div class="dislike_ico is-active">Dislike </div></div>';
$output .= '<span class="dislikecount"> '.$meta_count_dislike.'</span>';
}else{
$output .= '<div class="svg_bottom_ico like"><div class="like_ico noactive_svg" data-post_id="'.$post_id.'">Like </div></div>';
$output .= '<span class="likecount"> '.$meta_count_like.'</span>';
$output .= '<div class="svg_bottom_ico dislike"><div class="dislike_ico noactive_svg" data-post_id="'.$post_id.'">Dislike </div></div>';
$output .= '<span class="dislikecount"> '.$meta_count_dislike.'</span>';
}
return $output;
}