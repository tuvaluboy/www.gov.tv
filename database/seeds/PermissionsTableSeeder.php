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
                'title' => 'about_access',
            ],
            [
                'id'    => 18,
                'title' => 'service_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'service_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'service_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'service_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'service_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'services_sub_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'services_sub_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'services_sub_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'services_sub_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'services_sub_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'service_create',
            ],
            [
                'id'    => 29,
                'title' => 'service_edit',
            ],
            [
                'id'    => 30,
                'title' => 'service_show',
            ],
            [
                'id'    => 31,
                'title' => 'service_delete',
            ],
            [
                'id'    => 32,
                'title' => 'service_access',
            ],
            [
                'id'    => 33,
                'title' => 'services_setup_access',
            ],
            [
                'id'    => 34,
                'title' => 'media_center_access',
            ],
            [
                'id'    => 35,
                'title' => 'category_create',
            ],
            [
                'id'    => 36,
                'title' => 'category_edit',
            ],
            [
                'id'    => 37,
                'title' => 'category_show',
            ],
            [
                'id'    => 38,
                'title' => 'category_delete',
            ],
            [
                'id'    => 39,
                'title' => 'category_access',
            ],
            [
                'id'    => 40,
                'title' => 'item_create',
            ],
            [
                'id'    => 41,
                'title' => 'item_edit',
            ],
            [
                'id'    => 42,
                'title' => 'item_show',
            ],
            [
                'id'    => 43,
                'title' => 'item_delete',
            ],
            [
                'id'    => 44,
                'title' => 'item_access',
            ],
            [
                'id'    => 45,
                'title' => 'directory_access',
            ],
            [
                'id'    => 46,
                'title' => 'directory_category_create',
            ],
            [
                'id'    => 47,
                'title' => 'directory_category_edit',
            ],
            [
                'id'    => 48,
                'title' => 'directory_category_show',
            ],
            [
                'id'    => 49,
                'title' => 'directory_category_delete',
            ],
            [
                'id'    => 50,
                'title' => 'directory_category_access',
            ],
            [
                'id'    => 51,
                'title' => 'directory_sub_category_create',
            ],
            [
                'id'    => 52,
                'title' => 'directory_sub_category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'directory_sub_category_show',
            ],
            [
                'id'    => 54,
                'title' => 'directory_sub_category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'directory_sub_category_access',
            ],
            [
                'id'    => 56,
                'title' => 'directory_content_create',
            ],
            [
                'id'    => 57,
                'title' => 'directory_content_edit',
            ],
            [
                'id'    => 58,
                'title' => 'directory_content_show',
            ],
            [
                'id'    => 59,
                'title' => 'directory_content_delete',
            ],
            [
                'id'    => 60,
                'title' => 'directory_content_access',
            ],
            [
                'id'    => 61,
                'title' => 'ministry_content_create',
            ],
            [
                'id'    => 62,
                'title' => 'ministry_content_edit',
            ],
            [
                'id'    => 63,
                'title' => 'ministry_content_show',
            ],
            [
                'id'    => 64,
                'title' => 'ministry_content_delete',
            ],
            [
                'id'    => 65,
                'title' => 'ministry_content_access',
            ],
            [
                'id'    => 66,
                'title' => 'content_create',
            ],
            [
                'id'    => 67,
                'title' => 'content_edit',
            ],
            [
                'id'    => 68,
                'title' => 'content_show',
            ],
            [
                'id'    => 69,
                'title' => 'content_delete',
            ],
            [
                'id'    => 70,
                'title' => 'content_access',
            ],
            [
                'id'    => 71,
                'title' => 'tag_create',
            ],
            [
                'id'    => 72,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 73,
                'title' => 'tag_show',
            ],
            [
                'id'    => 74,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 75,
                'title' => 'tag_access',
            ],
            [
                'id'    => 76,
                'title' => 'background_image_create',
            ],
            [
                'id'    => 77,
                'title' => 'background_image_edit',
            ],
            [
                'id'    => 78,
                'title' => 'background_image_show',
            ],
            [
                'id'    => 79,
                'title' => 'background_image_delete',
            ],
            [
                'id'    => 80,
                'title' => 'background_image_access',
            ],
            [
                'id'    => 81,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
