<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'ministry_create',
            ],
            [
                'id'    => 18,
                'title' => 'ministry_edit',
            ],
            [
                'id'    => 19,
                'title' => 'ministry_show',
            ],
            [
                'id'    => 20,
                'title' => 'ministry_delete',
            ],
            [
                'id'    => 21,
                'title' => 'ministry_access',
            ],
            [
                'id'    => 22,
                'title' => 'newsand_update_create',
            ],
            [
                'id'    => 23,
                'title' => 'newsand_update_edit',
            ],
            [
                'id'    => 24,
                'title' => 'newsand_update_show',
            ],
            [
                'id'    => 25,
                'title' => 'newsand_update_delete',
            ],
            [
                'id'    => 26,
                'title' => 'newsand_update_access',
            ],
            [
                'id'    => 27,
                'title' => 'department_create',
            ],
            [
                'id'    => 28,
                'title' => 'department_edit',
            ],
            [
                'id'    => 29,
                'title' => 'department_show',
            ],
            [
                'id'    => 30,
                'title' => 'department_delete',
            ],
            [
                'id'    => 31,
                'title' => 'department_access',
            ],
            [
                'id'    => 32,
                'title' => 'vacancy_create',
            ],
            [
                'id'    => 33,
                'title' => 'vacancy_edit',
            ],
            [
                'id'    => 34,
                'title' => 'vacancy_show',
            ],
            [
                'id'    => 35,
                'title' => 'vacancy_delete',
            ],
            [
                'id'    => 36,
                'title' => 'vacancy_access',
            ],
            [
                'id'    => 37,
                'title' => 'budget_create',
            ],
            [
                'id'    => 38,
                'title' => 'budget_edit',
            ],
            [
                'id'    => 39,
                'title' => 'budget_show',
            ],
            [
                'id'    => 40,
                'title' => 'budget_delete',
            ],
            [
                'id'    => 41,
                'title' => 'budget_access',
            ],
            [
                'id'    => 42,
                'title' => 'imageslide_create',
            ],
            [
                'id'    => 43,
                'title' => 'imageslide_edit',
            ],
            [
                'id'    => 44,
                'title' => 'imageslide_show',
            ],
            [
                'id'    => 45,
                'title' => 'imageslide_delete',
            ],
            [
                'id'    => 46,
                'title' => 'imageslide_access',
            ],
            [
                'id'    => 47,
                'title' => 'page_create',
            ],
            [
                'id'    => 48,
                'title' => 'page_edit',
            ],
            [
                'id'    => 49,
                'title' => 'page_show',
            ],
            [
                'id'    => 50,
                'title' => 'page_delete',
            ],
            [
                'id'    => 51,
                'title' => 'page_access',
            ],
            [
                'id'    => 52,
                'title' => 'utilize_access',
            ],
            [
                'id'    => 53,
                'title' => 'about_access',
            ],
            [
                'id'    => 54,
                'title' => 'aboutuvalu_create',
            ],
            [
                'id'    => 55,
                'title' => 'aboutuvalu_edit',
            ],
            [
                'id'    => 56,
                'title' => 'aboutuvalu_show',
            ],
            [
                'id'    => 57,
                'title' => 'aboutuvalu_delete',
            ],
            [
                'id'    => 58,
                'title' => 'aboutuvalu_access',
            ],
            [
                'id'    => 59,
                'title' => 'tuvaluconstition_create',
            ],
            [
                'id'    => 60,
                'title' => 'tuvaluconstition_edit',
            ],
            [
                'id'    => 61,
                'title' => 'tuvaluconstition_show',
            ],
            [
                'id'    => 62,
                'title' => 'tuvaluconstition_delete',
            ],
            [
                'id'    => 63,
                'title' => 'tuvaluconstition_access',
            ],
            [
                'id'    => 64,
                'title' => 'tuvaludevelopmentplan_create',
            ],
            [
                'id'    => 65,
                'title' => 'tuvaludevelopmentplan_edit',
            ],
            [
                'id'    => 66,
                'title' => 'tuvaludevelopmentplan_show',
            ],
            [
                'id'    => 67,
                'title' => 'tuvaludevelopmentplan_delete',
            ],
            [
                'id'    => 68,
                'title' => 'tuvaludevelopmentplan_access',
            ],
            [
                'id'    => 69,
                'title' => 'holiday_create',
            ],
            [
                'id'    => 70,
                'title' => 'holiday_edit',
            ],
            [
                'id'    => 71,
                'title' => 'holiday_show',
            ],
            [
                'id'    => 72,
                'title' => 'holiday_delete',
            ],
            [
                'id'    => 73,
                'title' => 'holiday_access',
            ],
            [
                'id'    => 74,
                'title' => 'service_category_create',
            ],
            [
                'id'    => 75,
                'title' => 'service_category_edit',
            ],
            [
                'id'    => 76,
                'title' => 'service_category_show',
            ],
            [
                'id'    => 77,
                'title' => 'service_category_delete',
            ],
            [
                'id'    => 78,
                'title' => 'service_category_access',
            ],
            [
                'id'    => 79,
                'title' => 'services_sub_category_create',
            ],
            [
                'id'    => 80,
                'title' => 'services_sub_category_edit',
            ],
            [
                'id'    => 81,
                'title' => 'services_sub_category_show',
            ],
            [
                'id'    => 82,
                'title' => 'services_sub_category_delete',
            ],
            [
                'id'    => 83,
                'title' => 'services_sub_category_access',
            ],
            [
                'id'    => 84,
                'title' => 'service_create',
            ],
            [
                'id'    => 85,
                'title' => 'service_edit',
            ],
            [
                'id'    => 86,
                'title' => 'service_show',
            ],
            [
                'id'    => 87,
                'title' => 'service_delete',
            ],
            [
                'id'    => 88,
                'title' => 'service_access',
            ],
            [
                'id'    => 89,
                'title' => 'services_setup_access',
            ],
            [
                'id'    => 90,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
