<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card w-90" v-for="post in posts" :key="post.id">
                    <div class="card-body">
                      <div>
                          <a href="#">{{post.user}}</a>
                      </div>
                        <span class="text-secondary">{{post.created_at}}</span>
                        <div class="mt-2">
                            <p>
                                {{post.content}}
                            </p>
                        </div>
                      <p>
                          <span class="text-secondary">{{post.likes}}</span>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      <div class="float-right mt-3">
                      <button type="submit" class="btn btn-primary">Comment</button>
                      </div>
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
