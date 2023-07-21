<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class Home extends BaseController
{
    public function index()
    {
        // $server = $_SERVER;
        // $server['route_to'] = route_to('test_dashboard');
        // $data['first'] = base_url($_SERVER['REQUEST_URI']);
        // $data['second'] = base_url(route_to('test2_dashboard'));
        // $data['second'] = route_to('test2_dashboard');
        // $data['first'] = $_SERVER['REQUEST_URI'];
        // $data['check'] = json_encode(str_contains($data['second'], $data['first']));

        // return print_r($data);

        // setSetiings('App','siteName',APP->NAME);
        $this->data['siteName'] = getSetSettings('App.siteName');
        // $this->addSuperAdmin();
        return view('Pages/Dashboard', $this->data);
        // return $this->parser->setData($this->data)->render('Pages/Dashboard');
    }

    private function addSuperAdmin()
    {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $userName = newUserName();
        $user = new User([
            'username' => $userName,
            'email'    => 'ahtesham2000@gmail.com',
            'password' => '1988dec7ahtesham',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        $user->activate();

        $this->updateSuperAdmin($user->id);
        $this->addSuperUserGroup($user->id);
        // Add to default group
        // $user->addGroup('superadmin');
    }
    private function updateSuperAdmin($id)
    {
        // Get the User Provider (UserModel by default)
        $users = new UserModel();
        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($id);
        $user->fill([
            'full_name' => 'Ahtesham Chaudhary',
            'phone_number' => '+919810763314',
            'role' => 'Developer'
        ]);
        return $users->save($user);
    }
    private function addSuperUserGroup($id)
    {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();
        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($id);
        // Add to superadmin group
        return $user->addGroup('superadmin');
    }
    private function assignSuperAdminPermissions($id)
    {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();
        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($id);
        // Add to superadmin group
        // return $user->addPermission('users.*', 'conversations.*', 'conversation_members.*', 'messages.*', 'settings.*');
        return $user->addPermission('users.create');
    }
}
