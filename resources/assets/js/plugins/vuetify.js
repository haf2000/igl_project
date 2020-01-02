import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader

Vue.use(Vuetify,{
    iconfont : 'mdi' ,
});

export default new Vuetify({
 icons: {
    iconfont: 'mdiSvg',
  },    

});