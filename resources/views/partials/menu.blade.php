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
        @can('utilize_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/imageslides*") ? "c-show" : "" }} {{ request()->is("admin/pages*") ? "c-show" : "" }} {{ request()->is("admin/pictures*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-asterisk c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.utilize.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('imageslide_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.imageslides.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/imageslides") || request()->is("admin/imageslides/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.imageslide.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.page.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('picture_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pictures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pictures") || request()->is("admin/pictures/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.picture.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('ministry_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.ministries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ministries") || request()->is("admin/ministries/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.ministry.title') }}
                </a>
            </li>
        @endcan
        @can('department_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bezier-curve c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.department.title') }}
                </a>
            </li>
        @endcan
        @can('newsand_update_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.newsand-updates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/newsand-updates") || request()->is("admin/newsand-updates/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.newsandUpdate.title') }}
                </a>
            </li>
        @endcan
        @can('vacancy_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.vacancies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vacancies") || request()->is("admin/vacancies/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-vaadin c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.vacancy.title') }}
                </a>
            </li>
        @endcan
        @can('budget_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.budgets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/budgets") || request()->is("admin/budgets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-money-check-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.budget.title') }}
                </a>
            </li>
        @endcan
        @can('about_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/aboutuvalus*") ? "c-show" : "" }} {{ request()->is("admin/tuvaluconstitions*") ? "c-show" : "" }} {{ request()->is("admin/tuvaludevelopmentplans*") ? "c-show" : "" }} {{ request()->is("admin/holidays*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-info-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.about.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('aboutuvalu_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.aboutuvalus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/aboutuvalus") || request()->is("admin/aboutuvalus/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.aboutuvalu.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tuvaluconstition_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tuvaluconstitions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tuvaluconstitions") || request()->is("admin/tuvaluconstitions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tuvaluconstition.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tuvaludevelopmentplan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tuvaludevelopmentplans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tuvaludevelopmentplans") || request()->is("admin/tuvaludevelopmentplans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tuvaludevelopmentplan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('holiday_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.holidays.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/holidays") || request()->is("admin/holidays/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.holiday.title') }}
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
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/directory-categories*") ? "c-show" : "" }} {{ request()->is("admin/directory-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/directory-contents*") ? "c-show" : "" }}">
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