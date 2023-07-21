<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class DashboardController extends BaseController
{
    public function index()
    {
        // $this->addTestUser();
        $this->data['PageName'] = 'Dashboard';
        if ($this->request->getPost()) {
            if ($this->request->getPost('dashboard_search')) {
                return $this->searchQuery($this->request->getPost('dashboard_search'));
            }
        }
        return view('Pages/Dashboard', $this->data);
    }

    public function searchQuery($query)
    {
        $query = strtolower($query);
        $allMenus = [];
        $menus = getMenuItems();
        foreach ($menus as $key => $menu) {
            $menuName = strtolower($menu['name']);
            if (str_contains($menuName, $query) || str_contains($query, $menuName) || strpos($menuName, $query) || $query == $menuName) {
                $allMenus[] = $menu;
            }
        }
        if (count($allMenus)) {
            return response()->setJSON($allMenus);
        }
        return response()->setJSON(false);
    }

    private function addTestUser()
    {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $userName = newUserName();
        $userEmail = time() . '@gmail.com';

        $user = new User([
            'username' => $userName,
            'email'    => $userEmail,
            'password' => '23988725',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        $user->activate();
        $this->updateSuperAdmin($user->id);
    }
    private function updateSuperAdmin($id)
    {
        // Get the User Provider (UserModel by default)
        $users = new UserModel();
        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($id);
        $user->fill([
            'full_name' => $user->username,
            'phone_number' => '+919810763314'
        ]);
        return $users->save($user);
    }
}
