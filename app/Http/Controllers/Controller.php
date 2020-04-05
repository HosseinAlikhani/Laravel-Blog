<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function responseMessage($data, $status)
    {
        if (!empty($data['key']) && !empty($data['key_value'])) {
            return response([
                'created' => !empty($data['created']) ? $data['created'] : null,
                'status' => !empty($data['status']) ? $data['status'] : null,
                'responsestatus' => !empty($data['responsestatus']) ? $data['responsestatus'] : null,
                'exists' => !empty($data['exists']) ? $data['exists'] : null,
                'data' => !empty($data['data']) ? $data['data'] : null,
                'field' => !empty($data['field']) ? $data['field'] : null,
                'url'   =>  !empty($data['url']) ? $data['url'] : null,
                'message' => !empty($data['message']) ? $data['message'] : null,
                $data['key']    =>  $data['key_value'],
            ], $status);
        }else{
            return response([
                'created' => !empty($data['created']) ? $data['created'] : null,
                'status' => !empty($data['status']) ? $data['status'] : null,
                'responsestatus' => !empty($data['responsestatus']) ? $data['responsestatus'] : null,
                'exists' => !empty($data['exists']) ? $data['exists'] : null,
                'data' => !empty($data['data']) ? $data['data'] : null,
                'field' => !empty($data['field']) ? $data['field'] : null,
                'url'   =>  !empty($data['url']) ? $data['url'] : null,
                'message' => !empty($data['message']) ? $data['message'] : null,
            ], $status);
        }
    }
    public function message($data)
    {
        $value =  [
            'submited' =>  __('dashboard.message.submited'),
            'submitok' =>  __('dashboard.message.submitok'),
            'submitno' =>  __('dashboard.message.submitno'),
            'updated'    =>  __('dashboard.message.updated'),
            'updateok'    =>  __('dashboard.message.updateok'),
            'updateno' =>  __('dashboard.message.updateno'),
            'deleted'  =>  __('dashboard.message.deleted'),
            'deleteok' =>  __('dashboard.message.deleteok'),
            'deleteno' =>  __('dashboard.message.deleteno'),
            'nodata' =>  __('dashboard.message.nodata'),
            'activecodesend'   =>  __('dashboard.message.activecodesend'),
            'activecodeincorrect'  =>  __('dashboard.message.activecodeincorrect'),
            'activeok' =>  __('dashboard.message.activeok'),
            'deactiveok' =>  __('dashboard.message.deactiveok'),
            'activeerror'  =>  __('dashboard.message.activeerror'),
            'noneedactive' =>  __('dashboard.message.noneedactive'),
            'faqerror' =>  __('dashboard.message.faqerror'),
            'infonotcomplete'  =>  __('dashboard.message.infonotcomplete'),
            'fagunique' =>  __('dashboard.message.fagunique'),
            'nopermission' =>  __('dashboard.auth.nopermission'),
            'loginok'   =>  __('dashboard.auth.loginok'),
            'logoutok' =>  __('dashboard.auth.logoutok'),
            'logoutno' =>  __('dashboard.auth.logoutno'),
            'dataincorrect'    =>  __('dashboard.auth.dataincorrect'),
            'uniqueusername'   =>  __('dashboard.auth.uniqueusername'),
            'activecodesendbefore' =>  __('dashboard.auth.activecodesendbefore'),
            'activecodeok' =>  __('dashboard.auth.activecodeok'),
            'activecodeno' =>  __('dashboard.auth.activecodeno'),
            'activecodeexpire' =>  __('dashboard.auth.activecodeexpire'),
            'registerok'   =>  __('dashboard.auth.registerok'),
            'registerno'   =>  __('dashboard.auth.registerno'),
            'activecodeok-nofaqset'    =>  __('dashboard.auth.activecodeok-nofaqset'),
            'faqok'    =>  __('dashboard.auth.faqok'),
            'faqno'    =>  __('dashboard.auth.faqno'),
            'resettimeexpire'  =>  __('dashboard.auth.resettimeexpire'),
            'changepasswordok' =>  __('dashboard.auth.changepasswordok'),
            'changepasswordno' =>  __('dashboard.auth.changepasswordno'),
            'passwordnotsame'  =>  __('dashboard.auth.passwordnotsame'),
            'messege.changePassword' => __('dashboard.message.timeline.messege.changePassword'),
            'messege.waitforanswer' => __('dashboard.message.timeline.messege.waitforanswer'),
            'messege.lastlogin' => __('dashboard.message.timeline.messege.lastlogin'),
            'changePassword' => __('dashboard.message.timeline.changePassword'),
            'lastlogin' => __('dashboard.message.timeline.lastlogin'),
            'waitforanswer' => __('dashboard.message.timeline.waitforanswer'),
            'maintenance' => __('dashboard.message.maintenance'),
        ];
        return $value[$data];
    }

    public function postController()
    {
        return app(PostController::class);
    }
    public function commentController()
    {
        return app(CommentController::class);
    }
    public function tagController()
    {
        return app(TagController::class);
    }
    public function categoryController()
    {
        return app(CategoryController::class);
    }
}
