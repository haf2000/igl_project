<template>
   
    <div class="container home" style="margin-left:atuo;margin-right:atuo;width:95%;">
      <v-data-table
    :headers="headers"
    :items="personnes"
   :search="search"
    class="elevation-1"
    
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
               
        <v-toolbar-title>Liste des étudiants</v-toolbar-title>
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
                    <v-text-field  label="Nom" v-model="editedItem.nom"></v-text-field>
                  </v-col> 
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field  label="Prenom" v-model="editedItem.prenom"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="12" md="12">
                    <v-text-field v-model="editedItem.matricule" label="Matricule"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.section" label="Section"></v-text-field>
                  </v-col>
                  <v-col cols="8" sm="6" md="6">
                    <v-text-field v-model="editedItem.groupe" label="Groupe"></v-text-field>
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
        @click="editEtudiant(item)">
        mdi-pencil</v-icon>
           
         
      <v-icon
      color="my-2 danger"
        small
        @click="deleteEtudiant(item.id)"
      >  mdi-delete  </v-icon>


    </template>
  
  </v-data-table>
     </div>

</template>
<script>
  export default {
            
    data: () => ({
            personne_id :'0',
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
        { text: 'Matricule', value: 'matricule' },
        { text: 'Section', value: 'section' },
        { text: 'Groupe', value: 'groupe' },
        { text: 'Operation', value: 'Operation', sortable: false },
      ],
      personnes: [],
      editedIndex: -1,
      editedItem: {
        id:'',
        nom: '',
        prenom: '',
        matricule: '',
        section: '',
        groupe: '',
      },
            defaultItem: {
        id:'',
        nom: '',
        prenom: '',
        matricule: '',
        section: '',
        groupe: '',
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Ajouter etudiant' : 'Modifier etudiant'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      this.fetchEtudiant();
    },

    methods: {
    //----------------------Recueprer les etudiants----------------
      fetchEtudiant () { 

        fetch('/api/etudiants').then(res => res.json()).then(res => {
       //   console.log(res.data);
         this.personnes = res.data;
        })
      },
   //------------------------------Ajouter Etudiant---------------
      AjouterEtudiant(){
        
          fetch('/api/etudiant/1',{
           method :'post',
           body: JSON.stringify(this.editedItem),
           headers:{
             'content-type' : 'application/json'
           }
          }).then(res => res.json()).then(data =>{
            this.editedItem.id='';
            this.editedItem.nom='';
            this.editedItem.prenom='';
            this.editedItem.section='';
            this.editedItem.matricule='';
            this.editedItem.groupe='';
            alert("Etudiant Ajouté avec success !")
            this.fetchEtudiant();
          }).catch(err => console.log(err))
       
        },
   //-------------------------------Modifier Etudiant------------------------------
      ModifierEtudiant(id){
      fetch('/api/etudiant/'+id,{
           method :'put',
           body: JSON.stringify(this.editedItem),
           headers:{
             'content-type' : 'application/json'
           }
          }).then(res => res.json()).then(data =>{
            this.editedItem.id='';
            this.editedItem.nom='';
            this.editedItem.prenom='';
            this.editedItem.section='';
            this.editedItem.matricule='';
            this.editedItem.groupe='';
            this.personne_id = '0';
            alert("Etudiant mis à jour !")
            this.fetchEtudiant();
          }).catch(err => console.log(err))    
         },
   //----------------------------------recuperer les elements modifiés--------------------------------
      editEtudiant (item) {

         this.personne_id = item.id;        
        //console.log(this.personne_id); 
        this.editedIndex = this.personnes.indexOf(item)
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },
     //--------------------------------Supprimer etudiant-------------
      deleteEtudiant (id) {

       //console.log('/api/etudiant/'+id);
     if(confirm('Êtes-vous sur de vouloir supprimer cette personne ?') ){
       fetch('/api/etudiant/'+id,{
         method : 'delete'
       }).then(res => res.json())
       .then(data => {
         alert("Etudiant supprimé");
         this.fetchEtudiant();
       })
        .catch(err => console.log(err));
     }  
 },
     //--------------------------------Fermer la fenetre-------------

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },
     //--------------------------------Sauvegarder les informations du formulaire-------------

      save () {   
        if (this.editedIndex > -1) {
         this.ModifierEtudiant(this.personne_id);         
        } else {
          this.AjouterEtudiant();
          }
        this.close()
      },

    },
  }
</script>