<aside :class="sidebarFolded ? 'w-20' : 'w-64'" class="transition-all duration-300 z-30 bg-white border-r h-full hidden lg:block">
    <style>
        .btn_login {
            background-color: #C4DFDF;
            border: none;
            padding: 10px;
            width: 260px;
            border-radius: 3px;
            color: black;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>

    <div class="h-full flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-center p-4">
                <h2 x-show="!sidebarFolded" class="text-lg font-bold text-blue-600">Menu</h2>
                <button @click="sidebarFolded = !sidebarFolded" class="text-gray-500 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <nav>
                <!-- Dashboard -->
                <a href="#" class="block py-2.5 px-4 transition hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                    <span x-show="!sidebarFolded">Tableau de bord</span>
                    <span x-show="sidebarFolded">🏠</span>
                </a>

                @php $role = auth()->user()->role->nom; @endphp

                {{-- ADMIN DSI --}}
                @if($role === 'admin_dsi')
                    <a href="{{ route('admin.users.index') }}"
 class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Utilisateurs</span>
                        <span x-show="sidebarFolded">👥</span>
                    </a>
                    <a href="{{ route('admin.slas.index') }}" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">SLA</span>
                        <span x-show="sidebarFolded">⏱️</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Catégories</span>
                        <span x-show="sidebarFolded">🗂️</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Réclamations (vue globale)</span>
                        <span x-show="sidebarFolded">📝</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Paramètres système</span>
                        <span x-show="sidebarFolded">⚙️</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Archives & Export</span>
                        <span x-show="sidebarFolded">📁</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Alertes SLA</span>
                        <span x-show="sidebarFolded">🔔</span>
                    </a>
                @endif

                {{-- ADMIN FONCTIONNEL --}}
                @if($role === 'admin_fonctionnel')
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Réclamations à traiter</span>
                        <span x-show="sidebarFolded">📋</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Assignation</span>
                        <span x-show="sidebarFolded">📌</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Suivi des délais</span>
                        <span x-show="sidebarFolded">⏳</span>
                    </a>
                @endif

                {{-- PRESTATAIRE --}}
                @if($role === 'prestataire')
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Mes interventions</span>
                        <span x-show="sidebarFolded">🛠️</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Compte rendu</span>
                        <span x-show="sidebarFolded">📄</span>
                    </a>
                @endif

                {{-- EMPLOYÉ --}}
                @if($role === 'employe')
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Nouvelle réclamation</span>
                        <span x-show="sidebarFolded">➕</span>
                    </a>
                    <a href="#" class="block py-2.5 px-4 hover:bg-blue-100" :class="sidebarFolded ? 'text-center px-2' : ''">
                        <span x-show="!sidebarFolded">Mes réclamations</span>
                        <span x-show="sidebarFolded">📨</span>
                    </a>
                @endif
            </nav>
        </div>
    </div>
</aside>
