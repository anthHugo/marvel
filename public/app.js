var app = new Vue({
  el: '#app',
  data: {
    init: false,
  	show : false,
    page: 0,
    totalPage: 0,
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
  	},
    prev : function(){
      if(this.page > 1){
        this.page--;
      }
    },
    next : function(){
      if(this.page < this.totalPage){
        this.page++;
      }
    }
  },
  watch: {
    page: function(number){
      if(this.init){
        this.show = false;
        this.items = [];
        var self = this;
        axios.get('/api/list?page=' + number)
        .then(function (response) {
          self.items = response.data.results;   
          self.show = true;
        })
        .catch(function (error) {
          console.log(error);
        });
      }
      this.init = true;
    }
  },
  mounted: function () {
  	var self = this;
  	axios.get('/api/list')
  	  .then(function (response) {
        let data = response.data;
        self.totalPage = Math.ceil(data.total / data.limit);
        self.page =  Math.ceil(data.offset /  data.limit);
        self.items = data.results;
  	    self.show = true;
  	  })
  	  .catch(function (error) {
  	    console.log(error);
  	  });
	}
})
