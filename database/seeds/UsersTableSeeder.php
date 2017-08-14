<?php

use Illuminate\Database\Seeder;
use Zhiyi\Plus\Models\Role;
use Zhiyi\Plus\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->createFounderUser();
    }

    /**
     * 插�
     * �创始人信息.
     *
     * @return void
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function createFounderUser()
    {
        $user = User::create(['name' => 'root', 'password' => bcrypt('root')]);
        $roles = Role::all();
        $user->attachRoles($roles);
    }
}
