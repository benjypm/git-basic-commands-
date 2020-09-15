<template>
    <div class="container container-news">
        <div class="row">
            <div class="col-md-6">
                <h2>Lista de news</h2>
                <table class="table text-center"><!--Creamos una tabla que mostrará todas las tareas-->
                    <thead>
                        <tr>
                            <th scope="col">title</th>
                            <th scope="col">subtitle</th>
                            <th scope="col">body</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="news in arrayNews" :key="news.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                            <td v-text="news.title"></td>
                            <td v-text="news.subtitle"></td>
                            <td v-text="news.body"></td>
                            <td>
                                <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                <button class="btn" @click="loadFieldsUpdate(news)">Modificar</button>
                                <!--Botón que borra la tarea que seleccionemos-->
                                <button class="btn" @click="deleteNews(news)">Borrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras tareas-->
                    <label>Title</label>
                    <input v-model="title" type="text" class="form-control">

                    <label>Subtitle</label>
                    <input v-model="subtitle" type="text" class="form-control">

                    <label>Body</label>
                    <input v-model="body" type="text" class="form-control">
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
</template>

<script>
    export default {
        data(){
            return{
                title:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                subtitle:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                body:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
                arrayNews:[], //Este array contendrá las noticias de nuestra bd
            }
        },
        methods:{
            getNews(){
                let me =this;
                let url = '/news' //Ruta que hemos creado para que nos devuelva todas las tareas
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
                let url = '/news/create' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                    'title':this.title,
                    'subtitle':this.subtitle,
                    'body':this.body,
                }).then(function (response) {
                    me.getNews();//llamamos al metodo getNews(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });   
                
            },
            updateNews(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                tarea que queremos modificar*/
                let me = this;
                axios.put('/news/actualizar',{
                    'id':this.update,
                    'title':this.title,
                    'subtitle':this.subtitle,
                    'body':this.body,
                }).then(function (response) {
                   me.getNews();//llamamos al metodo getNews(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la tarea que queremos modificar
                this.update = data.id
                let me =this;
                let url = '/news/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.title= response.data.title;
                    me.subtile= response.data.subtile;
                    me.body= response.data.body;
                    
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deleteNews(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la tarea que hemos elegido
                let me =this;
                let news_id = data.id
                if (confirm('¿Seguro que deseas borrar esta news?')) {
                    axios.delete('/news/borrar/'+news_id
                    ).then(function (response) {
                        me.getNews();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.tilte = "";
                this.subtitle = "";
                this.body = "";
                this.update = 0;
            }
        },
        mounted() {
           this.getNews();
        }
    }
</script>
