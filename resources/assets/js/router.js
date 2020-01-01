import Vue from 'vue';
import VueRouter from 'vue-router';
import Etudiant from './views/Etudiant.vue'
import Prof from './views/Prof.vue'
import ouvrages from './views/ouvrages.vue'

Vue.use(VueRouter);

export default new VueRouter({

    routes : [
 
        {
            path: '/',
            name: 'etudiant',
            component: Etudiant
          },
          {
            path: '/prof',
            name: 'prof',
            component: Prof
        
          }, {
            path: '/ouvrages',
            name: 'ouvrages',
            component: ouvrages
          }
        
      ],
    mode : 'history' 
    
});