<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use App\Enum\PermissionsEnum;
use App\Models\Question;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Define roles
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);
        $studentRole = Role::create(['name' => RolesEnum::Student->value]);
        $teacherRole = Role::create(['name' => RolesEnum::Teacher->value]);

        // Define permissions
        $manageUsersPermission = Permission::create(['name' => PermissionsEnum::ManageUsers->value]);

        $askQuestionsPermission = Permission::create(['name' => PermissionsEnum::AskQuestions->value]);
        $manageQuestionsPermission = Permission::create(['name' => PermissionsEnum::ManageQuestions->value]);

        $manageAnswersPermission = Permission::create(['name' => PermissionsEnum::ManageAnswers->value]);
        $upvoteDownvotePermission = Permission::create(['name' => PermissionsEnum::UpvoteDownvote->value]);

        // Assign permissions to roles
        $studentRole->syncPermissions([$askQuestionsPermission, $upvoteDownvotePermission, $manageQuestionsPermission]);
        $teacherRole->syncPermissions([$askQuestionsPermission, $manageAnswersPermission, $upvoteDownvotePermission]);
        $adminRole->syncPermissions([$manageQuestionsPermission, $manageUsersPermission, $manageAnswersPermission]);
        

        // Create users
        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@example.com',
        ])->assignRole(RolesEnum::Student);

        User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
        ])->assignRole(RolesEnum::Teacher);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ])->assignRole(RolesEnum::Admin);
        
        Question::factory(100)->create();
    }
}
