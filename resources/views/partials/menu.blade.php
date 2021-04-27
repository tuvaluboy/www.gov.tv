<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('about_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/contents*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-info-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.about.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contents") || request()->is("admin/contents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.content.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('services_setup_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/service-categories*") ? "c-show" : "" }} {{ request()->is("admin/services-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/services*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.servicesSetup.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('service_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.service-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service-categories") || request()->is("admin/service-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.serviceCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('services_sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services-sub-categories") || request()->is("admin/services-sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.servicesSubCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/services") || request()->is("admin/services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.service.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('media_center_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/categories*") ? "c-show" : "" }} {{ request()->is("admin/items*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mediaCenter.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.category.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('item_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/items") || request()->is("admin/items/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.item.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('directory_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/directory-categories*") ? "c-show" : "" }} {{ request()->is("admin/directory-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/ministry-contents*") ? "c-show" : "" }} {{ request()->is("admin/directory-contents*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.directory.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('directory_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.directory-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/directory-categories") || request()->is("admin/directory-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.directoryCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('directory_sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.directory-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/directory-sub-categories") || request()->is("admin/directory-sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.directorySubCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ministry_content_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.ministry-contents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ministry-contents") || request()->is("admin/ministry-contents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ministryContent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('directory_content_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.directory-contents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/directory-contents") || request()->is("admin/directory-contents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.directoryContent.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('tag_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tags") || request()->is("admin/tags/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tag.title') }}
                </a>
            </li>
        @endcan
        @can('background_image_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.background-images.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/background-images") || request()->is("admin/background-images/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.backgroundImage.title') }}
                </a>
            </li>
        @endcan
        @can('menu_message_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.menu-messages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/menu-messages") || request()->is("admin/menu-messages/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.menuMessage.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>