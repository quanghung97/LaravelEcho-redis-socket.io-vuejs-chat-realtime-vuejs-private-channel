import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({
	mode: 'history',
    linkActiveClass: 'active',
	routes: [
	    {
	      path: '/',
	      name: 'dashboard',
	      component: require('../components/Lounge.vue').default
	    },
	    {
	      path: '/chatroom/:id',
	      name: 'chatroom',
	      component: require('../components/Chatroom.vue').default
	    },
    ]
})
