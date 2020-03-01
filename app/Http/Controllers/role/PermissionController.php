<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\BaseEntitiy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseEntitiy
{
    protected $request;
    public function __construct(Request $request, Permission $permission)
    {
        $this->model = $permission;
        $this->request = $request;
    }
    public function validator($input)
    {
        $value = [
            'permission_name'  =>  'required',
        ];
        return Validator::make($input, $value);
    }

    public function getPermissions()
    {
        $permission = $this->findAll();
        return view('panel2.page.role.list-permission', compact(['permission']));
    }
    public function getPermission(Permission $permission)
    {
        return view('panel2.page.role.edit-permission', compact(['permission']));
    }
    public function getPostPermission()
    {
        return view('panel2.page.role.add-permission');
    }
    public function postPermission()
    {
        $validator = $this->validator($this->request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(), 423);
        }
        $data = [
            'name'  =>  $this->request->permission_name,
        ];
        if ($this->create($data)){
            return response('save ok', 200);
        }else{
            return response('problem to save', 423);
        }
    }
    public function patchPermission()
    {
        dd($this->request->all());
    }
    public function deletePermission()
    {
        if ($this->delete($this->request->permission_id)) {
            return response('delete Permission ' . $this->request->permission_id . ' successfully',200);
        }else{
            return response('error when delete Permission ' . $this->request->permission_id . ' please Trt Again Later!!!',423);
        }
    }
}
