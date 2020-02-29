<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\BaseEntitiy;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseEntitiy
{
    protected $request;
    public function __construct(Request $request, Permission $permission)
    {
        $this->model = $permission;
        $this->request = $request;
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

    }
    public function patchPermission()
    {

    }
    public function deletePermission()
    {

    }
}
