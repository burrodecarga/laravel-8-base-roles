<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' =>'admin']);
        $candidate = Role::create(['name' =>'candidate']);
        $employer = Role::create(['name' =>'employer']);
        $guest = Role::create(['name' =>'guest']);
        $course = Role::create(['name' =>'course']);


        $permissions = ['show','create','edit','update','delete'];

        foreach (Role::all() as $role){
            foreach($permissions as $p){
                Permission::create(['name'=>"{$role->name} $p"]);
            }}

            $admin->syncPermissions(Permission::all());
            $employer->syncPermissions(Permission::where('name','like',"%employer%"));
            $candidate->syncPermissions(Permission::where('name','like',"%candidate%"));
            $guest->syncPermissions(Permission::where('name','like',"%guest%"));

        //     $candidate =User::create([
        //         'name' => 'Candidate Henriquez',
        //         'email' => 'candidate@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => bcrypt('123'),
        //         'remember_token' => Str::random(10)]);

        // for($i=1; $i<11; $i++)
        // {
        // $candidate =User::create([
        //     'name' => 'Candidate Number-'.$i,
        //     'email' => 'candidate'.$i.'@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('123'),
        //     'remember_token' => Str::random(10)]);
        // }

        // for($i=1; $i<11; $i++)
        // {
        // $employer =User::create([
        //         'name' => 'Employer Number :-'.$i,
        //         'email' => 'employer'.$i.'@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => bcrypt('123'),
        //         'remember_token' => Str::random(10)]);}

        //         $employer =User::create([
        //             'name' => 'Employer Henriquez',
        //             'email' => 'employer@gmail.com',
        //             'email_verified_at' => now(),
        //             'password' => bcrypt('123'),
        //             'remember_token' => Str::random(10)]);

        // $guest =User::create([
        //             'name' => 'Guest Henriquez',
        //             'email' => 'guest@gmail.com',
        //             'email_verified_at' => now(),
        //             'password' => bcrypt('123'),
        //             'remember_token' => Str::random(10)]);

        //  $admin =User::create([
        //                 'name' => 'Admin Henriquez',
        //                 'email' => 'admin@gmail.com',
        //                 'email_verified_at' => now(),
        //                 'password' => bcrypt('123'),
        //                 'remember_token' => Str::random(10)]);



        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $user =User::create([
            'name' => 'Edwin Henriquez',
            'email' => 'ed@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10)]);
        $user->assignRole('super-admin');
    }
}
