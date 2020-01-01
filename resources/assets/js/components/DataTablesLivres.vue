<template>
   
    <div class="container home" style="margin-left:atuo;margin-right:atuo;width:95%;">

  <v-data-table
    :headers="headers"
    :items="livres"
   :search="search"
    class="elevation-1"
    
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>

          Liste des livres</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
            <v-text-field
        v-model="search"
        append-icon="mdi-search"
        label="Rechercher"
        single-line
        hide-details
        sm="8" md="6"
      ></v-text-field>
      
      
      </v-toolbar>
    </template>

   
  </v-data-table>
     </div>

</template>
<script>
  export default {
            
    data: () => ({
         search: '',
      dialog: false,
      headers: [
        {
          text: 'Titre',
          align: 'left',
          sortable: true,
          value: 'name',
        },
        { text: 'Nombre de chapitres', value: 'numero_chapitres' },
        { text: 'Nombre de pages', value: 'numero_pages' },
        { text: 'Description', value: 'description' },
        { text: 'Disponible', value: 'disponible' },
      ],
      livres: [],
         }),

    


    created () {
      this.fetchLivres();
    },

    methods: {
     fetchLivres () {
        fetch('/api/livres').then(res => res.json()).then(res => {
         this.livres = res.data;
        })
      },

     

    }, 
  }
</script>