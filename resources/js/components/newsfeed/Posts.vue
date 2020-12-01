<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card w-90" v-for="post in posts" :key="post.id">
                    <div class="card-body">
                      <div>
                        <a href="#">{{post.user}}</a>
                        <small class="text-secondary float-right">{{post.created_at}}</small>
                      </div>
                        <div class="mt-2">
                            <h5>
                                {{post.content}}
                            </h5>
                        </div>
                        
                      <p>
                        <span class="text-secondary">{{post.likes}}</span>
                        <a href="#" class="link-black text-sm"> Like</a>
                        
                        <!-- <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span> -->
                      </p>
                        <div class="float-left">
                            <router-link v-bind:to="'post/'+post.id" class="btn btn-primary">View</router-link>
                        </div>
                      <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                      <!-- <div class="float-right mt-3">
                      <button type="submit" class="btn btn-primary">Comment</button>
                      </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            post() {
                axios.get('./api/post').then(({data}) => (this.posts = data));
            }
        },
        created() {
            this.post();
        }
    }
</script>
