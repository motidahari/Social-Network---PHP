<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

require_once dirname(__FILE__) . '/../core/User.class.php'; 
$users = new User();
/*
require_once dirname(__FILE__) . '/../core/Post.class.php'; 
$post = new Post();

require_once dirname(__FILE__) . '/../core/likes.class.php'; 
$likes = new Likes();

require_once dirname(__FILE__) . '/../core/Login.class.php'; 
$login = new Login();

require_once dirname(__FILE__) . '/../core/Friends.class.php'; 
$friends = new Friends();

require_once dirname(__FILE__) . '/../core/Blocks.class.php'; 
$blocks = new Blocks();

require_once dirname(__FILE__) . '/../core/Request.class.php'; 
$request = new Request();

require_once dirname(__FILE__) . '/../core/Comments.class.php'; 
$comments = new Comments();

*/
 //users
 
$app->post( '/users/', function( ) use ( $users , $app) {
	$new_user = json_decode( $app->request->getBody() , true );
	$success = $users->addUser( $new_user );
	 var_dump($success);
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});
$app->get( '/users/', function() use ( $users ) {
	echo json_encode( $users->getAllUsers() );
});	

$app->delete('/users/:id', function($id) use ( $app, $users ) {
	$success = $users->deleteUser( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});
$app->get('/users/:id', function( $id ) use ( $app, $users ) {
	echo json_encode( $users->getUser( $id ) );
});
$app->put( '/users/', function( ) use ( $users , $app) {
	$updateUser = json_decode( $app->request->getBody() , true );
	//var_dump($updateUser);
	$success = $users->updateUser( $updateUser );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});





/*
$app->post( '/usersInfo/', function( ) use ( $users , $app) {
	$new_usersInfo = json_decode( $app->request->getBody() , true );
	//var_dump($new_usersInfo);
	$success = $users->addUserInfo( $new_usersInfo );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->put( '/usersInfo/', function( ) use ( $users , $app) {
	$updateUsersInfo = json_decode( $app->request->getBody() , true );
	//var_dump($updateUsersInfo);
	$success = $users->updateUserInfo( $updateUsersInfo );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});











 //request
$app->post( '/request/', function( ) use ( $request , $app) {
	$addRequest = json_decode( $app->request->getBody() , true );
	var_dump($new_user);
	$success = $request->addRequest( $addRequest );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->get( '/request/', function() use ( $request ) {
	echo json_encode( $request->getAllRequest() );
});	

$app->delete('/request/:id', function($id) use ( $app, $request ) {
	$success = $request->deleteRequest( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});









 //$post
$app->post( '/post/', function( ) use ( $post , $app) {
	$new_post = json_decode( $app->post->getBody() , true );
	var_dump($new_post);
	$success = $post->addPost( $new_post );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->get( '/post/', function() use ( $post ) {
	echo json_encode( $post->getAllUsers() );
});	

$app->delete('/post/:id', function($id) use ( $app, $post ) {
	$success = $post->deletePost( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->put( '/post/', function( ) use ( $post , $app) {
	$updatePost = json_decode( $app->post->getBody() , true );
	//var_dump($updatePost);
	$success = $post->updatePost( $updatePost );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});











 //blocks
$app->post( '/blocks/', function( ) use ( $blocks , $app) {
	$new_blocks = json_decode( $app->blocks->getBody() , true );
	var_dump($new_blocks);
	$success = $blocks->addBlocks( $new_blocks );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->get( '/blocks/', function() use ( $blocks ) {
	echo json_encode( $blocks->getAllBlocks() );
});	

$app->delete('/blocks/:id', function($id) use ( $app, $blocks ) {
	$success = $blocks->deleteBlocks( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});
$app->get('/blocks/:id', function( $id ) use ( $app, $blocks ) {
	echo json_encode( $blocks->getBlocks( $id ) );
});












 //friends
$app->post( '/friends/', function( ) use ( $Friends , $app) {
	$new_Friends = json_decode( $app->Friends->getBody() , true );
	var_dump($new_Friends);
	$success = $Friends->addFriends( $new_Friends );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->get( '/friends/', function() use ( $Friends ) {
	echo json_encode( $Friends->getAllFriends() );
});	

$app->delete('/friends/:id', function($id) use ( $app, $Friends ) {
	$success = $Friends->deleteFriends( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});
$app->get('/friends/:id', function( $id ) use ( $app, $Friends ) {
	echo json_encode( $Friends->getFriends( $id ) );
});












 //login

$app->get('/login/:id', function( $id ) use ( $app, $login ) {
	echo json_encode( $login->match( $id ) );
});










 //likes
$app->post( '/likes/', function( ) use ( $likes , $app) {
	$new_likes = json_decode( $app->likes->getBody() , true );
	var_dump($new_likes);
	$success = $messages->addLikes( $new_likes );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->delete('/likes/:id', function($id) use ( $app, $likes ) {
	$success = $likes->deleteLikes( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});
$app->get('/likes/:id', function( $id ) use ( $app, $likes ) {
	echo json_encode( $likes->getAllLikesByPost( $id ) );
});


 //comments
$app->post( '/comments/', function( ) use ( $comments , $app) {
	$new_comments = json_decode( $app->comments->getBody() , true );
	var_dump($new_comments);
	$success = $comments->addComments( $new_comments );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});

$app->delete('/comments/:id', function($id) use ( $app, $comments ) {
	$success = $comments->deleteComments( $id );
	if( $success )
		echo 1 ;
	else 
		echo 0 ;
});
$app->get('/comments/:id', function( $id ) use ( $app, $comments ) {
	echo json_encode( $comments->getAllCommentsByPost( $id ) );
});

*/

$app->run();
