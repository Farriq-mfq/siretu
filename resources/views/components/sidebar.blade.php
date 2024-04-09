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
                      {{-- <li>
                          <a href={{ route('presensi-tu') }}
                              class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group @active('presensi-tu')">
                              <i data-lucide="list" class="w-4 h-4"></i>
                              <span class="ml-3">
                                  Rekap Jurnal
                              </span>
                          </a>
                      </li> --}}
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
