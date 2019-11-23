<template>
   <nav class="navbar navbar-expand navbar-dark bg-dark">	    
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">	   
            <ul class="navbar-nav mr-auto">	        
                <li class="nav-item"><router-link class="nav-link pr-5" to="/admin">Home</router-link></li>	
                <li class="nav-item dropdown pl-2">	
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User	
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">	
                            <template v-if="!$auth.check()">	
                                <router-link class="dropdown-item" v-for="route in routes.unlogged" v-bind:key="route.path"  :to="{ path: route.path }">	
                                    {{ route.name }}	
                                </router-link>	
                            </template>    	
                            <template v-if="$auth.check(1)">	
                                <router-link class="dropdown-item" v-for="route in routes.user" v-bind:key="route.path" :to="{ path: route.path }" >	
                                    {{ route.name }}	
                                </router-link>	
                            </template>	
                            <template v-if="$auth.check(2)">	
                                <router-link class="dropdown-item" v-for="route in routes.admin" v-bind:key="route.path"  :to="{ path: route.path }">	
                                    {{ route.name }}	
                                </router-link>	
                            </template>	
                        </div>	
                    </a>	
                </li>
                <li v-if="$auth.check(2)" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Content
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <template>	
                                <router-link class="dropdown-item" v-for="route in routes.adminContent" v-bind:key="route.path"  :to="{ path: route.path }">	
                                    {{ route.name }}	
                                </router-link>	
                            </template>	
                        </div>	
                    </a>	
                </li>
                <li v-if="$auth.check(2)" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <template>	
                                <router-link class="dropdown-item" v-for="route in routes.adminSettings" v-bind:key="route.path"  :to="{ path: route.path }">	
                                    {{ route.name }}	
                                </router-link>	
                            </template>	
                        </div>	
                    </a>	
                </li>
            </ul>
            <template v-if="$auth.check()">	
                <button class="nav-item float-right btn btn-primary" @click.prevent="$auth.logout()">Logout</button>	
            </template>	
        </div>	  
    </nav>	    
</template>
<script>
    export default {
        data() {
            return {
                routes: {
                    unlogged: [
                        { path: '/login', name: 'Login' },
                        { path: '/register', name: 'Register' }
                    ],
                    user: [{ path: '/dashboard', name: 'Dashboard' }],
                    admin: [{ path: '/admin/users', name: 'Users' }],
                    adminContent: [
                        { path: '/admin/photos', name: 'Photos' },
                        { path: '/admin/emails', name: 'Contact requests'}
                    ],
                    adminSettings: [
                        { path: '/admin/settings', name: 'Settings' },
                        { path: '/admin/localization', name: 'Localization' }
                    ]
                }
            }
        }
    }
</script>