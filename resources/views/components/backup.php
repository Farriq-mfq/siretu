  <aside id="sidebar"
      class="fixed hidden z-20 h-full top-0 left-0 pt-14 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
      aria-label="Sidebar">
      <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
          <div class="flex-1 flex flex-col overflow-y-auto pt-3">
              <div class="flex-1 px-3 bg-white divide-y space-y-1">
                  <ul class="space-y-2 pb-2">
                      <li>
                          <a href={{ route('dashboard') }}
                              class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('dashboard')">
                              <i data-lucide="pie-chart" class="w-4 h-4"></i>
                              <span class="ml-3">Dashboard</span>
                          </a>
                      </li>
                      <li>
                          <a id="sidebar-dropdown"
                              class="@if (request()->is('presensi*')) !text-blue-500 @endif flex items-center cursor-pointer justify-between py-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 ">
                              <div class="flex items-center px-2">
                                  <i data-lucide="book" class="w-4 h-4"></i>
                                  <span class="ml-3">
                                      Presensi
                                  </span>
                              </div>
                              <i data-lucide="chevron-down" class="h-4 w-4 mr-2"></i>
                          </a>
                          <ul class="@if (!request()->is('presensi*')) hidden @endif m-2 p-1 space-y-2"
                              id="sidebar-dropdown-content">
                              <li>
                                  <a href={{ route('presensi-guru') }}
                                      class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('presensi-guru')">
                                      <i data-lucide="book-text" class="w-4 h-4"></i>
                                      <span class="ml-3">
                                          Rekap Presensi Guru
                                      </span>
                                  </a>
                              </li>
                              <li>
                                  <a href={{ route('presensi-tu') }}
                                      class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('presensi-tu')">
                                      <i data-lucide="notebook-text" class="w-4 h-4"></i>
                                      <span class="ml-3">
                                          Rekap Presensi TU
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li>
                          <a id="sidebar-dropdown"
                              class="@if (request()->is('ijin*')) !text-blue-500 @endif flex items-center cursor-pointer justify-between py-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 ">
                              <div class="flex items-center px-2">
                                  <i data-lucide="person-standing" class="w-4 h-4"></i>
                                  <span class="ml-3">
                                      Perijinan
                                  </span>
                              </div>
                              <i data-lucide="chevron-down" class="h-4 w-4 mr-2"></i>
                          </a>
                          <ul class="@if (!request()->is('ijin*')) hidden @endif m-2 p-1 space-y-2"
                              id="sidebar-dropdown-content">
                              <li>
                                  <a href={{ route('ijin-guru') }}
                                      class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('ijin-guru')">
                                      <i data-lucide="person-standing" class="w-4 h-4"></i>
                                      <span class="ml-3">
                                          Ijin Guru
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li>
                        <a href={{ route('jurnal') }}
                            class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('jurnal')">
                            <i data-lucide="list" class="w-4 h-4"></i>
                            <span class="ml-3">
                                Rekap Jurnal
                            </span>
                        </a>
                    </li>
                      <li>
                          <a href={{ route('personil') }}
                              class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('personil')">
                              <i data-lucide="users" class="w-4 h-4"></i>
                              <span class="ml-3">
                                  Personil
                              </span>
                          </a>
                      </li>
                  </ul>
                  <div class="space-y-2 pt-2">
                      <a href="{{ route('about') }}"
                          class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2  @active('about')">
                          <i data-lucide="circle-alert" class="w-4 h-4"></i>
                          <span class="ml-3">Tentang</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </aside>


                    {{-- <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div> --}}
<form method="POST" action="{{ route('logout') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i data-lucide="log-out" class="h-4 w-4 mr-2"></i>
                                    Keluar
                                </button>
                            </form>
