<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{post.user}}</div>
                    <div class="card-body">
                        {{post.content}}
                        <br><br>
                        {{comments}}
                    <hr>
                    <form method="PUT">
                        <input v-model="form.comment" class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      <div class="float-right mt-3">
                      <button @click.prevent="addComment" type="submit" class="btn btn-primary">Comment</button>
                      </div>
                    </form>
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
            post: {},
            comments: {},
            form: new Form({
                id: '',
                comment: '',
            })
        }
        },
        mounted() {
            this.id = this.$route.params.id;
            this.userPost();
            this.postComment();
        },
        methods: {
            addComment()
            {
                this.form.put('/api/post/'+this.id)
                window.location.href = "/newsfeed";
            },
            userPost()
            {
                axios.get('/api/post/'+this.id)
                .then(({ data }) => (this.post = data));
            },
            postComment()
            {
                axios.get('/api/comments/'+this.id)
                .then(({ data }) => (this.comments = data));
            },
        },
    }
</script>
