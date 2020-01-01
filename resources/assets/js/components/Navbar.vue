<template class="overflow-hidden" flat >
  
   <v-card class="overflow-hidden"  flat >
    <v-app-bar
      app
      color="#0091EA"
      dark
      shrink-on-scroll
      prominent
      src="../assets/im3.jpg"
      fade-img-on-scroll
      scroll-threshold="500"
    > 
      <template v-slot:img="{ props }">
        <v-img
          v-bind="props"
          gradient="to top right, rgba(55,236,186,.7), rgba(25,32,72,.7)"
        ></v-img>
      </template>

      <v-app-bar-nav-icon  @click="drawer = !drawer" class="white--text"></v-app-bar-nav-icon>
      
      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon classe="title">mdi-account-circle</v-icon>
      </v-btn>

    </v-app-bar>
    
      <br>
      <br>
      <br>
     <v-navigation-drawer app v-model="drawer" lighten>
     <v-list-item>
        <v-list-item-content>
          <v-list-item>
             <div class="logo-img" style="align-text:center;">
       <img  src="../assets/logo.png"/>
        </div>
          </v-list-item>
          <v-list-item-subtitle>
            ESI scolarité
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list
        dense
        nav
      >
        <v-list-item
          v-for="item in items"
          :key="item.title"
          link
          router :to="item.route"
        large color="#0091EA"
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    
  </v-card>

    
    
     
</template>

<script>
export default {
  data() {
    return {
        items: [
          { title: 'Gestion des étudiants', icon: 'mdi-view-dashboard' , route :'/' },
          { title: 'Gestion des profs', icon: 'mdi-format-list-bulleted-square' , route :'/prof' },
          { title: 'Les ouvrages', icon: 'mdi-book' , route :'/ouvrages' },
        ],
                right: null,
     drawer: true
    }
  }
};

 
</script>