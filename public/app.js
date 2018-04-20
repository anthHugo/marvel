var app = new Vue({
  el: '#app',
  data: {
  	show : false,
    items: []
  },
  methods : {
  	avatar : function(item){
  		return item.thumbnail.path + '/landscape_incredible.' + item.thumbnail.extension;
  	},
  	details : function(item, event){
  		event.preventDefault();
  		this.$set(item, 'clicked', !item.clicked);
  	},
  	truncateComics : function(items){
  		return items.slice(0, 2);
  	}
  },
  mounted: function () {
	var self = this;
	axios.get('/api/list')
	  .then(function (response) {
	    self.items = response.data.results;
	    self.show = true;
	  })
	  .catch(function (error) {
	    console.log(error);
	  });
	}
})


