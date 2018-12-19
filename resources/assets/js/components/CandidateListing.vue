<template id="post-list">
  <div class="row">
    <div class="pull-right">
      <router-link class="btn btn-xs btn-primary" v-bind:to="{path: '/add-post'}">
        <span class="glyphicon glyphicon-plus"></span>
        Add new Post
      </router-link>
    </br></br>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Post Title</th>
          <th>Post Body</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th class="col-md-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(document, index) in filteredDocuments">
          <td>{{ index + 1 }}</td>
          <td>{{ document.email }}</td>
          <td>{{ document.candidates_name }}</td>
          <td>{{ document.created_at }}</td>
          <td>{{ document.updated_at }}</td>
          <td>

          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  data:function(){
    return {documents: ''};
  },
  created: function() {
    let uri = 'http://localhost:8000/v1/api/candidates';
    Axios.get(uri).then((response) => {
      this.documents = response.data;
    });
  },
  computed: {
    filteredDocuments: function(){
      if(this.documents.length) {
        return this.documents;
      }
    }
  }
}
</script>

<script>
export default {
  data:function(){
    return {posts: ''};
  },
  created: function() {
    let uri = 'http://localhost:8000/posts/';
    Axios.get(uri).then((response) => {
      this.posts = response.data;
    });
  },
  computed: {
    filteredPosts: function(){
      if(this.posts.length) {
        return this.posts;
      }
    }
  }
}
</script>