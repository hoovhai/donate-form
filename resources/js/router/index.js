import { createRouter, createWebHistory } from "vue-router";

import Index from '../components/Index'
import CrInput from '../components/CrInput'
import MyInput from '../components/MyInput'

const routes = [
	{
		path: '/dashboard',
		name: 'index',
		component: Index
	},
    {
		path: '/donate',
		name: 'cr-input',
		component: CrInput
	},
]

export default createRouter({
	history: createWebHistory(),
	routes
})