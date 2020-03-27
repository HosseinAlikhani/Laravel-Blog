<?php
Route::prefix('comments')->group(function(){
    Route::get('', 'CommentController@getComments');
    Route::get('{comments}', 'CommentController@getComment');
    Route::post('', 'CommentController@postComments')->name('postComment');
    Route::patch('', 'CommentController@patchComments');
    Route::delete('', 'CommentController@deleteComments');
});
Route::prefix('comment-replies')->group(function(){
    Route::get('', 'CommentReplyController@getCommentReplies');
    Route::get('{comment-replies}', 'CommentReplyController@getCommentReply');
    Route::post('', 'CommentReplyController@postCommentReplies')->name('postCommentReply');
    Route::patch('', 'CommentReplyController@patchCommentReplies');
    Route::delete('', 'CommentReplyController@deleteCommentReplies');
});
