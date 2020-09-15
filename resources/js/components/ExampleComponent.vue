<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create News</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Type:</label>
                            <select class='form-control' v-model='type'>
                              <option value='0' >Select Type</option>
                              <option v-for='data in types' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Country:</label>
                            <select class='form-control' v-model='countrie' @change='getRegions()'>
                              <option value='0' >Select Country</option>
                              <option v-for='data in countries' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Region:</label>
                            <select class='form-control' v-model='region' @change='getCities()'>
                              <option value='0' >Select Region</option>
                              <option v-for='data in regions' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Citie:</label>
                            <select class='form-control' v-model='citie'>
                              <option value='0' >Select Citie</option>
                              <option v-for='data in cities' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title:</label>                                                        
                            <input class='form-control' name="title" v-model="title" placeholder="titulo">
                        </div>
                        <div class="form-group">
                            <label>Subtitle:</label>                                                        
                            <input class='form-control' name="subtitle" v-model="subtitle" placeholder="subtitulo">
                        </div>                        
                        <div class="form-group">
                            <label>Body:</label>                                                        
                            <textarea class='form-control' name="body" v-model="body" placeholder="digite la noticia"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="btn btn-primary">
                              <input type="file" ref="file" multiple="multiple">
                            </label>
                        </div>
                        <div class="container-buttons">
                            <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                            <button v-if="update == 0" @click="saveNews()" class="btn btn-success">Añadir</button>
                            <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                            <button v-if="update != 0" @click="updateNews()" class="btn btn-warning">Actualizar</button>
                            <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                            <button v-if="update != 0" @click="clearFields()" class="btn">Atrás</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>  
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
              type: 0,
              types: [],
              countrie: 0,
              countries: [],
              region: 0,
              regions: [],
              citie: 0,
              cities: [],
              title:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
              subtitle:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
              body:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
              file:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
              update:0, /*Esta variable contrarolará cuando es una nueva news o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna news, pero si es diferente de 0 entonces tendrá el id de la news y no mostrará el boton guardar sino el modificar*/
              arrayNews:[], //Este array contendrá las news de nuestra bd
            }
        },
        methods:{
            getTypes: function(){
              axios.get('api/getTypes')
                .then(function (response) {
                  this.types = response.data;
                }.bind(this));
            },
            getCountries: function(){
              axios.get('api/getCountries')
                .then(function (response) {
                  this.countries = response.data;
                }.bind(this));
            },
            getRegions: function() {
                axios.get('api/getRegions',{
                  params: {
                    country_id: this.countrie
                  }
              })
              .then(function(response){
                  this.regions = response.data;
              }.bind(this))
              .catch(function (error){
                  console.log(error);
              });
            },
            getCities: function() {
                axios.get('api/getCities',{
                  params: {
                    region_id: this.region
                  }
              })
              .then(function(response){
                  this.cities = response.data;
              }.bind(this))
              .catch(function (error){
                  console.log(error);
              });
            },
            getNews(){
                let me =this;
                let url = 'api/news' //Ruta que hemos creado para que nos devuelva todas las news
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayNews = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveNews(){
                let me =this;
                let formData = new FormData();
                var fecha = Date.now();
                for( var i = 0; i < this.$refs.file.files.length; i++ ){
                    let file = this.$refs.file.files[i];
                    console.log(file);
                    let type = this.type;
                    let countrie = this.countrie;
                    let region = this.region;
                    let citie = this.citie;
                    let title = this.title;
                    let subtitle = this.subtitle;
                    let body = this.body;
                    formData.append('files[' + i + ']', file);
                    formData.append('type[' + this.type + ']', type);
                    formData.append('countrie[' + this.countrie + ']', countrie);
                    formData.append('region[' + this.region + ']', region);
                    formData.append('citie[' + this.citie + ']', citie);
                    formData.append('title[' + this.title + ']', title);
                    formData.append('subtitle[' + this.subtitle + ']', subtitle);
                    formData.append('body[' + this.body + ']', body);
                    formData.getAll('files', 'type', 'countrie', 'region', 'citie', 'title', 'subtitle', 'body');
                }
                let url = 'api/news'; //Ruta que hemos creado para enviar una news y guardarla
                axios.post('api/news', formData, { //estas variables son las que enviaremos para que crear la news
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },                  
                }).then(function (response) {
                    me.getNews();//llamamos al metodo getNews(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });               
            },
            updateNews(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                news que queremos modificar*/
                let me = this;
                axios.put('news',{
                    'id':this.update,
                    'type':this.type,
                    'countrie':this.countrie,
                    'region':this.region,
                    'citie':this.citie,
                    'title':this.title,
                    'subtitle':this.subtitle,
                    'body':this.body,
                    'file':this.file,
                }).then(function (response) {
                   me.getNews();//llamamos al metodo getNews(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la news que queremos modificar
                this.update = data.id
                let me =this;
                let url = 'news/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.type= response.data.type;
                    me.countrie= response.data.countrie;
                    me.region= response.data.region;
                    me.citie= response.data.citie;
                    me.title= response.data.title;
                    me.subtitle= response.data.subtitle;
                    me.body= response.data.body;
                    me.file= response.data.file;           
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deleteNews(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la news que hemos elegido
                let me =this;
                let news_id = data.id
                if (confirm('¿Seguro que deseas borrar esta news?')) {
                    axios.delete('news/borrar/'+task_id
                    ).then(function (response) {
                        me.getNews();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.type = "";
                this.countrie = "";
                this.region = "";
                this.citie = "";
                this.title = "";
                this.subtitle = "";
                this.body = "";
                this.file = "";                
                this.update = 0;
            }            
        },        
        created: function(){
            this.getTypes()
            this.getCountries()
            this.getNews()
        }
    }
</script>