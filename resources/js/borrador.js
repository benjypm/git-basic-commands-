const app = new Vue({
    el: '#app',
    created: function(){
    	this.getNews();
    },
    data: {
    	news: [],
    	newNews: '',
    	errors: []
    },
    methods: {
    	getNews: function() {
    		var urlNews = 'news';
    		axios.get(urlNews).then(response => {
    			this.news = response.data
    		});
    	},
    	deleteNews: function(news) {
    		var url = 'news/' + news.id;
    		axios.delete(url).then(response => {
    			//eliminamos
    			this.getNews();
    			//listamos
    			toastr.success('Eliminado correctamente');
    		});
    	},
    	createNews: function(){
    		var url = 'news';
    		axios.post(url, {
    			news: this.newNews
    		}).then(response => {
    			this.getNews();
    			this.newNews = '';
    			this.errors = [];
    			$('#app-news').modal('hide');
    			toastr.success('Noticia Creada correctamente');

    		}).catch(error => {
    			this.errors = error.response.data
    		});
    	}
    }
});