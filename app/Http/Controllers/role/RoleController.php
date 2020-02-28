<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\BaseEntitiy;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends BaseEntitiy
{
    protected $request;

    public function __construct(Request $request, Role $role)
    {
        $this->request = $request;
        $this->model = $role;
    }


    public function getRoles()
    {
        $post = $this->findAll();
        return view('panel2.page.role.list-role', compact(['post']));
    }
    public function getRole(Role $role)
    {
        return view('panel2.page.role.edit-role', compact(['role']));
    }
    public function getPostRole()
    {
        return view('panel2.page.role.add-role');
    }
    public function postRole()
    {

    }
    public function patchRole()
    {

    }
    public function deleteRole()
    {

    }

}
