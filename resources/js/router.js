import VueRouter from 'vue-router';

// components
import Home from './pages/home';

import Register from './pages/register';
import Login from './pages/login';
import Dashboard from './pages/dashboard';
import Admin from './pages/admin/dashboard';
import Users from './pages/admin/users';
import User from './pages/admin/user';
import Settings from './pages/admin/settings';
import Photos from './pages/admin/photos';
import Localization from './pages/admin/Localization';
import Email from './pages/admin/emails';
import { i18n } from './i18n';

const routes = [
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    {
        path: '/admin',
        name: 'admin',
        component: Admin,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/' }
        },
    },
    {
        path: '/admin/users',
        name: 'users',
        component: Users,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/' }
        }
    },
    {
        path: '/admin/user/:id',
        name: 'user',
        component: User,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/'}
        }
    },
    {
        path: '/admin/settings',
        name: 'settings',
        component: Settings,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/' }
        }
    },
    {
        path: '/admin/photos',
        name: 'photos',
        component: Photos,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/' }
        }
    },
    {
        path: '/admin/localization',
        name: 'Localization',
        component: Localization,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/' }
        }
    },
    {
        path: '/admin/emails',
        name: 'Emails',
        component: Email,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/' }
        }
    }
];

const router = new VueRouter({
    path: '/:lang',
    history: true,
    mode: 'history',
    routes,
    beforeEach: (to, from, next) => {
        console.log(to);
        console.log(from);
    }
});

export default router