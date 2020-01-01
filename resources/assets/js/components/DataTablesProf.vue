<template>
   
    <div class="container home" style="margin-left:atuo;margin-right:atuo;width:95%;">

  <v-data-table
    :headers="headers"
    :items="personnes"
   :search="search"
    class="elevation-1" >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>Liste des profs</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
         <!----------------------------------- -->
            <v-text-field
        v-model="search"
        append-icon="mdi-search"
        label="Rechercher"
        single-line
        hide-details
        sm="8" md="6"
      ></v-text-field>
      <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
                  <!----------------------------------- -->
        <v-dialog v-model="dialog" max-width="500px">
          
          <template v-slot:activator="{ on }">

            <v-btn  fab dark small color="cyan" v-on="on">
                <v-icon dark>mdi-plus</v-icon>
                </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                    <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.nom" label="Nom"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.prenom" label="Prenom"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="12" md="12">
                    <v-text-field v-model="editedItem.grade" label="Grade Actuel"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.numero" label="Numero de téléphone"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.bureau" label="Bureau"></v-text-field>
                  </v-col> 
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.sexe" label="Sexe"></v-text-field>
                  </v-col>
                  
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
              <v-btn color="blue darken-1" text @click="save">Sauvegarder</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.Operation="{ item }">

        
              <v-icon color="my-2 primary" fab small dark 
        @click="editProf(item)">
        mdi-pencil</v-icon>
           
         
      <v-icon
      color="my-2 danger"
        small
        @click="deleteProf(item.id)"
      >  mdi-delete  </v-icon>


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
          text: 'Nom',
          align: 'left',
          sortable: true,
          value: 'nom',
        },{
          text: 'Prénom',
          align: 'left',
          sortable: true,
          value: 'prenom',
        },
           { text: 'Grade Actuel', value: 'grade' },
           { text: 'téléphone', value: 'numero' },
          { text: 'Email', value: 'email' },    
         { text: 'Bureau', value: 'bureau' },
         { text: 'Sexe', value: 'sexe' },
        { text: 'Operation', value: 'Operation', sortable: false },
      ],
      personnes: [],
      personne_id:'0',
      editedIndex: -1,
      editedItem: {
        id:'',
        nom:'',
        prenom: '',
        grade: '',
        numero: '',
        email: '',
        bureau: '',
        sexe: '',
      },
      defaultItem: {
        id:'',
        nom:'',
        prenom: '',
        grade: '',
        numero: '',
        email: '',
        bureau: '',
        sexe: '',
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Ajouter ensignant' : 'Modifier ensignant'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      this.fetchEnseignants()
    },

    methods: {

      //--------------------------Afficher les enseignants ---------------------
      fetchEnseignants () {
         fetch('/api/profs').then(res => res.json()).then(res => {
         this.personnes = res.data;
        })
      },
      //------------------------------ajouter Prof ------------------------------------------
      AjouterProf(){
        console.log(this.editedItem);
         fetch('/api/prof/1',{
           method :'post',
           body: JSON.stringify(this.editedItem),
           headers:{
             'content-type' : 'application/json'
           }
          }).then(res => res.json()).then(data =>{
            this.editedItem.id='';
            this.editedItem.nom='';
            this.editedItem.prenom='';
            this.editedItem.grade='';
            this.editedItem.numero='';
            this.editedItem.email='';
            this.editedItem.bureau='';
            this.editedItem.sexe='';
            alert("Prof Ajouté avec success !")
            this.fetchEnseignants();
          }).catch(err => console.log(err))
      },
      //---------------------------------------------------------
       ModifierProf(id){
      fetch('/api/prof/'+id,{
           method :'put',
           body: JSON.stringify(this.editedItem),
           headers:{
             'content-type' : 'application/json'
           }
          }).then(res => res.json()).then(data =>{
            this.editedItem.id='';
            this.editedItem.nom='';
            this.editedItem.prenom='';
             this.editedItem.grade='';
            this.editedItem.numero='';
            this.editedItem.email='';
            this.editedItem.bureau='';
            this.editedItem.sexe='';
            this.personne_id = '0';
            alert("Prof mis à jour !")
            this.fetchEnseignants();
          }).catch(err => console.log(err))    
         },
     //-------------------------------Afficher le formulaire de modification-----------------------------------
      editProf (item) {
                 this.personne_id = item.id;        
        this.editedIndex = this.personnes.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },
    //--------------------------------Supprimer un prof
      deleteProf (id) {
      if(confirm('Êtes-vous sur de vouloir supprimer cette personne ?') ){
       fetch('/api/prof/'+id,{
         method : 'delete'
       }).then(res => res.json())
       .then(data => {
         alert("Prof supprimé");
         this.fetchEnseignants();
       })
        .catch(err => console.log(err));
     }  
      },
 //---------------------------------Fermer la fenetre
      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
  //----------------------------------Sauvegarder le formulaire
        save () {   
        if (this.editedIndex > -1) {
         this.ModifierProf(this.personne_id);         
        } else {
          this.AjouterProf();
          }
        this.close()
      },
    },
  }
</script>