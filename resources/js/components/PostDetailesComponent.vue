<template>
    <div>
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{post.title}}</h1>

        <!-- Author -->
        <p class=" alert alert-info" style="width: fit-content;
        padding: 5px;
        color: #142d31;" >{{post.category}}
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <strong class="badge badge-primary p-1">{{post.created_at}}</strong> at <strong class="badge badge-danger p-1"> 12:00 PM</strong>
            <span class="float-right"><strong class="badge badge-info p-1">22</strong>{{comments.length}} </span></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" :src="'/assets/img/'+post.image" style="width:900px;max-height:300px" alt="">

        <hr>

        <!-- Post Content -->
          {{post.body}}
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
            <input type="hidden" name="" v-model='post_id'>
              <div class="form-group">
                <textarea class="form-control" rows="3" v-model='body'></textarea>
              </div>
              <button type="submit" class="btn btn-primary" @click.prevent='addComment'>Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4" v-for='comment in post.comments' :key="comment.id">
          <img class="d-flex mr-3 rounded-circle" :src="'/assets/img/'+comment.user.profile_img" style='height:50px;width:50px'>
          <div class="media-body">
            <h5 class="mt-0">{{comment.user.name}}</h5>
           {{comment.body}}
          </div>
        </div>

        <!-- Comment with nested comments -->

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>


</template>
<script>
export default {
    data(){
        return{
            post:'',
            ///comment form
            body:'',
            post_id:'',
            comments:[]
        }
    },
    created(){
        this.getPost();
        console.log('jjj');

    },
    methods:{
        getPost(){
              axios.get('/api/posts/'+this.$route.params.slug).then(response=>{

                   console.log(response);
                   this.post = response.data;
                   this.post_id = this.post.id;
                   this.comments = this.post.comments;
               })


        },
        addComment(){
            let{body,post_id} = this;
            axios.post('/api/comment/create',{body,post_id}).then(res=>{
               console.log(res.data);
               this.comments.unshift(res.data);
            })
        }
    },
    computed:{
        islogged(){
            return this.$store.getters.islogged;
        }
    }
}
</script>
