<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\BaseEntitiy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends BaseEntitiy
{
    protected $request;
    public function __construct(Request $request, Role $role)
    {
        $this->request = $request;
        $this->model = $role;
    }
    public function validator($input)
    {
        $value = [
            'role_permission'    =>  'required',
            'role_name' =>  'required',
        ];
        return Validator::make($input, $value);
    }
    public function permissionVariable($permission)
    {
        return explode(',', $permission['role_permission']);
    }
    public function createVariable($input)
    {
        return [
            'name'  =>  $input['role_name'],
        ];
    }
    public function getRoles()
    {
        $role = $this->findAll();
        return view('panel2.page.role.list-role', compact(['role']));
    }
    public function getRole(Role $role)
    {
        return view('panel2.page.role.edit-role', compact(['role']));
    }
    public function getPostRole()
    {
        $permission = $this->permissionController()->findAll();
        return view('panel2.page.role.add-role', compact(['permission']));
    }
    public function postRole()
    {
        $validator = $this->validator($this->request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(),423);
        }
        if ($this->create($this->createVariable($this->request->all()))){
            return response('save successfully',200);
        }else{
            return response('error when save role', 423);
        }
    }
    public function patchRole()
    {

    }
    public function deleteRole()
    {
    }

}
