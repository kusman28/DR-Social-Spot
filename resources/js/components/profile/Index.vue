<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">My Status</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Settings</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <!-- <div v-for="p in posts" :key="p.id">
                                    <p>{{p.content}}</p>
                                </div> -->
                            
                            <div class="card w-90" v-for="p in posts" :key="p.id">
                                <div class="card-body">
                                    <span class="text-secondary">{{p.created_at}}</span>
                                    <div class="mt-2">
                                        <p>
                                            {{p.content}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                               
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Firstname</label>
                                        <div class="col-md-8">
                                        <input type="text" v-model="form.firstname" class="form-control" placeholder="Name" :class="{ 'is-invalid': form.errors.has('firstname') }">
                                        <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-md-8">
                                        <input type="text" v-model="form.email" class="form-control" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button @click.prevent="updateInfo" type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
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
                posts: {},
                form: new Form({
                    id: '',
                    firstname: '',
                    email: '',
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            updateInfo()
            {
                this.form.put('./profile')
                window.location.href = "/profile";
            },
            profile() {
                axios.get('./getProfile')
		        .then(({ data }) => (this.form.fill(data)));
            },
            status() {
                axios.get('./status').then(({data}) => (this.posts = data));
            }
        },
        created() {
            this.profile();
            this.status();
        }
    }
</script>
